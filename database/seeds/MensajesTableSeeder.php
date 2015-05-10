<?php

use Illuminate\Database\Seeder;
use App\Mensaje;

class MensajesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('mensajes')->delete();

		Mensaje::create([
			'titulo' => 'Texto decente, aquí',
			'emisor_id' => 2,
			'receptor_id' => 3,
		]);
		Mensaje::create([
			'titulo' => 'Texto decente, aquí 2',
			'emisor_id' => 1,
			'receptor_id' => 2,
		]);
	}
}