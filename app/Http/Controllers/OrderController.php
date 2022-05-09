<?php

namespace App\Http\Controllers;

use App\Logic\Nets;
use App\Logic\Order;
use App\Logic\Takeout;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\TakeoutZonesModel;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function takeawayPost(Request $request)
    {
        if (!$request->ajax()) abort(404);

        $O = new Order();
        switch ($request->post('action')) {
            case 'setValueCart':
                $O->setSessionCartItem($request->post('id'), $request->post('what'));
            case 'getCart':
                //\Log::info($O->getSessionCartData());
                $items = $O->getSessionCartData();
                $cartItems = $O->getSessionCart();
                return [
                    'html' => view('order.ajax.takeaway_cart', [
                        'items' => $O->getSessionCartData(),
                        'cartItems' => $cartItems,
                        'spice' => $O->getSessionSpice()
                    ])->render(),
                    'single_html' => view('order.ajax.takeaway_single_item',
                        [
                            'item' => $items['items']->where('id', $request->post('id'))->first(),
                            'cartItems' => $cartItems,
                            'id' => $request->post('id') ?? 0
                        ])->render()
                ];
                break;
            case 'updateSpice':
                //\Log::info( print_r($request->post('spice'), true) );
                $O->setSessionCartSpice($request->post('spice') ?? []);
                break;
            case 'copyLastOrder':
                if (!is_email($request->post('email'))) return __('global.invalid_email');
                if (Orders::query()->where('shipping_email', $request->post('email'))->count() === 0) {
                    return __('global.no_previous_order_found');
                }

                return $O->copyLastOrder($request->post('email'));
            default:
                abort(404);
        }
    }

    public function takeaway()
    {
        $currentLang = getCurrentLang();
        //return cache()->remember('takeawayPage' . $currentLang, now()->addDay(), function () {
        $sections = config('order.sections');
        $items = [];
        foreach ($sections as $slug => $array) {
            $items[$slug] = OrderItems::query()
                ->where('active', true)
                ->where('section', $slug)
                ->orderBy('code')
                ->get();
        }
        $O = new Order();

        return view('order.takeaway', [
            'title' => 'Takeaway',
            'sections' => $sections,
            'item_filters' => config('order.item_filters'),
            'items' => $items,
            'cartItems' => $O->getSessionCart(),
            'seo' => seo('Takeaway'),
            'social_image' => asset('asstes/image/take-away/mask-group-2.jpg')
        ])->render();
        //});
    }

    public function checkout()
    {
        $O = new Order();
        if (count($O->getSessionCart()) === 0) {
            return redirect(route('takeaway'));
        }

        return view('order.checkout');
    }

    public function address()
    {
        $T = new Takeout();
        return response()->json($T->autocompleteAddress(\request()->query('query')));
//        return response()->json([
//            ['value' => 'Andorra', 'data' => 'AD'],
//            ['value' => 'Pakistan', 'data' => 'PK'],
//        ]);
    }

    public function checkoutPost(Request $request)
    {
        if (!$request->ajax()) abort(404);
        $O = new Order();
        switch ($request->post('action')) {
            case 'checkTime':
                //debug($request->post());
                if (!Carbon::create($request->post('date'))->isToday()) {
                    return null;
                }
                $now = \now();
                //debug($now->diffInMinutes(Carbon::create($request->post('date').' '.$request->post('time'))));
                if ($now->diffInMinutes(Carbon::create($request->post('date') . ' ' . $request->post('time')), false) < config('order.order_prep_time')) {
                    $now->addMinutes(config('order.order_prep_time'));
                    while ($now->minute % 5 !== 0) {
                        $now->addMinute();
                    }
                    return $now->format('H:i');
                }

                return null;
                break;
            case 'updateSessionCart':
            case 'updateSessionCart2':
                $post = $request->post();

                if (isset($post['delivery'])) {
                    if ($post['delivery'] === 'By Taxi') {
                        $post['payment_type'] = 'card';
                    }
                    debug($post);
                    session()->put('checkout', $post);
                }

                if ($request->post('action') === 'updateSessionCart2') {
                    //break;
                }
            case 'loadCart':
                $items = $O->getSessionCartData(true);

                if (Carbon::create($items['checkout']['date'])->isToday()) {
                    $now = Carbon::now();
                    $currentTime = ($now->hour * 60 + $now->minute);
                    if ($currentTime > 16 * 60 + config('order.order_prep_time')) {
                        $currentTime += config('order.order_prep_time');
                        if ($currentTime % 5 === 0) $currentTime += 5;
                        else $currentTime += 5 - ($currentTime % 5);
                        $time = sprintf('%02d:%02d', floor($currentTime / 60), ($currentTime % 60));
                    } else {
                        $time = $items['checkout']['time'] ?? '16:' . config('order.order_prep_time');
                    }
                } else {
                    $time = $items['checkout']['time'] ?? '16:' . config('order.order_prep_time');
                }

                if (isset($items['checkout']['delivery']) && $items['checkout']['delivery'] === 'By Taxi' && $time === '16:20') {
                    $time = '';
                }

                $minTime = 'new Date( ' . \Carbon\Carbon::now()->subMonth()->format('Y,m,d') . ' )';
                $now = Carbon::now();
                if (($now->hour * 60 + $now->minute) > (21 * 60 + config('order.order_prep_time'))) {
                    $minDate = 1;
                } else {
                    $minDate = 0;
                }

                $date = Carbon::create($items['checkout']['date']);

                if ($date->isToday()) {
                    if (($now->hour * 60 + $now->minute) < (16 * 60 + config('order.order_prep_time'))) {
                        # If current time is less than 16:00
                        $minTime = '16:' . config('order.order_prep_time');
                    } else if (($now->hour * 60 + $now->minute) > (19 * 60 - config('order.order_prep_time'))) {
                        # If current time is later than 18:40 then select next date and next day's time
                        $minTime = '16:' . config('order.order_prep_time');
                        $minDate = 1;
                    } else {
                        # Keep it with step 5
                        $addMinutes = 5 - ($now->minute % 5);
                        $minTime = $now->addMinutes(config('order.order_prep_time') + $addMinutes)->format('H:i');
                    }
                } else {
                    $minTime = '16:' . config('order.order_prep_time');
                }

//                $deliveryData['is_delivery'] = !empty($items['checkout']['delivery']) && $items['checkout']['delivery'] === 'By Taxi';
//                if (!empty($items['checkout']['delivery']) && $items['checkout']['delivery'] === 'By Taxi' && !blank($time) && !empty($items['checkout']['date']) && !empty($items['checkout']['shipping_postal_code']) && !empty($items['checkout']['shipping_address'])) {
//                    $T = new Takeout();
//                    $deliveryData = $T->getDeliveryInfo([
//                        'address' => $items['checkout']['shipping_address'],
//                        'zip' => $items['checkout']['shipping_postal_code'],
//                        'deliveryTime' => $items['checkout']['date'] . ' ' . $time
//                    ]);
//
//                    if (isset($deliveryData->Status) && $deliveryData->Status) {
//                        $deliveryData = (array)$deliveryData->Data;
//                        $deliveryData['is_delivery'] = true;
//                        $items['delivery_fee'] = $deliveryData['DeliveryFee'];
//                    }
//                }

                if ($items['isDelivery']) $minTime = '16:40';

                return [
                    'post' => $request->post(),
                    //'is_delivery' => !empty($items['checkout']['delivery']) && $items['checkout']['delivery'] === 'By Taxi',
                    'is_delivery' => $items['isDelivery'],
                    'minDate' => $minDate,
                    'minTime' => $minTime,
                    'time' => $time,
                    'delivery_fee' => !empty($items['delivery_fee']) ? __('checkout.customer_price_consent', ['price' => $items['delivery_fee'] ?? 0]) : '',
                    'isDelivery' => $items['isDelivery'],
                    'isOrange' => $items['isOrange'] ?? false,
                    'DeliveryData' => $items['DeliveryData'],
                    'html' => view('order.ajax.checkout', [
                        'items' => $items,
                        'cartItems' => $O->getSessionCart(),
                        'spice' => $O->getSessionSpice(),
                        'spice2' => $O->getSessionSpiceCountArray(),
                        'time' => $time,
                        'isOrange' => $items['isOrange'] ?? false,
                        'isDelivery' => $items['isDelivery'],
                    ])->render(),
                ];
            case 'makeOrder':
                return $O->makeOrder($request->except('date_submit'));
                break;
            default:
                abort(404);
        }
    }

    public function pdfFile(Request $request)
    {
        $token = $request->get('token');
        if (!$token) abort(404);

        $data = decodeString($token, false);
        if (!isset($data->id)) abort(404);

        $order = Orders::query()->find($data->id);
        if (!$order) abort(404);

        return $order->pdf(true);
    }

    public function failed(Request $request)
    {
        return view('order.failed');
    }

    public function success(Request $request)
    {
        $token = $request->get('token');
        if (!$token) abort(404);

        $data = decodeString($token, false);
        if (!isset($data->id)) abort(404);

        $order = Orders::query()->find($data->id);
        if (!$order) abort(404);

        return view('order.success', [
            'order' => $order
        ]);
    }

    public function payment(Request $request)
    {
        $token = $request->get('token');
        if (!$token) abort(404);

        $data = decodeString($token, false);
        if (!isset($data->id)) abort(404);

        $order = Orders::query()->find($data->id);
        if (!$order) abort(404);
        if (!$order->isUnfinished()) abort(404);
        if ($order->paid) abort(404);

        $paymentId = Nets::getPaymentID($order->id);

        if (isset($paymentId->paymentId)) {
            $order->payment_id = $paymentId->paymentId;

            $content = 'Payment ID: ' . $order->payment_id . '<br>';
            $content .= 'Order ID: ' . $order->id;
            //send_mail('shakeel@shakeel.pk', 'Payment ID Info', $content);

            $order->save();
        }

        return view('order.payment', [
            'order' => $order,
            'jsFile' => Nets::JsFile(),
            'checkoutKey' => Nets::checkoutKey(),
            'merchantID' => Nets::merchantID()
        ]);
    }

    public function markDone(Request $request)
    {
        $token = $request->get('token');
        $paymentID = $request->get('paymentId') ?? $request->get('paymentid');
        $token = decodeString($token);
        $ID = null;
        if (isset($token->id)) $ID = $token->id;

        if (!$ID && !$paymentID) {
            return response()->redirectToRoute('order.failed');
        } else {
            if ($ID) {
                $order = Orders::query()
                    ->where('id', $ID)
                    ->orderByDesc('id')
                    ->first();
            } else {
                $order = Orders::query()
                    ->where('payment_id', $paymentID)
                    ->orderByDesc('id')
                    ->first();
            }

            if (!$order) {
                return response()->redirectToRoute('order.failed');
            }

            $O = new Order();
            if (localhost()) {
                $O->markOrderPaid($order->id);
            }
            $O->clearSession();

            return response()->redirectToRoute('order.success', ['token' => $order->orderToken()]);
        }
//
//        if ($request->get('paymentid')) {
//            $order = Orders::query()
//                ->where('payment_id', $request->get('paymentid'))
//                ->orderByDesc('id')
//                ->first();
//        } elseif ($request->get('paymentId')) {
//            $order = Orders::query()
//                ->where('payment_id', $request->get('paymentId'))
//                ->orderByDesc('id')
//                ->first();
//        } elseif ($request->get('token')) {
//            $data = decodeString($request->get('token'));
//
//            //if (!$data->id) abort(404);
//            $order = Orders::query()
//                ->find($data->id);
//        }
//
//        if (!$order) abort(404);
//
//        $O = new Order();
//        if (localhost()) {
//            $O->markOrderPaid($order->id);
//        }
//
//        $O->clearSession();
//
//        return response()->redirectToRoute('order.success', ['token' => $order->orderToken()]);
    }

    public function netsSuccess(Request $request)
    {
        $allData = $request->all();
        $content = 'Web Hook Success: <pre>' . print_r($allData, true) . '</pre>';
        $content .= 'Method: ' . $request->method();
        //send_mail('shakeel@shakeel.pk', 'Nets Success Hook', $content);

        $token = $request->get('token');
        $data = decodeString($token);

        if (isset($data->id)) {
            if (str_starts_with($data->id, 'T')) $data->id = substr($data->id, 1);
            //$allData = $request->all();
            //$content = 'Web Hook Success: <pre>' . print_r($allData, true) . '</pre>';
            //send_mail('shakeel@shakeel.pk', 'Nets Success Hook', $content);

            $O = new Order();
            $response = $O->markOrderPaid($data->id);
            if (!$response === 'OK') {
                return send_mail('shakeel@shakeel.pk', 'Web Hook > Failed to Mark Done Order', $response);
            }
            $O->clearSession();
            return 'OK';
        } else {
            return send_mail('shakeel@shakeel.pk', 'Web Hook > Nops!', $content);
            //abort(404);
        }
    }

    public function netsSuccessGC(Request $request)
    {
        $token = $request->get('token');
        $data = decodeString($token);

        if (isset($data->id)) {
            if (str_starts_with($data->id, 'T')) $data->id = substr($data->id, 1);
            if (str_starts_with($data->id, 'GC')) $data->id = substr($data->id, 2);

            $Gc = new \App\Logic\GiftCard();
            return $Gc->markDonePayment($data->id);
        }
    }

    public function netsFailed(Request $request)
    {
        $allData = $request->all();
        $content = 'Web Hook Failed: <pre>' . print_r($allData, true) . '</pre>';

        send_mail(['shakeel@shakeel.pk'], 'Web Hook Failed', $content);
    }

    public function copyMyLastOrderPDF()
    {
        if (getCurrentLang() === 'da') {
            $path = resource_path('order_files/CopyMyLastOrder-Terms-DK.pdf');
        } else {
            $path = resource_path('order_files/CopyMyLastOrder-Terms.pdf');
        }

        if (!is_file($path)) abort(404);

        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Desposition' => 'inline; file.pdf'
        ]);
    }

    public function orderReaheatPDF()
    {
        if (getCurrentLang() === 'da') {
            $path = resource_path('order_files/reheat DK.pdf');
        } else {
            $path = resource_path('order_files/how-to-reheat-your-food-from-bindia.pdf');
        }

        if (!is_file($path)) abort(404);

        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Desposition' => 'inline; file.pdf'
        ]);
    }

    public function areaPage($area)
    {
        $fixAreas = TakeoutZonesModel::query()
            ->whereNull('area_slug')
            ->get();

        foreach ($fixAreas as $row) {
            $row->area_slug = \Str::slug($row->area);
            $row->save();
        }

        $row = TakeoutZonesModel::query()->where('area_slug', $area)
            ->whereNotIn('area', ['Lyngby', 'Søborg', 'Frederiksberg'])->firstOrFail();
        $rows = TakeoutZonesModel::query()
            ->select(['area_slug', 'area'])
            ->whereNotIn('area', ['Lyngby', 'Søborg', 'Frederiksberg'])
            ->distinct('area_slug')->orderBy('area')->get();

        if (getCurrentLang() === 'en') {
            $title = 'Take Away ' . $row->area . ' - Indian Food Restaurant ' . $row->area . ' - Bindia.dk';
            $description = 'Best Indian Food Take Away ' . $row->area . '. Indian Dishes Menu - Indian Food Restaurant ' . $row->area . ' Bindia.dk';
            $heading = 'Take Away ' . $row->area . ' - Indian Food Restaurant ' . $row->area;
        } else {
            $title = 'Take Away ' . $row->area . ' - Indisk Mad Restaurant ' . $row->area . ' - Bindia.dk';
            $description = 'Bedste Indisk Mad Take Away ' . $row->area . '. Indiske Retter Menu - Indisk Mad Restaurant ' . $row->area . ' Bindia.dk';
            $heading = 'Take Away ' . $row->area . ' - Indisk Mad Restaurant ' . $row->area;
        }

        $items = OrderItems::all();

        return view('seo_pages.take-away', [
            'row' => $row,
            'rows' => $rows,
            'title' => $title,
            'description' => $description,
            'heading' => $heading,
            'cols' => isMobile() ? 3 : 5,
            'items' => $items
        ]);
    }

    public function itemPage($slug)
    {
        $item = OrderItems::query()->where('slug', $slug)->where('active', true)->firstOrFail();

        $seo = seo($slug);
        $content = null;
        $title = null;
        if ($seo && getCurrentLang() == 'en') {
            $content = $seo->description_en ?? null;
            $title = $seo->title_en;
        } else if ($seo) {
            $content = $seo->description ?? null;
            $title = $seo->title;
        }

        if (!$title) {
            $title = getCurrentLang() == 'en' ? $item->name . ' Copenhagen - Indian Food Take Away - Bindia.Dk' : $item->name . ' København - Indisk Mad Takeaway - Bindia.Dk';
        }

        return view('order.item', [
            'item' => $item,
            'title' => $title,
            'description' => (getCurrentLang() == 'en' ? $item->name . ' Copenhagen - ' : $item->name . ' København - ') . $item->getDescription(),
            'content' => $content
        ]);
    }
}
