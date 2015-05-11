<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;

class GlobalController extends Controller {

	/*
	* GLOBAL
	*/
	public function __construct()
	{
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