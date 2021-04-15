<?php

use Illuminate\Support\Facades\Route;
use Kavano\Rating\RatingController;
$prefix = config('rating.routes.prefix_url');
$middleware = config('rating.routes.middleware');

Route::group(['prefix' => $prefix, 'middleware' => $middleware], function () {
    Route::group(['prefix' => 'rating'], function () {
        Route::get('/status', [RatingController::class, 'getRate'])->name('get-rate-status'); // get user rate status,
        Route::post('/submit', [RatingController::class, 'submitRate'])->name('submit-rate'); // user submit rates and feedback to the app
    });
});
