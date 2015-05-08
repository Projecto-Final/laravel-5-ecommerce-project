<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categorias')->delete();

		Categoria::create([
			'nombre' => 'Tecnologia',
			'descripcion' => 'Nos sobran fifas de segunda mano, ninguno de este año',
		]);
		Categoria::create([
			'nombre' => 'Ropa',
			'descripcion' => 'To sesi to porno',
		]);
		Categoria::create([
			'nombre' => 'Libros',
			'descripcion' => 'Posturea que eres intelectual',
		]);
		Categoria::create([
			'nombre' => 'Muebles',
			'descripcion' => 'Porque te gusta la madera',
		]);
		Categoria::create([
			'nombre' => 'Jugetes',
			'descripcion' => 'Si entras aqui es que no eres tan mayor',
		]);                                                                          
		Categoria::create([
			'nombre' => 'Otros',
			'descripcion' => 'Aqui pueden aparecer hasta dinosaurios',
		]);
	}
}