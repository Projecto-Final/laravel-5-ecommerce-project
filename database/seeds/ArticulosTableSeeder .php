<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Articulo;

class ArticulosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create("es_ES");
		DB::table('articulos')->delete();

		Articulo::create([
			'nombre_producto' => 'pokemon y',
			'modelo' => 'nintendo 3ds',
			'estado' => 'apenas usado',
			'descripcion' => 'juego pokemon nintendo 3ds',
			'localizacion' => 'Barcelona',
			'precio_venta' => 40.94,
			'fecha_inicio' => "2015-05-2 16:45:12",
			'fecha_final' => "2015-05-9 16:45:12",
			'fecha_venda' => "2015-05-9 16:45:12",
			'precio_inicial' => 30.42,
			'incremento_precio' => 2.63,
			'puja_mayor' => 40.94,
			'porrogado'=> 0,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'subastador_id' => 2,
			'subcategoria_id' => 1,
			'comprador_id' => 3
		]);

		$fecha = new DateTime('NOW');
		$fecha->modify('-1 day');
		$fecha2 = new DateTime('NOW');
		$fecha2->modify('+6 day');

		Articulo::create([
			'nombre_producto' => 'webService',
			'modelo' => 'java erp webservice',
			'estado' => 'perfectamente funcional',
			'descripcion' => 'webService programado en java que incluso devuelve jsons',
			'localizacion' => 'Barcelona',
			'precio_venta' => -1,
			'fecha_inicio' => $fecha->format('Y-m-d H:i:s'),
			'fecha_final' => $fecha2->format('Y-m-d H:i:s'),
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 10.99,
			'incremento_precio' => 1.01,			
			'puja_mayor' => 10.99,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'porrogado'=> 0,
			'subastador_id' => 6,
			'subcategoria_id' => 17,
			'comprador_id' => -1
		]);

		$fecha = new DateTime('NOW');
		$fecha->modify('-5 day');
		$fecha2 = new DateTime('NOW');
		$fecha2->modify('+2 day');

		Articulo::create([
			'nombre_producto' => 'taza de batman',
			'modelo' => 'dc drinks',
			'estado' => 'algo usada',
			'descripcion' => 'i drink coffe, BECAUSE I\'M BATMAN!',
			'localizacion' => 'Barcelona',
			'precio_venta' => -1,
			'fecha_inicio' => $fecha->format('Y-m-d H:i:s'),
			'fecha_final' => $fecha2->format('Y-m-d H:i:s'),
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 30.69,
			'incremento_precio' => 0.60,
			'puja_mayor' => 31.29,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'porrogado'=> 0,
			'subastador_id' => 6,
			'subcategoria_id' => 13,
			'comprador_id' => -1
		]);

		Articulo::create([
			'nombre_producto' => 'guantes del increible hulk',
			'modelo' => 'verdes',
			'estado' => 'Perfecto',
			'descripcion' => 'guantes del increible hulk con ruidos',
			'localizacion' => 'Barcelona',
			'precio_venta' => 23.3,
			'fecha_inicio' => "2015-04-07 23:55:00",
			'fecha_final' => "2015-04-14 23:55:00",
			'fecha_venda' => "2015-04-13 22:32:42",
			'precio_inicial' => 8.30,
			'incremento_precio' => 3,
			'puja_mayor' => 23.3,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'porrogado'=> 0,
			'subastador_id' => 4,
			'subcategoria_id' => 14,
			'comprador_id' => 6
		]);

		$fecha = new DateTime('NOW');
		$fecha->modify('-11 day');
		$fecha2 = new DateTime('NOW');
		$fecha2->modify('+3 day');

		Articulo::create([
			'nombre_producto' => 'novela "la desaparicíon de Suzumiya Haruhi"',
			'modelo' => 'Novelas Ivrea',
			'estado' => 'Nuevo',
			'descripcion' => 'cuarta novela de la saga de novelas de Suzumiya Haruhi',
			'localizacion' => 'Barcelona',
			'precio_venta' => -1,
			'fecha_inicio' => $fecha,
			'fecha_final' => $fecha2,
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 3,
			'incremento_precio' => 0.8,
			'puja_mayor' => 3,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'porrogado'=> 1,
			'subastador_id' => 3,
			'subcategoria_id' => 7,
			'comprador_id' => -1
		]);

		Articulo::create([
			'nombre_producto' => 'gorra cervecera',
			'modelo' => 'gorra con dos latas pegadas',
			'estado' => 'algo usado',
			'descripcion' => 'gorra perfecta para beber sin que se te cansen los brazos',
			'localizacion' => 'Barcelona',
			'precio_venta' => 24.8,
			'fecha_inicio' => "2015-05-07 13:15:11",
			'fecha_final' => "2015-05-14 13:15:11",
			'fecha_venda' => "2015-05-14 13:15:11",
			'precio_inicial' => 12.36,
			'incremento_precio' => 2.08,
			'puja_mayor' => 24.8,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'porrogado'=> 0,
			'subastador_id' => 3,
			'subcategoria_id' => 4,
			'comprador_id' => 6
		]);

		$fecha = new DateTime('NOW');
		$fecha->modify('-3 day');
		$fecha2 = new DateTime('NOW');
		$fecha2->modify('+4 day');

		Articulo::create([
			'nombre_producto' => 'Samsumg galaxy S4',
			'modelo' => 'S4',
			'estado' => 'Optimo',
			'descripcion' => 'mobil mejor que iphone',
			'localizacion' => 'Barcelona',
			'precio_venta' => -1,
			'fecha_inicio' => $fecha,
			'fecha_final' => $fecha2,
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 400,
			'incremento_precio' => 20.5,
			'puja_mayor' => 502.5,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'porrogado'=> 0,
			'subastador_id' => 5,
			'subcategoria_id' => 2,
			'comprador_id' => -1
		]);

		$fecha = new DateTime('NOW');
		$fecha->modify('-4 day');
		$fecha2 = new DateTime('NOW');
		$fecha2->modify('+3 day');

		Articulo::create([
			'nombre_producto' => 'Fuente de proteinas',
			'modelo' => 'ultimate survivor',
			'estado' => 'perfecto',
			'descripcion' => 'esto nos ayudara a sobrevivir un dia mas',
			'localizacion' => 'Barcelona',
			'precio_venta' => -1,
			'fecha_inicio' => $fecha,
			'fecha_final' => $fecha2,
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 60,
			'incremento_precio' => 4,
			'puja_mayor' => 68,
			'Metodo_pago_id' => rand(1,3),
			'Metodo_envio_id'=> rand(1,3),
			'porrogado'=> 0,
			'subastador_id' => 2,
			'subcategoria_id' => 17,
			'comprador_id' => -1
		]);
	}
}