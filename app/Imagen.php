<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model {

	protected $table = 'imagenes';

	public function articulos()
	{
		return $this->belongsTo('App\Articulo');
	}
}
