<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Add calls to Seeders here
		$this->call('EmpresasTableSeeder');
		$this->call('UsuariosTableSeeder');
		$this->call('CategoriasTableSeeder');
		$this->call('ArticulosTableSeeder');
		$this->call('EscalasTableSeeder');
		$this->call('MensajesTableSeeder');
		$this->call('ConfiguracionPujasTableSeeder');
		$this->call('PujasTableSeeder');
		$this->call('LiniaMsTableSeeder');
		$this->call('SubcategoriasTableSeeder');
		$this->call('ValoracionesTableSeeder');
		$this->call('ImagenesTableSeeder');
		$this->call('LocalidadesTableSeeder');
		$this->call('FacturasTableSeeder');
		$this->call('Metodo_pagosTableSeeder');
		$this->call('Metodo_enviosTableSeeder');
		
		

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}