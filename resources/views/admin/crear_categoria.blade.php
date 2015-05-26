@extends('layouts.admin')

@section('titulo', 'Escritorio -> Categorias -> Crear Categoría')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Editar Categoria')

@section('descripcion_pagina', 'Crear una nueva CATEGORÍA.')


@section('contenido')
<div class="row">
	<div class="col-md-6">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Categoría</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form role="form" action="{{ url(''.URL::current()) }}" method="post" >
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- text input -->
					<h3 class="text-aqua">Detalles Categoria</h3>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" placeHolder="Introduce nombre...">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea class="form-control"  name="descripcion" rows="3" placeholder="Introduce Descripción..."></textarea>
					</div>
					<button class="btn btn-block btn-success btn-flat">Guardar <i class="fa fa-save"></i></button>
				</form>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop

@section('scripts_extra')
@stop