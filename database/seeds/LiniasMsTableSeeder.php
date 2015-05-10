<?php

use Illuminate\Database\Seeder;
use App\LiniaM;

class LiniaMsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('liniasMs')->delete();

		LiniaM::create([
			'texto' => 'Hola, cuando procedo a realizar el envió y que tipo prefieres?',
			'fecha' => "2015-05-23 00:00:00",
			'mensaje_id' => 1,
		]);

		LiniaM::create([
			'texto' => 'Pues, cuando antes puedas por favor, el envió lo preferiría contra-reembolso, por nacex!',
			'fecha' => "2015-05-23 00:00:11",
			'mensaje_id' => 2,
		]);
	}
}