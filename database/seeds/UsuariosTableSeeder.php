<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuariosTableSeeder extends Seeder {

	public function run()
	{
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

		Usuario::create([
			'nombre' => 'Usuario',
			'apellido' => 'Technician',
			'direccion' => 'C/ cadaques, La Llagosta',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 1,
			'permisos' => 0,
			'email' => 'user@user.com',
			'password' => bcrypt('niconiconii'),
			'username' => 'Mr.Salami',
		]);

		Usuario::create([
			'nombre' => 'Usuaria',
			'apellido' => 'Tehnician',
			'direccion' => 'C/ serrucho, Canovelles',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 1,
			'permisos' => 0,
			'email' => 'asdf@user.com',
			'password' => bcrypt('123456'),
			'username' => 'Twilight',
		]);
	}
}