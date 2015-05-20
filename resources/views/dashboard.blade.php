@extends('layouts.admin')
@section('content')



<div class="container">
	<h2>Table</h2>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Categorias</h3>
				</div><!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tbody><tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Descripcion</th>
						</tr>
						<tr>
							<td>183</td>
							<td>John Doe</td>
							<td>11-7-2014</td>
						</tr>
					</tbody></table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>

@stop
