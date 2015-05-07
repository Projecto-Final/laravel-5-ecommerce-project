<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ConfiguracionPujasTableSeeder extends Seeder {

	public function run()
	{

		\App\ConfiguracionPuja::create([
			'puja_maxima' => 200,
			'articulo_id' => 1,
			'usuario_id' => 3,
			'superada' => false,
			'fecha_config' => strtotime("2015-05-07"),
		]);

		TestDummy::times(1)->create('App\ConfiguracionPuja');
	}
}