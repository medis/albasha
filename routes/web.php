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

// Gallery
Route::get('/gallery', 'GalleryController@index')->name('gallery_index');
Route::get('/gallery/create', 'GalleryController@create')->name('gallery_create');
Route::post('/gallery', 'GalleryController@store')->name('gallery_store');
Route::get('/gallery/{gallery}/edit', 'GalleryController@edit')->name('gallery_edit');
Route::put('/gallery/{gallery}', 'GalleryController@update')->name('gallery_update');
Route::get('/gallery/{gallery}/delete', 'GalleryController@destroy')->name('gallery_delete');

// Food
Route::resource('food', 'FoodController');