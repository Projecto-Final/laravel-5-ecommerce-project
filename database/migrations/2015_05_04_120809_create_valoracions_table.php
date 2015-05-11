<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoracionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('valoracions', function(Blueprint $table)
		{
            $table->increments('id');
            $table->longText('texto');
            $table->integer('valorado_id')->unsigned();
            $table->foreign('valorado_id')->references('id')->on('usuarios');
            $table->integer('validante_id')->unsigned();
            $table->foreign('validante_id')->references('id')->on('usuarios');
            $table->integer('puntuacion')->unsigned();
            $table->foreign('puntuacion')->references('id')->on('escalas');
            $table->date('fecha');
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
		Schema::drop('valoracions');
	}

}