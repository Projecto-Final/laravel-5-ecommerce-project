<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	protected $table = 'empresas';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'direccion'];
	
}
