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

// show login
Route::get('login', ['as' => 'user.login','uses' => 'UserController@showLogin']);

// process the login form
Route::post('login', ['as' => 'login', 'uses' => 'UserController@doLogin']);

// create user
Route::get('create', ['as' => 'user.create','uses' => 'UserController@create']);

// store user
Route::post('user/store', ['as' => 'user.store','uses' => 'UserController@store']);

// list photos
Route::get('photos', ['as' => 'photos','uses' => 'PhotoController@index']);

// upload photos
Route::get('photo/upload', ['as' => 'photo.upload','uses' => 'PhotoController@upload']);

// store photos
Route::post('photo/store', ['as' => 'photo.store','uses' => 'PhotoController@store']);

// search photos
Route::get('user/search', ['as' => 'user.search','uses' => 'UserController@search']);

// return photos for the searched user
Route::get('photo/search', ['as' => 'photo.search','uses' => 'PhotoController@search']);

// edit image thumbnail
Route::get('image/thumbnail/{id}', ['as' => 'image.thumbnail','uses' => 'PhotoController@thumbnail']);