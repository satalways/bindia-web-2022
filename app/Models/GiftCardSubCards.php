<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Model\TakeAwayMenuItems;

class GiftCardSubCards extends Model
{
    use HasFactory;

    protected $table = 'gift_sub_cards';

    public $timestamps = false;

    protected $dates = [
        'time',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    protected $appends = ['full_items'];

    public function getFullItemsAttribute()
    {
        $items = $this->attributes['items'];
        if ((is_array($items) || is_object($items))) {
            $items = json_decode($items, true);
            $returnItems = [];
            foreach ($items as $code => $qty) {
                $item = TakeAwayMenuItems::query()->where('code', $code)->first();
                $returnItems[$code] = $item->toArray();
                $returnItems[$code]['qty'] = $qty;
            }

            return $returnItems;
        } else {
            return [];
        }
    }
}
