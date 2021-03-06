<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/category/{cat_id}', 'HomeController@categoryPage')->name('category');

Route::get('/product/{id}', 'HomeController@productPage')->name('product.info');

/**
 * Er is een route group aangemaakt om te voorkomen dat niet ingelogde gebruikers naar de URL's kunnen gaan
 */
Route::group(['middleware' => 'auth'], function(){
    Route::get('/add-product/{id}', 'CartController@addToCart')->name('cart.addToCart');

    Route::get('/reduce-product/{id}', 'CartController@reduceProduct')->name('cart.reduceProduct');

    Route::get('/shopping-cart', 'CartController@showCart')->name('cart.shoppingCart');

    Route::get('/remove-product/{id}', 'CartController@removeProduct')->name('cart.removeProduct');

    Route::get('/destroy-cart', 'CartController@destroyCart')->name('cart.destroy');

    Route::get('/checkout', 'CartController@checkoutPage')->name('checkoutPage');

    Route::post('/Order', 'OrderController@store')->name('order.store');

    Route::get('/my-orders', 'OrderController@index')->name('order.index');
});
