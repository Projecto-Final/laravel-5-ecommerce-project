<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
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
		//try {
			$submitedArray = $request->all();

			$userId = Auth::id();

			$fecha_inicio = date('Y-m-d');

			$articulo = Articulo::create([
				'nombre_producto' => $submitedArray['nombre_producto'],
				'modelo' => $submitedArray['modelo'],
				'estado' => $submitedArray['estado'],
				'localizacion' => $submitedArray['localizacion'],
				'fecha_inicio' => $fecha_inicio,
				'fecha_final' => $submitedArray['fecha_final'],
				'precio_inicial' => $submitedArray['precio_inicial'],
				'subastador_id' => $userId,
				'comprador_id' => null,
				'subcategoria_id' => $submitedArray['subcategoria'],
				'incremento_precio' => $submitedArray['incremento_precio'],
				'puja_mayor' => $submitedArray['precio_inicial'],
				'comprador_id' => null,

				]);

			


			if(isset($submitedArray['img_0'])){
				$img_extension = $submitedArray['img_0']->getClientOriginalExtension();
				$img_name = date("y-m-d-H-i-s")."_".$articulo->id."_".$userId.".".$img_extension;
				$submitedArray['img_0']->move(public_path("images/subastas"),$img_name);
				$img = Imagen::create([
				'articulo_id' => $articulo->id,
				'imagen' => $img_name,
				'descripcion' => "blabla",
				]);
			}
			if(isset($submitedArray['img_1'])){
				$img_extension = $submitedArray['img_1']->getClientOriginalExtension();
				$img_name = date("y-m-d-H-i-s")."_".$articulo->id."_".$userId.".".$img_extension;
				$submitedArray['img_1']->move(public_path("images/subastas"),$img_name);
				$img = Imagen::create([
				'articulo_id' => $articulo->id,
				'imagen' => $img_name,
				'descripcion' => "blabla",
				]);
			}
			if(isset($submitedArray['img_2'])){
				$img_extension = $submitedArray['img_2']->getClientOriginalExtension();
				$img_name = date("y-m-d-H-i-s")."_".$articulo->id."_".$userId.".".$img_extension;
				$submitedArray['img_2']->move(public_path("images/subastas"),$img_name);
				$img = Imagen::create([
				'articulo_id' => $articulo->id,
				'imagen' => $img_name,
				'descripcion' => "blabla",
				]);
			}
			if(isset($submitedArray['img_3'])){
				$img_extension = $submitedArray['img_3']->getClientOriginalExtension();
				$img_name = date("y-m-d-H-i-s")."_".$articulo->id."_".$userId.".".$img_extension;
				$submitedArray['img_3']->move(public_path("images/subastas"),$img_name);
				$img = Imagen::create([
				'articulo_id' => $articulo->id,
				'imagen' => $img_name,
				'descripcion' => "blabla",
				]);
			}
			if(isset($submitedArray['img_4'])){
				$img_extension = $submitedArray['img_4']->getClientOriginalExtension();
				$img_name = date("y-m-d-H-i-s")."_".$articulo->id."_".$userId.".".$img_extension;
				$submitedArray['img_4']->move(public_path("images/subastas"),$img_name);
				$img = Imagen::create([
				'articulo_id' => $articulo->id,
				'imagen' => $img_name,
				'descripcion' => "blabla",
				]);
			}
			if(isset($submitedArray['img_5'])){
				$img_extension = $submitedArray['img_5']->getClientOriginalExtension();
				$img_name = date("y-m-d-H-i-s")."_".$articulo->id."_".$userId.".".$img_extension;
				$submitedArray['img_5']->move(public_path("images/subastas"),$img_name);
				$img = Imagen::create([
				'articulo_id' => $articulo->id,
				'imagen' => $img_name,
				'descripcion' => "blabla",
				]);
			}

			
			//return view("index");

		//} catch(\Illuminate\Database\QueryException $e) {
		//	return view("home");
		//}
		
	}





	/* Methods perfil de usuario*/

	/*Obtener usuario de la sesion iniciada */
	public function get_perfil()
	{			
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		return $user;
	}

	/*Obtener pujas del usuario */

	public function get_pujas(){
		$id = Auth::user()->id;
		$pujas[0] = Usuario::find($id)->pujas;
		for ($i=0; $i < count($pujas[0]); $i++) { 
			$pujas[1][$i] = $pujas[0][$i]->articulo;
		}
		return $pujas;
	}

	/*Obtener ventas del usuario */

	public function get_ventas(){
		$id = Auth::user()->id;
		$ventas = DB::table('articulos')->where('comprador_id', '!=', 0)->Where ('subastador_id','=',$id)->get();
		return $ventas;
	}

	// /*Obtener subastas del usuario */

	public function get_subastas(){
		$id = Auth::user()->id;
		$subastas = DB::table('articulos')->where('comprador_id', '=', 0)->Where ('subastador_id','=',$id)->get();		
		return $subastas;
	}

	// /*Obtener pujas automaticas del usuario */

	// public function get_pujasAuto(){
	// 	$id = Auth::user()->id;
	// 	$pujas = Usuario::find($id)->pujas;
	// 	return $pujas;
	// }
}
