<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsuariosTableSeeder extends Seeder {

	public function run()
	{

		\App\Usuario::create([
			'nombre' => 'Admin',
			'apellido' => 'Admin',
			'direccion' => 'sky',
			'imagen' => 'default.jpg',
			'reputacion' => 5,
			'permisos' => 1,
			'password' => bcrypt('admin'),
			'username' => 'admin',
			'email' => 'admin@admin.com',
		]);

		\App\Usuario::create([
			'nombre' => 'Usuario',
			'apellido' => 'Technician',
			'direccion' => 'C/ cadaques, La Llagosta',
			'imagen' => 'default.jpg',
			'reputacion' => 1,
			'permisos' => 0,
			'password' => bcrypt('niconiconii'),
			'username' => 'Mr.Salami',
			'email' => 'user@user.com',
		]);

		\App\Usuario::create([
			'nombre' => 'Usuaria',
			'apellido' => 'Tehnician',
			'direccion' => 'C/ serrucho, Canovelles',
			'imagen' => 'default.jpg',
			'reputacion' => 1,
			'permisos' => 0,
			'password' => bcrypt('123456'),
			'username' => 'Twilight',
			'email' => 'asdf@user.com',
		]);

		TestDummy::times(1)->create('App\Usuario');
	}
}