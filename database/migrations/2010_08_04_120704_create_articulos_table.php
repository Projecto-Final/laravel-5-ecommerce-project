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
            $table->double('incremento_precio');
            $table->double('puja_mayor');
            $table->integer('subastador_id')->unsigned();
            $table->foreign('subastador_id')->references('id')->on('usuarios');
            $table->integer('subcategoria_id')->unsigned();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->integer('comprador_id')->unsigned()->nullable();
            $table->foreign('comprador_id')->references('id')->on('usuarios');
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
