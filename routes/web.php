<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Public pages routing
Route::get('/', function () {
    return view('welcome');
});

// Authenitcation Routing
Auth::routes();

// Api Dashboard Routing
Route::get('/home', 'HomeController@index')->middleware('auth');

// User Management Routing
Route::resource('users', 'UsersManagementController');
Route::get('users', [
    'uses' 			=> 'UsersManagementController@index'
])->middleware('administrator');
