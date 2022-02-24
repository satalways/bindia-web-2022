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

        //send_mail('shakeel@shakeel.pk', 'Testing 1 min cron', 'Is it delivered?');
    }

    public function fiveMin()
    {
        Order::checkOrdersIfNotMarkPaid();
    }

    public function oneDay()
    {
        $O = new Order();

        $O->deleteTempPDFFiles();
    }
}
