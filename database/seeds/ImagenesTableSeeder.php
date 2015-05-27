<?php

use Illuminate\Database\Seeder;
use App\Imagen;

class ImagenesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('imagenes')->delete();


		Imagen::create([
			'descripcion' => "el pobre thomas",
			'articulo_id' => 1,
			'imagen' => "0_52_c4ca4238a0b923820dcc509a6f75849b.png",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 2,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 3,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 4,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 5,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 6,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 7,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 8,
			'imagen' => "maroto.jpg",
			]);


		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 9,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 10,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 11,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 12,
			'imagen' => "maroto.jpg",
			]);

		Imagen::create([
			'descripcion' => "yare-yare",
			'articulo_id' => 13,
			'imagen' => "maroto.jpg",
			]);
	}
}