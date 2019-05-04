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


//--------------------------------------------------------------- simplified-auth routes
Route::group(['namespace' => 'Auth'], function (){
    //Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/login', 'LoginController@show');

    Route::post('/register', 'RegisterController@register');
    Route::post('/logout', 'LoginController@logout');
});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => 'auth:api'], function (){
    Route::get('getResources', function (){
        return 'Your Resources is secure. You must need to provide token to access it';
    });

    Route::get('/user', function (Request $request){
        return $request->user();
    });
});




//--------------------------------------------------------------- Basic Operations with test coverages
Route::group(['namespace' => 'Products', 'prefix' => 'products',], function (){

    Route::group(['prefix' => 'stock',], function (){

        Route::get('/', 'StockController@index');
        Route::post('/', 'StockController@store');
        Route::get('/{id}', 'StockController@show');
        Route::put('/{id}', 'StockController@update');
        Route::delete('/{id}', 'StockController@delete');

        Route::get('/get-db-info', 'StockController@getDBInfo');
        Route::get('/accept-by-id/{id}', 'StockController@acceptById');
    });

    Route::group(['prefix' => 'product',], function (){

        Route::get('/productWiseCategory', 'ProductController@productWiseCategory');
        Route::get('/productByCategory/{id}', 'ProductController@productByCategory');
        Route::get('/productByCategoryIdAndProductId/{cid}/{pid}', 'ProductController@productByCategoryIdAndProductId');

        Route::get('/', 'ProductController@index');
        Route::post('/', 'ProductController@store');
        Route::get('/{id}', 'ProductController@show');
        Route::put('/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@delete');
    });

    Route::group(['prefix' => 'category',], function (){

        Route::get('/categoryWiseProducts', 'CategoryController@categoryWiseProducts');
        Route::get('/categoryByProducts/{id}', 'CategoryController@categoryByProducts');
        Route::get('/categoryByCategoryIdAndProductId/{cid}/{pid}', 'CategoryController@categoryByCategoryIdAndProductId');

        Route::get('/', 'CategoryController@index');
        Route::post('/', 'CategoryController@store');
        Route::get('/{id}', 'CategoryController@show');
        Route::put('/{id}', 'CategoryController@update');
        Route::delete('/{id}', 'CategoryController@delete');
    });

});




//--------------------------------------------------------------- References
// https://laravel.com/docs/5.8/routing
// https://laravel.com/docs/5.8/controllers