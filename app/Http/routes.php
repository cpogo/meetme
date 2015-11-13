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

Route::get('/', 'loginController@logout');

Route::get('login', 'loginController@index');

Route::post('loginUser', 'loginController@login');

Route::post('registerUser', 'registerController@store');

Route::get('register', 'registerController@index');

Route::get('dashboard', 'dashboardController@index');

Route::get('new_event', 'newEventController@index');

Route::get('new_group', 'groupController@index');

Route::get('mygroup/{id}', ['uses' =>'mygroupController@index'])->where('id', '[0-9]+');

Route::post('createEvent', 'newEventController@store');

Route::post('createGroup','groupController@store');

Route::get('/searching','dashboardController@search');

Route::get('/lfmember','mygroupController@search');

Route::get('showuser','ProfileController@userProfile');

Route::post('/addmember','mygroupController@store');
//Route::get('profile', 'ProfileController@index');
//Route::get('profile/{username?}', 'ProfileController@index')->where('username', '[A-Za-z0-9]+');
Route::get('profile/{username?}', ['uses' =>'ProfileController@index'])->where('username', '[A-Za-z0-9]+');
Route::post('profile_settings', 'ProfileController@settings');