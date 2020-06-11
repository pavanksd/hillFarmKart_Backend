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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/orderlist', 'OrderController@index')->name('orderlist.index');
Route::post('/orderlist', 'OrderController@index')->name('orderlist.index');
Route::get('/orderlist/{id?}','OrderController@show')->name('orderlist.show');
Route::put('/order/markDelivered','OrderController@markDelivered');
Route::put('/order/markCancelled','OrderController@markCancelled');

Route::get('/stocklist','StockController@index')->name('stocklist.index');
