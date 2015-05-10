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


// RUTAS USUARIOS NO-AUTENTIFICADOS
Route::get('get_allCategories', 'GuestUserMethods@get_allCategories');


// RUTAS USUARIOS AUTENTIFICADOS

Route::get('crear_subasta', 'LogedUserMethods@form_subasta');
Route::post('crear_subasta', 'LogedUserMethods@create_subasta');

/* Obtener Todas las categorías. */
Route::get('get_allCategories', 'LogedUserMethods@get_allCategories');

/* Obtener Todas las Subcategorías. */
Route::get('get_allSubCategories', 'LogedUserMethods@get_allSubCategories');

/* Obtener Todas las Subcategorías en una categorías. */
Route::get('get_allSubCategoriesOnCategory/{idCategoria}', 'LogedUserMethods@get_allSubCategoriesOnCategory');

/* Obtener Todas las Subcategorías en una categorías. */
Route::get('get_subCategoryDescription/{idSubCategoria}', 'LogedUserMethods@get_subCategoryDescription');