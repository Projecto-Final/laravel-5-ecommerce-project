<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
use App\Valoracion;
use App\Empresa;
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
		$empresa = Empresa::find(1)->get();

		$fecha_inicio = Carbon::now();
		$fecha_final = Carbon::now()->addDays($empresa[0]->tiempoArticulo);

		return view('form_subasta', ["fecha_final" =>$fecha_final]);
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function add_subasta(Request $request)
	{

		try {
			$v = $this->validate($request, [
				'nombre_producto' => 'required|alpha_num',
				'modelo' => 'required|alpha_num',
				'estado' => 'required|alpha',
				'localizacion' => 'required|alpha_num',
				'descripcion' => 'required',
				'precio_inicial' => 'required|regex:/^\d+(\.\d{1,2})?/i',
				'subcategoria' => 'required|alpha_num',
				'incremento_precio' => 'required|regex:/^\d+(\.\d{1,2})?/i',
				]);

			if ($v !== NULL && $v->fails()) {
				return redirect()->back()->withErrors($v->errors());
			}

			$submitedArray = $request->all();

			$userId = Auth::id();

			$empresa = Empresa::find(1)->get();

			$fecha_inicio = Carbon::now();
			$fecha_final = Carbon::now()->addDays($empresa[0]->tiempoArticulo);


			$articulo = Articulo::create([
				'nombre_producto' => $submitedArray['nombre_producto'],
				'modelo' => $submitedArray['modelo'],
				'estado' => $submitedArray['estado'],
				'localizacion' => $submitedArray['localizacion'],
				'descripcion' => $submitedArray['descripcion'],
				'fecha_inicio' => $fecha_inicio,
				'fecha_final' => $fecha_final,
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
		$direccion = url('/images/subastas/');
		$id = Auth::user()->id;
		$pujas[0] = Usuario::find($id)->pujas;
		for ($i=0; $i < count($pujas[0]); $i++) { 
			$pujas[1][$i] = $pujas[0][$i]->articulo;
			$pujas[2][$i] = $direccion.'/'.$pujas[0][$i]->articulo->imagenes[0]->imagen;
			$pujas[3][$i] = $pujas[0][$i]->autoPuja;
		}
		return $pujas;
	}



	/*Obtener ventas del usuario */

	public function get_ventas(){
		$direccion = url('/images/subastas/');
		$ventas[0] = Usuario::find(Auth::user()->id)->ventas()->where('precio_venta','>', -1)->get();
		for ($i=0; $i < count($ventas[0]); $i++) { 
			$ventas[1][$i] = $direccion.'/'.$ventas[0][$i]->imagenes[0]->imagen;
		}
		return $ventas;
	}

	/*Obtener compras del usuario */

	public function get_compras(){
		$direccion = url('/images/subastas/');
		$compras[0] = Usuario::find(Auth::user()->id)->compras()->where('precio_venta','>', -1)->get();
		for ($i=0; $i < count($compras[0]); $i++) { 
			$compras[1][$i] = $direccion.'/'.$compras[0][$i]->imagenes[0]->imagen;
		}
		return $compras;
	}

	// /*Obtener subastas del usuario */

	public function get_subastas(){
		$direccion = url('/images/subastas/');
		$subastas[0] = Usuario::find(Auth::user()->id)->articulos()->where('precio_venta','=', -1)->get();
		for ($i=0; $i < count($subastas[0]); $i++) { 
			$subastas[1][$i] = $direccion.'/'.$subastas[0][$i]->imagenes[0]->imagen;
		}
		return $subastas;
	}
	//Obtener subastas inactivas
	public function get_subastasI(){
		$direccion = url('/images/subastas/');
		$subastas[0] = Usuario::find(Auth::user()->id)->articulos()->where('precio_venta','>', -1)->get();
		for ($i=0; $i < count($subastas[0]); $i++) { 
			$subastas[1][$i] = $direccion.'/'.$subastas[0][$i]->imagenes[0]->imagen;
		}
		return $subastas;
	}


	// /*Obtener pujas automaticas del usuario */


	public function get_valoraciones(){	
		$direccion = url('/images/subastas/');
		$id = Auth::user()->id;
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

	public function get_Pendientes(){	
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$count = 0;
		$val[0] = $user->valCompra;
		for ($i=0; $i < count($val[0]); $i++) {
			if($val[0][$i]->completada == 0){
				$count++;
			}
		}
		return $count;
	}

	public function get_valoracionesPendientes(){	
		$direccion = url('/images/subastas/');
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$val[0] = $user->valCompra;
		$j = 0;
		for ($i=0; $i < count($val[0]); $i++) {
			if($val[0][$i]->completada == 0){
				$val[1][$j] = $val[0][$i]->valorado->username;
				$art = Articulo::find($val[0][$i]->articulo_id);
				$val[2][$j] = $art->nombre_producto;
				$val[3][$j] = $val[0][$i]->id;
				$val[4][$j] = $direccion.'/'.$art->imagenes[0]->imagen;				
				$j++;
			}else{}
		}
		return $val;
	}

	public function get_confPuj()
	{			
		$direccion = url('/images/subastas/');
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$con[0] =$user->confPujas;$j=0;
		for ($i=0; $i < count($con[0]); $i++) { 
			$con[1][$j] = $con[0][$i]->articulo;
			$con[2][$j] = $direccion.'/'.$con[0][$i]->articulo->imagenes[0]->imagen;
		}
		return $con;
	}

	public function guardarCambios(Request $request)
	{
		$v = $this->validate($request, [
			'nombre' => 'required|alpha_num',
			'apellidos' => 'required|alpha_num',
			'username' => 'required|alpha_num',
			'direccion' => 'required|String',
			'email' => 'required|email',
			]);
		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}
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
		$v = $this->validate($request, [
			'password_old' => 'required|String',
			'password' => 'required|String',
			'password_confirmation' => 'required|String',
			]);
		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}
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
			if($precioMostrado==$articulo->puja_mayor && $articulo->precio_venta=-1){
				$pujaAut = null;
				$idPujador = Auth::user()->id;
				if($idPujador!=$articulo->subastador_id){
					$this->engendrar_puja($articulo,$pujaAut,$idPujador);
				}
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
			$v = $this->validate($request, [
				'puja_max' => 'required|regex:/^\d+(\.\d{1,2})?/i',
				]);

			if ($v !== NULL && $v->fails()) {
				return redirect()->back()->withErrors($v->errors());
			}
			

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



public function comprovarEstado(Request $request){
	try {
		$submitedArray = $request->all();
		$articulo = Articulo::find($submitedArray['id_subasta']);

		if($articulo->precio_venta==-1){
			return 0;
		}else if($articulo->precio_venta==0){
			if($articulo->subastador_id==Auth::user()->id){

				$empresa = Empresa::find(1)->get();


				$tiempo_pro = $empresa[0]->tiempoPorrogaArticulo;
				$precio_pro = $empresa[0]->precioPorroga;

				return "Subasta Caducada  <button class='MostrarPujas-button' type='button' onClick='prorrogar();'>Prorrogar </button> Tiempo prorroga : ".$tiempo_pro." Dias al Precio de ".$precio_pro." €";
			}else{
				return "Subasta Caducada";
			}

		}else if($articulo->precio_venta!=0 && $articulo->precio_venta!=-1){


			return "Articulo Vendido  Fecha Venta : ".$articulo->fecha_venda." Precio Venta : ".$articulo->precio_venta." €";

		}

	} catch (Exception $e) {
		return $e;
	}
}

//merge avoided xD
public function write_valoracion($id){
	$user = Auth::user();
	$val = Valoracion::find($id);
	$art = Articulo::find($val->articulo_id);
	$foto = $art->imagenes[0];
	$valorado = Usuario::find($val->valorado_id);
	$validante = Usuario::find($val->validante_id);
	if($validante->id == $user->id){
		$data = array ('val' => $val, 'art' => $art, 'valorado'=> $valorado, 'validante' =>$validante, 'foto' => $foto);
		return view('valoracion',$data);
	}else{
		return redirect('usuario');
	}
}

public function view_valoracion($id){
	$user = Auth::user();
	$val = Valoracion::find($id);
	$art = Articulo::find($val->articulo_id);
	$foto = $art->imagenes[0];
	$valorado = Usuario::find($val->valorado_id);
	$validante = Usuario::find($val->validante_id);
	if($valorado->id == $user->id){
		$data = array ('val' => $val, 'art' => $art, 'valorado'=> $valorado, 'validante' =>$validante, 'foto' => $foto);
		return view('valorado',$data);
	}else{
		return redirect('usuario');
	}
}

public function updateValoracion(Request $request){
	$submitedArray = $request->all();
	$val = Valoracion::find($submitedArray["id"]);
	$val->completada = 1;
	$val->texto = $submitedArray["texto"];
	$val->puntuacion = $submitedArray['puntuacion'];
	$val->fecha = Carbon::now();
	$val->save();
	return redirect('usuario');
}

public function perfilVisitante($id){
	$user = Usuario::find($id);
	$valoraciones = $user->valVenta;
	$subastas = $user->articulos;
	$data = array ('user' => $user, 'subastas' => $subastas, 'valoraciones'=> $valoraciones);
	return view('perfil',$data);
}


public function aceptarUltimaP(Request $request){
	try {
		$submitedArray = $request->all();
		$articulo = Articulo::find($submitedArray['id_subasta']);
		$pujaGanadora =	$articulo->ultimaPuja($submitedArray['id_subasta']);

		$articulo->comprador_id = $pujaGanadora->pujador_id;
		$articulo->precio_venta = $pujaGanadora->cantidad;
		$articulo->fecha_venda = Carbon::now();
		$articulo->save();
	} catch (Exception $e) {
		return $e;
	}

}

public function prorrogar(Request $request){
	try {
		$submitedArray = $request->all();
		$articulo = Articulo::find($submitedArray['id_subasta']);

		$fechaModificar = new Carbon($articulo->fecha_final);
		$empresa = Empresa::find(1)->get();

		$nuevaFecha = $fechaModificar->addDays($empresa[0]->tiempoPorrogaArticulo);
		$articulo->precio_venta = -1;
		$articulo->fecha_final = $nuevaFecha;
		$articulo->save();
	} catch (Exception $e) {
		return $e;
	}
}

}