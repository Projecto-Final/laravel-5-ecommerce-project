<?php

use Illuminate\Database\Seeder;
use App\ConfiguracionPuja;


class ConfiguracionPujasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('configuracion_pujas')->delete();

		ConfiguracionPuja::create([
			'puja_maxima' => 39,
			'articulo_id' => 1,
			'usuario_id' => 4,
			'superada' => true,
			'fecha_config' => "2015-05-3 23:42:56",
			'avisado' => true,
		]);

		$fecha = new DateTime('NOW');

		ConfiguracionPuja::create([
			'puja_maxima' => 80,
			'articulo_id' => 3,
			'usuario_id' => 2,
			'superada' => false,
			'fecha_config' => $fecha,
			'avisado' => false,
		]);

		ConfiguracionPuja::create([
			'puja_maxima' => 40,
			'articulo_id' => 6,
			'usuario_id' => 4,
			'superada' => false,
			'fecha_config' => "2015-05-08 16:15:11",
			'avisado' => false,
		]);
	}
}