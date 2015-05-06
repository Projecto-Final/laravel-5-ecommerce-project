<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $table = 'usuarios';


	public function valoracion()
	{
		return $this->hasMany('App\Valoracion');
	}

	public function Mrecibidos()
	{
		return $this->hasMany('App\Mensaje', 'receptor_id', 'id');
	}

	public function Menviados()
	{
		return $this->hasMany('App\Mensaje', 'emisor_id', 'id');
	}

}
