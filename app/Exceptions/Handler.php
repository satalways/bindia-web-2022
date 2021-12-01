<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
            if (localhost()) {
                Log::channel('daily')->critical($e->getMessage());
            } else {
                $content = '<pre>Method: ' . request()->method();
                $content .= '<br><b>/' . request()->path() . '</b>';
                $content .= '<br><br>' . nl2br($e->getMessage());
                $content .= '<br><br>Get: ' . print_r(request()->query(), true);
                $content .= '<br><br>Post: ' . print_r(request()->post(), true);
                $content .= '<br><br>Server: ' . print_r(request()->server(), true);
                $content .= '<br><br><br>' . $e->getTraceAsString();
                //$content .= '<br><br><br>' . print_r(debug_backtrace(0), true);
                $content .= '</pre>';

                send_mail('shakeel@shakeel.pk', 'New Web Error', $content);
            }

        });
    }
}
