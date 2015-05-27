<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model {

	protected $table = 'localidades';

	protected $fillable = ['nombre','codigo_postal'];
	

	public function Facturas()
	{
		return $this->hasMany('App\Usuario', 'localidad_id', 'id');
	}
}
