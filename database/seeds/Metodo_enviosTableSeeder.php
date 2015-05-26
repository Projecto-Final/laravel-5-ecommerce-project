<?php

use Illuminate\Database\Seeder;
use App\Subcategoria;

class Metodo_enviosTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Metodo_envios')->delete();

		Metodo_pago::create([
			'nombre' => 'Videojuegos',
			'descripcion' => 'Encuentra todo tipo de juegos, a precios de escándalo.',
			'categoria_id' => 1,
		]);
	}
}