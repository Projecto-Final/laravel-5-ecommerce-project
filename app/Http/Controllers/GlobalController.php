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
use Auth;

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

//DEFINIR AQUI DIVERSOS CAMINOS  
		// USUARIO SIN LOGUEAR
		//LOGUEADO
		//PROPIETARIO Y ADMIN 

//si esta logueado
if (Auth::check())//hay que añadir el ACTIVO
{
	$user_id = Auth::user()->id;
	$user = Usuario::find($user_id);

//si el usuario es el propietario o el admin
	if($user_id==$articulo['subastador_id']||$user['permisos']==1){


		$aux = $articulo->pujas;
		$subastador = Usuario::find($articulo['subastador_id']);
		$pujas = count($aux);
		$imagenes = $articulo->imagenes; 
		$subcategoria = $articulo->subcategoria; 
		$categoria = $subcategoria->categoria;

		$nume=0;
		//ultimas pujas y su usuario
		for ($i = $pujas-3; $i < $pujas; $i++) { 
			$nume++;
			$ultimasPujas[0][$nume] = $aux[$i];
			$ultimasPujas[1][$nume] = $aux[$i]->usuario;
		}


		return response()->view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria, "ultimasPujas"=>$ultimasPujas])
		->withInput()->with('message', Session::get('message'));
//si eres un usuario logueado
	}else{
		$aux = $articulo->pujas;
		$subastador = Usuario::find($articulo['subastador_id']);
		$pujas = count($aux);
		$imagenes = $articulo->imagenes;
		$subcategoria = $articulo->subcategoria; 
		$categoria = $subcategoria->categoria;

		$nume=0;
		//ultimas pujas y su usuario

		for ($i=$pujas-3; $i < $pujas; $i++) { 
			$nume++;
			$ultimasPujas[0][$nume] = $aux[$i];
			$ultimasPujas[1][$nume] = $aux[$i]->usuario;
		}

		return response()->view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria, "ultimasPujas"=>$ultimasPujas])
		->withInput()->with('message', Session::get('message'));
	}
	//si no estas logueado
}else{
	return response()->view("view_subasta", ["subasta" => $articulo , "imagenes" => $imagenes, "pujas"=> $pujas])
	->withInput()->with('message', Session::get('message'));
}




}


   /*     for ($i=0; $i < count($pujas[0]); $i++) {
			$pujas[1][$i] = $pujas[$i]->usuario;
		}*/
		//mostrar las 3 ultimas pujas por el articulo



		


		public function buscar_subastas()
		{

			$urlParams=Input::all();
		// Buscar por todo

		//$articulosBusqueda = Articulo::where('nombre_producto', 'LIKE', '%'.$urlParams['buscar'].'%')->get();

		// Buscamos articulo con X nombre.
		//$query = Articulo::where('nombre_producto', 'LIKE', '%'.$urlParams['buscar'].'%');

			echo "<h1>Buscar = { ".$urlParams['buscar']." }</h1>";
			$articulosBusqueda = Articulo::where('nombre_producto', 'LIKE', '%'.$urlParams['buscar'].'%')->get();

		// Buscamos articulo con X nombre.
			$query = Articulo::where('nombre_producto', 'LIKE', '%'.$urlParams['buscar'].'%');



echo "subcat es = ".$urlParams['subcategoria'];
		// Si indica categoria, busca por categoria

		if (isset($urlParams['categoria'])) {

			if(isset($urlParams['subcategoria'])){

				//$subcategorias = Categoria::find($urlParams['categoria'])->subcategorias;
				
				$subcategorias = Subcategoria::whereRaw("categoria_id = ? and id = ?", [$urlParams['categoria'],$urlParams['subcategoria']])->get();
				//var_dump($subcategorias[0]);
				foreach ($subcategorias as $key => $scategoria) {
					//$query = Articulo::whereRaw('subcategoria_id = '.$scategoria['id'].' and nombre_producto LIKE "%'.$urlParams['buscar'].'%" and puja_mayor > 0')->get();
					$query = Articulo::whereRaw("subcategoria_id = ? and nombre_producto LIKE '%".$urlParams['buscar']."%'", array($scategoria['id']))->get();
					//$arts = Articulo::where('subcategoria_id', '=', $scategoria['id'])
					//->where('nombre_producto', 'LIKE', '%'.$buscar.'%')
					//->get();
					// echo count($query);
					 foreach ($query as $key => $art) {
					 	echo $art["nombre_producto"];
					 }
				}
			}

		}

		if(isset($urlParams['categoria'])){
			echo "<h2> CATEGORIA = { ".$urlParams['categoria']." } </h2>";
		}
		if(isset($urlParams['subcategoria'])){
			echo "<h2> SUBCATEGORIA = { ".$urlParams['subcategoria']." } </h2>";
		}

		//$article = $query->first();

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
