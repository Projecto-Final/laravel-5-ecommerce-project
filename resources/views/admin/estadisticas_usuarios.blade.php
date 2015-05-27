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
						<h3 class="box-title">(Est-2) Usuarios por Nº de compras</h3>
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
      <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">(Est-4) Usuarios por € pagados</h3>
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
                <th>Total Euros gastados</th>
                <th>Opciones</th>
              </tr>

              @for ($i = 0; $i < count($usuariosEurPagados); $i++)
              <tr>
                <td>{{--*/ echo $usuariosEurPagados[$i]->usuario_id; /*--}}</td>
                <td>{{--*/ echo $usuariosEurPagados[$i]->comprador_nombre; /*--}}</td>
                <td>{{--*/ echo $usuariosEurPagados[$i]->nCompras; /*--}}</td>
                <td>{{--*/ echo $usuariosEurPagados[$i]->pcompratotal; /*--}}</td>
                <td><a class="label label-success" href="{{ url('perfil/'.$usuariosEurPagados[$i]->usuario_id) }}">Ver Usuario</a></td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">(Est-6) Usuarios por Nº de licitaciones</h3>
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
                <th>Nº Pujas</th>
                <th>Opciones</th>
              </tr>

              @for ($i = 0; $i < count($usuariosNumLicitaciones); $i++)
              <tr>
                <td>{{--*/ echo $usuariosNumLicitaciones[$i]->usuario_id; /*--}}</td>
                <td>{{--*/ echo $usuariosNumLicitaciones[$i]->comprador_nombre; /*--}}</td>
                <td>{{--*/ echo $usuariosNumLicitaciones[$i]->nPujas; /*--}}</td>
                <td><a class="label label-success" href="{{ url('perfil/'.$usuariosNumLicitaciones[$i]->usuario_id) }}">Ver Usuario</a></td>
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
        <h3 class="box-title">(Est-3) Usuarios por € de cobrados</h3>
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
              <th>Nº Ventas</th>
              <th>Total Euros cobrados</th>
              <th>Opciones</th>
            </tr>

            @for ($i = 0; $i < count($usuariosEurCobrados); $i++)
            <tr>
              <td>{{--*/ echo $usuariosEurCobrados[$i]->comprador_id; /*--}}</td>
              <td>{{--*/ echo $usuariosEurCobrados[$i]->comprador_nombre; /*--}}</td>
              <td>{{--*/ echo $usuariosEurCobrados[$i]->nVentas; /*--}}</td>
              <td>{{--*/ echo $usuariosEurCobrados[$i]->pventaTotal; /*--}}</td>
              <td><a class="label label-success" href="{{ url('perfil/'.$usuariosEurCobrados[$i]->comprador_id) }}">Ver Usuario</a></td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">(Est-5) Usuarios por Nº de ventas</h3>
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
              <th>Nº Ventas</th>
              <th>Opciones</th>
            </tr>

            @for ($i = 0; $i < count($usuariosNumVentas); $i++)
            <tr>
              <td>{{--*/ echo $usuariosNumVentas[$i]->usuario_id; /*--}}</td>
              <td>{{--*/ echo $usuariosNumVentas[$i]->vendedor_nombre; /*--}}</td>
              <td>{{--*/ echo $usuariosNumVentas[$i]->nVentas; /*--}}</td>
              <td><a class="label label-success" href="{{ url('perfil/'.$usuariosNumVentas[$i]->usuario_id) }}">Ver Usuario</a></td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col (LEFT) -->
</div>
</div>
</div>
@stop

@section('scripts_extra')
@stop