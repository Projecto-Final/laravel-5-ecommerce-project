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
			return false;
		}else{
			return true;
		}
	}

	public function index()
	{

		$id=Auth::id();
		$Adm = Usuario::find($id);

		$subastas = Articulo::all();
		$nSubastas = count($subastas);
		$nPujas = 0;
		$totalMovimientos = 0;
		foreach ($subastas as $key => $value) {
			$totalMovimientos += $value['puja_mayor'];
			$nPujas++;
		}
		$nImagenes = count(Imagen::all());
		$Categorias = Categoria::all();
		$SubCategorias = Subcategoria::all();
		$usuarios = Usuario::orderBy('id','desc')->take(8)->get();


		return view('admin.dashboard', ['usuarios' => $usuarios,'administrador' => $Adm ,'nSubastas'=> $nSubastas ,'nImagenes'=> $nImagenes, 'SubCategorias'=> $SubCategorias, 'Categorias'=> $Categorias, 'totalMovimientos' => $totalMovimientos, 'nPujas' => $nPujas ]);

	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function estadisticas(){
		/*
		consulta sql
		SELECT * FROM `articulos` 
		WHERE MONTH(`fecha_inicio`) = 5  
		GROUP BY MONTH(`fecha_inicio`)
		*/
		return view("admin.estadisticas");
	}

	public function getCategorias()
	{
		$data = Categoria::all();
		return view('admin/categorias',['categorias' => $data]);
	}

	public function getSubcategoriasCat($idCategoria)
	{
		$data = Categoria::find($idCategoria)->subcategorias;
		return view('admin/subcategorias',['subcategorias' => $data]);
	}


}