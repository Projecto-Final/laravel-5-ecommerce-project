<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Illuminate\Database\Seeder;
use App\Usuario;

class UsuariosTableSeeder extends Seeder {

	public function run()
	{
		DB::table('usuarios')->delete();

		Usuario::create([
			'nombre' => 'Admin',
			'apellido' => 'Admin',
			'direccion' => 'c/ fake 1234',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'pozo.jpg',
			'reputacion' => 5,
			'texto_presentacion' => 'administrador de 99pujas'
			'permisos' => 1,
			'localidad_id' => 1;
			'email' => 'info.mail.3fym@gmail.com',
			'activa' => true,
			'password' => bcrypt('info123456'),
			'username' => 'admin',
		]);

		Usuario::create([
			'nombre' => 'Adria',
			'apellido' => 'Pozo',
			'direccion' => 'c/ mogoda 23',
			'imagen_perfil' => 'pozo.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 4,
			'texto_presentacion' => 'asdf'
			'permisos' => 0,
			'localidad_id' => 1;
			'email' => 'adria.pozo.93@gmail.com',
			'activa' => true,
			'password' => bcrypt('123456'),
			'username' => 'Wellspirit',
		]);

		Usuario::create([
			'nombre' => 'Sergio',
			'apellido' => 'Sanchez',
			'direccion' => 'c/ cadaques 6',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 3,
			'texto_presentacion' => 'asdf'
			'permisos' => 0,
			'localidad_id' => 1;
			'email' => 'sergio.yo7@gmail.com',
			'activa' => true,
			'password' => bcrypt('123456'),
			'username' => 'Gafas',
		]);

		Usuario::create([
			'nombre' => 'Alejandro',
			'apellido' => 'Maroto',
			'direccion' => 'c/ pintor fortun',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 5,
			'texto_presentacion' => 'asdf'
			'permisos' => 0,
			'localidad_id' => 1;
			'email' => 'nirk.maroto@gmail.com',
			'activa' => true,
			'password' => bcrypt('123456'),
			'username' => 'Dakota',
		]);

		Usuario::create([
			'nombre' => 'Bartomeu',
			'apellido' => 'Cot',
			'direccion' => 'c/ sant fost',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 5,
			'texto_presentacion' => 'asdf'
			'permisos' => 0,
			'localidad_id' => 1;
			'email' => 'btmcant92@gmail.com',
			'activa' => true,
			'password' => bcrypt('123456'),
			'username' => 'btm',
		]);

		Usuario::create([
			'nombre' => 'Mateo',
			'apellido' => 'Martinez',
			'direccion' => 'c/ ayuntamiento',
			'imagen_perfil' => 'default.jpg',
			'imagen_background' => 'default_wallpaper.jpg',
			'reputacion' => 5,
			'texto_presentacion' => 'asdf'
			'permisos' => 0,
			'localidad_id' => 1;
			'email' => 'prueba123@gmail.com',
			'activa' => true,
			'password' => bcrypt('123456'),
			'username' => 'matthew',
		]);
	}
}