<?php

use Illuminate\Database\Seeder;
use App\Imagen;

class LocalidadesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('localidades')->delete();

		Localidad::create([
			'nombre' => "Llagosta",
			'codigo_postal' => 08105,
		]);

		Localidad::create([
			'nombre' => "Mollet del Valles",
			'codigo_postal' => 08115,
		]);

		Localidad::create([
			'nombre' => "Tarragona",
			'codigo_postal' => 08209,
		]);

	}
}