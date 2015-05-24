<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Usuario;

class UsuariosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create("es_ES");
		DB::table('usuarios')->delete();

		Usuario::create([
			'nombre' => 'Admin',
			'apellido' => 'Admin',
			'direccion' => 'sky',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 5,
			'permisos' => 1,
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin'),
			'username' => 'admin',
		]);

		for ($i=0; $i < 10; $i++) { 
			$nombre = $faker->firstName;
			$apellido = $faker->lastName;
			Usuario::create([
			'nombre' => $nombre,
			'apellido' => $apellido,
			'direccion' => $faker->address,
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => rand( 0 , 5 ),
			'permisos' => 0,
			'email' => $nombre."@gmail.com",
			'password' => bcrypt('global'),
			'username' => $nombre."-".$apellido."-".rand( 0 , 99 ),
		]);
		}
		
	}
}