<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;

use Illuminate\Http\Request;

class LogedUserMethods extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Funciones de consultas para usuarios que han iniciado sesion.
	|--------------------------------------------------------------------------
	|
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * 
	 *
	 * @return Response
	 */
	public function get_registeredUsers()
	{
		return $data = Usuario::all();
	}

	/**
	 * OBTENER TODAS LAS CATEGORIAS
	 * 
	 * @return Response
	 */
	public function get_allCategories()
	{
		return $data = Categoria::all();
	}

	/**
	 * OBTENER TODAS LAS SUB-CATEGORIAS
	 * 
	 * @return Response
	 */
	public function get_allSubCategories()
	{
		return $data = Subcategoria::all();
	}

	/**
	 * OBTENER TODAS LAS SUB-CATEGORIAS enlazadas
	 * CON LA CATEGORIA SELECCIONADA.
	 * 
	 * @return Response
	 */
	public function get_allSubCategoriesOnCategory($idCategoria)
	{
		$subCategorias = Categoria::find($idCategoria)->subcategorias;
		return $subCategorias;
	}

	/**
	 * OBTENER DESCRIPCIÓN SUB-CATEGORIA SELECCIONADA
	 * 
	 * @return Response
	 */
	public function get_subCategoryDescription($idSubCategoria)
	{
		$descr = Subcategoria::find($idSubCategoria)->descripcion;
		return $descr;
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function form_subasta()
	{
		return view('form_subasta');
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function add_subasta(Request $request)
	{
		$input = $request->all();
		print_r($input);
	}

}
