<?php

use Illuminate\Database\Seeder;
use App\Mensaje;

class MensajesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('mensajes')->delete();

		Mensaje::create([
			'titulo' => 'Hola, gracias por comprar <3',
			'emisor_id' => 3,
			'receptor_id' => 2,
			'fecha' => "2015-04-15 22:13:35",
		]);
		Mensaje::create([
			'titulo' => 'Cuando quieras (y)',
			'emisor_id' => 2,
			'receptor_id' => 3,
			'fecha' => "2015-04-16 12:54:51",
		]);
	}
}