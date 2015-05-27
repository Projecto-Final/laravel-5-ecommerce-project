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
						<h3 class="box-title">Usuarios por Nº de compras</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="chart">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Nº Compras</th>
                  <th>Opciones</th>
                </tr>

                @for ($i = 0; $i < count($usuariosNCompras); $i++)
                <tr>
                  <td>{{--*/ echo $usuariosNCompras[$i]->comprador_id; /*--}}</td>
                  <td>{{--*/ echo $usuariosNCompras[$i]->comprador_nombre; /*--}}</td>
                  <td>{{--*/ echo $usuariosNCompras[$i]->nc; /*--}}</td>
                  <td><a class="label label-success" href="{{ url('perfil/'.$usuariosNCompras[$i]->comprador_id) }}">Ver Usuario</a></td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col (LEFT) -->
    <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Usuarios por € de cobrados</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Nº Compras</th>
                  <th>Opciones</th>
                </tr>

                @for ($i = 0; $i < count($usuariosEurCobrados); $i++)
                <tr>
                  <td>{{--*/ echo $usuariosEurCobrados[$i]->comprador_id; /*--}}</td>
                  <td>{{--*/ echo $usuariosEurCobrados[$i]->comprador_nombre; /*--}}</td>
                  <td>{{--*/ echo $usuariosEurCobrados[$i]->pventaTotal; /*--}}</td>
                  <td><a class="label label-success" href="{{ url('perfil/'.$usuariosEurCobrados[$i]->comprador_id) }}">Ver Usuario</a></td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
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
@stop