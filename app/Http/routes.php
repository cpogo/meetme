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

Route::get('/', function () {
    return view('index');
});

//Route::get('login', function () {
//    return view('login');
//});
//
//Route::get('register', function () {
//    return view('register');
//});
//
//Route::get('dashboard', function () {
//    return view('dashboard');
//});

// Route::get('dashboard', function () {
//     return view('dashboard');
// });

Route::get('profile', function () {
    return view('profile');
});

// Route::get('new-meeting', function () {
//     return view('new-meeting');
// });

Route::post('crearUsuario', 'usuarioController@crear');

Route::resource('dashboard', 'DashboardController');
Route::resource('login',     'LoginController');
Route::resource('register',  'RegisterController');
