<?php

use Illuminate\Database\Seeder;
use App\Imagen;

class ImagenesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('imagenes')->delete();

		Imagen::create([
			'descripcion' => "pokemon y",
			'articulo_id' => 1,
			'imagen' => "0004549674259_500X500.jpg",
		]);

		Imagen::create([
			'descripcion' => "java",
			'articulo_id' => 2,
			'imagen' => "Sun-Java-JDK_1.jpg",
		]);

		Imagen::create([
			'descripcion' => "taza batman",
			'articulo_id' => 3,
			'imagen' => "taza-de-batman-negra-dc-comics-4dageek-147001-MLM7919052177_022015-O.jpg",
		]);

		Imagen::create([
			'descripcion' => "hulk",
			'articulo_id' => 4,
			'imagen' => "guantes-de-hulk-con-con-sonidos-marvel-original-20233-MLV20185939378_102014-F.jpg",
		]);

		Imagen::create([
			'descripcion' => "haruhi",
			'articulo_id' => 5,
			'imagen' => "8690-1.jpg",
		]);

		Imagen::create([
			'descripcion' => "gorra",
			'articulo_id' => 6,
			'imagen' => "Zvcml21290257Qkl.jpg",
		]);

		Imagen::create([
			'descripcion' => "galaxy",
			'articulo_id' => 7,
			'imagen' => "51r-VHwUUqL._SX425_.jpg",
		]);

		Imagen::create([
			'descripcion' => "proteinas",
			'articulo_id' => 8,
			'imagen' => "506_proteina-7-en-1-muscle-infusion-black-5lbs-nutrex_mpe-f-3652815987_012013.jpg",
		]);

		Imagen::create([
			'descripcion' => "ultimate",
			'articulo_id' => 8,
			'imagen' => "PD14034225_image-1_2872851b.jpg",
		]);
	}
}