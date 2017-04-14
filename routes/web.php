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
Route::get('/reservations', 'PagesController@reservations')->name('reservations');
Route::get('/share', 'PagesController@share')->name('share');
