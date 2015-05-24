<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Localidad;

class LocalidadesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create("es_ES");
		//$faker->addProvider(new Faker\Provider\es_ES\Company($faker));
		DB::table('localidades')->delete();

		Localidad::create([
			'nombre' => $faker->state,
			'codigo_postal' => $faker->postcode,
		]);


	}
}