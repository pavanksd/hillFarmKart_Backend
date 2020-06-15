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

Route::get('/orderlist', 'OrderController@index')->name('orderlist.index')->middleware('auth');
Route::post('/orderlist', 'OrderController@index')->name('orderlist.index')->middleware('auth');
Route::get('/orderlist/{id?}','OrderController@show')->name('orderlist.show')->middleware('auth');
Route::put('/order/markDelivered','OrderController@markDelivered')->middleware('auth');
Route::put('/order/markCancelled','OrderController@markCancelled')->middleware('auth');

Route::get('/catalog', 'CatalogController@index')->name('catalog.index')->middleware('auth');
Route::get('/catalog/create', 'CatalogController@create')->name('catalog.create')->middleware('auth');
Route::post('/catalog/store', 'CatalogController@store')->name('catalog.store')->middleware('auth');
Route::post('/catalog/update', 'CatalogController@update')->name('catalog.update')->middleware('auth');

Route::get('/stocklist','StockController@index')->name('stocklist.index')->middleware('auth');
