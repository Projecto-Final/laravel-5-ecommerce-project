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

		// $this->call('ArticulosTableSeeder');
		$this->call('CategoriasTableSeeder');
		// $this->call('ConfiguracionPujasTableSeeder');
		// $this->call('EmpresasTableSeeder');
		// $this->call('EscalasTableSeeder');
		// $this->call('LiniasMsTableSeeder');
		// $this->call('MensajesTableSeeder');
		// $this->call('PujasTableSeeder');
		// $this->call('SubCategoriasTableSeeder');
		$this->call('UsuariosTableSeeder');
	}

}
