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
            $table->integer('emisor_id')->unsigned();
            $table->foreign('emisor_id')->references('id')->on('usuarios');
            $table->integer('receptor_id')->unsigned();
            $table->foreign('receptor_id')->references('id')->on('usuarios');
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
