<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

	protected $table = 'subcategorias';

	public function categorias()
	{
		return $this->belongsTo('App\Categoria');
	}
}
