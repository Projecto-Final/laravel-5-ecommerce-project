@extends('layouts.admin')

@section('titulo', 'Escritorio -> Subcategorias -> Crear Subcategoría')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Editar Subcategoria')

@section('descripcion_pagina', 'Crear una nueva SUBCATEGORÍA.')


@section('contenido')
<div class="row">
	<div class="col-md-6">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Subcategoría</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form role="form" action="{{ url(''.URL::current()) }}" method="post" >
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- text input -->
					<h3 class="text-aqua">Detalles nueva Subcategoria</h3>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" placeHolder="Introduce nombre...">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea class="form-control"  name="descripcion" rows="3" placeholder="Introduce Descripción..."></textarea>
					</div>
					<label class="text-aqua">Selecciona Categoria perteneciente.</label>
					<div class="form-group">
						<div class="form-group">
							<select name="categoria_id" class="form-control">
								@forelse($categorias as $categoria)
								<option value="{{ $categoria['id'] }}"> {{ $categoria['nombre'] }}</option>
								@empty
								<option>No hay categorias creadas </option>
								@endforelse
							</select>
						</div>
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