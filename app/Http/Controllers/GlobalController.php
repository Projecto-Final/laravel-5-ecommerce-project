<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use Input;
use App\Imagen;
use Request;
use Session;
use DB;

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

	 /**
	 * Envia la info al index, y lo muestra.
	 *
	 * @return Response
	 */
	 public function index()
	 {
		// Buscamos todos los Articulos  que tenemos ( si tenemos )
	 	$arrayArtImg = [];
	 	$Articulos = Articulo::all();
	 	foreach ($Articulos as $key => $Articulo) {
	 		$imagenes =  $Articulo->imagenes;
	 		foreach ($imagenes as $key2 => $imagen) {
	 			if($key2==0){
	 				$arrayArtImg[$key] = [$Articulo, $imagen['imagen']];
	 			}
	 		}
	 	}
	 	return view("index", ["subastas" =>$arrayArtImg] );
	 }



	/**
	* 
	* @return Response
	*/
	public function get_selectedSubasta($idArticulo)
	{
		$articulo = Articulo::find($idArticulo);


		
		$aux = $articulo->pujas;

		$pujas = count($aux);

   /*     for ($i=0; $i < count($pujas[0]); $i++) {
			$pujas[1][$i] = $pujas[$i]->usuario;
		}*/
		//mostrar las 3 ultimas pujas por el articulo


		$subastador = Usuario::find($articulo['subastador_id']);
		$imagenes = $articulo->imagenes;
		
		return response()->view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas])
		->withInput()->with('message', Session::get('message'));
	}

	public function buscar_subastas()
	{
		$urlParams=Input::all();
		$buscar = $urlParams['buscar'];
		echo "<h1>".$buscar."</h1>";
		$categoria = $urlParams['categoria'];
		echo "<pre>";
		$subcat = Categoria::find(4)->subcategorias;
		//$subcat[0]->articulos(); 

		var_dump($subcat[1]->articulos[0]['nombre_producto']);
		// foreach ($subcat as $key => $scategoria) {
		// 	//echo $scategoria['id'];
		// 	$arts = Articulo::where('subcategoria_id', '=', $scategoria['id'])
		// 	->where('nombre_producto', 'LIKE', '%'.$buscar.'%')
		// 	->get();
		// 	echo "<h1>RESULTADO BUSQUEDA - ".count($arts)."</h1>";
		// 	foreach ($arts as $key => $art) {
		// 		echo $art["nombre_producto"];
		// 	}
		// 	echo "</pre>";
		// }
		echo "</pre>";
	}
}