<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {


	protected $table = 'mensajes';

	public function usuarios()
	{
		return $this->belongsTo('App\Usuario');
	}

	public function liniasM()
	{
		return $this->hasMany('App\LiniaM', 'mensaje_id', 'id');
	}

}
