<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiniasMsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liniasMs', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('nombre');
            $table->text('texto');
            $table->date('fecha');
            $table->integer('mensaje_id')->unsigned();
            $table->foreign('mensaje_id')->references('id')->on('mensajes');
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
		Schema::drop('liniasMs');
	}

}
