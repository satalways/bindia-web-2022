<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function itemDetail()
    {
        return $this->hasOne(OrderItems::class, 'code', 'code');
    }

    public function spiceHtml()
    {
        if (blank($this->spice)) return '';

        $items = make_array($this->spice);

        $string = '';
        foreach ($items as $item) {
            $I = explode('-', $item);
            $string .= $I[0] . ' x ' . ($I[1] ?? 'Unknown') . ', ';
        }

        return rtrim($string, ', ');
    }
}
