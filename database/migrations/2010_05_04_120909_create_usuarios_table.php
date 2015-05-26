<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('imagen_perfil');
            $table->string('imagen_background');
            $table->float('reputacion');
            $table->string('texto_presentacion');
            $table->integer('permisos');
            $table->integer('localidad_id')->references('id')->on('localidades');
            $table->string('email')->unique();
            $table->String('password', 60);
            $table->boolean('activa')->default(true);
            $table->string('username')->unique();
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
		Schema::drop('usuarios');
	}

}
