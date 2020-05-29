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

Route::get('/', function () {
    return view('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/{category}', 'HomeController@categoryPage')->name('category');

Route::get('/add-product/{id}', 'CartController@addToCart')->name('cart.addToCart');

Route::get('/reduce-product/{id}', 'CartController@reduceProduct')->name('cart.reduceProduct');

Route::get('/shopping-cart', 'CartController@showCart')->name('cart.shoppingCart');

Route::get('/remove-product/{id}', 'CartController@removeProduct')->name('cart.removeProduct');
