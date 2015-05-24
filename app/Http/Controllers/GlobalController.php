<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use Input;
use App\Imagen;
use Session;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Empresa;

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


$propietario=false;
//si esta logueado
if (Auth::check())//hay que añadir el ACTIVO
{   
	
	$logueado = true;
	$user_id = Auth::user()->id;
	$user = Usuario::find($user_id);
	if($user_id==$idArticulo){
		$propietario=true;
	}else{
		$propietario=false;
	}
}else{
	$logueado = false;
}

//si el usuario es el propietario o el admin



$aux = $articulo->pujas;
$subastador = Usuario::find($articulo['subastador_id']);
$pujas = count($aux);
$imagenes = $articulo->imagenes; 
$subcategoria = $articulo->subcategoria; 
$categoria = $subcategoria->categoria;

//diversificacion de ruta entre usuario y propietario
if($propietario){

	$empresa = Empresa::find(1)->get();


	$tiempo_pro = $empresa[0]->tiempoPorrogaArticulo;
	$precio_pro = $empresa[0]->precioPorroga;
	return response()->view("subastador", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria, "logueado"=>$logueado, "tiempo_pro"=>$tiempo_pro,"precio_pro"=>$precio_pro]);

}else{
	return response()->view("pujable", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria, "logueado"=>$logueado]);
}





}





public function buscar_subastas(Request $request)
{

	// Declaramos variables
	$urlParams=$request->all(); /* INPUT DATA */
	$consulta = ""; /* QUERY STRING */
	$buscar = ""; /* NOMBRE ARTICULO */
	$pminquery = ""; /* Query PrecioMIN */
	$pmaxquery = ""; /* Query PrecioMAX */

	$resultadoBusqueda = []; /* SE ENVIAN LOS DATOS A LA VIEW MEDIANTE ARRAY*/


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

				foreach ($query as $key2 => $art) {
					$resultadoBusqueda[$key][$key2] = $art;
				}
			}
		}

	}
	return view("resultado_busqueda", ["resultadoBusqueda" =>$resultadoBusqueda] );
}

// Funciones para ver el perfil de otro usuario
//muestra las subasta que tiene
public function get_subastas($id){
	$direccion = url('/images/subastas/');
	$subastas[0] = Usuario::find($id)->articulos()->where('precio_venta','=', -1)->get();
	for ($i=0; $i < count($subastas[0]); $i++) { 
		$subastas[1][$i] = $direccion.'/'.$subastas[0][$i]->imagenes[0]->imagen;
	}
	return $subastas;
}

// muestra las valoraciones 
public function get_valoraciones($id){	
	$direccion = url('/images/subastas/');
	$user = Usuario::find($id);
	$val[0] = $user->valVenta;
	$j = 0;
	for ($i=0; $i < count($val[0]); $i++) { 
		if($val[0][$i]->completada == 1){
			$val[1][$j] = $val[0][$i]->validante->username;
			$art = Articulo::find($val[0][$i]->articulo_id);
			$val[2][$j] = $direccion.'/'.$art->imagenes[0]->imagen;
			$val[3][$j] = $art;
			$j++;
		}else{}
	}
	return $val;
}
// informacion del perfil usuario
public function get_perfil($id)
{			
	$user = Usuario::find($id);
	return view('perfil',['user' => $user]);
}

public function get_ventas(Request $request){
	$submitedArray = $request->all();
	var_dump($submitedArray);
	$direccion = url('/images/subastas/');
	$ventas[0] = Usuario::find($submitedArray['id'])->ventas()->where('precio_venta','>', -1)->get();
	for ($i=0; $i < count($ventas[0]); $i++) { 
		$ventas[1][$i] = $direccion.'/'.$ventas[0][$i]->imagenes[0]->imagen;
	}
	var_dump($ventas);
	return $ventas;
}

}

