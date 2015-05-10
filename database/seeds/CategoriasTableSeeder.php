<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categorias')->delete();

		Categoria::create([
			'nombre' => 'Tecnologia',
			'descripcion' => 'Artículos de ayer y hoy a precios irresistibles.',
		]);
		Categoria::create([
			'nombre' => 'Ropa',
			'descripcion' => 'Artículos de moda, de todo tipo, 60,70, 80 y 90, hasta la actualidad.',
		]);
		Categoria::create([
			'nombre' => 'Libros',
			'descripcion' => 'Los mejores precios, clásicos de la literatura, best sellers, entre otros.',
		]);
		Categoria::create([
			'nombre' => 'Muebles',
			'descripcion' => 'Todo tipo de tendencias en muebles, contemporáneos, modernos, clásicos, west y mucho mas.',
		]);
		Categoria::create([
			'nombre' => 'Jugetes',
			'descripcion' => 'Quien ha dicho juguetes? echa un vistazo, encuentra el regalo ideal.',
		]);                                                                          
		Categoria::create([
			'nombre' => 'Otros',
			'descripcion' => 'Si nos falta alguna categoría,es posible que puedas encontrar lo que buscas en esta sección.',
		]);
	}
}