<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
use App\Escala;
use App\Factura;
use App\Empresa;
use App\Valoracion;
use App\Localidad;
use App\ConfiguracionPuja;
use App\Mensaje;
use App\LiniaM;
use Session;
use Auth;
use Carbon\Carbon;
use App\Puja;
use Illuminate\Http\Request;
use DB;
use Input;
use Cache;
use Mail;

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

		$fecha_inicio = Carbon::now('Europe/Madrid');
		$fecha_final = Carbon::now('Europe/Madrid')->addDays($empresa[0]->tiempoArticulo);

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
				'nombre_producto' => 'required|string',
				'modelo' => 'required|string',
				'estado' => 'required|alpha_dash',
				'localizacion' => 'required|alpha_num',
				'descripcion' => 'required',
				'precio_inicial' => 'required|regex:/^\d+(\.\d{1,2})?/i',
				'subcategoria' => 'required|alpha_num',
				'incremento_precio' => 'required|regex:/^\d+(\.\d{1,2})?/i',
				'sel_Metodo_envio' => 'required',
				'Metodo_pago' => 'required',
				'subcategoria' => 'required',
				'images'=> 'required',
				]);

			if ($v !== NULL && $v->fails()) {
				return redirect()->back()->withErrors($v->errors());
			}

			$submitedArray = $request->all();

			$userId = Auth::id();

			$empresa = Empresa::find(1)->get();

			$fecha_inicio = Carbon::now('Europe/Madrid');
			$fecha_final = Carbon::now('Europe/Madrid')->addDays($empresa[0]->tiempoArticulo);


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
				'metodo_envio_id'=> $submitedArray['sel_Metodo_envio'],
				'metodo_pago_id'=> $submitedArray['Metodo_pago'],
				]);

			foreach ($submitedArray['images'] as $posicion => $imagenASubir) {
				$img_extension = $imagenASubir->getClientOriginalExtension();
				$img_name = $posicion."_".$articulo->id."_".md5($userId).".".$img_extension;
				$imagenASubir->move(public_path("images/subastas"),$img_name);
				$img = Imagen::create([
					'articulo_id' => $articulo->id,
					'imagen' => $img_name,
					'descripcion' => "blabla",
					]);
			}
			
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
		$user[0] = Usuario::find($id);
		if($user[0]->texto_presentacion == null){
			$user[0]->texto_presentacion = "...";
		}
		$user[1] = $user[0]->localidad;
		$user[2] = Localidad::all();
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
		$user = Auth::user();
		$escala = Escala::all();
		$valoraciones[0] = Valoracion::where('valorado_id', '=', $user->id)->where('completada', '=', 1)->get();
		foreach ($valoraciones[0] as $key => $value) {
			$valoraciones[$key] = $valoraciones[$key];
			$valoraciones[1][$key] = $valoraciones[0][$key]->validante->username;
			$art = Articulo::find($valoraciones[0][$key]->articulo_id);
			$valoraciones[2][$key] = $direccion.'/'.$art->imagenes[0]->imagen;
			$valoraciones[3][$key] = $art;
			$valoraciones[4][$key] = $escala[$valoraciones[0][$key]->puntuacion]->descripcion;
		}
		return $valoraciones;
	}

	public function get_Pendientes(){	
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$count = 0;
		$val = Valoracion::where('validante_id', '=', $user->id)->where('completada', '=', 0)->get();
		return count($val);
	}

	public function get_valoracionesPendientes(){
		$direccion = url('/images/subastas/');
		$user = Auth::user();
		$escala = Escala::all();
		$valoraciones[0] = Valoracion::where('validante_id', '=', $user->id)->where('completada', '=', 0)->get();
		foreach ($valoraciones[0] as $key => $value) {
			$valoraciones[$key] = $valoraciones[$key];
			$valoraciones[1][$key] = $valoraciones[0][$key]->valorado->username;
			$art = Articulo::find($valoraciones[0][$key]->articulo_id);
			$valoraciones[2][$key] = $direccion.'/'.$art->imagenes[0]->imagen;
			$valoraciones[3][$key] = $art;
		}
		return $valoraciones;
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
			'direccion' => 'required|string',
			'localidad' => 'required|string',
			'email' => 'required|email',
			'texto_presentacion' => 'required|string',
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
		$user->localidad_id = $submitedArray["localidad"];
		$user->email = $submitedArray["email"];
		$user->texto_presentacion = $submitedArray["texto_presentacion"];
		$user->save();
	}

	public function guardarCambiosPass(Request $request)
	{
		$v = $this->validate($request, [
			'password_old' => 'required|string',
			'password' => 'required|string',
			'password_confirmation' => 'required|string',
			]);
		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}
		$submitedArray = $request->all();
		$user = Auth::user();
		$credentials = ['email' => Auth::user()->email, 'password' => $submitedArray["password_old"]];
		$submitedArray["password_confirmation"];
		if(Auth::validate($credentials)){
			if ($submitedArray["password_confirmation"] == $submitedArray["password"]) {
				$user->password = bcrypt($submitedArray["password"]);
				$user->save();
				return  "true";
			}
		}else{
			return "false";
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
				'fecha_puja' => Carbon::now('Europe/Madrid')
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
				'fecha_config' => Carbon::now('Europe/Madrid')
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

			$dateAr = explode(' ',$articulo->fecha_venda);
			$newDate = $dateAr[1] . " " .explode('-',$dateAr[0])[2] . '/' . explode('-',$dateAr[0])[1] . '/' . explode('-',$dateAr[0])[0];

			//Empresa tiempoPorrogaArticulo precioPorroga
			return "Articulo Vendido  Fecha Venta : ".$newDate." Precio Venta : ".$articulo->precio_venta." €";
		}

	} catch (Exception $e) {
		return $e;
	}
}

public function write_valoracion($id){
	$user = Auth::user();
	$val = Valoracion::find($id);
	$art = Articulo::find($val->articulo_id);
	$foto = $art->imagenes[0];
	$valorado = Usuario::find($val->valorado_id);
	$validante = Usuario::find($val->validante_id);
	if($validante->id == $user->id && $val->completada == 0){
		$data = array ('val' => $val, 'art' => $art, 'valorado'=> $valorado, 'validante' =>$validante, 'foto' => $foto);
		return view('valoracion',$data);
	}else{
		return redirect('usuario');
	}
}
// visualizacion de una valoracion valorada
public function view_valoracion($id){
	$user = Auth::user();
	$val = Valoracion::find($id);
	$art = Articulo::find($val->articulo_id);
	$foto = $art->imagenes[0];
	$valorado = Usuario::find($val->valorado_id);
	$validante = Usuario::find($val->validante_id);
	$data = array ('val' => $val, 'art' => $art, 'valorado'=> $valorado, 'validante' =>$validante, 'foto' => $foto);
	return view('valorado',$data);
}


// updateamos la valoracion ya generada en la venta
public function updateValoracion(Request $request){

	$submitedArray = $request->all();

	$val = Valoracion::find($submitedArray["id"]);	
	$val->completada = 1;
	$val->texto = $submitedArray["texto"];
	$val->puntuacion = $submitedArray['puntuacion'];
	$val->fecha = Carbon::now('Europe/Madrid');
	$val->save();
	// formula de recuento de la reputacion del usuario
	$user=Usuario::find($val->valorado->id);
	$valoraciones = $user->valVenta();
	$total = 0;
	foreach ($valoraciones as $valoracion) {
		$total += $valoracion->puntuacion;
	}
	if ($total == 0 || count($valoraciones) == 0) {
		$user->reputacion = 1;
	} else {
		$user->reputacion = ($total/count($valoraciones));
	}
	$user->save();
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
		if($pujaGanadora!=false){
			echo "Entrado";
			$articulo->comprador_id = $pujaGanadora->pujador_id;
			$articulo->precio_venta = $pujaGanadora->cantidad;
			$articulo->fecha_venda = Carbon::now('Europe/Madrid');
			$articulo->save();
			$comprador = Usuario::find($articulo->comprador_id);

			Mail::raw("¡¡¡¡¡¡Acabas de ganarte el derecho para reclamar tu $articulo->nombre_producto por solo $articulo->precio_venta!!!!!!", function($message) use ($comprador) {
				$message->to($comprador->email, $comprador->nombre)->subject('¡¡¡Felicidades has ganado la subasta!!!');
			});
			var_dump($articulo->subastador_id);
			$vendedor = Usuario::find($articulo->subastador_id);
			Mail::raw("¡¡¡¡¡¡Tras la apabullante guerra de pujas el usuario $comprador->nombre se ha impuesto con una oferta de $articulo->precio_venta para llevarse a: $articulo->nombre_pructo, contacta con el para finalizar el tramite a su correo: $comprador->email !!!!!!", function($message) use ($vendedor) {
				$message->to($vendedor->email, $vendedor->nombre)->subject('La guerra por tu articulo ha concluido');
			});

			$valoracion = new Valoracion;
			$valoracion->texto = '';
			$valoracion->valorado_id= $vendedor->id;
			$valoracion->validante_id = $comprador->id;
			$valoracion->puntuacion = 1;
			$valoracion->completada = 0;
			$valoracion->fecha = Carbon::now('Europe/Madrid');
			$valoracion->articulo_id = $articulo->id;
			$valoracion->save();

			$mensaje = Mensaje::Create([
				'titulo' => $articulo->id."|| ".$articulo->nombre_producto,
				'emisor_id' => $articulo->subastador_id,
				'receptor_id' => $articulo->comprador_id,
				'fecha' => Carbon::now('Europe/Madrid'),
				]);
			LiniaM::Create([
				'texto' => 'Hola, habla con '.$comprador->nombre.' sobre el producto',
				'mensaje_id' =>  $mensaje->id,
				'emisor' => '1',
				]);			
			
		}else{
			return 0;
		}
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
		Factura::create([
			'usuario_id' => $articulo->subastador_id,
			'nif' => $submitedArray['nif'],
			'cantidad_pagada' => $empresa[0]->precioPorroga,
			'fecha' => Carbon::now('Europe/Madrid'),
			'articulo_id' => $articulo->id,
			]);
	} catch (Exception $e) {
		return $e;
	}
}

public function baja(Request $request){
	$submitedArray = $request->all();
	if($submitedArray['num'] == 1){	
		$id = Auth::user()->id;
		$user = Usuario::find($id);
		$user->activa = 0;
		$user->save();
		Auth::logout();
	}

}

	/**
	 * 	Consulta los chats y devuelve los enviados, segun el userID, si tiene chats. 
	 *
	 * @return Response
	 */
	public function chats()
	{
		try {
			$mensajesEnviados = DB::table('mensajes')
			->select(DB::raw('mensajes.id as id, usuarios.username as username, usuarios.imagen_perfil as imgperf, mensajes.titulo as titulo'))
			->join('usuarios', 'mensajes.receptor_id', '=', 'usuarios.id')
			->where('mensajes.emisor_id', '=', Auth::user()->id)
			->orderBy('mensajes.created_at',"desc")
			->get();

			$mensajesRecibidos = DB::table('mensajes')
			->select(DB::raw('mensajes.id as id, usuarios.username as username, usuarios.imagen_perfil as imgperf, mensajes.titulo as titulo'))
			->join('usuarios', 'mensajes.emisor_id', '=', 'usuarios.id')
			->where('mensajes.receptor_id', '=', Auth::user()->id)
			->orderBy('mensajes.created_at',"desc")
			->groupBy("nombre")
			->get();

			return view('chats',['mensajesEnviados' => $mensajesEnviados,'mensajesRecibidos' => $mensajesRecibidos]);
		} catch (Exception $e) {
			return $e;
		}
		
	}

	/**
	 * 	Consulta los chats y devuelve los enviados, segun el userID, si tiene chats. 
	 *
	 * @return Response
	 */
	public function get_conversacion_emisor($idChat)
	{
		// Enviados
		$mensajesEnviados = DB::table('liniasms')
		->select(DB::raw('mensajes.id as mid, mensajes.titulo as titulo, mensajes.receptor_id as eid, liniasms.texto as mensaje, usuarios.username as usuario, liniasms.emisor as propietario, liniasms.created_at as fecha'))
		->join('mensajes', 'liniasms.mensaje_id', '=', 'mensajes.id')
		->join('usuarios', 'mensajes.receptor_id', '=', 'usuarios.id')
		->where('liniasms.mensaje_id', '=', $idChat)
		->where('mensajes.emisor_id','=', Auth::user()->id)
		->orderBy('liniasms.created_at',"ASC")
		->get();
		return $mensajesEnviados;
	}

	/**
	 * 	Consulta los chats y devuelve los recibidos, segun el userID, si tiene chats. 
	 *
	 * @return Response
	 */
	public function get_conversacion_receptor($idChat)
	{
		// Recibidos
		$mensajesEnviados = DB::table('liniasms')
		->select(DB::raw('mensajes.id as mid,mensajes.titulo as titulo, mensajes.emisor_id as eid, liniasms.texto as mensaje, usuarios.username as usuario, liniasms.emisor as propietario, liniasms.created_at as fecha'))
		->join('mensajes', 'liniasms.mensaje_id', '=', 'mensajes.id')
		->join('usuarios', 'mensajes.emisor_id', '=', 'usuarios.id')
		->where('liniasms.mensaje_id', '=', $idChat)
		->where('mensajes.receptor_id','=', Auth::user()->id)
		->orderBy('liniasms.created_at',"ASC")
		->get();
		return $mensajesEnviados;
	}

	/**
	 * 	Consulta los chats y devuelve los recibidos, segun el userID, si tiene chats. 
	 *
	 * @return Response
	 */
	public function enviar_mensaje(Request $request)
	{
		$todalashit = $request->all();
		// Recibidos
		$liniasms = new LiniaM;

		$liniasms->mensaje_id = $todalashit['mensaje_id'];
		$liniasms->emisor = $todalashit['emisor'];
		$liniasms->texto = $todalashit['texto'];
		$liniasms->save();

		return $todalashit['emisor'];
		
	}

	/**
	 * 	Consulta los chats y devuelve los recibidos , segun el userID, si tiene chats. 
	 *
	 * @return Response
	 */
	public function get_chats_recibidos()
	{

		
		$mensajesRecibidos = DB::table('mensajes')
		->select(DB::raw('usuarios.nombre as nombre, usuarios.email as email, mensajes.titulo as titulo'))
		->join('usuarios', 'mensajes.emisor_id', '=', 'usuarios.id')
		->where('mensajes.receptor_id', '=', Auth::user()->id)
		->orderBy('mensajes.created_at',"desc")
		->groupBy("nombre")
		->get();
		
		return $mensajesRecibidos;
	}



}