<?php

use Illuminate\Database\Seeder;
use App\Factura;

class FacturasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('facturas')->delete();

		$fecha = new DateTime('NOW');
		$fecha->modify('-4 day');

		Factura::create([
			'usuario_id' => 3,
			'articulo_id' => 5,
			'nif' => "53654554Q",
			'cantidad_pagada' => 6.99,
			'fecha' => $fecha,
		]);
	}
}