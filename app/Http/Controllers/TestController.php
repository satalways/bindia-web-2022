<?php
/**
 * https://github.com/barryvdh/laravel-dompdf
 */

namespace App\Http\Controllers;

use App\Logic\Catering;
use App\Logic\Nets;
use App\Logic\Order;
use App\Logic\PDF;
use App\Logic\Takeout;
use App\Logic\Wolt;
use App\Models\CateringOrdersDetailsModel;
use App\Models\CateringOrdersModel;
use App\Models\Feedback;
use App\Models\GiftCard;
use App\Models\GiftCardSubCards;
use App\Models\JobsModel;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Template;
use Carbon\Carbon;
use Cron\AbstractField;
use CupOfTea\EasyCfg\Facades\Cfg;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class TestController extends Controller
{
    public function index()
    {
        $minPossibleTime = 23;

        dd( config('order.stop_delivery_on_dates') );


        $time  = Carbon::createFromTimestamp(round(strtotime('17:07:29') / 300) * 300);
        return $time->toDateTimeString();

        //return timeToMinutes('16:45');
        return minutesToTime(1025);


        //dump($Order->markOrderPaid($orderID));
        return detect_zipcode('Aastoften 9, Svogerslev, 4001 Roskilde');

        $order = Orders::query()->orderByDesc('id')->first();
        //dump($order->shipment_response);
        echo $order->shipment_response['dropoff']['location']['coordinates']['lat'];
        dd($order->getAllMetas());
        die;
        die;
        $order = Orders::query()->find(162688);

        dd($order->woltShipmentPromiseID());

        $Wolt = new Wolt();

        return $Wolt->getShopName('62838008bb2c376d8934f352');
        $O = new Order();

        //dd($Wolt->createWoltDelivery());
        dd($Wolt->getWebHooks());

        echo '<pre>';
        print_r($Wolt->getShipmentPromise([

        ]));
        die;

        $orders = Orders::query()->where('order_time', '>', Carbon::now()->subMinutes(15))->get();
        foreach ($orders as $order) {
            $order->sendLargeOrderNotification();
        }

        return;

        $feedback = Feedback::query()->find('6576');

        return $feedback->limitedComment();

        return view('test');
    }

    public function index2()
    {
        return 'No!';
    }

    public function comingSoon()
    {
        return view('coming_soon');
    }

    public function comingSoonCatering()
    {
        return view('coming_soon_catering');
    }

    public function comingSoonGiftCard()
    {
        return view('coming_soon_gc');
    }
}
