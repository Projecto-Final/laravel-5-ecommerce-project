<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model {

	protected $table = 'pujas';

	public function usuarios()
	{
		return $this->belongsTo('App\Usuario');
	}

	public function autoPujas()
	{
		return $this->belongsTo('App\ConfiguracionPuja');
	}
	public function articulos()
	{
		return $this->belongsTo('App\Articulo');
	}
}
