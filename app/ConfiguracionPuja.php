<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionPuja extends Model {

	protected $table = 'configuracion_pujas';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['puja_maxima', 'articulo_id', 'usuario_id', 'superada', 'fecha_config'];
	
	public function usuario()
	{
		return $this->belongsTo('App\Usuario');
	}
	
	public function pujas()
	{
		return $this->hasMany('App\Puja', 'confpuja_id', 'id');
	}
	public function articulo()
	{
		return $this->belongsTo('App\Articulo', 'articulo_id', 'id');
	}
}
