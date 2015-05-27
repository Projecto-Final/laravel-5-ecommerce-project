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
						<label>Imagen Perfil</label>
						@if(!(isset($errors)&&($errors->first('imagen_perfil')!=null)))
						<div class="form-group">
						<input type="text" name="imagen_perfil" class="form-control" value="{{ $usuario['imagen_perfil'] }}">
						<p class="text-red">^-Falta añadir un cargador de imagenes! </p>
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="imagen_perfil" class="form-control" value="{{ $usuario['imagen_perfil'] }}">
						<p class="text-red">^-Falta añadir un cargador de imagenes! </p>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('imagen_perfil')}}</label>
						</div>
						@endif
						<label>Nombre Usuario ( Publico )</label>
						@if(!(isset($errors)&&($errors->first('username')!=null)))
						<div class="form-group">
						<input type="text" name="username" class="form-control" value="{{ $usuario['username'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="username" class="form-control" value="{{ $usuario['username'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('username')}}</label>
						</div>
						@endif
						<label>Nombre</label>
						@if(!(isset($errors)&&($errors->first('nombre')!=null)))
						<div class="form-group">
						<input type="text" name="nombre" class="form-control" value="{{ $usuario['nombre'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="nombre" class="form-control" value="{{ $usuario['nombre'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('nombre')}}</label>
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Apellido</label>
						@if(!(isset($errors)&&($errors->first('apellido')!=null)))
						<div class="form-group">
						<input type="text" name="apellido" class="form-control" value="{{ $usuario['apellido'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="apellido" class="form-control" value="{{ $usuario['apellido'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('apellido')}}</label>
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Email</label>
						@if(!(isset($errors)&&($errors->first('email')!=null)))
						<div class="form-group">
						<input type="text" name="email" class="form-control" value="{{ $usuario['email'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="email" class="form-control" value="{{ $usuario['email'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('email')}}</label>
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Reputación</label>
						@if(!(isset($errors)&&($errors->first('reputacion')!=null)))
						<div class="form-group">
						<textarea class="form-control"  name="reputacion" rows="3" placeholder="Introduce reputacion...">{{ $usuario['reputacion'] }}</textarea>
						</div>
						@else
						<div class="form-group has-error">
						<textarea class="form-control"  name="reputacion" rows="3" placeholder="Introduce reputacion...">{{ $usuario['reputacion'] }}</textarea>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('reputacion')}}</label>
						</div>
						@endif
					</div>
					<h3 class="text-aqua">Configuración Permisos</h3>
						@if(!(isset($errors)&&($errors->first('precio_venta')!=null)))
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
						@else
						<div class="form-group has-error">
							<select name="permisos" class="form-control">
								@if($usuario['permisos']==0)
								<option value="0" selected>Usuario Normal</option>
								<option value="1">Usuario Administrador</option>
								@else
								<option value="0">Usuario Normal</option>
								<option value="1" selected>Usuario Administrador</option>
								@endif
							</select>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('precio_venta')}}</label>
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