<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePujasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pujas', function(Blueprint $table)
		{
            $table->increments('id');
            $table->float('cantidad');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('articulos');
            $table->integer('id_pujador')->unsigned();
            $table->foreign('id_pujador')->references('id')->on('usuarios');
            $table->date('fechaPuja');
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
		Schema::drop('pujas');
	}

}
