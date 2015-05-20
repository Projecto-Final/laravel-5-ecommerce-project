<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model {

	protected $table = 'articulos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['nombre_producto', 'modelo', 'estado', 'descripcion', 'localizacion', 'precio_venta', 'fecha_inicio', 'fecha_final', 'vendido', 'fecha_venda', 'precio_inicial', 'incremento_precio', 'puja_mayor', 'subastador_id', 'subcategoria_id', 'comprador_id'];
	protected $fillable = ['nombre_producto', 'modelo', 'estado', 'descripcion', 'localizacion', 'fecha_inicio', 'fecha_final', 'precio_inicial', 'incremento_precio','puja_mayor', 'subastador_id', 'subcategoria_id','comprador_id'];

	public function usuario()
	{
		return $this->belongsTo('App\Usuario');
	}
	public function imagenes()
	{
		return $this->hasMany('App\Imagen');
	}
	public function comprador()
	{
		return $this->hasOne('App\Usuario', 'comprador_id', 'id');
	}

	public function subastador()
	{
		return $this->hasOne('App\Usuario', 'subastador_id', 'id');
	}

	public function subcategoria()
	{
		return $this->hasOne('App\Subcategoria', 'subcategoria_id', 'id');
	}
	public function pujas()
	{
		return $this->hasMany('App\Puja', 'articulo_id', 'id');
	}
	public function Confpujas()
	{
		return $this->hasMany('App\ConfiguracionPuja', 'articulo_id', 'id');
	}
}
