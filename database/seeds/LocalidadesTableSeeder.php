<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Localidad;

class LocalidadesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create("es_ES");
		DB::table('localidades')->delete();

		Localidad::create([
			'nombre' => 'Barcelona',
			'codigo_postal' => $faker->postcode,
		]);

		Localidad::create([
			'nombre' => 'Gerona',
			'codigo_postal' => $faker->postcode,
		]);

		Localidad::create([
			'nombre' => 'Tarragona',
			'codigo_postal' => $faker->postcode,
		]);

		Localidad::create([
			'nombre' => 'Lérida',
			'codigo_postal' => $faker->postcode,
		]);

		Localidad::create([
			'nombre' => 'Cuenca',
			'codigo_postal' => $faker->postcode,
		]);

		Localidad::create([
			'nombre' => 'Principado de Asturias',
			'codigo_postal' => $faker->postcode,
		]);
	}
}