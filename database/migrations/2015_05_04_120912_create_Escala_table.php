<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscalasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Escalas', function(Blueprint $table)
		{
            $table->string('descripcion');
            $table->integer('valor')->unsigned();
            $table->foreign('valor')->references('puntuacion')->on('valoraciones');
            $table->rememberToken();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Escalas');
	}

}
