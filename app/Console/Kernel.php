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

        $schedule->call(function () {
            Order::checkOrdersIfNotMarkPaid();
        })->everyTenMinutes();
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
