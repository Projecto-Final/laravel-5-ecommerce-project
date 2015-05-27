<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use App\Valoracion;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;


	protected $table = 'usuarios';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password', 'nombre', 'apellido', 'imagen_perfil', 'imagen_background','avisado','direccion','texto_presentacion','localidad_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function Mrecibidos()
	{
		return $this->hasMany('App\Mensaje', 'receptor_id', 'id');
	}

	public function Menviados()
	{
		return $this->hasMany('App\Mensaje', 'emisor_id', 'id');
	}

	public function pujas()
	{
		return $this->hasMany('App\Puja', 'pujador_id', 'id');
	}

	public function confPujas()
	{
		return $this->hasMany('App\ConfiguracionPuja', 'usuario_id', 'id');
	}

	public function articulos()
	{
		return $this->hasMany('App\Articulo', 'subastador_id', 'id');
	}

	public function valVenta()
	{
		return $this->hasMany('App\Valoracion', 'valorado_id', 'id');
	}

	public function valCompra()
	{
		return $this->hasMany('App\Valoracion', 'validante_id', 'id');
	}
	public function compras()
	{
		return $this->hasMany('App\Articulo','comprador_id','id');
	}

	public function ventas()
	{
		return $this->hasMany('App\Articulo', 'subastador_id','id');
	}
    public function localidad()
    {
        return $this->belongsTo('App\Localidad', 'id', 'localidad_id');
    }

//conf pujas activas y no superadas
	public function confPujasSubasta($articulo_id){

		//$ConfiguracionPuja = DB::table('configuracion_pujas')->where('articulo_id', '=', $articulo_id)->where ('usuario_id','=', $this->id)->where ('cancelada','=', 0)->where ('superada','=', 0)->get();
		$ConfiguracionPuja = DB::table('configuracion_pujas')->where('articulo_id', '=', $articulo_id)->where ('usuario_id','=', $this->id)->where ('cancelada','=', 0)->get();

		if($ConfiguracionPuja==null){
			return false;
		}else{
			
			return $ConfiguracionPuja;
		}
		
		
	}
	public function ultimaPujaSubasta($articulo_id){

		$numeroPuja = DB::table('pujas')->where('articulo_id', '=', $articulo_id)->where ('pujador_id','=', $this->id)->max('id');
		$lPuja = DB::table('pujas')->where('articulo_id', '=', $articulo_id)->where ('pujador_id','=', $this->id)->where ('id','=', $numeroPuja)->get();
		if($lPuja==null){
			return false;
		}else{
			return $lPuja;
		}
		
	}
//devuelve las ConfpujasQUe devan avisar al usuario
	public function configPujaSuperada($pujador_id){

		//$ConfiguracionPuja = DB::table('configuracion_pujas')->where('articulo_id', '=', $articulo_id)->where ('usuario_id','=', $this->id)->where ('cancelada','=', 0)->where ('superada','=', 0)->get();
		$ConfiguracionPuja = DB::table('configuracion_pujas')->where ('usuario_id','=', $pujador_id)->where ('cancelada','=', 0)->where ('superada','=', 1)->where ('avisado','=', 0)->get();

		if($ConfiguracionPuja==null){
			return false;
		}else{
			
			return $ConfiguracionPuja;
		}
		
		
	}
}
