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
			'porrogado'=> 0,
			'subastador_id' => 1,
			'subcategoria_id' => 1,
			'comprador_id' => -1
		]);
		$fecha = new DateTime('NOW');
		$fecha->modify('-1 day');
		$fecha2 = new DateTime('NOW');
		$fecha2->modify('+6 day');

		Articulo::create([
			'nombre_producto' => 'maroto',
			'modelo' => 'hombre',
			'estado' => 'peinado',
			'descripcion' => 'flequillo op',
			'localizacion' => 'La Llagosta',
			'precio_venta' => -1,
			'fecha_inicio' => $fecha->format('Y-m-d H:i:s'),
			'fecha_final' => $fecha2->format('Y-m-d H:i:s'),
			'fecha_venda' => "0000-00-00 00:00:00",
			'precio_inicial' => 200,
			'incremento_precio' => 20,			
			'puja_mayor' => 300,
			'porrogado'=> 1,
			'subastador_id' => 1,
			'subcategoria_id' => 17,
			'comprador_id' => -1
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
			'porrogado'=> 0,
			'incremento_precio' => 100,
			'subastador_id' => 3,
			'subcategoria_id' => 11,
			'comprador_id' => 2
		]);

		for ($i=0; $i < 10; $i++) { 
			$precio = rand(50,5000);
			Articulo::create([
					'nombre_producto' => $faker->word." ".$faker->word,
					'modelo' => $faker->word,
					'estado' => 'Optimo',
					'descripcion' => $faker->text($maxNbChars = 200),
					'localizacion' => 'Canovellas',
					'precio_venta' => $precio,
					'fecha_inicio' => $faker->dateTimeThisYear($max = 'now'),
					'fecha_final' => $faker->dateTimeThisYear($max = 'now'),
					'fecha_venda' => $faker->dateTimeThisYear($max = 'now'),
					'precio_inicial' => $precio,
					'puja_mayor' => $precio,
					'porrogado'=> 0,
					'incremento_precio' => rand(5,200),
					'subastador_id' => rand(2,10),
					'subcategoria_id' => rand(2,5),
					'comprador_id' => -1
				]);
		}
		
	}
}