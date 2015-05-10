<?php

use Illuminate\Database\Seeder;
use App\Subcategoria;

class SubcategoriasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('subcategorias')->delete();

		Subcategoria::create([
			'nombre' => 'Videojuegos',
			'descripcion' => 'Encuentra todo tipo de juegos, a precios de escándalo.',
			'categoria_id' => 1,
		]);
		Subcategoria::create([
			'nombre' => 'Moviles',
			'descripcion' => 'Encuentra reliquias del siglo pasado, o actualiza tu actual móvil a precios de vértigo.e',
			'categoria_id' => 1,
		]);
		Subcategoria::create([
			'nombre' => 'Electrodomésticos',
			'descripcion' => 'Electrodomésticos de todo tipo, neveras, lavavajillas, microondas y muchos mas.',
			'categoria_id' => 1,
		]);

		Subcategoria::create([
			'nombre' => 'Complementos',
			'descripcion' => 'El regalo ideal, dale una buena sorpresa con el complemento ideal.',
			'categoria_id' => 2,
		]);
		Subcategoria::create([
			'nombre' => 'Ropa de vestir',
			'descripcion' => 'Todas las marcas, con precios que cuestan de creer.',
			'categoria_id' => 2,
		]);
		Subcategoria::create([
			'nombre' => 'Lenceria',
			'descripcion' => 'Te sientes atrevido, entra y mira nuestra gama de ropa interior.',
			'categoria_id' => 2,
		]);

		Subcategoria::create([
			'nombre' => 'Literatura',
			'descripcion' => 'Clasicos y novedades.',
			'categoria_id' => 3,
		]);
		Subcategoria::create([
			'nombre' => 'Comics/Mangas',
			'descripcion' => 'Te falta un tomo para terminar la colección? aquí lo encontraras, tu alma freak te lo pide.',
			'categoria_id' => 3,
		]);
		Subcategoria::create([
			'nombre' => 'Poesia',
			'descripcion' => 'Para los mas románticos, dedícale un buen poema a esa amada persona.',
			'categoria_id' => 3,
		]);
		Subcategoria::create([
			'nombre' => 'Otros',
			'descripcion' => 'Biografías, diccionarios, manuales y otros géneros.',
			'categoria_id' => 3,
		]);

		Subcategoria::create([
			'nombre' => 'Interior',
			'descripcion' => 'Todo tipo de tendencias para decorar tu hogar o local.',
			'categoria_id' => 4,
		]);
		Subcategoria::create([
			'nombre' => 'Exterior',
			'descripcion' => 'Todo tipo de tendencias para decorar tu patio, o tu terraza.',
			'categoria_id' => 4,
		]);

		Subcategoria::create([
			'nombre' => 'Coleccionables',
			'descripcion' => 'Te gusta coleccionar cartas, fichas, tapas, amplia tu colección aun mas.',
			'categoria_id' => 5,
		]);
		Subcategoria::create([
			'nombre' => 'Figuras de accion',
			'descripcion' => 'Tus personajes preferidos, hulk, batman, iron man, i muchos otros, aquí te esperan.',
			'categoria_id' => 5,
		]);
		Subcategoria::create([
			'nombre' => 'Rompecabezas',
			'descripcion' => 'Un buen rompecabezas, vale todo el tiempo del mundo.',
			'categoria_id' => 5,
		]);
		Subcategoria::create([
			'nombre' => 'Antigüedades para restaurar',
			'descripcion' => 'Te gusta restaurar viejos utensilios, o objetos del pasado, encuentra lo que buscas aquí.',
			'categoria_id' => 6,
		]);
	}
}