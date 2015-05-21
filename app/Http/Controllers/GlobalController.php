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
	if($user_id==$articulo['subastador_id'] || $user['permisos']==1){


		$aux = $articulo->pujas;
		$subastador = Usuario::find($articulo['subastador_id']);
		$pujas = count($aux);
		$imagenes = $articulo->imagenes; 
		$subcategoria = $articulo->subcategoria; 
		$categoria = $subcategoria->categoria;

		$nume=0;


		return response()->view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria])
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


		return response()->view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria])
		->withInput()->with('message', Session::get('message'));
	}


}else{
	$aux = $articulo->pujas;
	$subastador = Usuario::find($articulo['subastador_id']);
	$pujas = count($aux);
	$imagenes = $articulo->imagenes;
	$subcategoria = $articulo->subcategoria; 
	$categoria = $subcategoria->categoria;

	$nume=0;
		//ultimas pujas y su usuario

<<<<<<< HEAD
	for ($i=$pujas-3; $i < $pujas; $i++) { 
		$nume++;
		$ultimasPujas[0][$nume] = $aux[$i];
		$ultimasPujas[1][$nume] = $aux[$i]->usuario;
	}

	return response()->view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria, "ultimasPujas"=>$ultimasPujas])
	->withInput()->with('message', Session::get('message'));
=======
		return response()->view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria])
		->withInput()->with('message', Session::get('message'));
>>>>>>> origin/master
}

}



public function buscar_subastas()
{

	// Declaramos variables
	$urlParams=Input::all(); /* INPUT DATA */
	$consulta = ""; /* QUERY STRING */
	$buscar = "";
	$pminquery = "";
	$pmaxquery = "";

	
	// Controlamos si hay algun parametro categoria.
	if (isset($urlParams['categoria'])) {

		// Si lo hay, controlamos si el valor es correcto, en caso contrario, no hace nada.
		if($urlParams['categoria']!="*" && is_numeric($urlParams['categoria'])){
			$consulta .= "categoria_id = ".$urlParams['categoria']." ";
		}
		
		// Controlamos que haya un parametro Subcategoria.
		if(isset($urlParams['subcategoria'])){

			// Si lo hay, se controla que el valor es correcto, en caso contrario, no hace nada.
			if($urlParams['subcategoria']!="*" && is_numeric($urlParams['subcategoria'])){
				$consulta .= "and id = ".$urlParams['subcategoria'];
			}

			// En caso que el String de consulta este bacio, se le introduce un 1, para que el where busque por todo.
			if($consulta==""){
				$consulta = "1";
			}

			// Obtenemos todas las subcategorias segun la consulta ( todas, o una, o ciertas csubcategorias, dentro de una categoria )
			$subcategorias = Subcategoria::whereRaw($consulta)->get();

			// Entramos en un bucle, para encontrar todos los articulos en dichas subcategorias.
			foreach ($subcategorias as $key => $scategoria) {

				// Comprobamos los parametros especificos del articulo
				// Si esta definido el precio ( maximo y minimo ) y es integer.
				if(isset($urlParams['pmin']) && isset($urlParams['pmax'])){

					if(is_numeric($urlParams['pmin'])){
						$pminquery = " and puja_mayor >= ".$urlParams['pmin'];
					}
					if(is_numeric($urlParams['pmax'])){
						$pmaxquery = " and puja_mayor <= ".$urlParams['pmax'];
					}
				}
				// Si esta definido el nombre de busqueda ( este vacio o no ).
				if(isset($urlParams['buscar'])){
					$buscar = $urlParams['buscar'];
				}

				$query = Articulo::whereRaw("subcategoria_id = ? and nombre_producto LIKE '%".$buscar."%' ".$pminquery."".$pmaxquery, array($scategoria['id']))->get();

				foreach ($query as $key => $art) {
					echo "<pre style='border:1px solid red;'>";
					echo "<h3>".$art["nombre_producto"]."</h3>";
					echo "<h3>".$art["modelo"]."</h3>";
					echo "<h3>".$art["puja_mayor"]."</h3>";
					echo "</pre>";
				}
			}
		}

	}

	

		//$article = $query->first();

	// if (isset($urlParams['categoria'])) {
	// 	echo "<h2>CATEGORIA = { ".$urlParams['categoria']." } </h2>";
	// 	$query = $query->where('categoria', '=', $urlParams['categoria']);

	// 	foreach ($query as $key => $scategoria) {
	// 		$arts = Articulo::where('subcategoria_id', '=', $scategoria['id'])
	// 		->where('nombre_producto', 'LIKE', '%'.$buscar.'%')
	// 		->get();
	// 		echo "<h1>RESULTADO BUSQUEDA - ".count($arts)."</h1>";
	// 		foreach ($arts as $key => $art) {
	// 			echo $art["nombre_producto"];
	// 		}
	// 		echo "</pre>";
	// 	}
	// }

	// if(isset($urlParams['subcategoria'])){
	// 	echo "<h2> SUBCATEGORIA = { ".$urlParams['subcategoria']." } </h2>";
	// }

	// $article = $query->first();

	// echo "<pre>";
	// echo "<h1>".count($articulosBusqueda)."</h1>";
	// print_r($articulosBusqueda);
	// foreach ($articulosBusqueda as $key => $article) {
	// 	echo  $article[0]['nombre_producto'];
	// }


	// echo "</pre>";





		//$urlParams=Input::all();
		//$buscar = $urlParams['buscar'];
		//echo "<h1>".$buscar."</h1>";
		//$categoria = $urlParams['categoria'];
		//echo "<pre>";
		//$subcat = Categoria::find(4)->subcategorias;
		//$subcat[0]->articulos(); 

		//var_dump($subcat[1]->articulos[0]['nombre_producto']);
		// foreach ($subcat as $key => $scategoria) {
		//  //echo $scategoria['id'];
		//  $arts = Articulo::where('subcategoria_id', '=', $scategoria['id'])
		//  ->where('nombre_producto', 'LIKE', '%'.$buscar.'%')
		//  ->get();
		//  echo "<h1>RESULTADO BUSQUEDA - ".count($arts)."</h1>";
		//  foreach ($arts as $key => $art) {
		//      echo $art["nombre_producto"];
		//  }
		//  echo "</pre>";
		// }
		// echo "</pre>";
}
}
