<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

	//	protected $table = 'articulos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['usuario_id', 'articulo_id', 'nif', 'cantidad_pagada', 'fecha'];

	public function usuario()
	{
		return $this->belongsTo('App\Usuario');
	}
	public function articulo()
	{
		return $this->belongsTo('App\Articulo');
	}
}
