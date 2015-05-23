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

	public function get_valoracionesPendientes(){	
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$val[0] = $user->valCompra;
		for ($i=0; $i < count($val[0]); $i++) {
			if($val[0][$i]->completada == 0){
				$val[1][$i] = $val[0][$i]->valorado->username;
				$val[2][$i] = $val[0][$i]->articulo->nombre;
			}  
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
		$credentials = ['password' => $submitedArray["password_old"]];
		$submitedArray["password_confirmation"];
		if(Auth::validate($credentials)){
			if ($submitedArray["password_confirmation"] == $submitedArray["password"]) {
				$user->password = bcrypt($submitedArray["password"]);
				$user->save();
			}
		}else{
			return view('index');
		}
		
	}


	public function save_photo_perfil(Request $request){

		$submitedArray = $request->all();
		$user = Auth::user();

		$imgName = $submitedArray['img_perfil'];
		$img_extension = $submitedArray['img_perfil']->getClientOriginalExtension();
		$img_name = md5($user->id)."_".$user->nombre.".".$img_extension;
		$imgName->move(public_path("images/profiles"),$img_name);
		$user->imagen_perfil=$img_name;
		$user->save();

		return redirect('usuario');
	}

	public function save_photo_portada(Request $request){

		try {

			$submitedArray = $request->all();
			$user = Auth::user();

			$imgName = $submitedArray['img_portada'];
			$img_extension = $submitedArray['img_portada']->getClientOriginalExtension();
			$img_name = md5($user->id)."_".$user->nombre.".".$img_extension;
			$imgName->move(public_path("images/profiles_wallpapers"),$img_name);
			$user->imagen_background=$img_name;
			$user->save();

			return redirect('usuario');
			
		} catch (Exception $e) {
			return $e;
		}

	}


//Esta funcion añade la puja en la BD pasandole la id de la subasta 
	//usa array para devolver tambien el numero de pujas de este articulo
	public function add_puja(Request $request)
	{
		try {

			$submitedArray = $request->all();
			$articulo = Articulo::find($submitedArray['id_subasta']);
			$ultimaP = $articulo->ultimaPuja($submitedArray['id_subasta']);
			if($ultimaP!=false){
				if($ultimaP->pujador_id == Auth::user()->id){
					return "Ya Pujaste";
				}
			}

			$precioMostrado = $submitedArray['puja_mayor'];
			if($precioMostrado==$articulo->puja_mayor){
				$pujaAut = null;
				$idPujador = Auth::user()->id;
				$this->engendrar_puja($articulo,$pujaAut,$idPujador);
			}else{
				return "Error";
			}

		} catch (Exception $e) {
			return $e;
		}

		
	}

	public function engendrar_puja($articulo,$pujaAut,$idPujador){
		try {

			$articulo->puja_mayor = $articulo->puja_mayor + $articulo->incremento_precio;
			$articulo->save();
			$pujas = Puja::whereRaw('articulo_id = ? and superada = false', [$articulo->id])->update(['superada' => true]);
			$puja = Puja::create([
				'cantidad' => $articulo->puja_mayor,
				'superada' => 0,
				'confpuja_id' => $pujaAut,
				'articulo_id' => $articulo->id,
				'pujador_id' => $idPujador,
				'fecha_puja' => Carbon::now()
				]);	
			$user = Usuario::find($idPujador);	
			$user->touch();

		//AQUI HAY K MIRAR SI HAY ALGUNA CONF PUJAS DE LA SUBASTA
			$this->comprovarCF($articulo->id);

			return $articulo;
		} catch (Exception $e) {
			return $e;
		}
	}



	public function crearConfPuja(Request $request){
		try {
			

			$submitedArray = $request->all();
			$userId = Auth::user()->id;
			$usuario = Usuario::find($userId);
			$articuloId = $submitedArray['id_subasta'];
			$articulo = Articulo::find($articuloId);
			$confPuj = $usuario->confPujasSubasta($articuloId);
			if($confPuj!=false){
				return "false";
			}	

			$pujaMax = $submitedArray['puja_max'];

			$confPuja = ConfiguracionPuja::create([
				'puja_maxima' => $pujaMax,
				'articulo_id' => $articuloId,
				'usuario_id' => Auth::user()->id,
				'superada' => 0,
				'fecha_config' => Carbon::now()
				]);

			$this->comprovarCF($articuloId);

		} catch (Exception $e) {
			return $e;
		}
	}

//compreva las COnf Pujas de esa subasta y las ejecuta si es preciso en orden de creacion
	public function comprovarCF($articuloId){
		try {

			$articulo = Articulo::find($articuloId);
			$confPujas = $articulo->Confpujas;




			for ($i=0; $i < count($confPujas); $i++) { 


				$ulPuja=$articulo->ultimaPuja($articuloId);

				if($ulPuja == false){
					$idPujador = $confPujas[$i]->usuario_id;
					$pujaAutId = $confPujas[$i]->id;

					$this->engendrar_puja($articulo,$pujaAutId,$idPujador);

				}else if($ulPuja->pujador_id != $confPujas[$i]->usuario_id && $confPujas[$i]['puja_maxima'] >= ($articulo['puja_mayor']+$articulo['incremento_precio'])){
					if($confPujas[$i]['cancelada']==0){
						$idPujador = $confPujas[$i]->usuario_id;
						$pujaAutId = $confPujas[$i]->id;

						$this->engendrar_puja($articulo,$pujaAutId,$idPujador);
					}

				}

				if($confPujas[$i]['puja_maxima'] < $articulo['puja_mayor']){
					$confPujas[$i]->superada = 1;
					$confPujas[$i]->save();
				}
			}

		} catch (Exception $e) {
			return $e;
		}
		



	}

	//sirve para recargar los valores de precios de la subasta
	public function	cargar_precio(Request $request){
		try {
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
			
		} catch (Exception $e) {
			return $e;
		}
		
	}

	public function cargarPujaAut(Request $request){
		try {


			$submitedArray = $request->all();
			$articuloId = $submitedArray['id_subasta'];
			$userId = Auth::user()->id;
			$usuario = Usuario::find($userId);
			$configuracion = $usuario->confPujasSubasta($articuloId);
			if($configuracion==false){
				return "false";
			}else{

				$config = ConfiguracionPuja::find($configuracion[0]->id); 

			$data[0] = $config;//la configuracion de esa subasta
			return $data;
		}

	} catch (Exception $e) {
		return $e;
	}

}

public function cambiarConf(Request $request){
	try {
		$submitedArray = $request->all();

		$articuloId = $submitedArray['id_subasta'];
		$pujaMax = $submitedArray['puja_max'];

		$usuario = Usuario::find(Auth::user()->id);
		$aux = $usuario->confPujasSubasta($submitedArray['id_subasta']);

		$confpuja = ConfiguracionPuja::find($aux[0]->id);
		$confpuja->puja_maxima = $pujaMax;
		$confpuja->save();
		return $pujaMax;

	} catch (Exception $e) {
		return $e;
	}


}

public function cancelarConf(Request $request)
{
	try {
		$submitedArray = $request->all();

		$articuloId = $submitedArray['id_subasta'];

		$usuario = Usuario::find(Auth::user()->id);
		$aux = $usuario->confPujasSubasta($submitedArray['id_subasta']);

		$confpuja = ConfiguracionPuja::find($aux[0]->id);
		$confpuja->cancelada = 1;
		$confpuja->save();
		return 1;

	} catch (Exception $e) {
		return $e;
	}


}

//develve las pujas generadas automaticamente
public function pujasAutom(Request $request){
	try {
		$submitedArray = $request->all();
		$articuloId = $submitedArray['id_subasta'];
		$userId = Auth::user()->id;
		$usuario = Usuario::find($userId);
		$configuracion = $usuario->confPujasSubasta($articuloId);
		if($configuracion==false){
			return 0;
		}else{

			$config = ConfiguracionPuja::find($configuracion[0]->id); 
			//$data[1] = $usuario->ultimaPujaSubasta($articuloId);//la ultima puja de ese usuario en la subasta
			$data = $config->pujasArticulo($articuloId);//las pujas de esa conf
			if($data==false){
				return 0;
			}
			
			return $data;
		}
	}catch (Exception $e) {
		return $e;
	}
}

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

}