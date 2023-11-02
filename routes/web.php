<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/{vue?}', function () {
//    return view('app');
//})->where('vue', '[\/\w\.-]*');

Route::get('/', function () {
    return view('image');
});

Route::post('/image/{collection}', [\App\Http\Controllers\Admin\CollectionController::class, 'storeImage'])->name('collection.image');
