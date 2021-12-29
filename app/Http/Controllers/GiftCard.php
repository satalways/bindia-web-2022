<?php

namespace App\Http\Controllers;

use App\Logic\Nets;
use App\Logic\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GiftCard extends Controller
{
    public function index()
    {
        return view('gc.index', [
            'seo' => seo('Gift Card')
        ]);
    }

    public function ajax(Request $request)
    {
        if (!$request->ajax()) abort(404);

        switch ($request->post('action')) {
            case 'checkGiftCards':
                if (!is_email($request->post('string'))) {
                    $giftCards = \App\Models\GiftCard::query()
                        ->where('card_number', $request->post('string'))
                        ->where('deleted', false)
                        ->where('status', '<', 4)
                        ->where('valid_date', '>=', Carbon::today())
                        ->where(function ($query) {
                            $query->where('customer_card', false)
                                ->orWhere(function ($query) {
                                    $query->where('customer_card', true)
                                        ->where('paid_by_customer', true);
                                });
                        })
                        ->first();

                    if (!$giftCards) {
                        return __('gc.not_found');
                    }
                    $sessionData = session()->get('checkout');

                    $sessionData['giftcard'] = $request->post('string');

                    session()->put('checkout', $sessionData);
                    //$O = new Order();

                    //$time = '16:' . config('order.order_prep_time');

//                    return 'OK' . view('order.ajax.checkout', [
//                            'items' => $O->getSessionCartData(true),
//                            'cartItems' => $O->getSessionCart(),
//                            'spice' => $O->getSessionSpice(),
//                            'time' => $time
//                        ])->render();
                    return 'OK';
                } else {
                    Carbon::setLocale('en');
                    $giftCards = \App\Models\GiftCard::query()
                        ->where('customer_email', $request->post('string'))
                        ->where('deleted', false)
                        ->where(function ($query) {
                            $query->where('customer_card', false)
                                ->orWhere(function ($query) {
                                    $query->where('customer_card', true)
                                        ->where('paid_by_customer', true);
                                });
                        })
                        ->orderByDesc('id')
                        ->get();

                    if ($giftCards->count() === 0) {
                        return __('gc.not_found');
                    }

                    $html = view('order.emails.giftCardListToCustomer', [
                        'giftCards' => $giftCards
                    ]);
                    return 'mail' . send_mail($request->post('string'), 'Please review your gift cards', $html);
                }
                break;
            case 'sendCustomerGiftCard':
                $G = new \App\Logic\GiftCard();
                return $G->generateCard(request()->except('action'));
                break;
            default:
                abort(404);
        }
    }

    public function paymentPage()
    {
        $token = \request()->get('token');
        if (!$token) abort(404);
        $data = decodeString($token);
        if (!isset($data->id)) abort(404);
        $giftCard = \App\Models\GiftCard::query()->findOrFail($data->id);
        if ($giftCard->paid_by_customer) abort(404);

        $Nets = new Nets();
        dd($Nets->getGiftCardPaymentID($giftCard->id));
    }
}
