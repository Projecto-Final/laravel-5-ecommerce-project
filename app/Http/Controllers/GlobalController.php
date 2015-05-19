<?php namespace App\Http\Controllers;
use App\Usuario;
use App\Subcategoria;
use App\Categoria;
use App\Articulo;

class GlobalController extends Controller {

    /*
    * GLOBAL
    */
    public function __construct()
    {
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

    /**
    * 
    * @return Response
    */
    public function get_selectedSubasta($idArticulo)
    {
        $articulo = Articulo::find($idArticulo);
        $pujas[0] = $articulo->pujas;
        for ($i=0; $i < count($pujas[0]); $i++) {
            $pujas[1][$i] = $pujas[$i]->usuario;
        }
        $subastador = Usuario::find($articulo['subastador_id']);
        $imagenes = $articulo->imagenes;
        return view("view_subasta", ["subasta" => $articulo , "subastador" => $subastador, "imagenes" => $imagenes, "pujas"=> $pujas] );
    }

    public function GlobalController(Request $data)
    {
        echo "test";
    }
}