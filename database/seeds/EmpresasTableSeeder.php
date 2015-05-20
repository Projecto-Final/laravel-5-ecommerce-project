<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('empresas')->delete();

		Empresa::create([
			'nombre' => '3F&M',
			'direccion' => 'C/ Stand, La Llagosta',
			'tiempoArticulo' => '4',
			'tiempoPorrogaArticulo' => '4',
			'inactividad'=>'4',
			'precioPorroga'=>'4.4',
		]);
	}
}