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
						@if(!(isset($errors)&&($errors->first('modelo')!=null)))
						<div class="form-group">
							<input type="text" name="modelo" class="form-control" value="{{ $subasta['modelo'] }}">
						</div>
						@else
						<div class="form-group has-error">
							<input type="text" name="modelo" class="form-control" value="{{ $subasta['modelo'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('modelo')}}</label>
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Nombre</label>
						@if(!(isset($errors)&&($errors->first('nombre_producto')!=null)))
						<div class="form-group">
						<input type="text" name="nombre_producto" class="form-control" value="{{ $subasta['nombre_producto'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="nombre_producto" class="form-control" value="{{ $subasta['nombre_producto'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('nombre_producto')}}</label>
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Estado</label>
						@if(!(isset($errors)&&($errors->first('estado')!=null)))
						<div class="form-group">
						<input type="text" name="estado" class="form-control" value="{{ $subasta['estado'] }}">
						</div>
						@else
						<div class="form-group has-error">
						<input type="text" name="estado" class="form-control" value="{{ $subasta['estado'] }}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('estado')}}</label>
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Localidad</label>
						@if(!(isset($errors)&&($errors->first('localizacion')!=null)))
						<div class="form-group">
						<select name="localizacion" class="form-control">
							@forelse($localidades as $localidad)
							<option value="{{ $localidad['id'] }}">{{ $localidad['nombre'] }}</option>
							@empty
							<option>Sin registros</option>
							@endforelse
						</select>
						</div>
						@else
						<div class="form-group has-error">
						<select name="localizacion" class="form-control">
							@forelse($localidades as $localidad)
							<option value="{{ $localidad['id'] }}">{{ $localidad['nombre'] }}</option>
							@empty
							<option>Sin registros</option>
							@endforelse
						</select>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('localizacion')}}</label>
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Descripción</label>
						@if(!(isset($errors)&&($errors->first('descripcion')!=null)))
						<div class="form-group">
						<textarea class="form-control" name="descripcion" rows="3" placeholder="Sin descripcion...">{{ $subasta['descripcion'] }}</textarea>
						</div>
						@else
						<div class="form-group has-error">
						<textarea class="form-control"  name="descripcion" rows="3" placeholder="Sin descripcion...">{{ $subasta['descripcion'] }}</textarea>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('descripcion')}}</label>
						</div>
						@endif
					</div>
					<h3 class="text-aqua">Detalles Subastador/Comprador</h3>
					<div class="form-group">
						<div class="form-group">
							<label>Subastador</label>
							@if(!(isset($errors)&&($errors->first('subastador_id')!=null)))
							<div class="form-group">
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
							</div>
							@else
							<div class="form-group has-error">
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
								<i class="fa fa-times-circle-o"></i>
								<label class="control-label" for="inputError">{{$errors->first('subastador_id')}}</label>
							</div>
							@endif
						</div>
						<div class="form-group">
							<label>Comprador</label>
							@if(!(isset($errors)&&($errors->first('comprador_id')!=null)))
							<div class="form-group">
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
							</div>
							@else
							<div class="form-group has-error">
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
								<i class="fa fa-times-circle-o"></i>
								<label class="control-label" for="inputError">{{$errors->first('comprador_id')}}</label>
							</div>
							@endif
							@if(isset($errors) && ($errors->first('localizacion') !== null))
							<br/><span class="errorSys">&nbsp;{{$errors->first('localizacion')}}</span>
							@endif
						</div>
					</div>
					<h3 class="text-aqua">Detalles Categorización</h3>
					<div class="form-group">
						<div class="form-group">
							<label>Categoria</label>
							@if(!(isset($errors)&&($errors->first('subcategoria_id')!=null)))
							<div class="form-group">
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
							</div>
							@else
							<div class="form-group has-error">
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
								<i class="fa fa-times-circle-o"></i>
								<label class="control-label" for="inputError">{{$errors->first('subcategoria_id')}}</label>
							</div>
							@endif
						</div>
					</div>
					<h3 class="text-aqua">Detalles Precio</h3>
					<div class="form-group">
						<label>Precio Inicial</label>
						@if(!(isset($errors)&&($errors->first('precio_inicial')!=null)))
						<div class="input-group">
							<input type="text" name="precio_inicial" class="form-control" value="{{ $subasta['precio_inicial'] }}">
							<span class="input-group-addon">€</span>
						</div>
						@else
						<div class="input-group has-error">
							<input type="text" name="precio_inicial" class="form-control" value="{{ $subasta['precio_inicial'] }}">
							<span class="input-group-addon">€</span>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('precio_inicial')}}</label>
						</div>
						@endif
						<label>Incremento</label>
						@if(!(isset($errors)&&($errors->first('incremento_precio')!=null)))
						<div class="input-group">
							<input type="text" name="incremento_precio" class="form-control" value="{{ $subasta['incremento_precio'] }}">
							<span class="input-group-addon">€</span>
						</div>
						@else
						<div class="input-group has-error">
							<input type="text" name="incremento_precio" class="form-control" value="{{ $subasta['incremento_precio'] }}">
							<span class="input-group-addon">€</span>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('incremento_precio')}}</label>
						</div>
						@endif
						<label>Precio Venda</label>
						@if(!(isset($errors)&&($errors->first('precio_venta')!=null)))
						<div class="input-group">
							<input type="text" name="precio_venta" class="form-control" value="{{ $subasta['precio_venta'] }}">
							<span class="input-group-addon">€</span>
						</div>
						@else
						<div class="input-group has-error">
							<input type="text" name="precio_venta" class="form-control" value="{{ $subasta['precio_venta'] }}">
							<span class="input-group-addon">€</span>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('precio_venta')}}</label>
						</div>
						@endif
						<label>Mayor Puja</label>
						@if(!(isset($errors)&&($errors->first('puja_mayor')!=null)))
						<div class="input-group">
							<input type="text" name="puja_mayor" class="form-control" value="{{ $subasta['puja_mayor'] }}">
							<span class="input-group-addon">€</span>
						</div>
						@else
						<div class="input-group has-error">
							<input type="text" name="puja_mayor" class="form-control" value="{{ $subasta['puja_mayor'] }}">
							<span class="input-group-addon">€</span>
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('puja_mayor')}}</label>
						</div>
						@endif
					</div>
					<h3 class="text-aqua">Detalles Fechas</h3>
					<div class="form-group">
						<label>Fecha Creación</label>
						@if(!(isset($errors)&&($errors->first('fecha_inicio')!=null)))
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_inicio" class="form-control" value="{{ $subasta['fecha_inicio']}}">
						</div>
						@else
						<div class="input-group has-error">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_inicio" class="form-control" value="{{ $subasta['fecha_inicio']}}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('fecha_inicio')}}</label>
						</div>
						@endif
						<label>Fecha Final</label>
						@if(!(isset($errors)&&($errors->first('fecha_final')!=null)))
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_final" class="form-control" value="{{ $subasta['fecha_final']}}">
						</div>
						@else
						<div class="input-group has-error">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_final" class="form-control" value="{{ $subasta['fecha_final']}}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('fecha_final')}}</label>
						</div>
						@endif
						<label>Fecha Venda</label>
						@if(!(isset($errors)&&($errors->first('fecha_venda')!=null)))
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_venda" class="form-control" value="{{ $subasta['fecha_venda']}}">
						</div>
						@else
						<div class="input-group has-error">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_venda" class="form-control" value="{{ $subasta['fecha_venda']}}">
							<i class="fa fa-times-circle-o"></i>
							<label class="control-label" for="inputError">{{$errors->first('fecha_venda')}}</label>
						</div>
						@endif
						<div class="form-group">
							<label>Porrogado</label>
							@if(!(isset($errors)&&($errors->first('porrogado')!=null)))
							<div class="form-group">
								<input type="text" name="porrogado" class="form-control" value="{{ $subasta['porrogado'] }}">
							</div>
							@else
							<div class="form-group has-error">
								<input type="text" name="porrogado" class="form-control" value="{{ $subasta['porrogado'] }}">
								<i class="fa fa-times-circle-o"></i>
								<label class="control-label" for="inputError">{{$errors->first('porrogado')}}</label>
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