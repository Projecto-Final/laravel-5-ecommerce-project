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
		]);
	}
}