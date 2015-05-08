<?php

use Illuminate\Database\Seeder;
use App\Valoracion;

class ValoracionsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('valoracions')->delete();

		Valoracion::create([
			'texto' => 'Perfecto, te doy mis dies',
			'valorado_id' => 3,
			'validante_id' => 2,
			'puntuacion' => 5,
			'fecha' => "2015-05-23 00:00:00",
		]);
	}
}