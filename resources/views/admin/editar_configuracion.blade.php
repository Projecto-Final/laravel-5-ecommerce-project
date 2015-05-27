@extends('layouts.admin')

@section('titulo', 'Escritorio -> Configuración -> Edicion de Configuración')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Editar Configuración')

@section('descripcion_pagina', 'Modificar la configuración de la empresa.')


@section('contenido')
<div class="row">
	<div class="col-md-6">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Detalles</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form role="form" action="{{ url(''.URL::current()) }}" method="post" >
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- text input -->
					<h3 class="text-aqua">Empresa</h3>
						<label>Nombre</label>
						@if(!(isset($errors)&&($errors->first('nombre')!=null)))
						<div class="form-group">
						<input type="text" name="nombre" class="form-control" value="{{ $configuracion['nombre'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="nombre" class="form-control" value="{{ $configuracion['nombre'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('nombre')}}</label>
						</div>
						@endif
						<label>Dirección</label>
						@if(!(isset($errors)&&($errors->first('direccion')!=null)))
						<div class="form-group">
						<input type="text" name="direccion" class="form-control" value="{{ $configuracion['direccion'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="direccion" class="form-control" value="{{ $configuracion['direccion'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('direccion')}}</label>
						</div>
						@endif
					<h3 class="text-aqua">Pujas</h3>
						<label>Tiempo Artículo</label>
						@if(!(isset($errors)&&($errors->first('tiempoArticulo')!=null)))
						<div class="form-group">
						<input type="text" name="tiempoArticulo" class="form-control" value="{{ $configuracion['tiempoArticulo'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="tiempoArticulo" class="form-control" value="{{ $configuracion['tiempoArticulo'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('tiempoArticulo')}}</label>
						</div>
						@endif
						<label>Tiempo Porroga Artículo</label>
						@if(!(isset($errors)&&($errors->first('tiempoPorrogaArticulo')!=null)))
						<div class="form-group">
						<input type="text" name="tiempoPorrogaArticulo" class="form-control" value="{{ $configuracion['tiempoPorrogaArticulo'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="tiempoPorrogaArticulo" class="form-control" value="{{ $configuracion['tiempoPorrogaArticulo'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('tiempoPorrogaArticulo')}}</label>
						</div>
						@endif
						<label>Tiempo Inactividad (Maximo) </label>
						@if(!(isset($errors)&&($errors->first('inactividad')!=null)))
						<div class="form-group">
						<input type="text" name="inactividad" class="form-control" value="{{ $configuracion['inactividad'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="inactividad" class="form-control" value="{{ $configuracion['inactividad'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('inactividad')}}</label>
						</div>
						@endif
						<label>Sobrecoste Porroga </label>
						@if(!(isset($errors)&&($errors->first('precioPorroga')!=null)))
						<div class="form-group">
						<input type="text" name="precioPorroga" class="form-control" value="{{ $configuracion['precioPorroga'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="precioPorroga" class="form-control" value="{{ $configuracion['precioPorroga'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('precioPorroga')}}</label>
						</div>
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