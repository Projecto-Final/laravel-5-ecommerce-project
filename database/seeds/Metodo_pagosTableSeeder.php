<?php

use Illuminate\Database\Seeder;
use App\Metodo_pago;

class Metodo_pagosTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Metodo_pagos')->delete();

		Metodo_pago::create([
			'nombre' => 'PayPal',
			'descripcion' => 'Paga con tu cuenta de PayPal como tu sabes.',
		]);

		Metodo_pago::create([
			'nombre' => 'Transferencia bancaria',
			'descripcion' => 'Paga con tu cuenta bancaria.',
		]);

			Metodo_pago::create([
			'nombre' => 'Metalico',
			'descripcion' => 'Queda con la otra persona y pagaselo.',
		]);
	}
}
