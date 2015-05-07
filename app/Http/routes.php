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

// Route::get('/', 'WelcomeController@index');
Route::get('/', function()
{
	return view('index');
});

Route::get('home', 'HomeController@index');

Route::get('usuario', 'HomeController@cp_usuario');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);

//Route::get('/', 'WelcomeController@index');

Route::get('test', function()
{
	return view('testing');
});

Route::get('iniciar_sesion', function()
{
	return view('iniciar_sesion');
});


// Consultas de datos de la Database.
Route::get('get_registeredUsers', 'LogedUserMethods@get_registered');
