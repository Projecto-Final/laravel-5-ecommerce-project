<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class EscalasTableSeeder extends Seeder {

	public function run()
	{

		\App\Escala::create([
			'descripcion' => 'pesimo',
		]);
		\App\Escala::create([
			'descripcion' => 'pasable',
		]);
		\App\Escala::create([
			'descripcion' => 'bueno',
		]);
		\App\Escala::create([
			'descripcion' => 'optimo',
		]);
		\App\Escala::create([
			'descripcion' => 'excelente',
		]);

		TestDummy::times(1)->create('App\Escala');
	}
}