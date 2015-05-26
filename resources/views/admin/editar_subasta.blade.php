@extends('layouts.admin')

@section('titulo', 'Escritorio -> Subastas -> Edicion de subasta:{ '.$subasta["id"].' }')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Editar Subasta')

@section('descripcion_pagina', 'Modificar campos de una subasta.')



@section('contenido')
<div class="row">
	<div class="col-md-6">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Subasta ID:[{{ $subasta['id'] }}]</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form role="form" action="{{ url(''.URL::current()) }}" method="post" >
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- text input -->
					<h3 class="text-aqua">Detalles Artículo</h3>
					<div class="form-group">
						<label>Modelo</label>
						<input type="text" name="modelo" class="form-control" value="{{ $subasta['modelo'] }}">
                        @if(isset($errors) && ($errors->first('modelo') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('modelo')}}</span>
                        @endif
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre_producto" class="form-control" value="{{ $subasta['nombre_producto'] }}">
                        @if(isset($errors) && ($errors->first('nombre_producto') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('nombre_producto')}}</span>
                        @endif
					</div>
					<div class="form-group">
						<label>Estado</label>
						<input type="text" name="estado" class="form-control" value="{{ $subasta['estado'] }}">
                        @if(isset($errors) && ($errors->first('estado') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('estado')}}</span>
                        @endif
					</div>
					<div class="form-group">
						<label>Localidad</label>
						<select name="localizacion" class="form-control">
							@forelse($localidades as $localidad)
							<option value="{{ $localidad['id'] }}">{{ $localidad['nombre'] }}</option>
							@empty
							<option>Sin registros</option>
							@endforelse
						</select>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea class="form-control"  name="descripcion" rows="3" placeholder="Sin descripcion...">{{ $subasta['descripcion'] }}</textarea>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
					</div>
					<h3 class="text-aqua">Detalles Subastador/Comprador</h3>
					<div class="form-group">
						<div class="form-group">
							<label>Subastador</label>
							<select name="subastador_id" class="form-control">
								<option value="-1">Ninguno asignado</option>
								@forelse($usuarios as $usuario)
								@if($usuario['id']==$subasta['subastador_id'])
								<option value="{{ $usuario['id'] }}" selected>{{ $usuario['nombre'] }}</option>
								@else
								<option value="{{ $usuario['id'] }}">{{ $usuario['nombre'] }}</option>
								@endif
								
								@empty
								<option>Sin registros</option>
								@endforelse
							</select>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
						<div class="form-group">
							<label>Comprador</label>
							<select name="comprador_id" class="form-control">
								<option value="-1">No hay comprador</option>
								@forelse($usuarios as $usuario)
								@if($usuario['id']==$subasta['comprador_id'])
								<option value="{{ $usuario['id'] }}" selected>{{ $usuario['nombre'] }}</option>
								@else
								<option value="{{ $usuario['id'] }}">{{ $usuario['nombre'] }}</option>
								@endif
								
								@empty
								<option>Sin registros</option>
								@endforelse
							</select>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
					</div>
					<h3 class="text-aqua">Detalles Categorización</h3>
					<div class="form-group">
						<div class="form-group">
							<label>Categoria</label>
							<select name="subcategoria_id" class="form-control">
								@forelse($subcategorias as $subcategoria)
								@if($subcategoria['id']==$subasta['subcategoria_id'])
								<option value="{{ $subcategoria['id'] }}" selected>{{ $subcategoria['nombre'] }}</option>
								@else
								<option value="{{ $subcategoria['id'] }}">{{ $subcategoria['nombre'] }}</option>
								@endif
								
								@empty
								<option>Sin registros</option>
								@endforelse
							</select>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
					</div>
					<h3 class="text-aqua">Detalles Precio</h3>
					<div class="form-group">
						<label>Precio Inicial</label>
						<div class="input-group">
							<input type="text" name="precio_inicial" class="form-control" value="{{ $subasta['precio_inicial'] }}">
							<span class="input-group-addon">€</span>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
						<label>Incremento</label>
						<div class="input-group">
							<input type="text" name="incremento_precio" class="form-control" value="{{ $subasta['incremento_precio'] }}">
							<span class="input-group-addon">€</span>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
						<label>Precio Venda</label>
						<div class="input-group">
							<input type="text" name="precio_venta" class="form-control" value="{{ $subasta['precio_venta'] }}">
							<span class="input-group-addon">€</span>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
						<label>Mayor Puja</label>
						<div class="input-group">
							<input type="text" name="puja_mayor" class="form-control" value="{{ $subasta['puja_mayor'] }}">
							<span class="input-group-addon">€</span>
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
					</div>
					<h3 class="text-aqua">Detalles Fechas</h3>
					<div class="form-group">
						<label>Fecha Creación</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_inicio" class="form-control" value="{{ $subasta['fecha_inicio']}}">
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
						<label>Fecha Final</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_final" class="form-control" value="{{ $subasta['fecha_final']}}">
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
						<label>Fecha Venda</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_venda" class="form-control" value="{{ $subasta['fecha_venda']}}">
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
                        @endif
						</div>
						<div class="form-group">
							<label>Porrogado</label>
							<input type="text" name="porrogado" class="form-control" value="{{ $subasta['porrogado'] }}">
                        @if(isset($errors) && ($errors->first('localizacion') !== null))
                          <br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
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