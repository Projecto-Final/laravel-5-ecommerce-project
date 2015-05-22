<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
use App\Valoracion;
use Session;
use Auth;
use Carbon;
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
		// Info del usuario authentificado ( admin )
		$id = Auth::id();
		$Adm = Usuario::find($id);

		// Variables
		$subastas = Articulo::all();
		$nSubastas = count($subastas);
		$nPujas = 0;
		$totalMovimientos = 0;

		// La pasta que mueve la pagina. ( para que luego digan que no somos claros )
		foreach ($subastas as $key => $value) {
			$totalMovimientos += $value['puja_mayor'];
			$nPujas++;
		}

		// Obtencion y calculos raros
		$nImagenes = count(Imagen::all());
		$Categorias = Categoria::all();
		$SubCategorias = Subcategoria::all();
		$fecha1Mes = Carbon\Carbon::now()->modify('-30 days');

		$usuarios = Usuario::orderBy('id','asc')->whereRaw("created_at >= '".$fecha1Mes->toDateTimeString()."'")->take(8)->get();

		// Se retornan los datos a la vista, para que esta los monte.
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
		$EstadisticasAnuales['enero'] = 1;
		for ($i=1; $i < 12; $i++) { 
			$aux = Articulo::orderBy('id','asc')->whereRaw("MONTH('fecha_inicio') = '".$i."'")->get();
			$EstadisticasAnuales[$i] = count($aux);
		}

		return view("admin.estadisticas", ['estadisticas' => $EstadisticasAnuales]);
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