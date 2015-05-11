<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use Session;
use Auth;
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
		$submitedArray = $request->all();

		$userId = Auth::id();

		$fecha_inicio = date('Y-m-d');

		print_r("modelo PRODUCTO = ".$submitedArray['modelo']."<BR>");
		print_r("NOMBRE PRODUCTO = ".$submitedArray['nombre_producto']."<BR>");
		print_r("localizacion PRODUCTO = ".$submitedArray['localizacion']."<BR>");
		print_r("estado PRODUCTO = ".$submitedArray['estado']."<BR>");
		print_r("descripcion PRODUCTO = ".$submitedArray['descripcion']."<BR>");
		print_r("subcategoria PRODUCTO = ".$submitedArray['subcategoria']."<BR>");
		print_r("precio_inicial PRODUCTO = ".$submitedArray['precio_inicial']."<BR>");
		print_r("incremento_precio PRODUCTO = ".$submitedArray['incremento_precio']."<BR>");
		print_r("fecha_final PRODUCTO = ".$submitedArray['fecha_final']."<BR>");

		$articulo = Articulo::create([
			'nombre_producto' => $submitedArray['nombre_producto'],
			'modelo' => $submitedArray['modelo'],
			'estado' => $submitedArray['estado'],
			'localizacion' => $submitedArray['localizacion'],
			'fecha_inicio' => $fecha_inicio,
			'fecha_final' => $submitedArray['fecha_final'],
			'precio_inicial' => $submitedArray['precio_inicial'],
			'subastador_id' => $userId,
			'subcategoria_id' => $submitedArray['subcategoria'],
			'incremento_precio' => $submitedArray['incremento_precio'],

			]);

		$articulo::save();

		
		
		echo "<BR>USERID = ".$userId;
	}

}
