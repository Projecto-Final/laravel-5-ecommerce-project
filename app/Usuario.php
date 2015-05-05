<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $table = 'usuarios';

	public function __construct($nombre,$apellido,$direccion,$username,$contrasena){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->direccion = $direccion;
		$this->username = $username;
		$this->contrasena = $contrasena;
	}

	public function valoracion()
	{
		return $this->hasMany('App\Valoracion');
	}


}
