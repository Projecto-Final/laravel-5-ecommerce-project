<?php namespace App\Services;

use App\Usuario;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'required|max:255|alpha_num|unique:usuarios',
			'email' => 'required|email|max:255|unique:usuarios',
			'password' => 'required|confirmed|min:6',
			'nombre' => 'required|alpha|max:20',
			'apellido' => 'required|alpha|max:200',
			'direccion' => 'required|max:20',
			]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Usuario
	 */
	public function create(array $data)
	{ 
		return Usuario::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'nombre' => $data['nombre'],
			'apellido' => $data['apellido'],
			'direccion' => $data['direccion'],
			'imagen_perfil' => "default.jpg",
			'imagen_background' => "default_wallpaper.jpg",
			'texto_presentacion' =>$data['texto_presentacion'],
			'localidad_id' =>$data['localidad_id'],
			]);
	}

}
