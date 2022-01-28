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
use App\Models\CateringOrdersDetailsModel;
use App\Models\CateringOrdersModel;
use App\Models\Feedback;
use App\Models\GiftCard;
use App\Models\GiftCardSubCards;
use App\Models\JobsModel;
use App\Models\OrderItems;
use App\Models\Orders;
use Carbon\Carbon;
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
        die;


        $O = new Order();
        dd($O->sendOrderEmailToCustomer(151907));

        $address = "Aage Berntsens Alle";
        dd(filter_var($address, FILTER_SANITIZE_STRING));
        $address = "123 My Street, My Area, My City, AA11 1AA";
        $splitter = "!(.*)(?=,),(?<=,)\s*(.*)!";
        preg_match_all($splitter,$address,$matches);

        debug($matches);

//        $short_addr = $matches[1][0];
//        $postal_code = $matches[2][0];


dd('asd');
        dd(isPKIp());

        $O = new Order();
        dd($O->getSessionCartData());

        dd(\request()->session()->get('delivery')->Data);


        $T = new Takeout();
        $address = 'Bagagevej 3, 2770 Kastrup';

        //$shops = $T->getShopsDistanceByAddress('Skudehavnsvej 2A, 2150 Nordhavn');

        die;
        $G = new \App\Logic\GiftCard();
        dd($G->redeemGiftCardByOrder(139990));


        $O = new Order();
        $O->sendOrdersToTakeOut();


        die;
        dd(resource_path('order_files/Loyalty-Programme.pdf'));

        $order = Orders::query()->find(136597);


        $O = new Order();
        //dd(session()->get('checkout'));
        return $O->getSessionCartData(true);


        $htmlContent = view('layouts.email', ['content' => 'My Content'])->render();

        $cssPath = resource_path('css/email.css');
        $cssToInlineStyles = new CssToInlineStyles();
        $htmlContent = $cssToInlineStyles->convert($htmlContent, file_get_contents($cssPath));

        return $htmlContent;
    }

    public function index2()
    {
        return 'No!';
    }

    public function comingSoon()
    {
        return view('coming_soon');
    }
}
