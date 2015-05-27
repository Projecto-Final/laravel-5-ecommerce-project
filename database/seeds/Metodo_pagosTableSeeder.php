<?php

use Illuminate\Database\Seeder;
use App\Metodo_pagos;

class Metodo_pagosTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Metodo_pagos')->delete();

		Metodo_pago::create([
			'nombre' => 'PayPal',
			'descripcion' => 'Paga con tu cuenta de PayPal como tu sabes.',
		]);

		Metodo_pago::create([
			'nombre' => 'Cheques o giros postales',
			'descripcion' => 'Paga con Cheques o giros postales.',
		]);

			Metodo_pago::create([
			'nombre' => 'Pagos contra reembolso',
			'descripcion' => 'Pagos contra reembolso en la mismísima entrega.',
		]);
	}
}
