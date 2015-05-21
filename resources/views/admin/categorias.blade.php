@extends('layouts.admin')
@section('content')

<div id="content-admin">
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
							@foreach ($categorias as $cat)
							<tr>
								<td>{{ $cat->id }}</td>
								<td>{{ $cat->nombre }}</td>
								<td>{{ $cat->descripcion }}</td>
							</tr>
							@endforeach
						</tbody></table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		</div>
	</div>
</div>




@stop
