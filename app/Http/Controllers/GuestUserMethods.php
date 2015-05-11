<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;

class GuestUserMethods extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Funciones para testear
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
		$this->middleware('guest');
	}


	/**
	 * 
	 *
	 * @return Response
	 */
	public function get_allCategories()
	{
		return $data = Categoria::all();
	}



}
