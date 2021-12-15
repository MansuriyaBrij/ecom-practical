<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'BrandsController@index')->name('home');
Route::get('/brands/{id}', 'BrandsController@show')->name('brands.show');
Route::post('/add-to-cart/{id}', 'CartController@addToCart')->name('add-to-cart');
Route::get('/cart', 'CartController@getCartData')->name('get.cart');
Route::post('/plus-quantity/{id}', 'CartController@plusQuantity')->name('plus.quantity');
Route::post('/minus-quantity/{id}', 'CartController@minusQuantity')->name('minus.quantity');
Route::delete('/delete-quantity/{id}', 'CartController@deleteQuantity')->name('delete.product');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::post('/place-order', 'OrderController@placeOrder')->name('place.order');