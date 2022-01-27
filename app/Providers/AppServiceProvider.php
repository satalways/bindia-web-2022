<?php

namespace App\Providers;

use App\Logic\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Translation\Translator;
use App\Translator\JsonTranslator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        if (isPKIp()) {
//            config(['app.debug' => true]);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('phone_number', function ($attribute, $value, $parameters) {
            return is_phone($value);
        });

        \DB::connection()->enableQueryLog();

        // Override the JSON Translator
        $this->app->extend('translator', function (Translator $translator) {
            $trans = new JsonTranslator($translator->getLoader(), $translator->getLocale());
            $trans->setFallback($translator->getFallback());
            return $trans;
        });

        view()->composer('*', function ($view) {
            if (!$this->app->runningInConsole()) {
                if (Route::getCurrentRoute()) {
                    view()->share('routeName', Route::getCurrentRoute()->getName());
                    view()->share('O', new Order());
                } else {
                    view()->share('routeName', '');
                    view()->share('O', null);
                }
            }
        });

        //\DB::connection()->enableQueryLog();
//        \DB::listen(function($query){
//
//        });
    }
}
