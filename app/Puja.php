<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model {

	protected $table = 'pujas';

	public function usuario()
	{
		return $this->belongsTo('App\Usuario');
	}

	public function autoPuja()
	{
		return $this->belongsTo('App\ConfiguracionPuja');
	}
	public function articulo()
	{
		return $this->belongsTo('App\Articulo');
	}
}
