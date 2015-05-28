<?php

use Illuminate\Database\Seeder;
use App\Metodo_envio;

class Metodo_enviosTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Metodo_envios')->delete();

		Metodo_envio::create([
			'nombre' => 'Recojida local',
			'descripcion' => 'Solo para la gente de la misma zona.',
		]);

		Metodo_envio::create([
			'nombre' => 'Envío Estándar',
			'descripcion' => 'El envío estándar tarda un poco más que el envío acelerado pero cuesta menos. El tiempo de entrega es de 6 a 8 días laborables para todos los mayores destinos.',
		]);

			Metodo_envio::create([
			'nombre' => 'Envío Económico',
			'descripcion' => 'El plazo de entrega es de 10 a 20 días laborables para los destinos principales. Esta forma de envío se caracteriza por sus gastos bajísimos a pesar de su plazo de entrega más largo.',
		]);
	}
}
