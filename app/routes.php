<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['uses'=>'HomeController@home','as'=>'home']);
Route::resource('sessions', 'SessionsController');
Route::get('property/create', array('uses'=>'PropertyController@create','as'=>'property.create'));

Route::resource('property','PropertyController');
Route::resource('users','UsersController');
Route::post('users/login', array('uses'=>'UsersController@login','as'=>'users.login'));

