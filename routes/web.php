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
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/menu', 'PagesController@menu')->name('menu');

// Reservations.
Route::get('/reservations', 'ReservationsController@create')->name('reservations');
Route::post('/reservations', 'ReservationsController@store')->name('reservations_store');

// Share
Route::get('/share', 'ShareController@index')->name('share');
Route::post('/share', 'ShareController@store')->name('share_store');
Route::get('/share/{share}', 'ShareController@show')->name('share_show');
Route::put('/share/{share}', 'ShareController@update')->name('share_update');
Route::get('/share/{share}/edit', 'ShareController@edit')->name('share_edit');
Route::get('/share/{share}/delete', 'ShareController@destroy')->name('share_delete');
Route::get('/admin/shares', 'ShareController@admin')->name('share_admin');