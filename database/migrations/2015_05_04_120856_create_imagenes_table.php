<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagenes', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('articulo_id')->unsigned();
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->string('imagen');
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
		Schema::drop('imagenes');
	}

}
