<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model {

	protected $table = 'imagenes';

	protected $fillable = ['articulo_id','imagen','descripcion'];
	
	public function articulo()
	{
		return $this->belongsTo('App\Articulo');
	}
}
