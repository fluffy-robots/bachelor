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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => ['manufacturer','auth'], 'prefix' => 'manufacturer'], function(){
	Route::get('products', 'ManufacturerController@products');
	Route::get('media', 'ManufacturerController@media');
	Route::get('files', 'ManufacturerController@files');
	Route::get('shopkeeper', 'ManufacturerController@shopkeeper');

	Route::post('products', 'ProductController@store');
	Route::patch('products/{product}', 'ProductController@update');
	Route::delete('products/{product}', 'ProductController@destroy');
	Route::patch('product/files', 'ProductController@addFile');
	Route::delete('product/files', 'ProductController@removeFile');
	Route::patch('product/files/primary', 'ProductController@makePrimaryImage');

	Route::post('tags', 'TagController@store');
	Route::delete('tags/{tag}', 'TagController@destroy');

	Route::post('files', 'FileController@uploadFile');
	Route::post('folders', 'FileController@createFolder');
	Route::delete('files/{file}', 'FileController@destroy');

});

Route::group(['middleware' => ['shopkeeper','auth'], 'prefix' => 'shopkeeper'], function(){
	Route::get('products', 'ShopkeeperController@products');
	Route::get('manufacturer', 'ShopkeeperController@manufacturer');
});
