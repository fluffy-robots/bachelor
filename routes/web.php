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

Route::get('/home', 'HomeController@index');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['manufacturer','auth'], 'prefix' => 'manufacturer'], function(){
	Route::get('products', 'ManufacturerController@products');
	Route::get('media', 'ManufacturerController@media');
	Route::get('files', 'ManufacturerController@files');
	Route::get('shopkeeper', 'ManufacturerController@shopkeeper');
});

Route::group(['middleware' => ['shopkeeper','auth'], 'prefix' => 'shopkeeper'], function(){
	Route::get('products', 'ShopkeeperController@products');
	Route::get('manufacturer', 'ShopkeeperController@manufacturer');
});
