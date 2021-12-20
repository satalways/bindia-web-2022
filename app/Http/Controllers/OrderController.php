<?php

namespace App\Http\Controllers;

use App\Logic\Nets;
use App\Logic\Order;
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
                if (!is_email($request->post('email'))) return 'Invalid email address';
                if (Orders::query()->where('shipping_email', $request->post('email'))->count() === 0) {
                    return 'No order available for this email';
                }

                return $O->copyLastOrder($request->post('email'));
            default:
                abort(404);
        }
    }

    public function takeaway()
    {
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
            'seo' => seo('Takeaway')
        ]);
    }

    public function checkout()
    {
        $O = new Order();
        if (count($O->getSessionCart()) === 0) {
            return redirect(route('takeaway'));
        }

        //dd($O->getSessionSpice());
        return view('order.checkout');
    }

    public function checkoutPost(Request $request)
    {
        if (!$request->ajax()) abort(404);

        $O = new Order();
        switch ($request->post('action')) {
            case 'updateSessionCart':
            case 'updateSessionCart2':
                $post = $request->post();
                if (isset($post['delivery']) && $post['delivery'] === 'By Taxi') {
                    $post['payment_type'] = 'card';
                }
                session()->put('checkout', $post);

                if ($request->post('action') === 'updateSessionCart2') {
                    break;
                }
            case 'loadCart':
                $maxPost = TakeoutZonesModel::query()->max('post_number2');
                $minPost = TakeoutZonesModel::query()->min('post_number');
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

//                try {
//                    if (Carbon::create($items['checkout']['date'])->isToday() && $O->timeToMinutes($time) - $O->timeToMinutes(Carbon::now()->format('H:i')) <= config('order.order_prep_time')) {
//                        $time = Carbon::now()->addMinutes(config('order.order_prep_time') + 5)->format('H:i');
//                    } else if ($O->timeToMinutes($time) - $O->timeToMinutes(Carbon::now()->format('H:i')) <= config('order.order_prep_time')) {
//                        $time = '16:' . config('order.order_prep_time');
//                    }
//                } catch (\Exception $exception) {
//                    $time = '16:' . config('order.order_prep_time');
//                }

                $minTime = 'new Date( ' . \Carbon\Carbon::now()->subMonth()->format('Y,m,d') . ' )';
                $now = Carbon::now();
                if (($now->hour * 60 + $now->minute) > (21 * 60 + config('order.order_prep_time'))) {
                    $minDate = 1;
                } else {
                    $minDate = 0;
                }

                if ($now->isToday()) {
                    if (($now->hour * 60 + $now->minute) < (16 * 60 + config('order.order_prep_time'))) {
                        # If current time is less then 16:00
                        $minTime = '16:' . config('order.order_prep_time');
                    } else if (($now->hour * 60 + $now->minute) > (19 * 60 - config('order.order_prep_time'))) {
                        # If current time is later then 18:40 then select next date and next day's time
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

                return [
                    'minDate' => $minDate,
                    'minTime' => $minTime,
                    'time' => $time,
                    'html' => view('order.ajax.checkout', [
                        'items' => $items,
                        'cartItems' => $O->getSessionCart(),
                        'spice' => $O->getSessionSpice(),
                        'spice2' => $O->getSessionSpiceCountArray(),
                        'maxPost' => $maxPost,
                        'minPost' => $minPost,
                        'time' => $time,
                    ])->render(),
                ];
            case 'makeOrder':
                return $O->makeOrder($request->except('date_submit'));
            case 'checkingPostalCode':
                $row = TakeoutZonesModel::query()
                    ->whereRaw('(? between post_number and post_number2)', [$request->post('postal_code')])
                    ->select(['price', 'area'])
                    ->orderByDesc('id')
                    ->first();
                if (!$row) return __('checkout.invalid_postal_code');

                /**
                 * Ask customer for consent about delivery price.
                 */
                return 'OK' . json_encode([
                        'price' => $row->price,
                        'city' => $row->area,
                        'message' => __('checkout.customer_price_consent', ['price' => $row->price])
                    ]);
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

//        $content = '<pre>Post: ' . print_r($request->post(), true);
//        $content .= '<pre>Get: ' . print_r($request->query(), true);
//        $content .= '<pre>All: ' . print_r($request->all(), true);
//        $content .= '<br>' . print_r($data, true);
        //send_mail('shakeel@shakeel.pk', 'Success Page', $content);

        $order = Orders::query()->find($data->id);
        if (!$order) abort(404);
//        $O = new Order();
//        if ($order->isUnfinished()) {
//            $O->markOrderPaid($order->id);
//        }

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

        return view('order.item', [
            'item' => $item,
            'title' => getCurrentLang() == 'en' ? $item->name . ' - Indian Food Take Away - Bindia.Dk' : $item->name . ' - Indisk Mad Takeaway - Bindia.Dk'
        ]);
    }
}
