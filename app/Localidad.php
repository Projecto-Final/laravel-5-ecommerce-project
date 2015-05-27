<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model {

	protected $table = 'localidades';

	protected $fillable = ['nombre','codigo_postal'];
	
	public function usuarios()
	{
		return $this->hasMany('App\Usuario');
	}
}
