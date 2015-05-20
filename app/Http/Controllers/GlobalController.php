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
		// Buscar por todo
		echo "<h1>Buscar = { ".$urlParams['buscar']." }</h1>";
		$articulosBusqueda = Articulo::where('nombre_producto', 'LIKE', '%'.$urlParams['buscar'].'%')->get();

		// Buscamos articulo con X nombre.
		$query = Articulo::where('nombre_producto', 'LIKE', '%'.$urlParams['buscar'].'%');


		// Si indica categoria, busca por categoria
		if (isset($urlParams['categoria'])) {
			echo "<h2>CATEGORIA = { ".$urlParams['categoria']." } </h2>";
			$query = $query->where('categoria', '=', $urlParams['categoria']);

			foreach ($query as $key => $scategoria) {
			$arts = Articulo::where('subcategoria_id', '=', $scategoria['id'])
			->where('nombre_producto', 'LIKE', '%'.$buscar.'%')
			->get();
			echo "<h1>RESULTADO BUSQUEDA - ".count($arts)."</h1>";
			foreach ($arts as $key => $art) {
				echo $art["nombre_producto"];
			}
			echo "</pre>";
		}
		}

		if(isset($urlParams['subcategoria'])){
			echo "<h2> SUBCATEGORIA = { ".$urlParams['subcategoria']." } </h2>";
		}

		$article = $query->first();

		echo "<pre>";
		echo "<h1>".count($articulosBusqueda)."</h1>";
		print_r($articulosBusqueda);
		foreach ($articulosBusqueda as $key => $article) {
			echo  $article[0]['nombre_producto'];
		}


		echo "</pre>";

		

		
		//$urlParams=Input::all();
		//$buscar = $urlParams['buscar'];
		//echo "<h1>".$buscar."</h1>";
		//$categoria = $urlParams['categoria'];
		//echo "<pre>";
		//$subcat = Categoria::find(4)->subcategorias;
		//$subcat[0]->articulos(); 

		//var_dump($subcat[1]->articulos[0]['nombre_producto']);
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
		// echo "</pre>";
	}
}