<?php
/**
 * https://dawadocs.dataforsyningen.dk/dok/adresser
 *
 * https://clientapi-takeoutdk.takeoutsystem.net/V1/Documentation/?p=F_GetDeliveryInfo
 * username = [blank]
 * pass = orderpartner
 *
 * https://danmarksadresser.dk/adressedata/kodelister/kommunekodeliste/
 * 0-0269
 * https://dawadocs.dataforsyningen.dk/dok/api/generelt#flervaerdisoegning
 * https://www.graphhopper.com/pricing/
 */

namespace App\Logic;

use App\Models\TakeoutZonesModel;
use Carbon\Carbon;
use Curl\Curl;

class Takeout
{
    public function isValidPostalCode($postal_code): bool
    {
        if (!is_numeric($postal_code)) return false;

        return TakeoutZonesModel::query()
                ->orderByDesc('id')
                ->whereRaw('(? between post_number and post_number2)', [$postal_code])->count() > 0;
    }

    public function autocompleteAddress(string|null $address)
    {
        $url = 'https://api.dataforsyningen.dk/autocomplete';
        $curl = new Curl();
        $curl->get($url, [
            'q' => $address,
            'kommunekode' => implode('|', config('takeout.municipal_codes'))
        ]);

        if ($curl->error) {
            return [];
        } else {
            return $curl->response;
        }
    }

    public function getDeliveryInfo(array $args = [])
    {
        $default = [
            //'address' => 'Bagagevej 3, 2770 Kastrup',
            'address' => '',
            'zip' => '',
            'deliveryTime' => ''
        ];
        $args = set_args($args, $default);

        $shop = $this->getShopDistanceByAddress($args['address']);
        $e = (object)config('takeout');

        //$test = env('TAKEOUT_TEST', $e->test_mode);

        $Data = [
            'Website' => $e->Website,
            'CompanyID' => $e->PartnerID,
            'ClientCode' => $e->ClientCode,
            'ClientVersion' => $e->ClientVersion,
            'Language' => $e->Language,
            'TestMode' => true,
            'UserToken' => '',
            'Function' => 'GetDeliveryInfo',
            'Data' => [
                'RestaurantID' => shop($shop)->takeout_id,
                'DeliveryDate' => Carbon::create($args['deliveryTime'])->toAtomString(),
                //'DeliveryDate' => '2022-01-14T20:35:00',
                'RecipientAddress' => $args['address'],
                'RecipientZip' => $args['zip']
            ]
        ];
//        echo '<pre>';
//        print_r($Data);
//        exit;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $e->api_url);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:23.0) Gecko/20100101 Firefox/23.0");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $data_string = json_encode($Data);
        $data = ["data" => $data_string];
        if (is_array($data)) {
            $data = http_build_query($data);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);
        if (is_json($result)) $result = json_decode($result);
        return $result;
    }

    public function getShopDistanceByAddress($address)
    {
        $data = $this->autocompleteAddress($address);

        $lat = $data[0]->data->y ?? '';
        $lng = $data[0]->data->x ?? '';

        if (blank($lat)) return [];

        $url = "https://graphhopper.com/api/1/route?point={shop_lat},{shop_lng}&point={lat},{lng}&debug=true&key=" . config('takeout.graph_hopper_api') . "&type=json&calc_points=false&instructions=false";

        $curl = new Curl();
        $out = [];
        foreach (config('shops') as $name => $shop) {
            $url2 = strtr($url, [
                '{shop_lat}' => $shop['lat'],
                '{shop_lng}' => $shop['lng'],
                '{lat}' => $lat,
                '{lng}' => $lng
            ]);

            try {
                $response = $curl->get($url2);
                if (isset($response->paths[0]->distance)) {
                    $out[$name] = $response->paths[0]->distance;
                }
            } catch (\Exception) {

            }
        }

        asort($out);

        return array_key_first($out);
    }
}
