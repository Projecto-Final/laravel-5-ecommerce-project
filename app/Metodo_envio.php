<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodo_envio extends Model {

	//	protected $table = 'articulos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'descripcion'];

	public function articulos()
	{
		return $this->hasMany('App\Articulo', 'Metodo_envio_id', 'id');
	}
}

            