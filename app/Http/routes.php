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
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::resource('/', 'AppController');
Route::resource('users', 'UsersController');
Route::resource('apps', 'AppController');

// Registration routes...
Route::resource('auth/register', 'UserController@store');
Route::resource('auth/register', 'AppController');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::controllers(['password' => 'Auth\PasswordController',]);
Route::get('/all-events', 'AppController@showAll');

Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('profile', array('as' => 'auth', 'uses' => 'ProfileController@getProfile'));

