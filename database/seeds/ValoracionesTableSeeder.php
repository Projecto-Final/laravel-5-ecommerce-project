<?php

use Illuminate\Database\Seeder;
use App\Valoracion;

class ValoracionesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('valoraciones')->delete();

		Valoracion::create([
			'texto' => 'Muy bien.',
			'articulo_id' => 1,
			'valorado_id' => 2,
			'validante_id' => 3,
			'puntuacion' => 4,
			'fecha' => "2015-05-9 16:45:12",
			'completada' => true,
		]);

		Valoracion::create([
			'texto' => 'Hulk acepta!!',
			'articulo_id' => 4,
			'valorado_id' => 4,
			'validante_id' => 6,
			'puntuacion' => 5,
			'fecha' => "2015-04-13 22:32:42",
			'completada' => true,
		]);

		Valoracion::create([
			'texto' => 'Tio, esta gorra huele mal...',
			'articulo_id' => 6,
			'valorado_id' => 3,
			'validante_id' => 4,
			'puntuacion' => 3,
			'fecha' => "2015-05-14 13:15:11",
			'completada' => true,
		]);
	}
}