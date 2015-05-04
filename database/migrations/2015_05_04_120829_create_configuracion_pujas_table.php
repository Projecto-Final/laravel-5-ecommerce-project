<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionPujasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuracion_pujas', function(Blueprint $table)
		{
            $table->increments('id');
            $table->float('pujaMaxima');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('articulos');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->boolean('superada');
            $table->date('fechaConfig');
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
		Schema::drop('configuracion_pujas');
	}

}
