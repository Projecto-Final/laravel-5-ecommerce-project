<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
use App\Valoracion;
use Session;
use Auth;
use Carbon\Carbon;
use App\Puja;
use Illuminate\Http\Request;
use DB;

class LogedAdminMethods extends Controller {

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
	public function checkPermisos(){
		$id=Auth::id();
		$user = Usuario::find($id);
		$permisos =  $user->permisos;
		if ($permisos==0){
			echo false;
		}else{
			echo true;
		}
	}

}