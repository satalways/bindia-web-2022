<?php

namespace App\Http\Controllers;

use App\Logic\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function min()
    {
        die;
        $O = new Order();
        $O->sendOrdersToTakeOut();

        //send_mail('shakeel@shakeel.pk', 'Testing 1 min cron', 'Is it delivered?');
        if (Carbon::now()->minute % 10 == 0) {
            Order::checkOrdersIfNotMarkPaid();
        }
    }

    public function fiveMin()
    {

    }

    public function oneDay()
    {
        die;
        $O = new Order();

        $O->deleteTempPDFFiles();
    }
}
