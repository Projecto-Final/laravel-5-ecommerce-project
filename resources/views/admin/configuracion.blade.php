@extends('layouts.admin')

@section('titulo', 'Escritorio -> Configuración')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Categorías')

@section('descripcion_pagina', 'Listado de categorías y opciones CRUD.')

@section('contenido')
<div class="row">
	<div class="col-lg-7">
		<div class="box box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title">Detalles de la Empresa</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>Nombre: </dt>
					<dd>{{ $empresa[0]["nombre"] }}</dd>
					<dt>Direccion: </dt>
					<dd>{{ $empresa[0]["direccion"] }}</dd>
					<dt>Tiempo Articulo: </dt>
					<dd>{{ $empresa[0]["tiempoArticulo"] }}</dd>
					<dt>Tiempo Porroga Articulo: </dt>
					<dd>{{ $empresa[0]["tiempoPorrogaArticulo"] }}</dd>
					<dt>Tiempo Inactividad (MAX): </dt>
					<dd>{{ $empresa[0]["inactividad"] }}</dd>
					<dt>Sobrecoste Porroga: </dt>
					<dd>{{ $empresa[0]["precioPorroga"] }}</dd>
				  </dl>
				  <a href="{{ url('administracion/configuracion/editar') }}" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> Editar Configuración </a>
				</div><!-- /.box-body -->
			  </div>
	</div>
</div>
@stop

@section('scripts_extra')
@stop