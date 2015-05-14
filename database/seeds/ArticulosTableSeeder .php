<?php

use Illuminate\Database\Seeder;
use App\Articulo;

class ArticulosTableSeeder extends Seeder {

	public function run()
	{
		DB::table('articulos')->delete();

		Articulo::create([
			'nombre_producto' => 'jojo\'s bizarre adventure: all star battle',
			'modelo' => 'Juegazo',
			'estado' => 'Optimo',
			'descripcion' => 'Juego de poses',
			'localizacion' => 'La Llagosta',
			'precio_venta' => 0,
			'fecha_inicio' => "2015-05-2 16:45:12",
			'fecha_final' => "2015-05-9 16:45:00",
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 20,
			'incremento_precio' => 60,
			'puja_mayor' => 20,
			'subastador_id' => 1,
			'subcategoria_id' => 1,
			'comprador_id' => -1,
		]);

		Articulo::create([
			$fecha = new DateTime('Y-m-d H:i:s');
			$fecha->modify('-1 day');
			'nombre_producto' => 'maroto',
			'modelo' => 'hombre',
			'estado' => 'peinado',
			'descripcion' => 'flequillo op',
			'localizacion' => 'La Llagosta',
			'precio_venta' => -1,
			'fecha_inicio' => $fecha,
			$fecha->modify('+7 day');
			'fecha_final' => $fecha,
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 200,
			'incremento_precio' => 20,
			'incremento_precio' => 100,
			'puja_mayor' => 300,
			'subastador_id' => 1,
			'subcategoria_id' => 18,
			'comprador_id' => -1,
		]);

		Articulo::create([
			'nombre_producto' => 'Silla de Oficina Neo',
			'modelo' => 'Neo',
			'estado' => 'Optimo',
			'descripcion' => 'Silla de oficina roja',
			'localizacion' => 'Canovellas',
			'precio_venta' => 120,
			'fecha_inicio' => "2015-04-07 23:55:00",
			'fecha_final' => "2015-04-14 23:55:00",
			'fecha_venda' => "2015-04-14 23:55:00",
			'precio_inicial' => 100,
			'puja_mayor' => 120,
			'subastador_id' => 3,
			'subcategoria_id' => 11,
			'comprador_id' => 2,
		]);
	}
}