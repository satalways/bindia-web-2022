<?php

namespace App\Logic;

use App\Models\Orders;
use Curl\Curl;
use PHPUnit\Exception;

class Nets
{
    public static function Test()
    {
        if (isPKIp()) return true;
        return env('NETS_TEST_MODE', false);
    }

    public static function JsFile()
    {
        return self::Test() ? config('order.nets.test.js_file') : config('order.nets.live.js_file');
    }

    public static function secretKey()
    {
        return self::Test() ? config('order.nets.test.secret_key') : config('order.nets.live.secret_key');
    }

    public static function checkoutKey()
    {
        return self::Test() ? config('order.nets.test.checkout_key') : config('order.nets.live.checkout_key');
    }

    public static function endPointURL()
    {
        return self::Test() ? config('order.nets.test.url') : config('order.nets.live.url');
    }

    public static function merchantID()
    {
        return config('order.nets.merchant_id');
    }

    public static function getPaymentID($orderId)
    {
        try {
            $order = Orders::query()->find($orderId);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        if (!$order) return 'Order not found in database.';

        $orderUniqueID = $order->id;
        if (self::Test()) {
            $orderUniqueID = 'T' . $orderUniqueID;
        }

        $data = [
            'order' => [
                'currency' => 'DKK',
                'amount' => $order->total_amount * 100,
                'reference' => $orderUniqueID,
            ],
            'checkout' => [
                'url' => route('order.markDone') . '?token=' . $order->orderToken(),
                'returnUrl' => route('order.markDone') . '?token=' . $order->orderToken(),
                'termsUrl' => route('terms_and_conditions'),
                'charge' => true,
                'merchantHandlesConsumerData' => true,
            ]
        ];

        $token = encodeData(['id' => $orderUniqueID, 'type' => 'order']);

        # https://tech.dibspayment.com/easy/api/paymentapi#webhooks
        if (!localhost()) {
            $data['notifications'] = [
                'webHooks' => [
                    [
                        'eventName' => 'payment.checkout.completed',
                        'url' => route('order.nets.hooks') . '?token=' . $token,
                        'authorization' => self::secretKey(),
                    ],
                ],
            ];
        }
        //                [
//                    'eventName' => 'payment.charge.failed',
//                    'url' => route('order.nets.cancel') . '?token=' . $token,
//                    'authorization' => self::secretKey(),
//                ]

        if ($order->is_custom_order) {
            $data['order']['items'][] = [
                'reference' => 'Catering Order',
                'name' => 'Catering Order',
                'quantity' => 1,
                'unit' => 'item',
                'unitPrice' => $order->total_amount * 100,
                'taxRate' => 0,
                'taxAmount' => 0,
                'grossTotalAmount' => $order->total_amount * 100,
                'netTotalAmount' => $order->total_amount * 100,
            ];
        } else {
            $total = 0;
            $vatPercent = config('order.VAT');
            $actualPercent = (100 / (100 + (100 / $vatPercent * 100))) * 100;

            foreach ($order->items as $item) {
                $data['order']['items'][] = [
                    'reference' => $item->code,
                    'name' => $item->item_title,
                    'quantity' => $item->qty,
                    'unit' => 'item' . ($item->qty > 1 ? 's' : ''),
                    'unitPrice' => ($item->price * (100 - $actualPercent) / 100) * 100,
                    'taxRate' => $vatPercent * 100,
                    'taxAmount' => ($item->price * ($actualPercent / 100)) * 100,
                    'grossTotalAmount' => $item->qty * $item->price * 100,
                    'netTotalAmount' => $item->qty * $item->price * 100,
                ];
                $total += $item->qty * $item->price;
            }

            if ($order->delivery_fee > 0) {
                $data['order']['items'][] = [
                    'reference' => 'delivery fee',
                    'name' => 'Delivery Fee',
                    'quantity' => 1,
                    'unit' => 'item',
                    'unitPrice' => $order->delivery_fee * 100,
                    'taxRate' => 0,
                    'taxAmount' => 0,
                    'grossTotalAmount' => $order->delivery_fee * 100,
                    'netTotalAmount' => $order->delivery_fee * 100,
                ];
                $total += $order->delivery_fee;
            }

            $discount = $order->dynamic_discount;
            if ($order->payment_type === 'card' && $order->gift_card_discount > 0) {
                $discount += $order->gift_card_discount;
            }

            if ($discount > 0) {
                $data['order']['items'][] = [
                    'reference' => 'discount',
                    'name' => '-- discount --',
                    'quantity' => 1,
                    'unit' => 'unit',
                    'unitPrice' => -($discount * 100),
                    'taxRate' => 0,
                    'taxAmount' => 0,
                    'grossTotalAmount' => -($discount * 100),
                    'netTotalAmount' => -($discount * 100),
                ];
            }
        }

        $url = self::endPointURL() . '/payments';

        //$content = "<pre>Url: " . $url . '<br>' . print_r($data, true) . "</pre>";
        //\Log::info(var_dump($data));
        //send_mail('shakeel@shakeel.pk', 'Order Data: ' . $order->id, $content);

        try {
            $curl = new Curl();
            $curl->setHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => self::secretKey(),
            ]);
            $curl->url = $url;
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, 0);
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, 0);
            $curl->post($data);


            if ($curl->error) {
                //if (! blank($curl->response)) return $curl->response;
                return $curl->errorCode . ': ' . $curl->errorMessage;
            } else {
                return $curl->response;
            }
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function getGiftCardPaymentID($ID)
    {
        try {
            $giftCard = \App\Models\GiftCard::query()->find($ID);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        if (!$giftCard) return 'Gift card not found in database.';

        $orderUniqueID = 'GC' . $giftCard->id;

        if (self::Test()) {
            $orderUniqueID = 'T' . $orderUniqueID;
        }

        $data = [
            'order' => [
                'currency' => 'DKK',
                'amount' => $giftCard->amount * 100,
                'reference' => $orderUniqueID,
            ],
            'checkout' => [
                'url' => route('order.markDone') . '?token=' . $giftCard->orderToken(),
                'returnUrl' => route('order.markDone') . '?token=' . $giftCard->orderToken(),
                'termsUrl' => route('terms_and_conditions'),
                'charge' => true,
                'merchantHandlesConsumerData' => true,
            ]
        ];

        $token = encodeData(['id' => $orderUniqueID, 'type' => 'order']);

        # https://tech.dibspayment.com/easy/api/paymentapi#webhooks
        if (!localhost()) {
            $data['notifications'] = [
                'webHooks' => [
                    [
                        'eventName' => 'payment.checkout.completed',
                        'url' => route('order.nets.hooks.gc') . '?token=' . $token,
                        'authorization' => self::secretKey(),
                    ],
                ],
            ];
        }

        $total = 0;
        $vatPercent = config('order.VAT');

        $url = self::endPointURL() . '/payments';
        dump($data);
        return $url;

        //$content = "<pre>Url: " . $url . '<br>' . print_r($data, true) . "</pre>";
        //\Log::info(var_dump($data));
        //send_mail('shakeel@shakeel.pk', 'Order Data: ' . $order->id, $content);


        try {
            $curl = new Curl();
            $curl->setHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => self::secretKey(),
            ]);
            $curl->url = $url;
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, 0);
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, 0);
            $curl->post($data);


            if ($curl->error) {
                //if (! blank($curl->response)) return $curl->response;
                return $curl->errorCode . ': ' . $curl->errorMessage;
            } else {
                return $curl->response;
            }
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
