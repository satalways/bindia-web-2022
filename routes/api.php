<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('files/jobs/list', [\App\Http\Controllers\Api\ApiController::class, 'jobFiles']);
Route::get('files/jobs/get', [\App\Http\Controllers\Api\ApiController::class, 'getJobFile']);
Route::get('files/jobs/delete', [\App\Http\Controllers\Api\ApiController::class, 'delJobFile']);

Route::get('files/contact/list', [\App\Http\Controllers\Api\ApiController::class, 'contactFiles']);
Route::get('files/contact/get', [\App\Http\Controllers\Api\ApiController::class, 'getJobFile']);
Route::get('files/contact/delete', [\App\Http\Controllers\Api\ApiController::class, 'delJobFile']);

Route::any('/nets-web-hooks-success.html', [\App\Http\Controllers\OrderController::class, 'netsSuccess'])->name('order.nets.hooks');
Route::any('/nets-web-hooks-failed.html', [\App\Http\Controllers\OrderController::class, 'netsFailed'])->name('order.nets.cancel');
//Route::any('/__files/nets_webhooks.php', [\App\Http\Controllers\OrderController::class, 'netsSuccess'])->name('order.nets.hooks2');
//Route::post('/nets-web-hooks-success.html', [\App\Http\Controllers\OrderController::class, 'netsSuccess'])->name('order.nets.hooks');
