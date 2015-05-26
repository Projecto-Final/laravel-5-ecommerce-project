@extends('layouts.admin')

@section('titulo', 'Escritorio -> Usuarios -> Edicion de usuario:{ '.$usuario["id"].' }')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Editar Usuario')

@section('descripcion_pagina', 'Modificar campos de un USUARIO.')


@section('contenido')
<div class="row">
	<div class="col-md-6">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Usuario ID:[{{ $usuario['id'] }}]</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form role="form" action="{{ url(''.URL::current()) }}" method="post" >
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- text input -->
					<h3 class="text-aqua">Detalles Usuario</h3>
					<div class="form-group">
						<label>Imagen Perfil</label>
						<input type="text" name="imagen_perfil" class="form-control" value="{{ $usuario['imagen_perfil'] }}">
						<p class="text-red">^-Falta añadir un cargador de imagenes! </p>
						@if(isset($errors) && ($errors->first('imagen_perfil') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('imagen_perfil')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Nombre Usuario ( Publico )</label>
						<input type="text" name="username" class="form-control" value="{{ $usuario['username'] }}">
						@if(isset($errors) && ($errors->first('username') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('username')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" value="{{ $usuario['nombre'] }}">
						@if(isset($errors) && ($errors->first('nombre') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('nombre')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Apellido</label>
						<input type="text" name="apellido" class="form-control" value="{{ $usuario['apellido'] }}">
						@if(isset($errors) && ($errors->first('apellido') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('apellido')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" value="{{ $usuario['email'] }}">
						@if(isset($errors) && ($errors->first('email') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('email')}}</span>
						@endif
					</div>
					<div class="form-group">
						<label>Reputación</label>
						<textarea class="form-control"  name="reputacion" rows="3" placeholder="Introduce reputacion...">{{ $usuario['reputacion'] }}</textarea>
						@if(isset($errors) && ($errors->first('reputacion') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('reputacion')}}</span>
						@endif
					</div>
					<h3 class="text-aqua">Configuración Permisos</h3>
					<div class="form-group">
						<div class="form-group">
							<select name="permisos" class="form-control">
								@if($usuario['permisos']==0)
								<option value="0" selected>Usuario Normal</option>
								<option value="1">Usuario Administrador</option>
								@else
								<option value="0">Usuario Normal</option>
								<option value="1" selected>Usuario Administrador</option>
								@endif
							</select>
						</div>
						@if(isset($errors) && ($errors->first('permisos') !== null))
							<span class="errorSys">&nbsp;{{$errors->first('permisos')}}</span>
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