@extends('layouts.admin')

@section('titulo', 'Escritorio -> Subcategorias')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Subcategorias')

@section('descripcion_pagina', 'Listado de subcategorias y opciones CRUD.')

@section('contenido')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Listado</h3>
				<div class="box-tools pull-right">
					<span class="label label-default">{{ count($subCategorias) }}</span>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
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
						@foreach ($subCategorias as $subCat)
						<tr>
							<td>{{ $subCat['id'] }}</td>
							<td>{{ $subCat['nombre'] }}</td>
							<td>{{ $subCat['descripcion'] }}</td>
							<td> 
								<a href="{{ url(''.URL::current().'/editar/'.$subCat['id'])}}" class="btn btn-success btn-xs"><i  class="fa fa-pencil-square-o"></i> Editar </a> 
								<a href="{{ url(''.URL::current().'/eliminar/'.$subCat['id'])}}" class="btn btn-danger btn-xs"><i href="" class="fa fa-trash-o"></i> Eliminar</a> 
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