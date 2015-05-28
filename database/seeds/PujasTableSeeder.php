<?php

use Illuminate\Database\Seeder;
use App\Puja;

class PujasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('pujas')->delete();

		Puja::create([
			'cantidad' => 33.05,
			'superada' => true,
			'confpuja_id' => 1,
			'articulo_id' => 1,
			'pujador_id' => 4,
			'fecha_puja' => "2015-05-3 23:42:56",
		]);

		Puja::create([
			'cantidad' => 35.68,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 1,
			'pujador_id' => 6,
			'fecha_puja' => "2015-05-4 02:16:16",
		]);

		Puja::create([
			'cantidad' => 38.31,
			'superada' => true,
			'confpuja_id' => 1,
			'articulo_id' => 1,
			'pujador_id' => 4,
			'fecha_puja' => "2015-05-4 23:42:56",
		]);

		Puja::create([
			'cantidad' => 40.94,
			'superada' => false,
			'confpuja_id' => null,
			'articulo_id' => 1,
			'pujador_id' => 3,
			'fecha_puja' => "2015-05-8 16:45:12",
		]);

		$fecha = new DateTime('NOW');

		Puja::create([
			'cantidad' => 31.29,
			'superada' => false,
			'confpuja_id' => 2,
			'articulo_id' => 3,
			'pujador_id' => 2,
			'fecha_puja' => $fecha,
		]);

		Puja::create([
			'cantidad' => 11.3,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 4,
			'pujador_id' => 3,
			'fecha_puja' => "2015-04-08 12:45:54",
		]);

		Puja::create([
			'cantidad' => 14.3,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 4,
			'pujador_id' => 5,
			'fecha_puja' => "2015-04-08 18:51:42",
		]);

		Puja::create([
			'cantidad' => 17.3,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 4,
			'pujador_id' => 6,
			'fecha_puja' => "2015-04-10 03:06:07",
		]);

		Puja::create([
			'cantidad' => 20.3,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 4,
			'pujador_id' => 2,
			'fecha_puja' => "2015-04-10 19:16:07",
		]);

		Puja::create([
			'cantidad' => 23.3,
			'superada' => false,
			'confpuja_id' => null,
			'articulo_id' => 4,
			'pujador_id' => 6,
			'fecha_puja' => "2015-04-11 01:25:48",
		]);

		Puja::create([
			'cantidad' => 14.42,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 6,
			'pujador_id' => 2,
			'fecha_puja' => "2015-05-07 14:15:11",
		]);

		Puja::create([
			'cantidad' => 16.5,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 6,
			'pujador_id' => 4,
			'fecha_puja' => "2015-05-07 15:15:11",
		]);

		Puja::create([
			'cantidad' => 18.58,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 6,
			'pujador_id' => 2,
			'fecha_puja' => "2015-05-07 16:15:11",
		]);

		Puja::create([
			'cantidad' => 20.64,
			'superada' => true,
			'confpuja_id' => 3,
			'articulo_id' => 6,
			'pujador_id' => 4,
			'fecha_puja' => "2015-05-08 16:15:11",
		]);

		Puja::create([
			'cantidad' => 22.72,
			'superada' => true,
			'confpuja_id' => null,
			'articulo_id' => 6,
			'pujador_id' => 2,
			'fecha_puja' => "2015-05-09 16:15:11",
		]);
		Puja::create([
			'cantidad' => 24.8,
			'superada' => false,
			'confpuja_id' => 3,
			'articulo_id' => 6,
			'pujador_id' => 4,
			'fecha_puja' => "2015-05-09 16:15:12",
		]);
	}
}