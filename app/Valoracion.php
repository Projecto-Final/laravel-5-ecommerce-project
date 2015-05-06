<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model {

	protected $table = 'valoracions';
	public function __construct($comprador, $vendedor, $puntuacion,$fecha,$texto){
		$this->id_valorado = $vendedor;
		$this->id_validante= $comprador;
		$this->puntuacion=$puntuacion;
		$this->fecha=$fecha;
		$this->texto=$texto;

	}

	public function usuarios()
	{
		return $this->belongsTo('App\Usuario');
	}


}
