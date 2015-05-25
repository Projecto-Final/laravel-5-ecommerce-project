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

// Route::get('home', 'GlobalController@index');

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

Route::get('contacto', function()
{
	return view('contacto');
});

Route::get('politica', function()
{
	return view('politica');
});

Route::get('nosotros', function()
{
	return view('nosotros');
});

// Route::get('dashboard', function()
// {
// 	return view('dashboard');
// });

Route::get('iniciar_sesion', function()
{
	return view('iniciar_sesion');
});

// LAS PUTAS MIERDAS DE ADMIN
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{

	// ADMIN CP ACCESS
	Route::get('administracion', 'LogedAdminMethods@index');

	// Admin views
	Route::get('administracion/estadisticas', 'LogedAdminMethods@estadisticas');

	// Subastas
	Route::get('administracion/subastas', 'LogedAdminMethods@subastas');
	Route::get('administracion/subastas/editar/{idSubasta}', 'LogedAdminMethods@editar_subasta');
	Route::put('administracion/subastas/editar/{idSubasta}', 'LogedAdminMethods@guardar_subasta');
	Route::get('administracion/subastas/pujas/{idSubasta}', 'LogedAdminMethods@get_pujasEnSubasta');
	Route::get('administracion/subastas/eliminar/{idSubasta}', 'LogedAdminMethods@eliminar_subasta');

	// Media ( Imágenes)
	Route::get('administracion/media', 'LogedAdminMethods@media');
	Route::get('administracion/media/eliminar/{idImagen}', 'LogedAdminMethods@eliminar_media');

	// Usuarios
	Route::get('administracion/usuarios', 'LogedAdminMethods@usuarios');
	Route::get('administracion/usuarios/editar/{idUsuario}', 'LogedAdminMethods@editar_usuario');
	Route::put('administracion/usuarios/editar/{idUsuario}', 'LogedAdminMethods@guardar_usuario');
	Route::get('administracion/usuarios/eliminar/{idUsuario}', 'LogedAdminMethods@eliminar_usuario');

	// Categorías
	Route::get('administracion/categorias', 'LogedAdminMethods@categorias');
	Route::get('administracion/categorias/editar/{idCategoria}', 'LogedAdminMethods@editar_categoria');
	Route::put('administracion/categorias/editar/{idCategoria}', 'LogedAdminMethods@guardar_categoria');
	Route::get('administracion/categorias/eliminar/{idCategoria}', 'LogedAdminMethods@eliminar_categoria');

	// SubCategorias
	Route::get('administracion/subcategorias', 'LogedAdminMethods@subcategorias');
	Route::get('administracion/subcategorias/editar/{idSubcategoria}', 'LogedAdminMethods@editar_subcategoria');
	Route::put('administracion/subcategorias/editar/{idSubcategoria}', 'LogedAdminMethods@guardar_subcategoria');
	Route::get('administracion/subcategorias/eliminar/{idSubcategoria}', 'LogedAdminMethods@eliminar_subcategoria');
	
	// Configuracion Empresa/Pagina
	Route::get('administracion/configuracion', 'LogedAdminMethods@configuracion');
	// Limpiar cache ( si hay )
	Route::get('administracion/limpiar_cache', 'LogedAdminMethods@limpiar_cache');
	
	// Admin methods
	Route::get('checkPermisos', 'LogedAdminMethods@checkPermisos');
	Route::get('getCategorias','LogedAdminMethods@getCategorias');
	Route::get('getSubcategorias', 'LogedAdminMethods@getSubcategoriasCat');

});


// RUTAS GLOBALES ( AUTH/GUEST )
Route::get('get_allCategories', 'GlobalController@get_allCategories');

Route::get('subasta/{idSubasta}', 'GlobalController@get_selectedSubasta');
//comprueva si tiene confpuja superadas y avisa
Route::get('confPujaSuperada', 'GlobalController@confPujaSuperada');


/* BUSCAR MEDIANTE FILTRO */
Route::put('buscar', 'GlobalController@buscar_subastas');

// RUTAS USUARIOS AUTENTIFICADOS ( AUTH )

Route::get('crear_subasta', 'LogedUserMethods@form_subasta');
Route::put('add_subasta', 'LogedUserMethods@add_subasta');


/* Llama al metodo para pujar por un articulo */

Route::get('add_puja', 'LogedUserMethods@add_puja'); 
//RECARGA los datos de precio de la subasta
Route::get('cargar_precio', 'LogedUserMethods@cargar_precio'); 

//RECARGA los datos de precio de la subasta Guest mode
Route::get('cargar_precioGuest', 'GuestUserMethods@cargar_precioGuest');

//crea una configuracion de pujas
Route::get('crearConfPuja', 'LogedUserMethods@crearConfPuja');

//cambia la configuracion de las pujas
Route::get('cambiarConf', 'LogedUserMethods@cambiarConf');

//cancela una configuracion
Route::get('cancelarConf', 'LogedUserMethods@cancelarConf');

//carga la  configuracion existente si la hay .... 
Route::get('cargarPujaAut', 'LogedUserMethods@cargarPujaAut');

//carga las pujas generadas por ella si las hay...
Route::get('pujasAutom', 'LogedUserMethods@pujasAutom');

//carga la ultima puja del usuario e esa subasta
Route::get('ultimaPuja', 'LogedUserMethods@ultimaPuja');

//carga todasPujas logued user
Route::get('todasPujas', 'GlobalController@todasPujas');

//comprueva estado subasta vendido etc
Route::get('comprovarEstado', 'LogedUserMethods@comprovarEstado');
// lo mismo
Route::get('comprovarEstadoGuest', 'GuestUserMethods@comprovarEstadoGuest');

Route::get('aceptarUltimaP', 'LogedUserMethods@aceptarUltimaP');


Route::get('prorrogar', 'LogedUserMethods@prorrogar');


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
Route::get('usuario/get_perfil', 'LogedUserMethods@get_perfil');
/* Obtener  pujas del usuario */
Route::get('usuario/get_pujas', 'LogedUserMethods@get_pujas');
/* Obtener  ventas del usuario */
Route::get('usuario/get_ventas', 'LogedUserMethods@get_ventas');
/* Obtener  valoraciones del usuario */
Route::get('usuario/get_valoraciones', 'LogedUserMethods@get_valoraciones');
Route::get('usuario/get_valoracionesPendientes', 'LogedUserMethods@get_valoracionesPendientes');

/* Obtener  subastas del usuario */
Route::get('usuario/get_subastas', 'LogedUserMethods@get_subastas');
// subastas inactivas
Route::get('usuario/get_subastasI', 'LogedUserMethods@get_subastasI');
/* Obtener  pujas_automatica del usuario */
Route::get('usuario/get_confPuj', 'LogedUserMethods@get_confPuj');
/* Obtener  compras del usuario */
Route::get('usuario/get_compras', 'LogedUserMethods@get_compras');
//form editar perfil 
//Route::get('formEditar', 'LogedUserMethods@formEditar');
//editar perfil  editarP()  
//cambiar datos del perfil
Route::get('usuario/guardarCambios', 'LogedUserMethods@guardarCambios');
// cambiar contraseña
Route::get('usuario/guardarCambiosPass', 'LogedUserMethods@guardarCambiosPass');
// cambiar aparencia del perfil de usuario
Route::put('usuario/fotoPerfil', 'LogedUserMethods@save_photo_perfil');
Route::put('usuario/fotoPortada', 'LogedUserMethods@save_photo_portada');
// ir a la valoracion con la id
Route::get('usuario/valoracion/{idValoracion}', 'LogedUserMethods@write_valoracion');
// ver la valoracion desde el valorado
Route::get('usuario/valorado/{idValoracion}', 'LogedUserMethods@view_valoracion');
//insert valoracion del producto
Route::put('update_valoracion', 'LogedUserMethods@updateValoracion');
// pop de valoraciones pendientes
Route::get('usuario/get_Pendientes', 'LogedUserMethods@get_Pendientes');

/////Others Perfil usuario

Route::get('perfil/{idUsuario}', 'GlobalController@perfil');
Route::get('subastas', 'GlobalController@subastas');
Route::get('valoraciones', 'GlobalController@valoraciones');
Route::get('ventas', 'GlobalController@ventas');
Route::get('coger_perfil', 'GlobalController@coger_perfil');
