<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
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

Route::controller(PostController::class)->prefix('post')->group(function () {
    Route::post('/create', 'create');
});

Route::controller(SubscriptionController::class)->prefix('mailing')->group(function () {
    Route::post('/subscribe', 'subscribe');
    Route::post('/unsubscribe', 'unsubscribe');
});
