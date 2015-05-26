@extends('layouts.admin')

@section('titulo', 'Escritorio -> Categorías')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Categorías')

@section('descripcion_pagina', 'Listado de categorías y opciones CRUD.')

@section('contenido')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Listado</h3>
				<div class="box-tools pull-right">
					<span class="label label-default">{{ count($categorias) }}</span>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<button class="btn btn-info" style="float:right;">Crear Categoria <i class="fa fa-plus-square"></i></button>
			</div>
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
					<thead>
						<tr>
							<th>id</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Opciones</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($categorias as $categoria)
						<tr>
							<td>{{ $categoria['id'] }}</td>
							<td>{{ $categoria['nombre'] }}</td>
							<td>{{ $categoria['descripcion'] }}</td>
							<td> 
								<a href="{{ url(''.URL::current().'/editar/'.$categoria['id'])}}" class="btn btn-success btn-xs"><i  class="fa fa-pencil-square-o"></i> Editar </a> 
								<a href="{{ url(''.URL::current().'/eliminar/'.$categoria['id'])}}" class="btn btn-danger btn-xs"><i href="" class="fa fa-trash-o"></i> Eliminar</a> 
							</tr>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop

@section('scripts_extra')
<script>
	$(document).ready(function() {
		$('#example').dataTable();
		$('#example2').dataTable();
	});
</script>
@stop