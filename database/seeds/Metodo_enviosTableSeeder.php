<?php

use Illuminate\Database\Seeder;
use App\Metodo_envio;

class Metodo_enviosTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Metodo_envios')->delete();

		Metodo_envio::create([
			'nombre' => 'Envío Express',
			'descripcion' => 'Este método de envío es lo más rápido disponible. El tiempo de entrega es de 3 a 5 días laborables para todos los mayores destinos.',
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
