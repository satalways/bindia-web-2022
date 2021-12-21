<?php

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

    public function autocompleteAddress(string $address)
    {
        $url = 'https://api.dataforsyningen.dk/autocomplete';
        $curl = new Curl();
        $curl->get($url, [
            'q' => $address
        ]);

        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
            echo 'Response:' . "\n";
            dump($curl->response);
        }
    }
}
