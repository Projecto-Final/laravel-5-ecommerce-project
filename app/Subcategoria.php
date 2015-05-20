<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

	protected $table = 'subcategorias';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'descripcion', 'categoria_id'];

	public function categoria()
	{
		return $this->belongsTo('App\Categoria');
	}
	public function articulos()
	{
		return $this->hasMany('App\Articulo');
	}
}
