<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace' => 'products', 'prefix' => 'products',], function (){

    Route::group(['prefix' => 'stock',], function (){
        Route::apiResource('/', 'StockController');
        Route::get('/getDBInfo', 'StockController@getDBInfo');
        Route::get('/acceptById/{id}', 'StockController@acceptById');
    });
});



// https://laravel.com/docs/5.8/routing
// https://laravel.com/docs/5.8/controllers