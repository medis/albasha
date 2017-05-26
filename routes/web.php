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

Auth::routes();

Route::get('/home', 'PagesController@index');
Route::get('/', 'PagesController@index')->name('home');
Route::get('/menu', 'PagesController@menu')->name('menu');
Route::post('/page/{machine_name}', 'PagesController@update');

// Reservations.
Route::get('/reservations', 'ReservationsController@create')->name('reservations');
Route::post('/reservations', 'ReservationsController@store')->name('reservations_store');

// Share
Route::resource('share', 'ShareController');
Route::get('/admin/shares', 'ShareController@admin')->name('share.admin');

// Gallery
Route::resource('gallery', 'GalleryController');

// Food
Route::resource('food', 'FoodController');