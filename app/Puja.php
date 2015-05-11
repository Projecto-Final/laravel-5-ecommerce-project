<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model {

	protected $table = 'pujas';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['cantidad', 'confpuja_id', 'articulo_id', 'pujador_id', 'fecha_puja'];

	public function usuario()
	{
		return $this->belongsTo('App\Usuario');
	}

	public function autoPuja()
	{
		return $this->belongsTo('App\ConfiguracionPuja');
	}
	public function articulo()
	{
		return $this->belongsTo('App\Articulo');
	}
}
