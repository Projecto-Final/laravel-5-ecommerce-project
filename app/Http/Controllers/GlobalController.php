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
        $data = Articulo::find($idArticulo);
        echo $idArticulo;
    }
}