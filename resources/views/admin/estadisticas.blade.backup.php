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
		<div class="row">
			<div class="col-md-6">
				<!-- AREA CHART -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Area Chart</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="chart">
							<canvas id="areaChart" height="255" width="787" style="width: 787px; height: 255px;"></canvas>
              
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

				<!-- DONUT CHART -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Donut Chart</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<canvas id="pieChart" height="275" width="807" style="width: 807px; height: 275px;"></canvas>                  
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col (LEFT) -->
			<div class="col-md-6">
				<!-- LINE CHART -->
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Line Chart</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="chart">
							<canvas id="lineChart" height="255" width="787" style="width: 787px; height: 255px;"></canvas>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

				<!-- BAR CHART -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Subastas con detalle mensual año - {{ date('Y') }}</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<b style="padding: 3px 10px; color: #FF8800;"><i class="fa fa-stop"></i> Numero de Subastas</b>
						<b style="padding: 3px 10px; color: #00A65A;"><i class="fa fa-stop"></i> Numero de Subastas</b>
						<div class="chart">
							<canvas id="barChart" height="235" width="787" style="width: 787px; height: 235px;"></canvas>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

			</div><!-- /.col (RIGHT) -->
		</div>
	</div>
</div>
@stop

@section('scripts_extra')
<script>

	$(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
        	labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        	datasets: [
        	{
        		label: "Nº Subastas",
        		fillColor: "rgba(210, 214, 222, 1)",
        		strokeColor: "rgba(210, 214, 222, 1)",
        		pointColor: "rgba(210, 214, 222, 1)",
        		pointStrokeColor: "#c1c7d1",
        		pointHighlightFill: "#fff",
        		pointHighlightStroke: "rgba(220,220,220,1)",
        		data: [@foreach($estadisticasSubasta as $estadistica) {{ $estadistica."," }}@endforeach]
        	},
        	{
        		label: "Nº Pujas",
        		fillColor: "rgba(210, 214, 222, 1)",
        		strokeColor: "#3C8DBC",
        		pointColor: "rgba(210, 214, 222, 1)",
        		pointStrokeColor: "#c1c7d1",
        		pointHighlightFill: "#3C8DBC",
        		pointHighlightStroke: "rgba(220,220,220,1)",
        		data: [@foreach($estadisticasPujas as $puja) {{ $puja."," }}@endforeach]
        	}
        	]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: true,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
      };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
        {
        	value: 700,
        	color: "#f56954",
        	highlight: "#f56954",
        	label: "Chrome"
        },
        {
        	value: 500,
        	color: "#00a65a",
        	highlight: "#00a65a",
        	label: "IE"
        },
        {
        	value: 400,
        	color: "#f39c12",
        	highlight: "#f39c12",
        	label: "FireFox"
        },
        {
        	value: 600,
        	color: "#00c0ef",
        	highlight: "#00c0ef",
        	label: "Safari"
        },
        {
        	value: 300,
        	color: "#3c8dbc",
        	highlight: "#3c8dbc",
        	label: "Opera"
        },
        {
        	value: 100,
        	color: "#d2d6de",
        	highlight: "#d2d6de",
        	label: "Navigator"
        }
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
      };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[0].fillColor = "#FF8800";
        barChartData.datasets[0].strokeColor = "#FF8800";
        barChartData.datasets[0].pointColor = "#FF8800";
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: false
      };

      barChartOptions.datasetFill = false;
      barChart.Bar(barChartData, barChartOptions);
  });



</script>
@stop