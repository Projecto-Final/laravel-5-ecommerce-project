<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faturas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('usuario_id')->unsigned();     
			$table->foreign('usuario_id')->references('id')->on('usuarios');
			$table->string('nif');
			$table->double('cantidad_pagada');
			$table->dateTime('fecha');
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
		Schema::drop('faturas');
	}

}
