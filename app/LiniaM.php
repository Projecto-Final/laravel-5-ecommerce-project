<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LiniaM extends Model {

	protected $table = 'liniasms';
	
	public function mensajes()
	{
		return $this->belongsTo('App\Mensaje');
	}

}
