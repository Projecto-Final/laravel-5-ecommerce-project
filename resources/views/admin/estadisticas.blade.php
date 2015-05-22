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
							
							<tr>
								
							</tr>
							
						</tbody></table>
					</div><!-- /.box-body -->
					<script>
						var myBarChart = new Chart(ctx).Bar(data, options);

						var data = {
							labels: ["January", "February", "March", "April", "May", "June", "July"],
							datasets: [
							{
								label: "My First dataset",
								fillColor: "rgba(220,220,220,0.5)",
								strokeColor: "rgba(220,220,220,0.8)",
								highlightFill: "rgba(220,220,220,0.75)",
								highlightStroke: "rgba(220,220,220,1)",
								data: [65, 59, 80, 81, 56, 55, 40]
							},
							{
								label: "My Second dataset",
								fillColor: "rgba(151,187,205,0.5)",
								strokeColor: "rgba(151,187,205,0.8)",
								highlightFill: "rgba(151,187,205,0.75)",
								highlightStroke: "rgba(151,187,205,1)",
								data: [28, 48, 40, 19, 86, 27, 90]
							}
							]
						};
					</script>
				</div><!-- /.box -->
			</div>
		</div>
	</div>
</div>
@stop
