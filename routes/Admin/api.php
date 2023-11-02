<?php

use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;


Route::controller(CollectionController::class)
    ->prefix('collections')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('{collection}', 'show');
        Route::put('{collection}', 'update');
        Route::delete('{collection}', 'destroy');

        Route::put('{collection}/status', 'updateStatus');

        Route::get('{collection}/image', 'showImage');
        Route::post('{collection}/image', 'storeImage');
        Route::delete('{collection}/image', 'deleteImage');

        Route::get('{collection}/products', 'showProducts');
    });

Route::controller(ProductController::class)
    ->prefix('products')
    ->group(function () {
        Route::get('', 'index'); //
        Route::post('', 'store'); //
        Route::get('{product}', 'show'); //
        Route::put('{product}', 'update'); //
        Route::delete('{product}', 'destroy');

        Route::put('{product}/status', 'updateStatus'); //

        Route::get('{product}/specification', 'showSpecification');
        Route::post('{product}/specification', 'storeSpecification');
        Route::put('{product}/specification', 'updateSpecification');
        Route::delete('{product}/specification', 'deleteSpecification');

        Route::get('{product}/image', 'showImage');
        Route::post('{product}/image', 'storeImage')->name('product.store-image');
        Route::delete('{product}/image', 'deleteImage');

        Route::get('{product}/option', 'showOption');
        Route::post('{product}/option', 'storeOption');
        Route::put('{product}/option', 'updateOption');
        Route::delete('{product}/option', 'deleteOption');

        Route::get('{product}/collections', 'showCollections'); //
        Route::put('{product}/collections', 'updateCollections'); //
    });


Route::controller(CustomerController::class)
    ->prefix('customers')
    ->group(function (){
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('{customer}', 'show');
        Route::put('{customer}', 'update'); //
        Route::delete('{customer}', 'destroy');

        Route::get('{customer}/order', 'showLastOrder');

        Route::get('{customer}/note', 'showNote');
        Route::put('{customer}/note', 'updateNote');

        Route::get('{customer}/address', 'showAddress');
        Route::post('{customer}/address', 'storeAddress');
        Route::put('{customer}/address', 'updateAddress');
    });

require 'auth.php';
