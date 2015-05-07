<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ArticulosTableSeeder extends Seeder {

	public function run()
	{

		\App\Articulo::create([
			'nombre_producto' => 'jojo\'s bizarre adventure: all star battle',
			'modelo' => 'Juegazo',
			'estado' => 'Optimo',
			'descripcion' => 'Juego de poses',
			'localizacion' => 'La Llagosta',
			'precio_venta' => -1,
			'fecha_inicio' => strtotime("2015-05-07 00:00:00"),
			'fecha_final' => strtotime("2015-07-07 00:00:00"),
			'precio_inicial' => 20,
			'puja_mayor' => 20,
			'id_subastador' => 1,
			'id_subcategoria' => 1,
			'id_comprador' => -1,
		]);

		\App\Articulo::create([
			'nombre_producto' => 'maroto',
			'modelo' => 'hombre',
			'estado' => 'peinado',
			'descripcion' => 'flequillo op',
			'localizacion' => 'La Llagosta',
			'precio_venta' => -1,
			'fecha_inicio' => strtotime("2015-05-07 00:00:00"),
			'fecha_final' => strtotime("2015-06-01 00:00:00"),
			'precio_inicial' => 200,
			'puja_mayor' => 300,
			'id_subastador' => 1,
			'id_subcategoria' => 18,
			'id_comprador' => -1,
		]);

		TestDummy::times(1)->create('App\Articulo');
	}
}