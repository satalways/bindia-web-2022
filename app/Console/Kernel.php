<?php

namespace App\Console;

use App\Logic\Order;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('inspire')->everyMinute();
//        $schedule->command('inspire')->everyTwoMinutes();

        //$schedule->command('queue:work')->everyMinute();

        $Order = new Order();
        $schedule->call(function () use ($Order) {
            $Order->deleteTempPDFFiles();
        })->daily();

        $schedule->call(function () use ($Order) {
            $Order->sendOrdersToTakeOut();
        })->everyMinute();

        /**
         * Send a request to nets server and check if order is paid as marked or not, if not then our system will
         * mark as paid.
         */
        $schedule->call(function () {
            Order::checkOrdersIfNotMarkPaid();
        })->everyTwoMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
