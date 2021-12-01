<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringOrdersDetailsModel extends BaseModel
{
    use HasFactory;

    protected $table = 'catering_orders_2021_details';
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(CateringOrdersModel::class, 'order_id');
    }
}
