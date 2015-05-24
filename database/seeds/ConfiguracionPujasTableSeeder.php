<?php

use Illuminate\Database\Seeder;
use App\ConfiguracionPuja;


class ConfiguracionPujasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('configuracion_pujas')->delete();

		ConfiguracionPuja::create([
			'puja_maxima' => 200,
			'articulo_id' => 1,
			'usuario_id' => 3,
			'superada' => false,
			'fecha_config' => "2015-05-07",
		]);
	}
}