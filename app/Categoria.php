<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

	protected $table = 'categorias';

	public function subcategorias()
	{
		return $this->hasMany('App\Subcategoria');
	}
}
