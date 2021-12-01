<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakeoutZonesModel extends Model
{
    use HasFactory;

    protected $table = 'etakeaway_zones';
    public $timestamps = false;

    public function deliveryMinutes()
    {
        $M = explode(' ', $this->estimated_time);
        return (int)$M[0];
    }
}
