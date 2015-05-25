<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
use App\Valoracion;
use App\Empresa;
use App\Localidad;

use Session;
use Auth;
use Carbon;
use App\Puja;
use Illuminate\Http\Request;
use DB;
use Cache;


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

		$usuarios = Usuario::orderBy('id','desc')->whereRaw("created_at >= '".$fecha1Mes->toDateTimeString()."'")->take(8)->get();

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

		$año = date('Y');
		$aux2 = 0;
		$EstadisticasAnuales = array();
		$EstadisticasPujas = array();

		for ($i=1; $i <= 12; $i++) { 
			$aux2 = 0;
			$aux = Articulo::orderBy('id','asc')->whereRaw("MONTH(`fecha_inicio`) = '".$i."' and YEAR(`fecha_inicio`) = ".$año."")->get();
			foreach ($aux as $key => $articulo) {
				$aux2 += count($articulo->pujas);
			}
			$EstadisticasPujas[$i] = $aux2;
			$EstadisticasAnuales[$i] = count($aux);
		}
		return view("admin.estadisticas", ['estadisticasSubasta' => $EstadisticasAnuales, 'estadisticasPujas' => $EstadisticasPujas]);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function subastas()
	{
		$subastas = Articulo::all();
		return view('admin.subastas', ['subastas' => $subastas]);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function editar_subasta($idSubasta)
	{
		$subasta = Articulo::find($idSubasta);
		$subcategorias = Subcategoria::all();
		$usuarios = Usuario::all();
		$localidades = Localidad::all();
		//$subasta->delete();
		return view('admin.editar_subasta', ['subasta' => $subasta, 'localidades' => $localidades, 'subcategorias' => $subcategorias, 'usuarios' => $usuarios]);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function guardar_subasta(Request $request, $idSubasta)
	{
		$subastaUpdate = $request->all();
		$subasta = Articulo::find($idSubasta);
		$subasta->modelo = $subastaUpdate['modelo'];
		$subasta->nombre_producto = $subastaUpdate['nombre_producto'];
		$subasta->estado = $subastaUpdate['estado'];
		$subasta->localizacion = $subastaUpdate['localizacion'];
		$subasta->descripcion = $subastaUpdate['descripcion'];
		$subasta->subcategoria_id = $subastaUpdate['subcategoria_id'];
		$subasta->precio_inicial = $subastaUpdate['precio_inicial'];
		$subasta->precio_venta = $subastaUpdate['precio_venta'];
		$subasta->fecha_inicio = $subastaUpdate['fecha_inicio'];
		$subasta->fecha_final = $subastaUpdate['fecha_final'];
		$subasta->fecha_venda = $subastaUpdate['fecha_venda'];
		$subasta->porrogado = $subastaUpdate['porrogado'];

		$subasta->save();
		
		//$subasta->delete();
		//return view('admin.editar_subasta', ['subasta' => $subasta, 'localidades' => $localidades, 'subcategorias' => $subcategorias, 'usuarios' => $usuarios]);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function eliminar_subasta($idSubasta)
	{
		$subasta = Articulo::find($idSubasta);
		$subasta->delete();
		return redirect("administracion/subastas");
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function media()
	{
		$imagenes = Imagen::orderBy('id','asc')->get();
		return view('admin.media', ['imagenes' => $imagenes]);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function eliminar_media($idImagen)
	{
		$usuario = Imagen::find($idImagen);
		$usuario->delete();
		return redirect("administracion/media");
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function usuarios()
	{
		$usuarios = Usuario::orderBy('id','asc')->get();
		return view('admin.usuarios', ['usuarios' => $usuarios]);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function eliminar_usuario($idUsuario)
	{
		$usuario = Usuario::find($idUsuario);
		$usuario->delete();
		return redirect("administracion/usuarios");
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function editar_usuario($idUsuario)
	{
		$usuario = Usuario::find($idUsuario);

		return view('admin.editar_usuario', ['usuario' => $usuario]);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function guardar_usuario($idUsuario,Request $request)
	{
		$usuarioActualizado = $request->all();
		$usuario = Usuario::find($idUsuario);
		$usuario->imagen_perfil = $usuarioActualizado['imagen_perfil'];
		$usuario->username = $usuarioActualizado['username'];
		$usuario->nombre = $usuarioActualizado['nombre'];
		$usuario->apellido = $usuarioActualizado['apellido'];
		$usuario->email = $usuarioActualizado['email'];
		$usuario->reputacion = $usuarioActualizado['reputacion'];
		$usuario->permisos = $usuarioActualizado['permisos'];
		$usuario->save();

		return redirect("administracion/usuarios/editar/".$idUsuario);
	}

	/**
	 * Envia datos de estadisticas a la VIEW
	 *
	 * @return Response
	 */
	public function get_pujasEnSubasta($idSubasta)
	{
		$subastas = Puja::orderBy('id','asc')->whereRaw("articulo_id =".$idSubasta)->get();
		return $subastas;
		//return $subastas;
		// return view('admin.subastas', ['subastas' => $subastas]);
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



	public function categorias()
	{
		$categorias = Categoria::all();
		return view('admin/categorias',['categorias' => $categorias]);
	}

	public function editar_categoria($idCategoria)
	{
		$categoria = Categoria::find($idCategoria);
		// EDICION DE DATOS //
		return view('admin.editar_categoria',['categoria' => $categoria]);
	}

	public function guardar_categoria($idCategoria, Request $request)
	{
		$categoriaActualizada = $request->all();
		$categoria = Categoria::find($idCategoria);
		
		$categoria->nombre = $categoriaActualizada['nombre'];
		$categoria->descripcion = $categoriaActualizada['descripcion'];
		$categoria->save();


		return redirect("administracion/categorias/editar/".$idCategoria);
	}

	public function eliminar_categoria($idCategoria)
	{
		$categoria = Categoria::find($idCategoria);
		$categoria->delete();
		return redirect("admin.categorias");
	}


	public function subcategorias()
	{
		$subCategorias = Subcategoria::all();
		return view('admin/subcategorias',['subCategorias' => $subCategorias]);
	}

	public function editar_subcategorias($idSubcategoria)
	{
		$subCategorias = Subcategoria::find($idSubcategoria);
		// EDICION DE DATOS //
		return redirect("administracion/categorias");
	}

	public function eliminar_subcategorias($idSubcategoria)
	{
		$subCategoria = Subcategoria::find($idSubcategoria);
		$subCategoria->delete();
		return redirect("administracion/subcategorias");
	}

	public function configuracion()
	{
		$empresa = Empresa::all();
		return view('admin/configuracion', ["empresa" => $empresa]);
	}


	public function limpiar_cache()
	{
		Cache::flush();
		return view('admin/limpiar_cache');
	}


}