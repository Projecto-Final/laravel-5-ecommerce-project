<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Articulo extends Model {

	protected $table = 'articulos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['nombre_producto', 'modelo', 'estado', 'descripcion', 'localizacion', 'precio_venta', 'fecha_inicio', 'fecha_final', 'vendido', 'fecha_venda', 'precio_inicial', 'incremento_precio', 'puja_mayor', 'subastador_id', 'subcategoria_id', 'comprador_id'];
	protected $fillable = ['nombre_producto', 'modelo', 'estado', 'descripcion', 'localizacion', 'fecha_inicio', 'fecha_final', 'precio_inicial', 'incremento_precio','puja_mayor', 'subastador_id', 'subcategoria_id','comprador_id','metodo_envio_id','metodo_pago_id'];


	public function Metodo_envio()
	{
		return $this->belongsTo('App\Metodo_envio','metodo_envio_id','id');
	}
	public function Metodo_pago()
	{
		return $this->belongsTo('App\Metodo_pago','metodo_pago_id','id');
	}

	public function usuario()
	{
		return $this->belongsTo('App\Usuario');
	}
	public function imagenes()
	{
		return $this->hasMany('App\Imagen','articulo_id','id');
	}
	public function comprador (){
		return $this->belongsTo('App\Usuario','id','comprador_id');
	}
	public function vendedor (){
		return $this->belongsTo('App\Usuario','id','subastador_id');
	}
	public function subcategoria()
	{
		return $this->belongsTo('App\Subcategoria');
	}
	public function pujas()
	{
		return $this->hasMany('App\Puja', 'articulo_id', 'id');
	}
	public function Confpujas()
	{
		return $this->hasMany('App\ConfiguracionPuja', 'articulo_id', 'id');
	}
	public function Facturas()
	{
		return $this->hasMany('App\Articulo', 'articulo_id', 'id');
	}
	public function ultimaPuja($articulo_id){

		$puja = DB::table('pujas')->where('articulo_id', '=', $articulo_id)->where ('superada','=', 0)->get();

		if($puja==null){
			return false;
		}else{
			return $puja[0];
		}	
	}

}
