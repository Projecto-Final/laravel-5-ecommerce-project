<?php

use Illuminate\Database\Seeder;
use App\Puja;

class PujasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('pujas')->delete();

		Puja::create([
			'cantidad' => 300,
			'superada' => false,
			'confpuja_id' => -1,
			'articulo_id' => 2,
			'pujador_id' => 2,
			'fecha_puja' => "2015-05-07 17:11:00",
		]);

		Puja::create([
			'cantidad' => 120,
			'superada' => false,
			'confpuja_id' => -1,
			'articulo_id' => 3,
			'pujador_id' => 1,
			'fecha_puja' => "2015-05-12 23:59:32",
		]);
	}
}