@extends('layouts.admin')

@section('titulo', 'Escritorio -> Subcategorías -> Edición de Subcategoría:{ '.$subCategoria["id"].' }')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Editar Subcategoria')

@section('descripcion_pagina', 'Modificar campos de una SUBCATEGORÍA.')


@section('contenido')

<div class="row">
	<div class="col-md-6">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Subcategoría ID:[{{ $subCategoria['id'] }}]</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form role="form" action="{{ url(''.URL::current()) }}" method="post" >
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- text input -->
					<h3 class="text-aqua">Detalles Subcategoría</h3>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" value="{{ $subCategoria['nombre'] }}">
						@if(isset($errors) && ($errors->first('nombre') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('nombre')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea class="form-control"  name="descripcion" rows="3" placeholder="Introduce reputacion...">{{ $subCategoria['descripcion'] }}</textarea>
						@if(isset($errors) && ($errors->first('descripcion') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('descripcion')}}</span>
						@endif
					</div>
					<label class="text-aqua">Configuración Categoria</label>
					<div class="form-group">
						<div class="form-group">
							<select name="categoria_id" class="form-control">
								@forelse($categorias as $categoria)
								@if($categoria['id']==$subCategoria['categoria_id'])
								<option value="{{ $categoria['id'] }}" selected> {{ $categoria['nombre'] }}</option>
								@else
								<option value="{{ $categoria['id'] }}"> {{ $categoria['nombre'] }}</option>
								@endif
								@empty
								<option>No hay categorias creadas </option>
								@endforelse
							</select>
						</div>
					@if(isset($errors) && ($errors->first('categoria_id') !== null))
						<span class="errorSys">&nbsp;{{$errors->first('categoria_id')}}</span>
					@endif
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