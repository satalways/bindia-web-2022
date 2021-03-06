<?php

namespace App\Models;

use App\Logic\Nets;
use App\Logic\Order;
use App\Logic\PDF;
use App\Logic\Wolt;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Orders extends BaseModel
{
    use HasFactory;
    use Notifiable;

    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'delivery',
    ];

    protected $dates = [
        'order_time',
        'pickup_datetime',
        'delivery_datetime',
        'paid_time',
        'etakeaway_pickup_time',
        'unfinished_notification_sent_at',
    ];

    protected $appends = [
        'full_name',
        'customer_email',
        'pickup_time',
    ];

    protected $casts = [
        'paid' => 'boolean',
        'rf_mail_sent' => 'boolean',
        'checked_for_unfinished_email' => 'boolean',
        'customer_mail_sent' => 'boolean',
        'skip_loyalty' => 'boolean',
        'unfinished' => 'boolean',
        'invoiced' => 'boolean',
        'etakeaway_failed' => 'boolean',
        'catering_orders_new' => 'boolean',
        'is_asap' => 'boolean',
        'etakeaway_order_created' => 'boolean',
        'is_custom_order' => 'boolean',
        'pickup_time' => 'datetime',
        'copy_order' => 'boolean',
    ];

    public function isDelivery()
    {
        return $this->delivery === 'By Taxi';
    }

    public function isOnlinePayment()
    {
        return $this->payment_type === 'card';
    }

    public function isPaid()
    {
        return $this->paid;
    }

    public function isUnfinished()
    {
        if (! $this->isOnlinePayment()) return false;

        return ! $this->isPaid();
    }

    public function shopNameLong()
    {
        $shops = config('shops');

        return $shops[$this->shop]['long_name'] ?? '';
    }

    public function shopAddress()
    {
        $shops = config('shops');

        return $shops[$this->shop]['address2'] ?? '';
    }

    public function shopCompany()
    {
        $shops = config('shops');

        return $shops[$this->shop]['company'] ?? '';
    }

    public function shopPhone()
    {
        $shops = config('shops');

        return $shops[$this->shop]['phone'] ?? '';
    }

    public function getShopTakeoutID()
    {
        $shops = config('shops');

        return $shops[$this->shop]['takeout_id'] ?? 0;
    }

    public function getShopCVR()
    {
        $shops = config('shops');

        return $shops[$this->shop]['cvr'] ?? '';
    }

    public function getShopIban()
    {
        $shops = config('shops');

        return $shops[$this->shop]['iban'] ?? '';
    }

    public function getShopAccountNumber()
    {
        $shops = config('shops');

        return $shops[$this->shop]['account_number'] ?? '';
    }

    public function adminLink()
    {
        return 'https://admin.bindia.dk/orders.html?order_time=all&search=' . $this->id;
    }

    public function paymentLink()
    {
        return route('order.payment') . '?token=' . $this->orderToken();
    }

    public function pdfLink()
    {
        return route('order.pdf') . '?token=' . encodeData(['id' => $this->id]);
    }

    public function pdf($inline = false)
    {
        Storage::disk('local')->makeDirectory('orders' . DIRECTORY_SEPARATOR . 'invoices');
        $path = Storage::path('orders' . DIRECTORY_SEPARATOR . 'invoices' . DIRECTORY_SEPARATOR . 'bindia_order_receipt_' . $this->id . '.pdf');

        if ($inline) {
            return PDF::create_pdf_file_from_view('order.pdf', [
                'order' => $this,
            ], $path, ['inline' => 1]);
        } else {
            return PDF::create_pdf_file_from_view('order.pdf', [
                'order' => $this,
            ], $path);
        }
    }

    public function customer()
    {
        if ($this->guest_id > 0) {
            return $this->belongsTo(OrdersGuest::class, 'guest_id');
        } else {
            return $this->belongsTo(OrdersGuest::class, 'user_id');
        }
    }

    public function items()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function getTotalAmountAttribute()
    {
        if ($this->is_custom_order) {
            return $this->attributes['total_price'];
        }

        $total = 0;

        foreach ($this->items as $item) {
            $total += ($item->price * $item->qty);
        }

        if ($this->payment_type === 'card' && $this->gift_card_discount > 0) {
            $total -= $this->gift_card_discount;
        }

        $total -= $this->getDynamicDiscountAttribute();

        if ($this->isDelivery()) {
            $total += $this->delivery_fee;
        }

        return round($total, 2);
    }

    public function getIsDeliveryAttribute()
    {
        return $this->isDelivery();
    }

    public function getDynamicDiscountAttribute()
    {
        if ($this->payment_type != 'card') return 0;

        $total = 0;

        foreach ($this->items as $item) {
            ## Skip Thermo Box for discount
            if ($item->code == config('orders.thermo_box_code')) continue;
            $total += ($item->price * $item->qty);
        }

        if ($this->delivery_fee > 0 && $this->order_time->lt(Carbon::create('28-04-2021'))) {
            $total += $this->delivery_fee;
        }

        if ($this->gift_card_discount > 0) {
            $total -= $this->gift_card_discount;
        }

//        if ($this->payment_type === 'card' && $total >= 100) {
//            return round(((int)($total / 100)) * 10, 2);
//        }

        return 0;
    }

    public function getFullNameAttribute()
    {
        return trim($this->shipping_first_name . ' ' . $this->shipping_last_name);
    }

    public function getCustomerEmailAttribute()
    {
        return $this->shipping_email;
    }

    public function getPickupTimeAttribute()
    {
        return $this->pickup_datetime;
    }

    public function getCustomerPhoneAttribute()
    {
        return $this->shipping_phone;
    }

    public function orderToken()
    {
        return JWT::encode(['id' => $this->id], config('app.encode_key'));
    }

    public function createTakeoutOrder()
    {
        if (! $this->isDelivery()) return 'Order is not deliverable';
        if (! $this->isPaid()) return 'This order is not paid and can not send to takeout';
        if ($this->etakeaway_id > 0) return 'Order is already created in takeout system.';
        if ($this->attributes['delivery_datetime'] === '0000-00-00 00:00:00' || blank($this->attributes['delivery_datetime'])) return 'Invalid delivery time.';

        $name = $this->shipping_first_name . " " . $this->shipping_last_name;
        $address = $this->shipping_address;
        $phone = $this->shipping_phone;
        //$location = $this->shipping_postal_code;
        $comments = $this->comments;
        $details = "Order Details Below\r\n";
        foreach ($this->items as $cart) {
            $details .= $cart->item_code . " " . $cart->item_title . " ({$cart->price}) x " . $cart->qty . " = " . ($cart->price * $cart->qty) . "\r\n";
        }

        $e = (object) config('takeout');

        $keys["Website"] = $e->Website;
        $keys["ClientCode"] = $e->ClientCode;
        $keys["ClientVersion"] = $e->ClientVersion;
        $keys["Language"] = $e->Language;
        if (Nets::Test()) {
            $keys["TestMode"] = true;
        }
        $keys["UserToken"] = "";
        $keys["Function"] = "CreateExternalOrder";
        $keys["Data"]["PartnerID"] = $e->PartnerID;
        $keys["Data"]["RestaurantID"] = $this->getShopTakeoutID();
        if (testServer() || localhost()) {
            $keys["Data"]["OrderID"] = "T" . $this->id;
        } else {
            $keys["Data"]["OrderID"] = $this->id;
        }
        $keys["Data"]["OrderPrice"] = $this->getTotalAmountAttribute() - $this->delivery_fee;
        //$keys["Data"]["PickupDate"] = date("Y-m-d", strtotime($delivery_time_et)) . "T" . date("H:i:s", strtotime($delivery_time_et));  //"2015-07-30T21:30:00";
        $keys["Data"]["PickupDate"] = $this->etakeaway_pickup_time ? $this->etakeaway_pickup_time->toAtomString() : '';

        $keys["Data"]["RecipientName"] = trim($name);
        $keys["Data"]["RecipientAddress"] = $address;
        $keys['Data']['RecipientZip'] = $this->shipping_postal_code;

        # Added in 1.3
        $keys["Data"]["RecipientAddressNotes"] = "";
        $keys["Data"]["RecipientPhone"] = $phone;

        # Added in 1.3
        $keys["Data"]["RecipientCompany"] = "";
        //$keys["Data"]["RecipientLocation"] = $location;

        # Added in 1.3
        $keys["Data"]["RecipientCount"] = 1;
        $keys["Data"]["OrderComments"] = $comments;
        $keys["Data"]["OrderDetails"] = $details;
        //$keys["Data"]["CalculateDeliveryFee"] = 0;

        try {
            $this->sent_to_etakeaway = json_encode($keys);
            $this->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $e->api_url);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        #curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: multipart/form-data; boundary=---------------------------32642708628732"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:23.0) Gecko/20100101 Firefox/23.0");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data_string = json_encode($keys);
        $data = ["data" => $data_string];
        if (is_array($data)) {
            $data = http_build_query($data);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);
        try {
            $this->response_from_takeout = $result;
            $this->save();
        } catch (\Exception $e) {

        }

        if (! is_json($result)) {
            return $result;
        }

        $result = json_decode($result, true);

        if (isset($result['TestMode']) && $result['TestMode'] === true) {
            $result["Data"]["ID"] = random_int(16000, 999999) . '0000';
        }

        if (isset($result['Status']) && $result['Status'] === true) {
            if (empty($result["Data"]["ID"])) {
                return 'Order ID missing.';
            }

            try {
                $this->etakeaway_order_created = true;
                $this->etakeaway_id = $result["Data"]["ID"];
                $this->save();
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }

            return 'OK';
        }

        if (isset($result['ErrorMessage']) && ! blank($result['ErrorMessage'])) {
            return $result['ErrorMessage'];
        }

        return json_encode($result);
    }

    public function getEmailAttribute()
    {
        return $this->shipping_email;
    }

    public function feedbackLink(): string
    {
        return route('order.feedback') . '?token=' . base64_encode(json_encode([
                'name' => trim($this->shipping_first_name . ' ' . $this->shipping_last_name),
                'email' => $this->shipping_email,
                'type' => 'weborder',
                'data_id' => $this->id,
                'phone' => $this->shipping_phone,
            ]));
    }

    public function orderFiles()
    {
        //$files[] = resource_path('order_files/Loyalty-Programme.pdf');
        $files[] = resource_path('order_files/how-to-reheat-your-food-from-bindia.pdf');
        //$files[] = resource_path('order_files/' . strtoupper($this->shop) . '-Terms of Sale and Delivery.pdf');
        $files[] = $this->pdf();

        if ($this->copy_order) {
            $files[] = resource_path('order_files/CopyMyLastOrder-Terms.pdf');
        }

        return $files;
    }

    public function getEtakeawayPickupTimeAttribute()
    {
        if (! $this->attributes['etakeaway_pickup_time']) return $this->pickup_datetime;
    }

    /**
     * @param $keyName
     * @return mixed
     *
     * Get additional data against any order.
     */
    public function getData($keyName)
    {
        $data = getOption('Order' . $this->id);

        return $data->{$keyName} ?? null;
    }

    /**
     * @param $keyName
     * @param $value
     * @return bool
     *
     * Set order new option data.
     */
    public function setData($keyName, $value)
    {
        $data = getOption('Order' . $this->id);

        if (! $data) {
            $data = (object) [];
        }
        $data->{$keyName} = $value;

        return setOption('Order' . $this->id, $data);
    }

    /**
     * Get Item cart table by providing it details.
     */
    public function get_item_cart_table()
    {

        $total = 0;
        $cart_table = "
			<table style='border-collapse: collapse;border:1px solid #C9C9C9;width:100%'>
            <tr style='font-weight:bold;background-color:#C9C9C9'>
                <td style='padding:5px;border:1px solid #C9C9C9'>Qty x Item Name</td>
            </tr>";

        foreach ($this->items as $item) {
            $cart_table .= "<tr><td style='padding:5px;border:1px solid #C9C9C9'>
                {$item->qty} x {$item->item_title} - ({$item->code})
                </td></tr>";
        }

        $cart_table .= "</table>";

        return $cart_table;
    }

    public function sendLargeOrderNotification()
    {
        if ($this->is_custom_order) return;
        if ($this->getTotalAmountAttribute() < 1000) return;
        if (! $this->isPaid() && $this->isOnlinePayment()) return;

        $temp = template('12.5.5');

        $Fields = [
            '{order_id}' => $this->id,
            '{customer_name}' => $this->getFullNameAttribute(),
            '{customer_email}' => $this->getCustomerEmailAttribute(),
            '{customer_phone}' => $this->getCustomerPhoneAttribute(),
            '{order_details}' => $this->get_item_cart_table(),
            '{link}' => "<a class='btn' href='" . $this->adminLink() . "'>View Order</a>",
            '{total_amount}' => $this->getTotalAmountAttribute(),
            '{shop_name}' => $this->shop,
            '{order_time}' => $this->order_time->format(config('app.date_time_format')),
            '{pickup_datetime}' => $this->pickup_datetime->format(config('app.date_time_format')),
        ];

        $subject = str_ireplace(array_keys($Fields), array_values($Fields), $temp->subject);
        $content = str_ireplace(array_keys($Fields), array_values($Fields), $temp->content);

        send_mail('office@bindia.dk', $subject, $content);
    }

    /**
     * @return bool
     *
     * Check if this is a wolt order
     */
    public function isWoltOrder(): bool
    {
        if (! $this->isDelivery()) return false;

        return $this->is_wolt_order ?: false;
    }

    public function woltShipmentPromiseID(): string
    {
        if (! $this->isWoltOrder()) return '';

        return $this->shipment_response['id'] ?: '';
    }

    public function markPaid()
    {
        if ($this->paid) return 'Order is already paid.';

        $order_time_difference = $this->order_time->diffInMinutes();
        if ($this->isDelivery() && ! $this->is_custom_order) {
            $time_difference_minutes = $this->delivery_datetime->diffInMinutes();
        } else if (! $this->isDelivery()) {
            $time_difference_minutes = $this->pickup_datetime->diffInMinutes();
        }

        if ($this->isWoltOrder()) {
            $W = new Wolt();

            $response = $W->createWoltDelivery($this);
        }

        // If order generate time is more 10 minutes and time left for pickup is less then half hour
        if (! $this->is_custom_order && $order_time_difference >= 10 && $time_difference_minutes <= 30) {
            $is_change = true;

            if (! $this->pickup_datetime) {
                $this->pickup_datetime = Carbon::now();
            }

            if ($this->is_delivery) {
                $delivery_datetime = $this->delivery_datetime->addMinutes($order_time_difference);
                $this->delivery_datetime = $delivery_datetime;
            }

            $pickup_datetime = $this->pickup_datetime->addMinutes($order_time_difference);
            $this->pickup_datetime = $pickup_datetime;
        }

        try {
            $this->paid = true;
            $this->paid_time = now();
            $this->paid_ip = getIP();
            $this->save();
        } catch (\Exception $exception) {
            Log::debug('Order was not paid marked: ' . $exception->getMessage());
            abort(404);
        }

        if (! $this->is_custom_order) {
            $G = new \App\Logic\GiftCard();
            $G->redeemGiftCardByOrder($this->id);

            $O = new Order();
            /**
             * Send email to customer if this is not a delivery order.
             */
            $O->sendOrderEmailToCustomer($this->id);

            $O->sendOrderEmailToShop($this->id);
        }

        return 'OK';
    }
}
