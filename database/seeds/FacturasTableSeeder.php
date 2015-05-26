<?php

use Illuminate\Database\Seeder;
use App\Factura;

class FacturasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('facturas')->delete();

		Factura::create([
			'usuario_id' => 3,
			'articulo_id' => 1,
			'nif' => "53654554Q",
			'cantidad_pagada' => 30.3,
			'fecha' => "2015-04-14 23:55:00",
		]);
	}
}