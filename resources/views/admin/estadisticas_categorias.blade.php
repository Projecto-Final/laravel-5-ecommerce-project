@extends('layouts.admin')

@section('titulo', 'Administración -> Estadísticas Categorías')
@stop

<!-- Por si se usa -->
@section('js')
@stop


@section('nombre_pagina', 'Estadísticas Categorías')

@section('descripcion_pagina', 'Estadisticas al detalle.')

@section('contenido')
<div id="content-admin">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Categorias de productos por Nº Compras</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
             <canvas id="pieChart" height="275" width="807" style="width: 807px; height: 275px;"></canvas>     

           </div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->

     </div><!-- /.col (LEFT) -->
     <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border">
        <h3 class="box-title">Categorias de productos por Nº Ventas</h3>
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



        var areaChartData = {
          labels: [@foreach($categoriasNumCompras as $key => $categoriaNumCompras) '{{ "".$categoriaNumCompras->nombreCategoria."" }}' @if($key!=(count($categoriasNumCompras)-1)) , @endif @endforeach],
          datasets: [
          {
            label: "Nº Subastas",
            fillColor: "rgba(210, 214, 222, 1)",
            strokeColor: "rgba(210, 214, 222, 1)",
            pointColor: "rgba(210, 214, 222, 1)",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [@foreach($categoriasNumCompras as $categoriaNumCompras) {{ $categoriaNumCompras->numCompras."," }}@endforeach]
          },
          {
            label: "Nº Pujas",
            fillColor: "rgba(210, 214, 222, 1)",
            strokeColor: "#3C8DBC",
            pointColor: "rgba(210, 214, 222, 1)",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#3C8DBC",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [@foreach($categoriasNumCompras as $categoriaNumCompras) {{ $categoriaNumCompras->numCompras."," }}@endforeach]
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
        {{--*/ $colors = ["red","blue","green","grey","cyan","magenta","yellow","orange","purple","brown"]; 
        $nColors = count($colors)-1;

          /*--}}
        @foreach($categoriasNumVentas as $key => $categoriaNumVentas)
        {
          {{--*/
            $colorPicked = $colors[$nColors];
            $nColors--;
            if($nColors==0)$nColors=count($colors);
          /*--}}
          value: {{ $categoriaNumVentas->numCompras }},
         
          color: "{{ $colorPicked }}",
          highlight: "{{ $colorPicked }}",
          label: "{{ $categoriaNumVentas->nombreCategoria }}"
        }
        @if($key!=(count($categoriasNumVentas)-1)) 
        , 
        @endif
        @endforeach
       
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

        
      });



</script>
@stop