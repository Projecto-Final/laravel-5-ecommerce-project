<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodo_pago extends Model {

	//	protected $table = 'articulos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'descripcion'];

	public function articulos()
	{
		return $this->hasMany('App\Articulo', 'Metodo_pago_id', 'id');
	}
}
