<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/post', 'PostController@index');
Route::post('/posting', 'PostController@store');
Route::get('/profile', 'ProfileController@index');
Route::post('/profile-update', 'ProfileController@update');
Route::post('/profile-upload', 'ProfileController@upload');
Route::get('/logout', 'HomeController@logout');
Route::post('/login', 'HomeController@login');
Route::post('/register', 'HomeController@register');
