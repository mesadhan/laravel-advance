<?php

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

Route::get('/redis', function () {
   // print_r( app()->make('redis'));
    $redis = app()->make('redis');
    $redis->set('key1', 'Sadhan Sarker');

    return $redis->get('key1');


});




Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', 'PersonController@index');
