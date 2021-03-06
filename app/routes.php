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

Route::get('logout', array('uses'=>'UsersController@logout','as'=>'logout'));
Route::get('/', ['uses'=>'HomeController@home','as'=>'home']);
Route::resource('sessions', 'SessionsController');
Route::get('returns/create', array('uses'=>'PropertyController@create','as'=>'returns.create'));
Route::resource('dashboard','DashboardController');
Route::get('property/examine/{id}',['uses'=>'PropertyController@examine','as'=>'property.examine']);
Route::post('property.finalize',['uses'=>'PropertyController@finalize','as'=>'property.finalize']);
Route::resource('property','PropertyController');
Route::resource('users','UsersController'); 
Route::resource('departments','DepartmentController'); 
Route::post('login', array('uses'=>'UsersController@login','as'=>'login'));
Route::get('users/{id}/changepassword', array('uses'=>'UsersController@changePassword','as'=>'users.changepassword'));
Route::put('users/{id}/updateprofile', array('uses'=>'UsersController@updateProfile','as'=>'users.updateprofile'));
Route::get('users/{id}/profile', array('uses'=>'UsersController@profile','as'=>'users.profile'));
Route::get('property/{id}/otp', array('uses'=>'PropertyController@otp','as'=>'property.otp'));
Route::get('forgotpassword', ['uses'=>'UsersController@forgotpassword','as'=>'forgotpassword']);
Route::post('submitforgot', ['uses'=>'UsersController@submitforgot','as'=>'submitforgot']);
Route::post('property/notify',['uses'=>'PropertyController@notify','as'=>'property.notify']);
//Route::get('otp', function(){ dd('Hello'); });
Route::get('getemployeelist', ['uses'=>'DepartmentController@getemployeelist','as'=>'getemployeelist']);
Route::get('getreturns', ['uses'=>'PropertyController@getreturns','as'=>'getreturns']);
Route::get('pendingreturns',['uses'=>'PropertyController@pendingreturns','as'=>'pendingreturns']);