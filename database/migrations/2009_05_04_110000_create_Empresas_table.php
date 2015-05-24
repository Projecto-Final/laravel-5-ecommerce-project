<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('nombre');
            $table->integer('direccion');
            $table->integer('tiempoArticulo');
            $table->integer('tiempoPorrogaArticulo');
            $table->integer('inactividad');
            $table->double('precioPorroga', 20, 2);
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
		Schema::drop('empresas');
	}

}
