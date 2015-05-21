<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
use App\Valoracion;
use App\ConfiguracionPuja;
use Session;
use Auth;
use Carbon\Carbon;
use App\Puja;
use Illuminate\Http\Request;
use DB;
use Input;
use Cache;

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

		try {

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
				'porrogado' => 0,
				'comprador_id' => null,
				]);
			echo "<pre>";

			foreach ($submitedArray['images'] as $posicion => $imagenASubir) {
				$img_extension = $imagenASubir->getClientOriginalExtension();
				$img_name = $posicion."_".$articulo->id."_".md5($userId).".".$img_extension;
				echo $imagenASubir;
				$imagenASubir->move(public_path("images/subastas"),$img_name);
				print_r($imagenASubir);

				//$upload_success = Input::file($imagenASubir)->move(public_path("images/subastas"), $img_name);
				$img = Imagen::create([
					'articulo_id' => $articulo->id,
					'imagen' => $img_name,
					'descripcion' => "blabla",
					]);
			}

			echo "</pre>";

			
			return redirect('subasta/'.$articulo->id)->withInput()->with('message', 'Tu subasta ha sido creada satisfactoriamente!');
			//return view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes] );


		} catch(ErrorException $e) {
			return view('index', ['notificacion_error' => 'La subasta contiene un error, por favor, comprueba que los']);
		}

		
	}





	/* Methods perfil de usuario*/

	/*Obtener usuario de la sesion iniciada */
	public function get_perfil()
	{			
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		return $user;
	}

	// /*Obtener pujas del usuario */

	public function get_pujas(){
		$id = Auth::user()->id;
		$pujas[0] = Usuario::find($id)->pujas;
		for ($i=0; $i < count($pujas[0]); $i++) { 
			$pujas[1][$i] = $pujas[0][$i]->articulo;
			$pujas[2][$i] = $pujas[0][$i]->articulo->imagenes;
			$pujas[3][$i] = $pujas[0][$i]->autoPuja;
		}
		return $pujas;
	}



	/*Obtener ventas del usuario */

	public function get_ventas(){
		$id = Auth::user()->id;
		$ventas = DB::table('articulos')->where('comprador_id', '!=', 0)->where ('precio_venta','!=',-1)->where('subastador_id','=',$id)->get();// ventas
		return $ventas;
	}

	/*Obtener compras del usuario */

	public function get_compras(){
		$id = Auth::user()->id;
		$compras = DB::table('articulos')->where('comprador_id', '!=', 0)->where ('precio_venta','!=',-1)->where('comprador_id','=',$id)->get();// ventas
		return $compras;
	}

	// /*Obtener subastas del usuario */

	public function get_subastas(){
		$id = Auth::user()->id;
		$subastas[0] = DB::table('articulos')->where('precio_venta', '=', -1)->where ('subastador_id','=',$id)->get();//no ha vendido aun
		//$subastas[1] = DB::table('articulos')->where('precio_venta', '=', 0)->where ('subastador_id','=',$id)->get(); // puja inactiva CONFIRMED
		return $subastas;
	}
	//Obtener subastas inactivas
	public function get_subastasI(){
		$id = Auth::user()->id;
		$subastas = DB::table('articulos')->where('precio_venta', '!=', -1)->where ('subastador_id','=',$id)->get(); // puja inactiva CONFIRMED
		return $subastas;
	}


	// /*Obtener pujas automaticas del usuario */


	public function get_valoraciones(){	
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$val[0] = $user->valVenta;
		for ($i=0; $i < count($val[0]); $i++) { 
			$val[1][$i] = $val[0][$i]->validante->username;
		}
		return $val;
	}

	public function get_confPuj()
	{			
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$con[0] =$user->confPujas;
		for ($i=0; $i < count($con[0]); $i++) { 
			$con[1][$i] = $con[0][$i]->articulo;
			$con[2][$i] = $con[0][$i]->articulo->imagenes;
		}
		return $con;
	}

	public function guardarCambios(Request $request)
	{
		$submitedArray = $request->all();
		$user = Auth::user();
		$user->nombre = $submitedArray["nombre"];
		$user->apellido = $submitedArray["apellidos"];
		$user->username = $submitedArray["username"];
		$user->direccion = $submitedArray["direccion"];
		$user->email = $submitedArray["email"];
		$user->save();
	}

	public function guardarCambiosPass(Request $request)
	{
		$submitedArray = $request->all();
		$user = Auth::user();
		$user->nombre = $submitedArray["nombre"];
		$user->apellido = $submitedArray["apellidos"];
		$user->username = $submitedArray["username"];
		if (!empty($submitedArray["password"])) {
			if ($submitedArray["password_confirmation"] == $submitedArray["password"]) {
				$user->password = bcrypt($submitedArray["password"]);
			}
		}
		$user->direccion = $submitedArray["direccion"];
		$user->email = $submitedArray["email"];
		$user->save();
	}

//Esta funcion añade la puja en la BD pasandole la id de la subasta 
	//usa array para devolver tambien el numero de pujas de este articulo
	public function add_puja(Request $request)
	{

		$submitedArray = $request->all();
		$articulo = Articulo::find($submitedArray['id_puja']);
		$articulo->puja_mayor = $articulo->puja_mayor + $articulo->incremento_precio;
		$articulo->save();
		$pujas = Puja::whereRaw('articulo_id = ? and superada = false', [$articulo->id])->update(['superada' => true]);
		$puja = Puja::create([
			'cantidad' => $articulo->puja_mayor,
			'superada' => 0,
			'confpuja_id' => null,
			'articulo_id' => $articulo->id,
			'pujador_id' => Auth::user()->id,
			'fecha_puja' => Carbon::now()
			]);
		
		//AQUI HAY K MIRAR SI HAY ALGUNA CONF PUJAS DE LA SUBASTA
		comprovarCF($articulo);

		return $articulo;
	}

//sirve para recargar los valores de precios de la subasta
	public function	cargar_precio(Request $request){
		$submitedArray = $request->all();
		$articulo[0] = Articulo::find($submitedArray['id_subasta']);
		$pujas = $articulo[0]->pujas;
		$articulo[1] = count($pujas);
		//sacar la puja maxima
		for ($i=0; $i < $articulo[1]; $i++) {

			if($pujas[$i]['superada']==0){
				$articulo[2]=$pujas[$i];
			}
		}
		$articulo[3] = Auth::user()->id;
		

		return $articulo;
	}

	public function crearConfPuja(Request $request){
		$submitedArray = $request->all();

		$articuloId = $submitedArray['id_subasta'];
		$articulo = Articulo::find($articuloId);		
		
		$pujaMax = $submitedArray['puja_max'];

		$confPuja = ConfiguracionPuja::create([
			'puja_maxima' => $pujaMax,
			'articulo_id' => $articuloId,
			'usuario_id' => Auth::user()->id,
			'superada' => 0,
			'fecha_config' => Carbon::now()
			]);

		$this->comprovarCF($articulo);
	}


	public function comprovarCF($articulo){
		$confPujas=$articulo->Confpujas;

		for ($i=0; $i < count($confPujas); $i++) { 
			if($confPujas[$i]['superada'] == 1 && $confPujas[$i]['superada']){
				
			}

		}


	$puja = Puja::create([
		'cantidad' => $articulo->puja_mayor,
		'superada' => 0,
		'confpuja_id' => null,
		'articulo_id' => $articulo->id,
		'pujador_id' => Auth::user()->id,
		'fecha_puja' => Carbon::now()
		]);

}



}
