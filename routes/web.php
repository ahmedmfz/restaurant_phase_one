<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Resturant\ChefController;
use App\Http\Controllers\Resturant\HomeController;
use App\Http\Controllers\Resturant\MenuController;
use App\Http\Controllers\Resturant\ContactController;
use App\Http\Controllers\Resturant\GalleryController;
use App\Http\Controllers\Resturant\ProductController;
use App\Http\Controllers\Dashboard\Cart\CartController;
use App\Http\Controllers\Dashboard\Order\OrderController;
use App\Http\Controllers\Dashboard\Wish\WishListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', HomeController::class);

Route::resource('/gallery', GalleryController::class);

Route::resource('/menu', MenuController::class);

Route::resource('/chefs', ChefController::class);

Route::resource('/contact', ContactController::class);

Route::get('/product/{id}', [ProductController::class , 'show'])->name('product_one_show');


Route::middleware('auth','verified')->group(function () {

    // wish route 
    Route::post('/wishlist', [WishListController::class , 'store'])->name('wish.store');
    Route::post('/wishlist/check', [WishListController::class , 'check_name'])->name('wish.check');


    //cart route
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    //order route
    Route::get('/order',[OrderController::class,'index'])->name('order');
    Route::post('/order',[OrderController::class,'store'])->name('order.store');

});

Auth::routes(['verify'=>true ,'reset' => true ,]);

