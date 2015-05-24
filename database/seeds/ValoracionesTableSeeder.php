<?php

use Illuminate\Database\Seeder;
use App\Valoracion;

class ValoracionesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('valoraciones')->delete();

		Valoracion::create([
			'texto' => 'Perfecto.',
			'articulo_id' => 1,
			'valorado_id' => 3,
			'validante_id' => 2,
			'puntuacion' => 5,
			'fecha' => "2015-04-15 13:01:24",
			'completada' => true,
		]);
	}
}