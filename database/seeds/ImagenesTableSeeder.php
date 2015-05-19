<?php

use Illuminate\Database\Seeder;
use App\Imagen;

class ImagenesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('imagenes')->delete();

		Imagen::create([
			'descripcion' => "caratula-juego-jojo",
			'articulo_id' => 1,
			'imagen' => "JoJos-Bizarre-Adventure-All-Star-Battle.jpg",
		]);

		Imagen::create([
			'descripcion' => "el pobre thomas",
			'articulo_id' => 1,
			'imagen' => "thomas.jpg",
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