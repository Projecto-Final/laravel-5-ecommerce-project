<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;
use App\Imagen;
use App\Valoracion;
use App\Empresa;
use App\Localidad;
use App\Factura;

use Session;
use Auth;
use Carbon;
use App\Puja;
use Illuminate\Http\Request;
use DB;
use Cache;
use PDF;

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
	public function estadisticas_usuarios(){
		/*
		consulta sql
		SELECT * FROM `articulos` 
		WHERE MONTH(`fecha_inicio`) = 5  
		GROUP BY MONTH(`fecha_inicio`)
		*/

		/* Usuaris per zona geogràfica */
		// PENDIENTE

		/* Usuaris per número de compres */
		// SELECT *, count(`id`) FROM `articulos` where `precio_venta` != -1 group by `comprador_id`

		$usuariosNCompras = DB::table('articulos')
		->select(DB::raw('usuarios.id as comprador_id, usuarios.nombre as comprador_nombre, count("articulos.id") as nc'))
		->join('usuarios', 'articulos.comprador_id', '=', 'usuarios.id')
		->where('precio_venta', '!=', -1)
		->groupBy('comprador_id')
		->orderBy('nc',"desc")
		->get();
		// $usuariosNCompras = Articulo::whereRaw("'precio_venta' != -1 order by 'comprador_id'")->get();


		/* Usuaris per € cobrats */
		// SELECT *, count(`id`), SUM(`precio_venta`) as pventaTotal FROM `articulos` where `precio_venta` != -1 group by `subastador_id` order by pventaTotal DESC
		$usuariosEurCobrados = DB::table('articulos')
		->select(DB::raw('usuarios.id as comprador_id, count("articulos.id") as nVentas, usuarios.nombre as comprador_nombre, SUM(`precio_venta`) as pventaTotal'))
		->join('usuarios', 'articulos.subastador_id', '=', 'usuarios.id')
		->where('precio_venta', '!=', -1)
		->groupBy('subastador_id')
		->orderBy('pventaTotal',"desc")
		->get();


		/* Usuaris per € pagats */
		// SELECT *, count(`id`), SUM(`precio_venta`) as pventaTotal FROM `articulos` where `precio_venta` != -1 group by `comprador_id` order by pventaTotal DESC
		$usuariosEurPagados = DB::table('articulos')
		->select(DB::raw('usuarios.id as usuario_id, count("articulos.id") as nCompras, usuarios.nombre as comprador_nombre, SUM(`precio_venta`) as pcompratotal'))
		->join('usuarios', 'articulos.comprador_id', '=', 'usuarios.id')
		->where('precio_venta', '!=', -1)
		->groupBy('comprador_id')
		->orderBy('pcompratotal',"desc")
		->get();


		/* Usuaris per número de vendes */
		// SELECT *, count(`id`) as nVentas, SUM(`precio_venta`) FROM `articulos` where `precio_venta` != -1 group by `subastador_id` order by nVentas DESC
		$usuariosNumVentas = DB::table('articulos')
		->select(DB::raw('usuarios.id as usuario_id, count("articulos.id") as nVentas, usuarios.nombre as vendedor_nombre'))
		->join('usuarios', 'articulos.subastador_id', '=', 'usuarios.id')
		->where('precio_venta', '!=', -1)
		->groupBy('subastador_id')
		->orderBy('nVentas',"desc")
		->get();


		/* Usuaris per número de licitacions (puja) oferides */
		// SELECT *, count(`pujador_id`) as nPujas FROM `pujas` group by `pujador_id` order by nPujas DESC
		$usuariosNumLicitaciones = DB::table('pujas')
		->select(DB::raw('usuarios.id as usuario_id, usuarios.nombre as comprador_nombre, count(`pujador_id`) as nPujas'))
		->join('usuarios', 'pujas.pujador_id', '=', 'usuarios.id')
		->groupBy('usuario_id')
		->orderBy('nPujas',"desc")
		->get();


		return view("admin.estadisticas_usuarios", ['usuariosNCompras' => $usuariosNCompras, "usuariosEurCobrados" => $usuariosEurCobrados, "usuariosEurPagados" => $usuariosEurPagados, "usuariosNumVentas" => $usuariosNumVentas, "usuariosNumLicitaciones" => $usuariosNumLicitaciones]);
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
		$v = $this->validate($request, [
			'nombre_producto' => 'required|string',
			'modelo' => 'required|string',
			'estado' => 'required|alpha_dash',
			'localizacion' => 'required|alpha_num',
			'descripcion' => 'required',
			'precio_inicial' => 'required|regex:/^\d+(\.\d{1,2})?/i',
			'subcategoria_id' => 'required|integer',
			'incremento_precio' => 'required|regex:/^\d+(\.\d{1,2})?/i',
			'precio_venta' => 'regex:/^\d+(\.\d{1,2})?/i',
			'fecha_inicio' => 'required|date',
			'fecha_venda' => 'date',
			'porrogado' => 'required|boolean',
			]);

		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

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
		return redirect("administracion/subastas/editar/".$idSubasta);
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
		$v = $this->validate($request, [
			'username' => 'required|max:255|alpha_num|unique:usuarios',
			'email' => 'required|email|max:255|unique:usuarios',
			'nombre' => 'required|alpha_dash|max:20',
			'apellido' => 'required|alpha_dash|max:200',
			'reputacion' => 'required|numeric',
			'permisos' => 'required|boolean',
			'imagen_perfil' => 'required|string',
			]);

		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

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

	public function crear_categoria()
	{
		return view('admin.crear_categoria');
	}


	public function editar_categoria($idCategoria)
	{
		$categoria = Categoria::find($idCategoria);
		// EDICION DE DATOS //
		return view('admin.editar_categoria',['categoria' => $categoria]);
	}

	public function guardar_nueva_categoria(Request $request)
	{
		$v = $this->validate($request, [
			'nombre' => 'required|string',
			'descripcion' => 'required|string',
			]);

		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

		$nuevaCategoria = $request->all();
		$categoria = new Categoria;
		$categoria->nombre = $nuevaCategoria['nombre'];
		$categoria->descripcion = $nuevaCategoria['descripcion'];
		$categoria->save();

		return redirect("administracion/categorias");
	}

	public function guardar_categoria($idCategoria, Request $request)
	{
		$v = $this->validate($request, [
			'nombre' => 'required|string',
			'descripcion' => 'required|string',
			]);

		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

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

	public function crear_subcategoria()
	{
		$categorias = Categoria::all();
		return view('admin.crear_subcategoria',['categorias' => $categorias]);
	}

	public function editar_subcategoria($idSubcategoria)
	{
		$subcategoria = Subcategoria::find($idSubcategoria);
		$categoria = Categoria::all();
		return view('admin.editar_subcategoria',['subCategoria' => $subcategoria, "categorias" => $categoria]);
	}

	public function guardar_nueva_subcategoria(Request $request)
	{
		$v = $this->validate($request, [
			'nombre' => 'required|string',
			'descripcion' => 'required|string',
			'categoria_id' => 'required|integer',
			]);

		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

		$nuevaCategoria = $request->all();
		$categoria = new Subcategoria;
		$categoria->nombre = $nuevaCategoria['nombre'];
		$categoria->descripcion = $nuevaCategoria['descripcion'];
		$categoria->categoria_id = $nuevaCategoria['categoria_id'];
		$categoria->save();

		return redirect("administracion/subcategorias");
	}

	public function guardar_subcategoria($idSubcategoria, Request $request)
	{
		$v = $this->validate($request, [
			'nombre' => 'required|string',
			'descripcion' => 'required|string',
			'categoria_id' => 'required|integer',
			]);

		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

		$subCategoriaActualizada = $request->all();
		$subcategoria = Subcategoria::find($idSubcategoria);
		
		$subcategoria->nombre = $subCategoriaActualizada['nombre'];
		$subcategoria->descripcion = $subCategoriaActualizada['descripcion'];
		$subcategoria->categoria_id = $subCategoriaActualizada['categoria_id'];

		$subcategoria->save();

		return redirect("administracion/subcategorias/editar/".$idSubcategoria);
	}

	public function eliminar_subcategoria($idSubcategoria)
	{
		$subCategoria = Subcategoria::find($idSubcategoria);
		$subCategoria->delete();
		return redirect("administracion/subcategorias");
	}


	public function facturas()
	{
		$facturas = Factura::all();
		$articulo = Articulo::all();
		return view('admin.facturas',['facturas' => $facturas]);
	}

	public function generar_factura_pdf($idFactura)
	{
		$factura = Factura::find($idFactura);
		$articulo = Articulo::find($factura['articulo_id']);
		$usuario = Usuario::find($factura['usuario_id']);
		$factura = Factura::find($idFactura);
		$pdf = PDF::loadHTML(view('factura_pdf',['factura' => $factura, 'usuario' => $usuario, 'articulo' => $articulo]));
		return $pdf->stream();
		;
	}
	public function generar_factura_xml($idFactura)
	{
		$factura = Factura::find($idSubcategoria);
		return view('admin.segeneraxml',['factura' => $factura]);
	}

	// No se usa
	// public function editar_factura($idFactura)
	// {
	// 	$factura = Factura::find($idSubcategoria);
	// 	return view('admin.editar_factura',['factura' => $factura]);
	// }

	// NO BORRAR	
	// public function guardar_factura($idFactura, Request $request)
	// {
	// 	$facturaActualizada = $request->all();
	// 	$factura = Factura::find($idFactura);

	// 	$factura->detalle = $facturaActualizada['xx'];

	// 	$factura->save();

	// 	return redirect("administracion/facturas/editar/".$idFacturas);
	// }

	public function eliminar_factura($idFactura)
	{
		$factura = Factura::find($idFactura);
		$factura->delete();
		return redirect("administracion/facturas");
	}

	public function configuracion()
	{
		$empresa = Empresa::all();
		return view('admin/configuracion', ["empresa" => $empresa]);
	}

	public function editar_configuracion()
	{
		$empresa = Empresa::find(1);
		return view('admin.editar_configuracion',['configuracion' => $empresa]);
	}

	public function guardar_configuracion(Request $request)
	{
		$v = $this->validate($request, [
			'nombre' => 'required|string',
			'direccion' => 'required|string',
			'tiempoArticulo' => 'required|integer',
			'tiempoPorrogaArticulo' => 'required|integer',
			'inactividad' => 'required|integer',
			'precioPorroga' => 'required|regex:/^\d+(\.\d{1,2})?/i',
			]);

		if ($v !== NULL && $v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}

		$nuevaConfiguracion = $request->all();
		$configuracion = Empresa::find(1);
		
		$configuracion->nombre = $nuevaConfiguracion['nombre'];
		$configuracion->direccion = $nuevaConfiguracion['direccion'];
		$configuracion->tiempoArticulo = $nuevaConfiguracion['tiempoArticulo'];
		$configuracion->tiempoPorrogaArticulo = $nuevaConfiguracion['tiempoPorrogaArticulo'];
		$configuracion->inactividad = $nuevaConfiguracion['inactividad'];
		$configuracion->precioPorroga = $nuevaConfiguracion['precioPorroga'];

		$configuracion->save();

		return redirect("administracion/configuracion/editar");
	}


	public function limpiar_cache()
	{
		Cache::flush();
		return view('admin/limpiar_cache');
	}


}