<?php
/**
 * https://dawadocs.dataforsyningen.dk/dok/adresser
 *
 * https://clientapi-takeoutdk.takeoutsystem.net/V1/Documentation/?p=F_GetDeliveryInfo
 * username = [blank]
 * pass = orderpartner
 */

namespace App\Logic;

use App\Models\TakeoutZonesModel;
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
            'q' => $address
        ]);

        if ($curl->error) {
            return [];
        } else {
            return $curl->response;
        }
    }

    public function getDeliveryInfo()
    {
        $e = (object)config('takeout');

        $Data = [
            'Website' => $e->Website,
            'CompanyID' => $e->PartnerID,
            'ClientCode' => $e->ClientCode,
            'ClientVersion' => $e->ClientVersion,
            'Language' => $e->Language,
            'TestMode' => $e->test_mode,
            'UserToken' => '',
            'Function' => 'GetDeliveryInfo',
            'Data' => [
                'RestaurantID' => 1665,
                'DeliveryDate' => ''
            ]
        ];

        dd($Data);
    }
}
