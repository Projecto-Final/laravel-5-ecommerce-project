<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articulos', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('nombre_producto');
            $table->string('modelo');
            $table->string('estado');
            $table->string('descripcion');
            $table->string('localizacion');
            $table->double('precio_venta');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->boolean('vendido');
            $table->date('fecha_venda');
            $table->double('precio_inicial');
            $table->double('puja_mayor');
            $table->integer('id_subastador')->unsigned();
            $table->foreign('id_subastador')->references('id')->on('usuarios');
            $table->integer('id_subcategoria')->unsigned();
            $table->foreign('id_subcategoria')->references('id')->on('subcategorias');
            $table->integer('id_comprador')->unsigned();
            $table->foreign('id_comprador')->references('id')->on('usuarios');
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
		Schema::drop('articulos');
	}

}
