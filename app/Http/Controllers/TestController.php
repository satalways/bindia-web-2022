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
