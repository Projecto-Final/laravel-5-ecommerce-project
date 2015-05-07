<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class EmpresasTableSeeder extends Seeder {

	public function run()
	{

		\App\Empresa::create([
			'nombre' => '3F&M',
			'direccion' => 'C/ Stand, La Llagosta',
		]);

		TestDummy::times(1)->create('App\Empresa');
	}
}