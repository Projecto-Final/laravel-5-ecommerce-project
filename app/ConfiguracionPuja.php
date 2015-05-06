<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionPuja extends Model {

	protected $table = 'configuracion_pujas';
	
	public function usuarios()
	{
		return $this->belongsTo('App\Usuario');
	}
	
	public function pujas()
	{
		return $this->hasMany('App\Puja', 'confpuja_id', 'id');
	}
}
