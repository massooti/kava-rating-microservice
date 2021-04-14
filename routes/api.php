<?php

use Illuminate\Support\Facades\Route;

Route::namespace('\Kavano\Rating\Http')

    ->group(function () use ($prefix) {
        Route::group(['prefix' => 'rating'], function () {
            Route::get('/status', 'RateController@getRate'); // get user rate status
            Route::post('/submit', 'RateController@submitRate'); // user submit rates and feedback to the app
        });
    
    });

    