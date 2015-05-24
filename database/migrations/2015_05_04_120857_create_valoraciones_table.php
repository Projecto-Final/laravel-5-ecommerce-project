<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoracionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('valoraciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->longText('texto');
			$table->integer('articulo_id')->unsigned();
			$table->foreign('articulo_id')->references('id')->on('articulos');
			$table->integer('valorado_id')->unsigned();
			$table->foreign('valorado_id')->references('id')->on('usuarios');
			$table->integer('validante_id')->unsigned();
			$table->foreign('validante_id')->references('id')->on('usuarios');
			$table->integer('puntuacion')->unsigned();
			$table->foreign('puntuacion')->references('id')->on('escalas');
			$table->dateTime('fecha');
			$table->boolean('completada')->default(false);
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
		Schema::drop('valoraciones');
	}
}