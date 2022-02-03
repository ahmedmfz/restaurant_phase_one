<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Product\ProductController;
use App\Http\Controllers\Dashboard\Category\CategoryController;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group(['prefix' => 'dash', 'middleware' => 'auth'], function () {

        Route::resource('/', DashboardController::class);

        //category dashboard routes
        Route::resource('/category', CategoryController::class);
        Route::get('/show/category', [CategoryController::class, 'getCategory'])->name('category.show');

        //product dashboard routes
        Route::resource('/product', ProductController::class);
        Route::get('/show/product', [ProductController::class, 'getProduct'])->name('product.show');
        Route::post('/show/category_name', [ProductController::class, 'getCategoryName'])->name('category_name.show');


        //test route
        Route::get('/table', function () {
            return view('dashboard.modal');
        });
    });
});
