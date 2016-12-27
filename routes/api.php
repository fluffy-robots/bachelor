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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::group(['middleware'=> 'auth', 'prefix' => 'v1'], function(){
	Route::get('products', 'ProductController@index');
	Route::post('products', 'ProductController@store');
	Route::patch('products/{product}', 'ProductController@update');
	Route::delete('products/{product}', 'ProductController@destroy');
});

// GET|HEAD  api/v1/products                
// POST      api/v1/products                
// GET|HEAD  api/v1/products/create         
// GET|HEAD  api/v1/products/{product}      
// PUT|PATCH api/v1/products/{product}      
// DELETE    api/v1/products/{product}      
// GET|HEAD  api/v1/products/{product}/edit


// Sep 2013 1st Semester MMD
// Sep 2014 3rd Semester MMD
// May 2015 Dimension MMD
// Sep 2015 1st Semester Web Dev
// Sep 2016 3rd Semester Web Dev
// Jan 2017 Dimension Web Dev
