<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodo_envio extends Model {

protected $table = 'metodo_envios';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'descripcion'];

	public function articulos()
	{
		return $this->hasMany('App\Articulo', 'metodo_envio_id', 'id');
	}
}

            