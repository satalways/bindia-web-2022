<?php

namespace App\Http\Controllers;

use App\Logic\Order;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function min()
    {
        $O = new Order();
        $O->sendOrdersToTakeOut();
    }

    public function fiveMin()
    {

    }
}
