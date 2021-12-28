<?php

namespace App\Logic;

use App\Models\GiftCard;
use App\Models\GiftCardSubCards;
use App\Models\OrderDetails;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\OrdersGuest;
use App\Models\TakeoutZonesModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Order
{
    private function calculateItems($items)
    {
        $ids = array_keys($items);

        $itemsSend = OrderItems::query()
            ->where('active', true)
            ->whereIn('id', $ids)
            ->orderBy('code')
            ->get();

        $bagPoints = 0;

        $nanAvailable = false;
        $itemsSend = $itemsSend->each(function ($item, $key) use ($items, &$bagPoints, &$nanAvailable) {
            $item->qty = $items[$item->id];
            $item->amount = $items[$item->id] * $item->price;
            $item->amount_orange = $items[$item->id] * $item->price_orange;
            $bagPoints += ($item->bag_points * $items[$item->id]);
            if ($item->code == 610) $nanAvailable = true;
        });

        $bags = ceil($bagPoints / config('order.points_for_one_bag'));
        $bags_price = $bags * config('order.bag_price');
        $total_price = $itemsSend->pluck('amount')->sum() + $bags_price;
        $total_price_orange = $itemsSend->pluck('amount_orange')->sum() + $bags_price;

        return [
            'bagPoints' => $bagPoints,
            'total_price' => $total_price,
            'total_price_orange' => $total_price_orange,
            'bags_price' => $bags_price,
            'bags' => $bags,
            'itemsSend' => $itemsSend,
            'nan_available' => $nanAvailable
        ];
    }

    public function clearSession()
    {
        session()->forget(['checkout', 'bindiaCart', 'bindiaCartSpice']);
    }

    public function getSessionCartData(bool $checkout = false)
    {
        $items = $this->getSessionCart();

        if ($checkout) {
            $checkoutData = session()->get('checkout');
        } else {
            $checkoutData = [];
        }

        if (!isset($checkoutData['payment_type'])) $checkoutData['payment_type'] = 'card';
        if (!isset($checkoutData['delivery'])) $checkoutData['delivery'] = 'Pickup at Shop';

        $Data = $this->calculateItems($items);
        $Data['isOrange'] = $checkout && $checkoutData['payment_type'] === 'card' && $checkoutData['delivery'] === 'Pickup at Shop';

        if (!$checkout) {
            $Data['total_price'] -= $Data['bags_price'];
            $Data['total_price_orange'] -= $Data['bags_price'];
            $Data['bagPoints'] = 0;
            $Data['bags_price'] = 0;
        }

        if ($Data['isOrange']) {
            $Data['total_price'] = $Data['total_price_orange'];
        }

        /**
         * Proceed Gift Card if available in shopping cart
         */
        $giftCardDiscount = 0;
        $discount = 0;

        if ($checkout && isset($checkoutData['payment_type']) && $checkoutData['payment_type'] === 'card' && !empty($checkoutData['giftcard'])) {
            $giftCard = GiftCard::query()
                ->where('deleted', false)
                ->where('valid_date', '>=', Carbon::today())
                ->where('status', '<', \App\Logic\GiftCard::Redeemed)
                ->where(function ($query) {
                    $query->where('customer_card', false)
                        ->orWhere(function ($query) {
                            $query->where('customer_card', true)
                                ->where('paid_by_customer', true);
                        });
                })
                ->where('card_number', $checkoutData['giftcard'])->first();

            if ($giftCard) {
                if ($Data['isOrange']) {
                    if ($giftCard->orange_final_balance > 0) {
                        if ($giftCard->amount_type === 'percent') {
                            $giftCardDiscount = round($Data['total_price'] * $giftCard->balance / 100, 0);
                        } else {
                            $giftCardDiscount = $giftCard->orange_final_balance;
                        }
                    }
                } else {
                    if ($giftCard->final_balance > 0) {
                        if ($giftCard->amount_type === 'percent') {
                            $giftCardDiscount = round($Data['total_price'] * $giftCard->balance / 100, 0);
                        } else {
                            $giftCardDiscount = $giftCard->final_balance;
                        }
                    }
                }

                if (!empty($giftCard->selected_items)) {
                    $GCItems = [];
                    foreach ($giftCard->selected_items as $code => $qty) {
                        $I = OrderItems::query()
                            ->where('code', $code)
                            ->first();

                        $GCItems[$I->id] = [
                            'qty' => $qty,
                            'id' => $I->id,
                            'item' => $I
                        ];
                    }

                    foreach ($GCItems as $id => $GCItem) {
                        if (!isset($items[$id])) {
                            $items[$id] = $GCItem['qty'];
                        } else if ($items[$id] < $GCItem['qty']) {
                            $items[$id] = $GCItem['qty'];
                        }
                    }
                }
            }

            $Data = $this->calculateItems($items);
            $Data['isOrange'] = $checkout && $checkoutData['payment_type'] === 'card' && $checkoutData['delivery'] === 'Pickup at Shop';


            if ($Data['isOrange']) {
                if ($Data['total_price_orange'] < $giftCardDiscount) {
                    $giftCardDiscount = $Data['total_price_orange'];
                    $Data['total_price_orange'] = 0;
                } else {
                    $Data['total_price_orange'] -= $giftCardDiscount;
                }

                $Data['total_price'] = $Data['total_price_orange'];
            } else {
                if ($Data['total_price'] < $giftCardDiscount) {
                    $giftCardDiscount = $Data['total_price'];
                    $Data['total_price'] = 0;
                } else {
                    $Data['total_price'] -= $giftCardDiscount;
                }
            }
        }

        if (empty($checkoutData['date'])) $checkoutData['date'] = \Carbon\Carbon::today()->toDateString();
        if (empty($checkoutData['time'])) {
            $checkoutData['time'] = '16:' . config('order.order_prep_time');
        }

        try {
            $dateObject = Carbon::create($checkoutData['date'] . ' ' . $checkoutData['time']);
        } catch (\Exception) {
            $dateObject = Carbon::now();
        }
        if (Carbon::now()->diffInMinutes($dateObject) < config('order.order_prep_time')) {
            $checkoutData['time'] = Carbon::now()->subMinutes(config('order.order_prep_time') + 5)->format('H:i');
        }

        $Data['total_price'] -= $discount;
        $Data['total_price_orange'] -= $discount;

        /**
         * Check if there is delivery order and calculating delivery fee
         */
        $Data['delivery_fee'] = 0;
        if ($checkout && isset($checkoutData['payment_type']) && $checkoutData['payment_type'] === 'card' && isset($checkoutData['delivery']) && $checkoutData['delivery'] === 'By Taxi' && !empty($checkoutData['shipping_postal_code'])) {
            $takeOut = TakeoutZonesModel::query()
                ->whereRaw('(? between post_number and post_number2)', [$checkoutData['shipping_postal_code']])
                ->orderByDesc('id')
                ->first();

            if ($takeOut) {
                $Data['delivery_fee'] = $takeOut->price;
                $Data['total_price'] += $takeOut->price;
                $Data['total_price_orange'] += $takeOut->price;
            }
        }

        return [
            'total_price' => $Data['total_price'],
            'total_price_orange' => $Data['total_price_orange'],
            'total_qty' => array_sum($items),
            'items' => $Data['itemsSend'],
            'bag_points' => $Data['bagPoints'],
            'bags' => $Data['bags'],
            'bag_price' => $Data['bags_price'],
            'checkout' => $checkoutData,
            'discount' => $discount,
            'giftCardDiscount' => $giftCardDiscount,
            'gift_card_numbers' => $giftCard->id ?? '',
            'nan_available' => $Data['nan_available'],
            'delivery_fee' => $Data['delivery_fee'],
            'isOrange' => isset($Data['isOrange']) ? $Data['isOrange'] : true,
        ];
    }

    public function getSessionCart()
    {
        return \request()->session()->get('bindiaCart', []);
    }

    public function getSessionSpice()
    {
        return \request()->session()->get('bindiaCartSpice', []);
    }

    public function getSessionSpiceCountArray()
    {
        $spices = $this->getSessionSpice();

        $stringArray = [];
        foreach ($spices as $id => $spice) {
            if (is_array($spice)) {
                foreach ($spice as $s) {
                    $stringArray[$id][$s] = isset($stringArray[$id][$s]) ? ($stringArray[$id][$s] + 1) : 1;
                }
            }
        }

        return $stringArray;
    }

    public function setSessionCartSpice(array $spiceArray)
    {
        $sessionCart = $this->getSessionCart();
        \request()->session()->put('bindiaCartSpice', $spiceArray);

//        $finalSpiceArray = [];
//        foreach ($spiceArray as $id => $spice) {
//            if (isset($sessionCart[$id])) {
//                foreach($spice as $s) {
//                    $finalSpiceArray[$id][$s] = isset($finalSpiceArray[$id][$s]) ? $finalSpiceArray[$id][$s] + 1 : 1;
//                }
//                //$finalSpiceArray[$id] = $sessionCart[$id] . '-' . $spice;
//            }
//        }

//        \request()->session()->put('bindiaCartSpice', $finalSpiceArray);
    }

    public function setSessionCartItem($id, $what = 1, $qty = 1)
    {
        $items = $this->getSessionCart();
        $what = (int)$what;
        if (!isset($items[$id])) $items[$id] = 0;
        if ($what === 1) {
            $items[$id] += $qty;
        } else if ($what === -1) {
            $items[$id] -= $qty;
        }

        if ($items[$id] < 1) {
            unset($items[$id]);
        }

        \request()->session()->put('bindiaCart', $items);
    }

    public function makeOrder(array $data)
    {
        $default = [
            'term_accept' => 0,
            'delivery' => '',
            'payment_type' => '',
            'shipping_email' => '',
            'shipping_phone' => '',
            'customer_name' => '',
            'shop' => '',
            'date' => '',
            'time' => '',
            'customer_address' => ''
        ];
        $data = set_args($data, $default);

        if (empty($data['term_accept'])) return __('checkout.term_accept_missing');
        //if (blank($data['delivery'])) return 'Order delivery type missing.';
        if (!in_array($data['delivery'], ['By Taxi', 'Pickup at Shop'])) {
            return 'Invalid order delivery type';
        }
        /**
         * Variable will detect delivery order.
         */
        $isDelivery = $data['delivery'] === 'By Taxi';

        if (!in_array($data['payment_type'], ['card', 'atshop'])) {
            return 'Invalid order payment type';
        }
        /**
         * Variable will detect if order is for online payment.
         */
        $isOnlinePayment = $data['payment_type'] === 'card';

        if (!is_email($data['shipping_email'])) {
            return __('checkout.invalid_email');
        }
        if (!is_phone($data['shipping_phone'])) {
            return __('checkout.invalid_phone');
        }
        if (blank($data['customer_name'])) {
            return __('checkout.customer_name_missing');
        }
        if ($data['delivery'] === 'Pickup at Shop' && !in_array($data['shop'], array_keys(config('shops')))) {
            return __('checkout.invalid_shop');
        }
        if (empty($data['date'])) return __('checkout.date_missing');
        if (empty($data['time'])) return __('checkout.time_missing');

        if (empty($this->getSessionCart())) return __('checkout.no_item_in_cart');
        /**
         * Check if order time is less than 16:20
         */
        if ($this->timeToMinutes($data['time']) < $this->timeToMinutes('16:' . config('order.order_prep_time'))) {
            return __('checkout.min_time_16_20');
        }
        $now = Carbon::now();
        $dateTime = Carbon::create($data['date'] . ' ' . $data['time']);

        if ($dateTime->lessThanOrEqualTo(Carbon::now())) {
            return 'Past time is not allowed for order';
        }

        if ($dateTime->lessThanOrEqualTo(Carbon::now()->addMinutes(config('order.order_prep_time')))) {
            return __('checkout.min_time_required', ['minutes' => config('order.order_prep_time')]);
        }

        $minutesDiff = $this->timeToMinutes($dateTime->format('H:i')) - $this->timeToMinutes($now->format('H:i'));

        if ($dateTime->isToday() && $minutesDiff > 1 && $minutesDiff < config('order.order_prep_time')) {
            return [
                'message' => __('checkout.min_time_required', ['minutes' => config('order.order_prep_time')]),
                'new_time' => Carbon::now()->addMinutes(config('order.order_prep_time') + 7)->format('H:i')
            ];
        } else if ($dateTime->isToday() && $minutesDiff < config('order.order_prep_time')) {
            $time = Carbon::now()->addMinutes(config('order.order_prep_time') + 5)->format('H:i');
            return __('checkout.select_at_least', ['time' => $time]);
        }


        /**
         * Check if all shop on closed on these dates
         */
        foreach (config('order.closing_dates') as $closingDate) {
            $closingDate = Carbon::create($closingDate . '-' . date('Y'));
            if ($closingDate->toDateString() === $dateTime->toDateString()) {
                return __('checkout.shop_closed', ['date' => $closingDate->format(config('app.date_format'))]);
            }
        }

        /**
         * Check if specific shop is closed on specific date
         */
        if (in_array($data['shop'], array_keys(config('order.closing_shop_dates')))) {
            foreach (config('order.closing_shop_dates') as $shop => $closingDate) {
                if ($shop === $data['shop'] && Carbon::create($closingDate . '-' . date('Y'))->toDateString() === $dateTime->toDateString()) {
                    return __('checkout.specific_shop_closed', ['shop' => $shop, 'date' => $closingDate->format(config('app.date_format'))]);
                }
            }
        }

        try {
            $guest = OrdersGuest::query()
                ->where('customer_email', $data['shipping_email'])
                ->firstOrNew();
            $guest->customer_name = $data['customer_name'];
            $guest->customer_email = $data['shipping_email'];
            $guest->customer_phone = formatize_phone_number($data['shipping_phone']);
            if (!empty($data['shipping_address'])) {
                $guest->customer_address = $data['shipping_address'];
            }
            $guest->ip = request()->ip();
            if (!$guest->exists()) {
                $guest->datetime = Carbon::now();
            }
            $guest->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        $data['guest_id'] = $guest->id;

        $checkoutData = $this->getSessionCartData(true);
        if (!$isOnlinePayment && $checkoutData['total_price'] >= 1000) {
            return __('checkout.large_order');
        }

//        if ($checkoutData['total_price'] < config('order.min_order_amount')) {
//            return __('Order amount is :amount, It seems there is some issue, We can not proceed.', ['amount' => $checkoutData['total_price']]);
//        }

        /**
         * Pick up Order and Pay at Shop
         */
        unset($data['action'], $data['term_accept']);
        $data['order_time'] = Carbon::now();
        $data['order_ip'] = request()->ip();
        $customer = explode(' ', $data['customer_name']);
        $data['shipping_first_name'] = $customer[0];
        $data['shipping_last_name'] = $customer[1] ?? '';
        unset($data['customer_name'], $data['giftcard']);
        $data['shipping_phone'] = formatize_phone_number($data['shipping_phone']);
        unset($data['date'], $data['time']);
        $data['delivery_fee'] = 0;
        $data['is_mobile'] = isMobile();
        $data['user_agent'] = request()->userAgent();
        $data['new_menu_item'] = 1;
        $data['unfinished_notification_sent_at'] = null;
        $data['unfinished_notification_sent_by'] = null;

        //$data['discount'] = $checkoutData['discount'];
        $data['discount'] = 0;
        $data['total_price'] = $checkoutData['total_price'];

        $successUrl = $paymentUrl = false;

        if (!$isDelivery && !$isOnlinePayment) {
            if ($dateTime->hour * 60 + $dateTime->minute > 1260) {
                return __('checkout.invalid_closing_time');
            }

            unset($data['customer_address']);
            $data['pickup_datetime'] = $dateTime;
            $successUrl = true;
            $shopName = $data['shop'];
        } else if (!$isDelivery && $isOnlinePayment) {
            if ($dateTime->hour * 60 + $dateTime->minute > 1260) {
                return __('checkout.invalid_closing_time');
            }

            unset($data['customer_address']);
            $data['pickup_datetime'] = $dateTime;

            $paymentUrl = true;
            $shopName = $data['shop'];
        } else if ($isDelivery) {
            unset($data['customer_address']);
            if (!$isOnlinePayment) {
                return __('checkout.only_online_payment_allowed');
            }
            /**
             * If delivery orders are stopped, then return error message.
             */
            if (config('order.stop_delivery_orders')) {
                return __('checkout.delivery_order_not_allowed');
            }

            /**
             * Check if delivery is off on specific dates
             */
            foreach (config('order.stop_delivery_on_dates') as $stopDate) {
                if (Carbon::create($stopDate . '-' . date('Y'))->toDateString() === $dateTime->toDateString()) {
                    return __('checkout.delivery_order_not_allowed_on_date', ['date' => $dateTime->format(config('app.date_format'))]);
                }
            }

            /**
             * If delivery address missing
             */
            if (empty($data['shipping_address'])) {
                return __('checkout.delivery_address_missing');
            }

            /**
             * Check if given postal code by customer is available in database.
             */
            if (TakeoutZonesModel::query()->whereRaw('(? between post_number and post_number2)', [$data['shipping_postal_code']])->orderByDesc('id')->count() === 0) {
                return __('checkout.invalid_postal_code');
            }

            /**
             * Check if city is missing for delivery order
             */
            if (empty($data['shipping_city'])) {
                return __('checkout.invalid_city');
            }

            /**
             * Getting row from database against provided postal code
             */
            $row = TakeoutZonesModel::query()
                ->whereRaw('(? between post_number and post_number2)', [$data['shipping_postal_code']])
                ->orderByDesc('id')
                ->first();
            if (!$row) return __('checkout.invalid_postal_code');

            $minTime = (16 * 60) + config('order.order_prep_time') + $row->deliveryMinutes();
            $minutesRequired = config('order.order_prep_time') + $row->deliveryMinutes();

            /**
             * If today's delivery order and customer selecting less then preparation + delivery time.
             */
            if ($dateTime->isToday() && $dateTime->hour >= 16) {
                if ($now->hour < 16 && ($dateTime->hour * 60) + $dateTime->minute < $minTime) {
                    return 'Delivery order cannot deliver before ' . $this->minutesToTime((16 * 60) + $minutesRequired) . ' at ' . $data['shipping_postal_code'];
                } elseif (($now->hour * 60) + $now->minute + $minutesRequired > ($dateTime->hour * 60) + $dateTime->minute) {
                    return 'Delivery order cannot deliver before ' . $this->minutesToTime(($now->hour * 60) + $now->minute + $minutesRequired) . ' at ' . $data['shipping_postal_code'];
                }

                if ((($dateTime->hour * 60) + $dateTime->minute) - ($now->hour * 60 + $now->minute) <= $minutesRequired) {
                    return 'Delivery order cannot deliver before ' . $this->minutesToTime(($now->hour * 60 + $now->minute) + $minutesRequired) . ' at ' . $data['shipping_postal_code'];
                }
            } else {
                if (($dateTime->hour * 60 + $dateTime->minute) < $minTime) {
                    return 'Delivery order cannot deliver before ' . $this->minutesToTime($minTime) . ' at ' . $data['shipping_postal_code'];
                }
            }

            $maxDeliveryMinutes = 21 * 60 + $row->deliveryMinutes();
            $selectedMinutes = $dateTime->hour * 60 + $dateTime->minute;
            if ($selectedMinutes > $maxDeliveryMinutes) {
                return __('checkout.max_delivery_time', ['time' => $this->minutesToTime($maxDeliveryMinutes)]);
            }

            $online_order_settings = getOption('online_order_settings');
            $minTimeDifference = (int)empty($online_order_settings["time_difference"]) ? 20 : $online_order_settings["time_difference"];
            $additional_minutes = (int)isset($online_order_settings[$row->shop]["additional"]) ? $online_order_settings[$row->shop]["additional"] : 0;
            if ($minTimeDifference < 20) $minTimeDifference = 20;
            if ($dateTime->dayName === 'Friday' || $dateTime->dayName === 'Saturday') $minTimeDifference = 30;
            $minutes_difference = $additional_minutes + $minTimeDifference;

            $data['shop'] = $row->shop;
            $estimatedAmount = $checkoutData['items']->sum('amount') + ($checkoutData['bags'] * $checkoutData['bag_price']);
            if ($estimatedAmount >= 500) $minutes_difference += 5;
            if ($estimatedAmount >= 1000) $minutes_difference += 5;

            $data['delivery_fee'] = $row->price;

            $now = Carbon::now();
            if ($now->diffInMinutes($dateTime) < $minutes_difference) {
                return __('checkout.need_preparation_time', ['minutes' => $minutes_difference]);
                // We need :minutes at least to prepare food.
            }

            $orderMinutes = ($dateTime->hour * 60) + $dateTime->minute;
            if ($orderMinutes > (21 * 60)) return __('checkout.time_is_over_for_delivery');

            $data['delivery_datetime'] = $dateTime;
            $data['delivery_in_mins'] = $row->deliveryMinutes();
            $pDateTime = $dateTime->copy();
            $data['pickup_datetime'] = $pDateTime->subMinutes($row->deliveryMinutes());
            $paymentUrl = true;
            //return $data;

            $shopName = $row->shop;
        }
        if ($checkoutData['nan_available'] && $dateTime->isToday() && !getOption($shopName . "_nan", false)) {
            return __('checkout.nan_not_available', ['shop' => $data['shop']]);
        }

        /**
         * Calculate gift card discount if available.
         */
        if (!empty($checkoutData['giftCardDiscount'])) {
            $data['gift_card_numbers'] = $checkoutData['gift_card_numbers'];
            $data['gift_card_discount'] = $checkoutData['giftCardDiscount'];
            //$data['total_price'] -= $checkoutData['giftCardDiscount'];
            $data['comments'] = $data['comments'] . PHP_EOL . 'Gift Card Redeemed: ' . $checkoutData['gift_card_numbers'];
        }

        $spices = $this->getSessionSpiceCountArray();
        unset($data['spice']);

        try {
            $id = Orders::query()->insertGetId($data);

            $order = Orders::query()->find($id);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        foreach ($checkoutData['items'] as $item) {
            $spice = '';
            if (isset($spices[$item->id])) {
                foreach ($spices[$item->id] as $name => $qty) {
                    $spice .= $qty . '-' . $name . ',';
                }
                $spice = rtrim($spice, ',');
            }
            try {
                OrderDetails::query()->insert([
                    'order_id' => $order->id,
                    'item_id' => $item->id,
                    'qty' => $item->qty,
                    'price' => $checkoutData['isOrange'] ? $item->price_orange : $item->price,
                    'item_title' => $item->name,
                    'code' => $item->code,
                    'spice' => $spice,
                ]);
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }

        if (isset($checkoutData['bags']) && $checkoutData['bags'] > 0) {
            OrderDetails::query()->insert([
                'order_id' => $order->id,
                'item_id' => 0,
                'qty' => $checkoutData['bags'],
                'price' => config('order.bag_price'),
                'item_title' => 'Bag with handle',
                'code' => config('order.bag_code'),
                'spice' => ''
            ]);
        }

        if ($successUrl) {
            $this->sendOrderEmailToCustomer($order->id);
            $this->sendOrderEmailToShop($order->id);
            $this->clearSession();
            return 'GOTO' . route('order.success') . '?token=' . $order->orderToken();
        } elseif ($paymentUrl) {
            if ($order->total_price == 0) {
                $this->markOrderPaid($order->id);
                $this->clearSession();
                return 'GOTO' . route('order.success') . '?token=' . $order->orderToken();
            } else {
                return 'GOTO' . $order->paymentLink();
            }
        }

        return 'OK';
    }

    public function sendOrderEmailToCustomer($orderID)
    {
        $order = Orders::query()->find($orderID);
        if (!$order) return 'Order not found in database.';

        if (!$order->isDelivery() && !$order->isOnlinePayment()) {
            $templateNumber = '12.2.1';
        } else if ($order->isDelivery()) {
            $templateNumber = '12.2.5';
        } else {
            $templateNumber = '12.2.2';
        }

        $template = template($templateNumber);
//        $files[] = resource_path('order_files/Loyalty-Programme.pdf');
//        $files[] = resource_path('order_files/how-to-reheat-your-food-from-bindia.pdf');
//        $files[] = resource_path('order_files/' . strtoupper($order->shop) . '-Terms of Sale and Delivery.pdf');
//        $files[] = $order->pdf();

        $files = $order->orderFiles();

        $array = $order->toArray();
        $array['feedback_link'] = '<div class="center"><a class="bindia_button btn-blue" href="' . $order->feedbackLink() . '">Send your feedback</a></div>';
        $array['print_link'] = '<div class="center"><a class="bindia_button big_button" href="' . $order->pdfLink() . '">View Receipt</a></div>';
        $array['order_table'] = view('order.items_table', ['order' => $order])->render();
        $array['pickup_date'] = $order->pickup_datetime->format(config('app.date_format'));
        if ($order->delivery_datetime) {
            $array['delivery_date'] = $order->delivery_datetime->format(config('app.date_format'));
            $array['delivery_time'] = $order->delivery_datetime->format(config('app.time_format'));
        }
        $array['pickup_time'] = $order->pickup_datetime->format(config('app.time_format'));
        $array['shop_address'] = $order->shopAddress();
        $array['shop_phone'] = $order->ShopPhone();
        $array['shop_name'] = $order->shopNameLong();
        $array['terms_link'] = route('terms_and_conditions');

        return send_mail($order->shipping_email, $template->subject, $template->content, $array, $files);
    }

    public function sendOrderEmailToShop($orderID)
    {
        $order = Orders::query()->find($orderID);
        if (!$order) return 'Order not found in database.';

        if (!$order->isDelivery() && !$order->isOnlinePayment()) {
            $templateNumber = '12.2.4';
        } else {
            $templateNumber = '12.2.4';
        }

        $array = $order->toArray();
        $array['cart_table'] = view('order.emails.cart_table', [
            'order' => $order
        ])->render();
        $array['order_id'] = $order->id;
        $array['customer_guest_id'] = $order->guest_id;
        $array['order_staff_link'] = get_admin_link('porders.php?id=' . $order->id);
        $array['order_comments'] = $order->comments;
        $array['customer_phone'] = $order->shipping_phone;
        $array['order_table'] = view('order.items_table', ['order' => $order])->render();
        $array['pickup_date'] = $order->pickup_datetime->format(config('app.date_format'));
        $array['shop_address'] = $order->shopAddress();
        $array['shop_phone'] = $order->ShopPhone();

        $template = template($templateNumber);

        $pdfFile = $order->pdf();

        return send_mail(shop($order->shop)->email, $template->subject, $template->content, $array, $pdfFile);
    }

    public function minutesToTime($minutes): string
    {
        $hours = floor($minutes / 60);
        $minutes = ($minutes % 60);
        return sprintf('%02d:%02d', $hours, $minutes);
    }

    public function timeToMinutes($time): int
    {
        $times = explode(':', $time);

        $Minutes = 0;
        if (is_numeric($times[0])) $Minutes = $times[0] * 60;
        if (isset($times[1]) && is_numeric($times[1])) $Minutes += $times[1];
        return (int)$Minutes;
    }

    public function markOrderPaid($id)
    {
        $order = Orders::query()->find($id);
        if (!$order) return 'Order not found in database.';
        if ($order->paid) return 'Order is already paid.';

        $order_time_difference = $order->order_time->diffInMinutes();
        if ($order->isDelivery() && !$order->is_custom_order) {
            $time_difference_minutes = $order->delivery_datetime->diffInMinutes();
        } elseif (!$order->isDelivery()) {
            $time_difference_minutes = $order->pickup_datetime->diffInMinutes();
        }

        // If order generate time is more 10 minutes and time left for pickup is less then half hour
        if (!$order->is_custom_order && $order_time_difference >= 10 && $time_difference_minutes <= 30) {
            $is_change = true;

            if (!$order->pickup_datetime) {
                $order->pickup_datetime = Carbon::now();
            }

            if ($order->is_delivery) {
                $delivery_datetime = $order->delivery_datetime->addMinutes($order_time_difference);
                $order->delivery_datetime = $delivery_datetime;
            }

            $pickup_datetime = $order->pickup_datetime->addMinutes($order_time_difference);
            $order->pickup_datetime = $pickup_datetime;
        }

        try {
            $order->paid = true;
            $order->paid_time = now();
            $order->paid_ip = request()->ip();
            $order->save();
        } catch (\Exception $exception) {
            Log::debug('Order was not paid marked: ' . $exception->getMessage());
            abort(404);
        }

        if (!$order->is_custom_order) {
            $G = new \App\Logic\GiftCard();
            $G->redeemGiftCardByOrder($order->id);

            $O = new Order();
            /**
             * Send email to customer if this is not a delivery order.
             */
            if (!$order->isDelivery()) $O->sendOrderEmailToCustomer($order->id);

            $O->sendOrderEmailToShop($order->id);
        }
        //Log::channel('mail')->info('New order mark paid');
        return 'OK';
    }

    public function sendOrdersToTakeOut()
    {
        $orders = Orders::query()
            ->where('paid', true)
            ->where('delivery', 'By Taxi')
            ->where(function ($query) {
                $query->where('etakeaway_id', 0)
                    ->orWhereNull('etakeaway_id');
            })
            //->where('delivery_datetime', '>', \Carbon\Carbon::now()->subMinutes(20))
            ->whereDate('order_time', Carbon::today())
            ->limit(10)
            ->orderBy('id', 'desc')
            ->get();


        foreach ($orders as $order) {
            if ($order->id === 147649) continue;
            $r = $order->createTakeoutOrder();
            if ($r !== 'OK') {
                $content = print_r($r, true);
                send_mail(['shakeel@shakeel.pk', 'arslan@bindia.dk', 'office@bindia.dk'], 'Delivery order# ' . $order->id . ' not submitted via takeout API', $content);
            } else {
                $this->sendOrderEmailToCustomer($order->id);
            }
        }
    }

    public function copyLastOrder($email)
    {
        $lastOrder = Orders::query()
            ->where('shipping_email', $email)
            ->where('copy_order', true)
            ->where('order_time', '>', Carbon::now()->subMonths(3))
            ->orderByDesc('id')
            ->first();

        if (!$lastOrder) return 'No order found against this email.';

        $this->clearSession();
        $spices = [];
        foreach ($lastOrder->items as $item) {
            if ($item->item_id > 0) {
                $this->setSessionCartItem($item->item_id, 1, $item->qty);
            }
            if (!blank($item->spice)) $spices[item($item->code)->id] = $item->spice;
        }

        if (!blank($spices)) {
            $newSpicesArray = [];
            foreach ($spices as $id => $row) {
                $spiceRow = make_array($row);
                $spiceSingleArray = [];
                foreach ($spiceRow as $spice) {
                    list($qty, $spiceName) = explode('-', $spice);
                    for ($x = 1; $x <= $qty; $x++) {
                        $spiceSingleArray[] = $spiceName;
                    }
                }

                $newSpicesArray[$id] = $spiceSingleArray;
            }

            $this->setSessionCartSpice($newSpicesArray);
        }

        return 'OK';
    }

    /**
     * @return bool
     *
     * Delete folder where all temporary PDF files are stored.
     */
    public function deleteTempPDFFiles()
    {
        return Storage::deleteDirectory('orders' . DIRECTORY_SEPARATOR . 'invoices');
    }
}
