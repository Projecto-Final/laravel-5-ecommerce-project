<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PujasTableSeeder extends Seeder {

	public function run()
	{

		\App\Puja::create([
			'cantidad' => 300,
			'articulo_id' => 2,
			'pujador_id' => 2,
			'fecha_puja' => strtotime("2015-05-07 17:11:00"),
		]);

		TestDummy::times(1)->create('App\Puja');
	}
}