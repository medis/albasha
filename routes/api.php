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

Route::get('/food', 'Api\FoodController@index');
Route::post('/food', 'Api\FoodController@store')->name('api_food_store_weight');

Route::get('/instagram/{page?}', 'Api\InstagramController@index');