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
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" value="{{ $configuracion['nombre'] }}">
						@if(isset($errors) && ($errors->first('nombre') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('nombre')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Dirección</label>
						<input type="text" name="direccion" class="form-control" value="{{ $configuracion['direccion'] }}">
						@if(isset($errors) && ($errors->first('direccion') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('direccion')}}</span>
						@endif
					</div>
					<h3 class="text-aqua">Pujas</h3>
					<div class="form-group">
						<label>Tiempo Artículo</label>
						<input type="text" name="tiempoArticulo" class="form-control" value="{{ $configuracion['tiempoArticulo'] }}">
						@if(isset($errors) && ($errors->first('tiempoArticulo') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('tiempoArticulo')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Tiempo Porroga Artículo</label>
						<input type="text" name="tiempoPorrogaArticulo" class="form-control" value="{{ $configuracion['tiempoPorrogaArticulo'] }}">
						@if(isset($errors) && ($errors->first('tiempoPorrogaArticulo') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('tiempoPorrogaArticulo')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Tiempo Inactividad (Maximo) </label>
						<input type="text" name="inactividad" class="form-control" value="{{ $configuracion['inactividad'] }}">
						@if(isset($errors) && ($errors->first('inactividad') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('inactividad')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Sobrecoste Porroga </label>
						<input type="text" name="precioPorroga" class="form-control" value="{{ $configuracion['precioPorroga'] }}">
						@if(isset($errors) && ($errors->first('precioPorroga') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('precioPorroga')}}</span>
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