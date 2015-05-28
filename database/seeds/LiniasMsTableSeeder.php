<?php

use Illuminate\Database\Seeder;
use App\LiniaM;

class LiniaMsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('liniasMs')->delete();

		LiniaM::create([
			'texto' => 'Hola, cuando procedo a realizar el envió y que tipo prefieres?',
			'mensaje_id' => 1,
			'emisor' => 1,
		]);

		LiniaM::create([
			'texto' => 'Pues, cuando antes puedas por favor, el envió lo preferiría contra-reembolso, por nacex!',
			'mensaje_id' => 2,
			'emisor' => 0,
		]);
	}
}