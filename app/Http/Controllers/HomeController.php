<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Articulo;
use Auth;
use DB;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
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
	 * REDIRECCIONA AL INDEX, SI EL USUARIO LOGUEA SATISFACTORIAMENTE.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index');
	}

	/**
	 * IMPRIME EL PANEL DE CONTROL DEL USUARIO A PETICION URL.
	 *
	 * @return Response
	 */
	public function cp_usuario()
	{

		$id = Auth::id();
		$user = Usuario::find($id);
		//num compras del usuario
		$subastas = DB::table('articulos')->where('precio_venta', '!=', 0)->where('precio_venta', '!=', -1)->where ('comprador_id','=',$id)->get();
		$ncompras = count($subastas);
		 //num ventas del usuario
		$subastas = DB::table('articulos')->where('precio_venta', '!=', 0)->where('precio_venta', '!=', -1)->where ('subastador_id','=',$id)->get();
		$nventas = count($subastas);
         //num pujas
		$npujas=$user->pujas->count();

		$imagBack=$user->imagen_background;
		$imagPerf=$user->imagen_perfil;

		//
		$reputacion=$user->reputacion;

		return view('cp_usuario',["ncompras" => $ncompras, "nventas" => $nventas, "npujas" => $npujas, "imagBack"=>$imagBack, "imagPerf"=>$imagPerf,"reputacion"=>$reputacion]);
//return view('cp_usuario');	


/*
  <!--  
             <div class="col-md-8 info_active col-xs-12">
              Compras {{$ncompras}} <i class="fa fa-shopping-cart"></i>  || Ventas {{$nventas}} <i class="fa fa-money"></i>
              || Pujas {{$npujas}} <i class="fa fa-fire"></i>
 -->*/
	}

	public function puja_usuario()
	{
		return view('puja_usuario');
	}

}
