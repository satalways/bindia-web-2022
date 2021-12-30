<?php
/**
 * https://github.com/mcamara/laravel-localization
 * I have used this package for localization (language).
 */

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::post('/general.html', [\App\Http\Controllers\App::class, 'generalPost'])->name('general.post');

    Route::get('/', [\App\Http\Controllers\App::class, 'home'])->name('home');

    Route::get('/indisk-take-away.html', [\App\Http\Controllers\OrderController::class, 'takeaway'])->name('takeaway');
    Route::post('/indisk-take-away.html', [\App\Http\Controllers\OrderController::class, 'takeawayPost'])->name('takeaway.post');

    Route::get('/dine-in.html', [\App\Http\Controllers\Pages::class, 'dinein'])->name('dinein');

    /**
     * Catering routes
     */
    # Buffet Catering Page
    if (testServer() || localhost()) {
        Route::get('/indian-food-catering.html', [\App\Http\Controllers\CateringController::class, 'cateringBuffet'])->name('catering');
    } else {
        Route::get('/indian-food-catering.html', [\App\Http\Controllers\TestController::class, 'comingSoon'])->name('catering');
    }

    Route::get('/catering-drinks.html', [\App\Http\Controllers\CateringController::class, 'cateringDrinks'])->name('catering.drinks');
    Route::post('/indian-food-catering.html', [\App\Http\Controllers\CateringController::class, 'cateringBuffetPost'])->name('catering.post');
    # Portion Catering Page
    Route::get('/indian-food-catering-portion.html', [\App\Http\Controllers\CateringController::class, 'cateringPortion'])->name('catering.portion');
    Route::get('/catering-portion-optionals.html', [\App\Http\Controllers\CateringController::class, 'cateringOptionals'])->name('catering.optionals');
    Route::get('/catering-checkout.html', [\App\Http\Controllers\CateringController::class, 'cateringCheckout'])->name('catering.checkout');


    Route::get('/indisk-mad-trianglen.html', [\App\Http\Controllers\Pages::class, 'bdv'])->name('bdv');
    Route::get('/indisk-mad-gl-kongevej.html', [\App\Http\Controllers\Pages::class, 'gkv'])->name('gkv');
    Route::get('/indisk-mad-elmegade.html', [\App\Http\Controllers\Pages::class, 'elm'])->name('elm');
    Route::get('/indisk-mad-lyngby-hovedgade.html', [\App\Http\Controllers\Pages::class, 'lhg'])->name('lhg');
    Route::get('/indisk-mad-amagerbrogade.html', [\App\Http\Controllers\Pages::class, 'amg'])->name('amg');
    Route::get('/indisk-mad-soborg-hovedgade.html', [\App\Http\Controllers\Pages::class, 'shg'])->name('shg');
    Route::get('/our-story.html', [\App\Http\Controllers\Pages::class, 'story'])->name('our_story');
    Route::get('/our-values.html', [\App\Http\Controllers\Pages::class, 'values'])->name('our_values');
    Route::get('/our-team.html', [\App\Http\Controllers\Pages::class, 'team'])->name('our_team');
    Route::get('/faq.html', [\App\Http\Controllers\Pages::class, 'faq'])->name('faq');
    Route::get('/glossary.html', [\App\Http\Controllers\Pages::class, 'glossary'])->name('glossary');
    Route::get('/privacy-policy.html', [\App\Http\Controllers\Pages::class, 'privacy_policy'])->name('privacy_policy');
    Route::get('/terms-and-conditions.html', [\App\Http\Controllers\Pages::class, 'terms'])->name('terms_and_conditions');

    /**
     * Job routes
     */
    Route::get('/jobs.html', [\App\Http\Controllers\Jobs::class, 'index'])->name('jobs');
    Route::get('/jobs2.html', [\App\Http\Controllers\Jobs::class, 'oldJobs'])->name('jobsOld');
    Route::post('/jobs.html', [\App\Http\Controllers\Jobs::class, 'post'])->name('jobs.post');

    Route::get('/contact-us.html', [\App\Http\Controllers\App::class, 'contact'])->name('contact');
    Route::post('/contact-us.html', [\App\Http\Controllers\App::class, 'saveContact'])->name('contact.post');

    /**
     * All routes related with order
     */
    Route::get('/checkout.html', [\App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
    Route::get('/checkout-address.html', [\App\Http\Controllers\OrderController::class, 'address'])->name('checkout.address');
    Route::post('/checkout.html', [\App\Http\Controllers\OrderController::class, 'checkoutPost'])->name('checkout.post');
    Route::get('/order_print_receipt.php', [\App\Http\Controllers\OrderController::class, 'pdfFile'])->name('order.pdf');

    /**
     * Feedback routes.
     */
    Route::get('/requested-feedback.html', [\App\Http\Controllers\FeedbackController::class, 'feedback'])->name('order.feedback');
    Route::get('/requested-feedback-thanks.html', [\App\Http\Controllers\FeedbackController::class, 'success'])->name('order.feedback.success');
    Route::post('/requested-feedback.html', [\App\Http\Controllers\FeedbackController::class, 'feedbackPost'])->name('order.feedback.post');

    Route::get('/order-success.html', [\App\Http\Controllers\OrderController::class, 'success'])->name('order.success');
    Route::get('/order-failed.html', [\App\Http\Controllers\OrderController::class, 'failed'])->name('order.failed');

    Route::get('/payment.html', [\App\Http\Controllers\OrderController::class, 'payment'])->name('order.payment');
    Route::get('/mark-payment-done.html', [\App\Http\Controllers\OrderController::class, 'markDone'])->name('order.markDone');

    /**
     * Gift card routes
     */
    if (!isLiveServer()) {
        Route::get('/gift-card.html', [\App\Http\Controllers\GiftCard::class, 'index'])->name('giftcard');
        Route::post('/gift-card.html', [\App\Http\Controllers\GiftCard::class, 'ajax'])->name('giftcard.post');
    } else {
        Route::get('/gift-card.html', [\App\Http\Controllers\TestController::class, 'comingSoon'])->name('giftcard');
        Route::post('/gift-card.html', [\App\Http\Controllers\GiftCard::class, 'ajax'])->name('giftcard.post');
    }
    Route::get('/gift-card-payment.html', [\App\Http\Controllers\GiftCard::class, 'paymentPage'])->name('giftcard.payment');
    Route::get('/gift-card-payment-accepted.html', [\App\Http\Controllers\GiftCard::class, 'success'])->name('giftcard.success');

    Route::get('/test/', [\App\Http\Controllers\TestController::class, 'index']);
    Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index']);

    Route::get('/captcha', [\App\Http\Controllers\Captcha::class, 'myCaptcha'])->name('captcha');
    //Route::post('/captcha', [\App\Http\Controllers\Captcha::class, 'myCaptchaPost'])->name('captcha.post');
    Route::get('/refresh_captcha', [\App\Http\Controllers\Captcha::class, 'refreshCaptcha'])->name('refresh_captcha');
    Route::post('/app-ajax', [\App\Http\Controllers\App::class, 'appAjax'])->name('app.ajax');

    Route::get('/cron/1min.html', [\App\Http\Controllers\CronController::class, 'min']);
    Route::get('/cron/5min.html', [\App\Http\Controllers\CronController::class, 'fiveMin']);
    Route::get('/cron/1day.html', [\App\Http\Controllers\CronController::class, 'oneDay']);


    Route::get('/confirm_interview.html', [\App\Http\Controllers\App::class, 'confirmInterview'])->name('confirm.interview');

    Route::get('/copy-my-last-order-terms.pdf', [\App\Http\Controllers\OrderController::class, 'copyMyLastOrderPDF'])->name('order.copy.last.order.pdf');
    Route::get('/how-to-reheat-food-from-bindia.pdf', [\App\Http\Controllers\OrderController::class, 'orderReaheatPDF'])->name('order.food.reheat.pdf');

    Route::get('/coming.html', [\App\Http\Controllers\TestController::class, 'comingSoon'])->name('coming');
    Route::get('/xyiiodlesdf.html', [\App\Http\Controllers\App::class, 'markPaid']);

    Route::get('/take-away-{area}.html', [\App\Http\Controllers\OrderController::class, 'areaPage'])->name('area.page');

    Route::get('/{slug}', [\App\Http\Controllers\OrderController::class, 'itemPage'])->name('item');
});

