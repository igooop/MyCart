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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show-cart', 'HomeController@ShowCart');
Route::post('/add-cart', 'HomeController@AddtoCart');
Route::post('/delete', 'HomeController@DeletetoCart');
Route::post('/update', 'HomeController@UpdatetoCart');
