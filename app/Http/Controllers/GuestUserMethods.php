<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use Illuminate\Http\Request;
use App\Articulo;

class GuestUserMethods extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Funciones para testear
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
		$this->middleware('guest');
	}


	/**
	 * 
	 *
	 * @return Response
	 */
	public function get_allCategories()
	{
		return $data = Categoria::all();
	}

	public function	cargar_precioGuest(Request $request){
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



			return $articulo;
		} catch (Exception $e) {
			return $e;
		}
		
	}


	public function todasPujasGuest(Request $request){
		try {
			$submitedArray = $request->all();
			$articulo = Articulo::find($submitedArray['id_subasta']);
			$pujas = $articulo->pujas;
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
			
		} catch (Exception $e) {
			return $e;
		}
		



	}

	public function comprovarEstadoGuest(Request $request){
	try {
			$submitedArray = $request->all();
			$articulo = Articulo::find($submitedArray['id_subasta']);
		
			if($articulo->precio_venta==-1){
				return 0;
			}else if($articulo->precio_venta==0){
				return "Subasta Caducada";
			}else if($articulo->precio_venta!=0 && $articulo->precio_venta!=-1){
			return "Articulo Vendido  Fecha Venta : ".$articulo->fecha_venda." Precio Venta : ".$articulo->precio_venta." €";

			}
			
		} catch (Exception $e) {
			return $e;
		}
	}
		
}