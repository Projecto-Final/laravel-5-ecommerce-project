<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('usuario_id')->unsigned();     
			$table->foreign('usuario_id')->references('id')->on('articulos');
			$table->integer('articulo_id')->unsigned();
			$table->foreign('articulo_id')->references('id')->on('articulos');
			$table->string('nif');
			$table->double('cantidad_pagada', 20, 2);
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
		Schema::drop('facturas');
	}

}
