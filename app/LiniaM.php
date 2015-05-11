<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LiniaM extends Model {

	protected $table = 'liniasms';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['texto', 'fecha', 'mensaje_id'];

	
	public function mensaje()
	{
		return $this->belongsTo('App\Mensaje');
	}

}
