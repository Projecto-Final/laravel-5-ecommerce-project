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
Route::get('/', 'GlobalController@index');

Route::get('home', 'HomeController@index');

Route::get('usuario', 'HomeController@cp_usuario');

Route::get('mis-pujas', 'HomeController@puja_usuario');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);

//Route::get('/', 'WelcomeController@index');

Route::get('test', function()
{
	return view('testing');
});

Route::get('dashboard', function()
{
	return view('dashboard');
});

Route::get('iniciar_sesion', function()
{
	return view('iniciar_sesion');
});


// RUTAS GLOBALES ( AUTH/GUEST )
Route::get('get_allCategories', 'GlobalController@get_allCategories');

Route::get('subasta/{idSubasta}', 'GlobalController@get_selectedSubasta');

/* BUSCAR MEDIANTE FILTRO */
Route::put('buscar', 'GlobalController@buscar_subastas');

// RUTAS USUARIOS AUTENTIFICADOS ( AUTH )

Route::get('crear_subasta', 'LogedUserMethods@form_subasta');
Route::put('add_subasta', 'LogedUserMethods@add_subasta');


/* Llama al metodo para pujar por un articulo */
Route::get('add_puja', 'LogedUserMethods@add_puja');   
//RECARGA los datos de precio de la subasta
Route::get('cargar_precio', 'LogedUserMethods@cargar_precio'); 

Route::get('crearConfPuja', 'LogedUserMethods@crearConfPuja'); 

Route::get('comprovarCF', 'LogedUserMethods@comprovarCF');

Route::get('cargarPujaAut', 'LogedUserMethods@cargarPujaAut');



/* Obtener Todas las categorías. */
//Route::get('get_allCategories', 'LogedUserMethods@get_allCategories');

/* Obtener Todas las Subcategorías. */
Route::get('get_allSubCategories', 'LogedUserMethods@get_allSubCategories');

/* Obtener Todas las Subcategorías en una categorías. */
Route::get('get_allSubCategoriesOnCategory/{idCategoria}', 'GlobalController@get_allSubCategoriesOnCategory');

/* Obtener Todas las Subcategorías en una categorías. */
Route::get('get_subCategoryDescription/{idSubCategoria}', 'GlobalController@get_subCategoryDescription');






/*Routes perfil usuario*/

/* Obtener la informacion del usuario */
Route::get('get_perfil', 'LogedUserMethods@get_perfil');
/* Obtener  pujas del usuario */
Route::get('get_pujas', 'LogedUserMethods@get_pujas');
/* Obtener  ventas del usuario */
Route::get('get_ventas', 'LogedUserMethods@get_ventas');
/* Obtener  valoraciones del usuario */
Route::get('get_valoraciones', 'LogedUserMethods@get_valoraciones');
/* Obtener  subastas del usuario */
Route::get('get_subastas', 'LogedUserMethods@get_subastas');
// subastas inactivas
Route::get('get_subastasI', 'LogedUserMethods@get_subastasI');
/* Obtener  pujas_automatica del usuario */
Route::get('get_confPuj', 'LogedUserMethods@get_confPuj');
/* Obtener  compras del usuario */
Route::get('get_compras', 'LogedUserMethods@get_compras');
//form editar perfil 
//Route::get('formEditar', 'LogedUserMethods@formEditar');
//editar perfil  editarP()  
Route::get('guardarCambios', 'LogedUserMethods@guardarCambios');
Route::get('guardarCambiosPass', 'LogedUserMethods@guardarCambiosPass');


// Admin methods

Route::get('checkPermisos', 'LogedAdminMethods@checkPermisos');
Route::get('getCategorias','LogedAdminMethods@getCategorias');
Route::get('getSubcategorias', 'LogedAdminMethods@getSubcategoriasCat');
