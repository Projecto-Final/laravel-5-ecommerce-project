<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CategoriasTableSeeder extends Seeder {

	public function run()
	{

		\App\Categoria::create([
			'nombre' => 'Tecnologia',
			'descripcion' => 'Nos sobran fifas de segunda mano, ninguno de este año',
		]);
		\App\Categoria::create([
			'nombre' => 'Ropa',
			'descripcion' => 'To sesi to porno',
		]);
		\App\Categoria::create([
			'nombre' => 'Libros',
			'descripcion' => 'Posturea que eres intelectual',
		]);
		\App\Categoria::create([
			'nombre' => 'Muebles',
			'descripcion' => 'Porque te gusta la madera',
		]);
		\App\Categoria::create([
			'nombre' => 'Jugetes',
			'descripcion' => 'Si entras aqui es que no eres tan mayor',
		]);                                                                          
		\App\Categoria::create([
			'nombre' => 'Otros',
			'descripcion' => 'Aqui pueden aparecer hasta dinosaurios',
		]);

	}

}
