<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SubcategoriasTableSeeder extends Seeder {

	public function run()
	{

		\App\Subcategoria::create([
			'nombre' => 'Videojuegos',
			'descripcion' => 'Aqui el call of duty no cuesta 70€',
			'categoria_id' => 1,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Mobiles',
			'descripcion' => 'Deja el wasap en clase',
			'categoria_id' => 1,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Electrodomesticos',
			'descripcion' => 'Compra dos lavadoras en mal estado y haz carreras',
			'categoria_id' => 1,
		]);

		\App\Subcategoria::create([
			'nombre' => 'Complementos',
			'descripcion' => 'Contra mas brille mas swagg',
			'categoria_id' => 2,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Ropa de vestir',
			'descripcion' => 'A enseñar carne',
			'categoria_id' => 2,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Lenceria (+18)',
			'descripcion' => 'Con suerte pueden estar usadas',
			'categoria_id' => 2,
		]);

		\App\Subcategoria::create([
			'nombre' => 'Litertura',
			'descripcion' => 'No, puedes, psaaaaaar!!!',
			'categoria_id' => 3,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Comics/Mangas',
			'descripcion' => 'ORE NO SABAKU NO STANDO DAH!!!',
			'categoria_id' => 3,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Poesias',
			'descripcion' => 'Cuando la rima del 5 no es sufiiente...',
			'categoria_id' => 3,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Otros',
			'descripcion' => 'Biografias, diccionarios, manuales y demas niveladores de mesas',
			'categoria_id' => 3,
		]);

		\App\Subcategoria::create([
			'nombre' => 'Interior',
			'descripcion' => 'Vas a esperar a que tu sofa tenga moho?',
			'categoria_id' => 4,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Exterior',
			'descripcion' => 'El camping sin una silla portatil alcolchada y con reposabebidas no es lo mismo',
			'categoria_id' => 4,
		]);

		\App\Subcategoria::create([
			'nombre' => 'Coleccionables',
			'descripcion' => 'Cartas, cromos y esas cosas que sirven para cojer polvo',
			'categoria_id' => 5,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Figuras de accion',
			'descripcion' => 'Quien no quiere ver a Hulk en el Batmovil?',
			'categoria_id' => 5,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Rompecavezas',
			'descripcion' => 'No me seas cabezahueca',
			'categoria_id' => 5,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Jugetes sexuales (+18)',
			'descripcion' => 'Brrrr Brrrrrrr uinuinuin Brrrrrrrr...',
			'categoria_id' => 5,
		]);

		\App\Subcategoria::create([
			'nombre' => 'Subastas EX',
			'descripcion' => 'Las cosas mas raras de internet, no apto para gente con problemas cardiacos',
			'categoria_id' => 6,
		]);
		\App\Subcategoria::create([
			'nombre' => 'Citas',
			'descripcion' => 'Subastate a ver que pasa, tigreton',
			'categoria_id' => 6,
		]);

		TestDummy::times(1)->create('App\Subcategoria');
	}
}