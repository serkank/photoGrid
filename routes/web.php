<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PhotoAlbumController@getPhoto')->name('photo.get');
Route::view('/add-photo', 'Album.form')->name('photo.form');
Route::post('/upload-photo', 'PhotoAlbumController@setPhoto')->name('photo.upload');
Route::post('/destroy-photo', 'PhotoAlbumController@delPhoto')->name('photo.destroy');
Route::post('/re-sort', 'PhotoAlbumController@sortPhoto')->name('photo.sort');