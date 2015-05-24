<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fatura extends Model {

	//	protected $table = 'articulos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['usuario_id', 'nif', 'cantidad_pagada', 'fecha'];

	public function usuario()
	{
		return $this->belongsTo('App\Usuario');
	}
}
