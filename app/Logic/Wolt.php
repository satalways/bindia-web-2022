<?php
/**
 * https://daas.wolt.com/docs/index.html
 * https://laravel.com/docs/9.x/http-client#authentication
 */

namespace App\Logic;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Wolt
{
    public static function isWoltEnabled()
    {
        if ( isLiveServer() ) return false;
        return config('wolt.useWolt') ?? false;
    }

    public static function getAuthKey()
    {
        return config('wolt.' . (self::isStaging() ? 'staging' : 'production') . '.merchantKey');
    }

    public static function getMerchantID()
    {
        return config('wolt.' . (self::isStaging() ? 'staging' : 'production') . '.merchantId');
    }

    /**
     * @return bool
     *
     * Check if staging is enabled or not for Wolt API
     */
    public static function isStaging(): bool
    {
        return ! env('WOLT_PRODUCTION', false);
    }

    /**
     * @return string
     *
     * Get base URL, where system will send Wolt API requests.
     */
    public static function getBaseURL(): string
    {
        //if (self::isStaging()) return 'https://restaurant-api.development.dev.woltapi.com';
        if (self::isStaging()) {
            return 'https://restaurant-api.development.dev.woltapi.com/v1/daas-api';
            //return 'https://restaurant-api.development.dev.woltapi.com/v1/daas-api';
        }

        return 'https://daas.wolt.com/api/v1';
    }

    public function getVenueID($shop): string
    {
        if (empty($shop)) return '';

        return config('wolt.' . (self::isStaging() ? 'staging' : 'production') . '.' . strtoupper($shop), '');
    }

    private function getKeyName()
    {
        return self::isStaging() ? 'staging' : 'production';
    }

    public function getShopName($venueID): string
    {
        $key = array_search($venueID, config('wolt.' . $this->getKeyName()));
        if (! $key) return '';

        return (string) $key;
    }

    public function getWebHooks()
    {
        $url = self::getBaseURL() . '/merchants/' . self::getMerchantID() . '/webhooks';

        $response = Http::withToken(self::getAuthKey())
                        ->get($url);

        if ($response->failed()) {
            return $response->handlerStats();
        }

        return json_decode($response->body(), true);
    }

    public function getShipmentPromise(array $args = [])
    {
        $default = [
            'address' => '',
            'zip' => '',
            'deliveryTime' => '',
            'city' => '',
        ];
        $args = set_args($args, $default);

        //$url = "https://restaurant-api.development.dev.woltapi.com/v1/daas-api/venues/62838008bb2c376d8934f352/shipment-promises";
        //$keyName = $this->getKeyName();
        $Takout = new Takeout();

        if (blank($args['address'])) return 'Please provide address.';
        $shop = $Takout->getShopDistanceByAddress($args['address']);
        if (blank($shop)) return 'Invalid address';
        $venueId = self::getVenueID($shop);
        if (blank($venueId)) return 'Venue ID not found for ' . (shop($shop)->long_name ?? '');

        //$url = self::getBaseURL() . '/v1/daas-api/' . $venueId . '/shipment-promises';
        $url = self::getBaseURL() . '/venues/' . $venueId . '/shipment-promises';
        $response = Http::withToken(self::getAuthKey())
                        ->post($url, [
                            'city' => $args['city'],
                            'min_preparation_time_minutes' => config('order.order_prep_time'),
                            'post_code' => $args['zip'],
                            'scheduled_dropoff_time' => Carbon::create($args['deliveryTime'])->toIso8601ZuluString(),
                            'street' => $args['address'],
                        ]);

        //$response->ok();
        //dump($response->handlerStats());
        //if ($response->failed()) {
        //    dump($response->handlerStats());
        //}
        return json_decode($response->body(), true);
    }

    public function createWoltDelivery(\App\Models\Orders &$order)
    {
        $Takout = new Takeout();

        //$shop = $Takout->getShopDistanceByAddress( $order->shipping_address );
        $venueId = self::getVenueID($order->shop);
        $url = self::getBaseURL() . '/venues/' . $venueId . '/deliveries';

        $parcels = [];
        foreach ($order->items as $item) {
            $parcels[] = [
                'description' => $item->qty . ' x ' . $item->item_title,
            ];
        }

        $data = [
            'customer_support' => [
                'email' => 'office@bindia.dk',
                'phone_number' => $order->shopPhone(),
            ],
            'dropoff' => [
                'comment' => $order->comments,
                'options' => [
                    'scheduled_time' => $order->delivery_datetime->setTimezone('UTC')->toIso8601ZuluString('m'),
                ],
                'location' => [
                    'coordinates' => [
                        'lat' => $order->shipment_response['dropoff']['location']['coordinates']['lat'] ?: 0,
                        'lon' => $order->shipment_response['dropoff']['location']['coordinates']['lon'] ?: 0,
                    ],
                ],
            ],
            'merchant_order_reference_id' => (string) $order->id,
            'parcels' => $parcels,
            'pickup' => [
                'comment' => '',
                'options' => [
                    'min_preparation_time_minutes' => config('order.order_prep_time') + 10,
                ],
            ],
            'price' => [
                'amount' => localhost() ? 0 : $order->delivery_fee,
                'currency' => 'DKK',
            ],
            'recipient' => [
                'email' => $order->email,
                'name' => $order->full_name,
                'phone_number' => str_replace(' ', '', $order->customer_phone),
            ],
            'shipment_promise_id' => $order->woltShipmentPromiseID(),
            'sms_notifications' => [
                'picked_up' => '',
                'received' => '',
            ],
        ];

        $order->setMeta('sent_to_wolt', $data);

        $response = Http::withToken(self::getAuthKey())
                        ->post($url, $data);

        if ($response->failed()) {
            //return $response->body();
            //return $response->handlerStats();
        }

        $data = json_decode($response->body(), true);
        $order->setMeta('response_from_wolt', $data);

        if (isset($data['pickup']['eta'])) {
            $order->pickup_datetime = Carbon::create($data['pickup']['eta'])->setTimezone(config('app.timezone'));
            $order->save();
        } else if (isset($data['pickup']['eta_minutes'])) {

        }

        return $data;
    }
}
