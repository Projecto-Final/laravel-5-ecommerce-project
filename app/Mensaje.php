<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {


	protected $table = 'mensajes';

	public function receptor()
	{
		return $this->belongsTo('App\Usuario','receptor_idreceptor','id');
	}

	public function liniasM()
	{
		return $this->hasMany('App\LiniaM', 'mensaje_id', 'id');
	}

	public function emisor()
	{
		return $this->belongsTo('App\Usuario','emisor_id','id');
	}

}
