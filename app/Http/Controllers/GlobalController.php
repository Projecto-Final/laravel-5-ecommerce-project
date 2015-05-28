<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Metodo_pago;
use App\Metodo_envio;
use Input;
use App\Imagen;
use Session;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Empresa;
use App\ConfiguracionPuja;
use App\Localidad;

class GlobalController extends Controller {

	/**
	 * Constructor vacio.
	 * 
	 * @return Response
	 */
	public function __construct()
	{
	}


	/**
	 * Obtiene todas las categorias de la DB, i las carga. 
	 *
	 * @param null
	 * @return Retorna las categorias en JSON.
	 */
	public function get_allCategories()
	{
		return $data = Categoria::all();
	}

	/**
	 * Obtiene todas las Subcategorias de la DB, i las carga. 
	 *
	 * @param null
	 * @return Retorna las Subcategorias en JSON.
	 */
	public function get_allSubCategories()
	{
		return $data = Subcategoria::all();
	}


	/**
	 * Obtiene todas las Localidades de la DB, i las carga. 
	 *
	 * @param null
	 * @return Retorna las Localidades en JSON.
	 */
	public function get_localidades()
	{		
		$data = Localidad::orderBy('nombre', 'asc')->get();
		return $data;
	}

	/**
	 * Obtiene todas las SubCategorias en una Categoria de la DB, i las carga. 
	 *
	 * @param IdCategoria
	 * @return Retorna las Subcategorias en X categoria en JSON.
	 */
	public function get_allSubCategoriesOnCategory($idCategoria)
	{
		$subCategorias = Categoria::find($idCategoria)->subcategorias;
		return $subCategorias;
	}

	/**
	 * Obtiene todas las SubCategorias en una Categoria de la DB, i las carga. 
	 *
	 * @param IdCategoria
	 * @return Retorna las Subcategorias en X categoria en JSON.
	 */
	public function get_subCategoryDescription($idSubCategoria)
	{
		$descr = Subcategoria::find($idSubCategoria)->descripcion;
		return $descr;
	}


	/**
	 * Peticion de la pagina de inicio.
	 *
	 * @param null
	 * @return Retorna la view INDEX, con los respectivos datos.
	 */
	public function index()
	{
		$this->get_baja();
		// Buscamos todos los Articulos  que tenemos ( si tenemos )
		$arrayArtImg = [];
		$Articulos = Articulo::where('precio_venta', '=', -1)->orderBy('fecha_inicio','DESC')->take(6)->get();
		$categorias = Categoria::all();
		foreach ($Articulos as $key => $Articulo) {
			$imagenes =  $Articulo->imagenes;
			foreach ($imagenes as $key2 => $imagen) {
				if($key2==0){
					$arrayArtImg[$key] = [$Articulo, $imagen['imagen']];
				}
			}
		}
		return view("index", ["subastas" =>$arrayArtImg, "categorias" => $categorias] );
	}


	
	/**
	 * Te indica si esta caducada o no la cuenta, en caso que si
	 * Cierra la sessión.
	 *
	 * @param null
	 * @return La vista de index.
	 */
	public function get_baja(){
		if(Auth::check()){
			if(Auth::user()->activa == 0){
				Auth::logout();
				return view('caducada');
			}
		}
	}




	/**
	 * Busca una subasta a peticion de esta, y retorna los datos.
	 * Si eres subastador, o pujador, el programa detectara y redireccionara
	 * a su pagina respectiva.
	 *
	 * @param $IdArticulo
	 * @return Retorna view mediante response de subasta o pujable.
	 */
	public function get_selectedSubasta($idArticulo)
	{
		$articulo = Articulo::find($idArticulo);


		$propietario=false;
		//si esta logueado
		//hay que añadir el ACTIVO
		if (Auth::check())
		{   

			$logueado = true;
			$user_id = Auth::user()->id;
			$user = Usuario::find($user_id);
			if($user_id==$articulo->subastador_id){
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
		$metodoEnv = $articulo->Metodo_envio;
		$metodoPa = $articulo->Metodo_pago;

		//diversificacion de ruta entre usuario y propietario
		if($propietario){
			$empresa = Empresa::find(1)->get();
			$tiempo_pro = $empresa[0]->tiempoPorrogaArticulo;
			$precio_pro = $empresa[0]->precioPorroga;
			return response()->view("subastador", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria, "logueado"=>$logueado, "tiempo_pro"=>$tiempo_pro,"precio_pro"=>$precio_pro, "metodoEnv"=>$metodoEnv ,"metodoPa" =>$metodoPa]);

		}else{
			return response()->view("pujable", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas, "subcategoria"=>$subcategoria, "categoria"=> $categoria, "logueado"=>$logueado, "metodoEnv"=>$metodoEnv ,"metodoPa" =>$metodoPa]);
		}
	}



	/**
	 * A peticion de una busqueda, segun los parametros, filtra los datos y retorna
	 * Una view con los resultados.
	 *
	 * @param $request Datos de busqueda
	 * @return view Monta vista con resultados
	 */
	public function buscar_subastas(Request $request)
	{

		// Declaramos variables
		$urlParams=$request->all(); /* INPUT DATA */
		$consulta = ""; /* QUERY STRING */
		$buscar = ""; /* NOMBRE ARTICULO */
		$pminquery = ""; /* Query PrecioMIN */
		$pmaxquery = ""; /* Query PrecioMAX */

		$resultadoBusqueda = []; /* SE ENVIAN LOS DATOS A LA VIEW MEDIANTE ARRAY*/

		if (isset($urlParams['filtrar_usuario'])) {
			if ($urlParams['buscar'] == ""){
				$users = Usuario::whereRaw("permisos = 0 and activa = 1")->get();
				return view('resultado_busqueda_usuario',['usuarios' => $users]);
			}else{
				$users = Usuario::whereRaw("username like '".$urlParams['buscar']."%' and permisos = 0 and activa = 1")->get();
				return view('resultado_busqueda_usuario',['usuarios' => $users]);
			} 
		}


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

					// Query de articulos no?
					foreach ($query as $key2 => $art) {
						$resultadoBusqueda[$key][0] = $art;
					}

				}

			}

		}
		return view("resultado_busqueda", ["resultadoBusqueda" =>$resultadoBusqueda] );
	}

	// Funciones para ver el perfil de otro usuario
	//muestra las subasta que tiene
	public function subastas(Request $request){
		$submitedArray = $request->all();	
		$direccion = url('/images/subastas/');
		$subastas[0] = Usuario::find($submitedArray['id'])->articulos()->where('precio_venta','=', -1)->get();
		if(count($subastas[0]) != 0){
			for ($i=0; $i < count($subastas[0]); $i++) { 
				if($subastas[0][$i]->imagenes[0]->imagen == ""){
					$subastas[1][$i] = $direccion.'/maroto.jpg';
				}else{
					$subastas[1][$i] = $direccion.'/'.$subastas[0][$i]->imagenes[0]->imagen;
				}
			}
		}
		return $subastas;
	}

	// muestra las valoraciones 
	public function valoraciones(Request $request){	
		$submitedArray = $request->all();
		$direccion = url('/images/subastas/');
		$user = Usuario::find($submitedArray['id']);
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
	public function perfil($id)
	{	
		if (Auth::check())
		{
			if(Auth::user()->id == $id){
				return redirect('usuario');
			}	else{	
				$user[0] = Usuario::find($id);
				$user[1] = $user[0]->localidad;
				return view('perfil',['user' => $user]);
			}
		}else{
			$user[0] = Usuario::find($id);
			$user[1] = $user[0]->localidad;
			return view('perfil',['user' => $user]);
		}		


	}

	public function coger_perfil(Request $request)
	{			

		$submitedArray = $request->all();
		$user[0] = Usuario::find($submitedArray['id']);
		$user[1] = $user[0]->localidad;
		return $user;
	}


	public function ventas(Request $request){
		$submitedArray = $request->all();
		$direccion = url('/images/subastas/');
		$ventas[0] = Usuario::find($submitedArray['id'])->ventas()->where('precio_venta','>', -1)->get();
		for ($i=0; $i < count($ventas[0]); $i++) { 
			$ventas[1][$i] = $direccion.'/'.$ventas[0][$i]->imagenes[0]->imagen;
		}
		return $ventas;
	}



	public function confPujaSuperada(){
		try {

			if (Auth::check())
			{   

				$logueado = true;
				$user_id = Auth::user()->id;
				$user = Usuario::find($user_id);
				$confPS = $user->configPujaSuperada($user_id);	
				if($confPS==false){
					return 0;

				}else{

					for ($i=0; $i < count($confPS); $i++) { 
						$currentConf = ConfiguracionPuja::find($confPS[$i]->id);
						$articulo[$i] = Articulo::find($confPS[$i]->articulo_id);
						$currentConf->avisado = 1;
						$currentConf->save();	

					}	

					return $articulo;
				}
			}else{
				return 0;
			}

		} catch (Exception $e) {
			return $e;
		}


	}

	/**
	 * Obtener la ultima puja en una subasta.
	 *
	 * @param $request Parametros de puja
	 * @return $ultimapuja Resultados de la ultima puja.
	 */
	public function ultimaPuja(Request $request){
		try {
			$submitedArray = $request->all();
			$articuloId = $submitedArray['id_subasta'];
			$userId = Auth::user()->id;
			$usuario = Usuario::find($userId);
			$ultimapuja=$usuario->ultimaPujaSubasta($articuloId);
			if($ultimapuja==false){
				return 0;
			}else{
				return $ultimapuja;
			}

		} catch (Exception $e) {

		}

	}

	/**
	 * Retorna todas las pujas a petición.
	 *
	 * @param $request Datos de la subasta.
	 * @return $data Array de todas las pujas de la subasta.
	 */
	public function todasPujas(Request $request){
		try {
			$submitedArray = $request->all();
			$articulo = Articulo::find($submitedArray['id_subasta']);
			$pujas = $articulo->pujas;


			for ($i=0; $i < count($pujas); $i++) {
				$data[0][$i] = $pujas[$i];
				$data[1][$i] = $pujas[$i]->usuario;
				$data[2][$i] = url('images/profiles/'.$pujas[$i]->usuario->imagen_perfil);
				$data[3][$i] = url('perfil/'.$pujas[$i]->usuario->id);
			}
			if(isset($data)){
				return $data;
			}else{
				return 0;
			}


		}catch (Exception $e) {
			return $e;

			if($pujas==null){
				return 0;
			}
			for ($i=0; $i < count($pujas); $i++) {
				$data[0][$i] = $pujas[$i];
				$data[1][$i] = $pujas[$i]->usuario;
				$data[2][$i] = url('images/profiles/'.$pujas[$i]->usuario->imagen_perfil);
				$data[3][$i] = url('perfil/'.$pujas[$i]->usuario->id);
			}
			return $data;

		}catch (Exception $e) {
			return $e;
		}
	}
	public function get_metodo_pago(){
		$data = Metodo_pago::all();
		return $data;
	}

	public function get_metodo_envio()
	{
		$data = Metodo_envio::all();
		return $data;
	}

}