<?php

namespace App\Logic;

use App\Models\TakeoutZonesModel;

class Takeout
{
    public function isValidPostalCode($postal_code): bool
    {
        if (!is_numeric($postal_code)) return false;

        return TakeoutZonesModel::query()
                ->orderByDesc('id')
                ->whereRaw('(? between post_number and post_number2)', [$postal_code])->count() > 0;
    }
}
