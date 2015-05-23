@extends('layouts.admin')

@section('titulo', 'Escritorio -> Limpiar cache')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Cache')

@section('descripcion_pagina', 'Limpiar cache y mejorar funcionamiento de la página..')

@section('contenido')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<div class="box-body">
			<p style="color:red;">Al entrar en esta pagina, <b>has limpiado la cache del sistema satisfactoriamente</b>, limpiarla de nuevo, recarga la página con F5 
			o presiona el boton inferior.</p>
			<a class="btn btn-primary" href="{{ URL::current() }}">Limpiar cache de nuevo.</a>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop

@section('scripts_extra')
@stop