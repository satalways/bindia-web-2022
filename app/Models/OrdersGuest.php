<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersGuest extends Model
{
    use HasFactory;

    protected $table = 'orders_guest';

    public $timestamps = false;

    protected $dates = [
        'call_me_date', 'datetime'
    ];

    protected $casts = [
        'is_new' => 'boolean',
        'call_me' => 'boolean',
        'is_catering_user' => 'boolean',
    ];
}
