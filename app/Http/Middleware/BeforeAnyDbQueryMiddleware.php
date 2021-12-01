<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BeforeAnyDbQueryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        \DB::enableQueryLog();
        return $next($request);
    }

    public function terminate($request, $response)
    {
        // Store or dump the log data...
//        dd(
//            \DB::getQueryLog()
//        );
    }
}
