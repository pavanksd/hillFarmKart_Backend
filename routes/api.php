<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->group(function(){
    Route::post('/login','api\v1\AppLoginController@authenticate');
    Route::post('/register','api\v1\AppLoginController@registerUser');
});

Route::prefix('/catalog')->group(function(){
    Route::get('/items','api\v1\AppCatalogController@getAllItems');
});

Route::prefix('/order')->group(function(){
    Route::post('/checkout','api\v1\AppOrderController@checkoutOrder');
});

Route::fallback(function(){
    return response()->json(['message' => 'Bad Request'], 400);
});