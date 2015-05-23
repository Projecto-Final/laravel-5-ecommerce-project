@extends('layouts.admin')

@section('titulo', 'Administración -> Estadísticas')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Estadísticas')

@section('descripcion_pagina', 'Estadisticas al detalle.')

@section('contenido')
<div id="content-admin">
	<div class="container-fluid">
		<h2>Table</h2>
		<div class="row">
			<div class="col-md-6">
				<div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Bar Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" height="505" width="787" style="width: 787px; height: 505px;"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts_extra')
<script>

	var data = {
		labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto","Septiembre","Octubre","Noviembre", "Diciembre"],
		datasets: [
		{
			label: "Estadisticas Subastas",
			fillColor: "rgba(220,220,220,0.5)",
			strokeColor: "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data: [{{ $estadisticas[1] }}, {{ $estadisticas[2] }}, {{ $estadisticas[3] }}, {{ $estadisticas[4] }}, {{ $estadisticas[5] }}, {{ $estadisticas[6] }}, {{ $estadisticas[7] }}, {{ $estadisticas[8] }}, {{ $estadisticas[9] }}, {{ $estadisticas[10] }}, {{ $estadisticas[11] }}, {{ $estadisticas[12] }}]
		}
		]
	};

//var sessionsGraph = new Chart(ctx).Bar(data); //Create a chart with "data" array
var ctx = $("#barChart").get(0).getContext("2d");
var myBarChart = new Chart(ctx).Bar(data);
</script>
@stop