<?php

use Illuminate\Database\Seeder;
use App\LiniaM;

class LiniaMsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('liniasMs')->delete();

		LiniaM::create([
			'texto' => 'Puedo olerte el pelo?',
			'fecha' => "2015-05-23 00:00:00",
			'mensaje_id' => 1,
		]);

		LiniaM::create([
			'texto' => 'Cuidao con lo que dices',
			'fecha' => "2015-05-23 00:00:11",
			'mensaje_id' => 2,
		]);
	}
}