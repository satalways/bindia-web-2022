<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CateringOrdersModel extends BaseModel
{
    use HasFactory;

    protected $table = 'catering_orders_2021';

    protected $casts = [
        'paid' => 'boolean',
        'delivery' => 'boolean',
    ];

    protected $fillable = [
        'menu'
    ];

    public function items()
    {
        return $this->hasMany(CateringOrdersDetailsModel::class, 'order_id');
    }

    public function getPersonsAttribute()
    {

        if ($this->type === 'buffet') {
            $rows = $this->items()->limit(4)->orderBy('id')->get();
            return $rows->sum('qty');
        } else {
            $rows = $this->items()->where('price', 0)->orderBy('id')->get();
            return $rows->sum('qty');
        }
    }

    public function getTotalPriceAttribute()
    {
        $price = $this->per_person_price * $this->getPersonsAttribute();

        $items = $this->items()->where('price', '>', 0)->get();
        foreach ($items as $item) {
            $price += $item->qty * $item->price;
        }

        /**
         * Adding delivery fee on delivery orders
         */
        if ($this->delivery && $this->delivery_fee > 0) {
            $price += $this->delivery_fee;
        }

        return $price;
    }
}
