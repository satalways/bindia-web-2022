<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    public $timestamps = false;

    protected $dates = [
        'callback_time', 'datetime', 'date'
    ];

    protected $casts = [
        'show_to_staff' => 'boolean',
        'read' => 'boolean',
        'answered' => 'boolean',
        'converted_to_rf' => 'boolean',
    ];
}
