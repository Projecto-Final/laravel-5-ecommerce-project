<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class LiniasMsTableSeeder extends Seeder {

	public function run()
	{

		\App\LiniasM::create([
			'texto' => 'Puedo olerte el pelo?',
			'fecha' => strtotime("2015-05-07 12:11:00"),
			'mensaje_id' => 1,
		]);

		\App\LiniasM::create([
			'texto' => 'Cuidao con lo que dices',
			'fecha' => strtotime("2015-05-07 12:11:01"),
			'mensaje_id' => 2,
		]);

		TestDummy::times(1)->create('App\LiniasM');
	}
}