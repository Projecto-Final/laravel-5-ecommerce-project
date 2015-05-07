<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class MensajessTableSeeder extends Seeder {

	public function run()
	{

		\App\Mensaje::create([
			'titulo' => 'ola k ase',
			'emisor_id' => 2,
			'receptor_id' => 3,
		]);
		\App\Mensaje::create([
			'nombre' => 'tss',
			'emisor_id' => 1,
			'receptor_id' => 2,
		]);

		TestDummy::times(1)->create('App\Mensaje');
	}
}