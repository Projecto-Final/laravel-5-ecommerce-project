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
			'descripcion' => "silla-neo-roja",
			'articulo_id' => 3,
			'imagen' => "silla_neo.jpg",
		]);

	}
}