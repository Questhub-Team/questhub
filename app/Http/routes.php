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
Route::get('/user-events', 'EventsController@userEvents');
Route::get('/one-event/{id}', 'EventsController@showOne');
Route::get('/all-events', 'EventsController@showAll');
Route::get('/ajax/events/get-distance', 'EventsController@compareDistance');
Route::resource('/', 'EventsController');

Route::put('/users/interests', 'UsersController@updateInterests');
Route::resource('users', 'UsersController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');





