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

	public function pujas()
	{
		return $this->hasMany('App\Puja', 'pujador_id', 'id');
	}

	public function confPujas()
	{
		return $this->hasMany('App\ConfiguracionPuja', 'usuario_id', 'id');
	}

	public function articulos()
	{
		return $this->hasMany('App\Articulo', 'subastador_id', 'id');
	}

	public function valVenta()
	{
		return $this->hasMany('App\Valoracion', 'valorado_id', 'id');
	}

	public function valCompra()
	{
		return $this->hasMany('App\Valoracion', 'validante_id', 'id');
	}
	public function articulos()
	{
		return $this->belongsTo('App\Articulo');
	}
}
