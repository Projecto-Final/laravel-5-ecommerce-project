<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

	//	protected $table = 'articulos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'descripcion'];

	public function usuario()
	{
		return $this->belongsTo('App\Articulo');
	}
	public function articulos()
	{
		return $this->belongsTo('App\Articulo');
	}
}

            