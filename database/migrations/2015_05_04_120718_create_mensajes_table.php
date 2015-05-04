<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mensajes', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('titulo');
            $table->integer('id_emisor')->unsigned();
            $table->foreign('id_emisor')->references('id')->on('usuarios');
            $table->integer('id_receptor')->unsigned();
            $table->foreign('id_receptor')->references('id')->on('usuarios');
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
		Schema::drop('mensajes');
	}

}
