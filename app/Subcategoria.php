<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

	protected $table = 'subcategorias';

	public function categoria()
	{
		return $this->belongsTo('App\Categoria');
	}
	public function articulos()
	{
		return $this->belongsTo('App\Articulo');
	}
}
