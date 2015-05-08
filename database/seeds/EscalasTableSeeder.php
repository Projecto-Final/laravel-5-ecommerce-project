<?php

use Illuminate\Database\Seeder;
use App\Escala;

class EscalasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('escalas')->delete();

		Escala::create([
			'descripcion' => 'pesimo',
		]);
		Escala::create([
			'descripcion' => 'pasable',
		]);
		Escala::create([
			'descripcion' => 'bueno',
		]);
		Escala::create([
			'descripcion' => 'optimo',
		]);
		Escala::create([
			'descripcion' => 'excelente',
		]);
	}
}