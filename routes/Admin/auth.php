<?php

use App\Http\Controllers\Admin\AuthController;

Route::controller(AuthController::class)
    ->prefix('admin')
    ->group(function (){
        Route::post('login', 'login');
        Route::post('register', 'store');
    });
