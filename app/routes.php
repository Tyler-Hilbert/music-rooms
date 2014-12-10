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

Route::get('/', ['as' => 'home', function()
{
	return View::make('home');
}]);

Route::get('profile', function()
{
	return "Welcome " . Auth::user()->email;
})->before('auth');

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['store', 'create', 'destroy']]);

Route::get('signup', 'SignUpController@create');
Route::resource('SignUp', 'SignUpController', ['only' => ['store', 'create']]);

Route::resource('messages', 'MessagesController');
Route::resource('rooms', 'RoomsController');
