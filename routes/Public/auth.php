<?php

use App\Http\Controllers\Public\AuthController;

Route::controller(AuthController::class)
    ->prefix('customer')
    ->group(function (){
        Route::post('login', 'login');
        Route::post('register', 'register');
    });
