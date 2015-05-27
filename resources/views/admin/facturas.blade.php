@extends('layouts.admin')

@section('titulo', 'Escritorio -> Facturas')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Facturas')

@section('descripcion_pagina', 'Listado de facturas y opciones CRUD.')



@section('contenido')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Listado</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ count($facturas) }}</span>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">

       <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr>
            <th>id</th>
            <th>Usuario</th>
            <th>Articulo</th>
            <th>NIF</th>
            <th>Cantidad a facturar</th>
            <th>Fecha</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($facturas as $factura)
          <tr>
            <td>{{ $factura['id'] }}</td>
            <td>{{ $factura['usuario_id'] }}</td>
            <td>{{ $factura['articulo_id'] }}</td>
            <td>{{ $factura['nif'] }}</td>
            <td>{{ $factura['cantidad_pagada'] }}</td>
            <td>{{ $factura['fecha'] }}</td>
            <td> 
              <a href="{{ url(''.URL::current().'/pdf/'.$factura['id'])}}" target="_blank" class="btn btn-danger btn-xs"><i  class="fa fa-file-pdf-o"></i> PDF <i  class="fa fa-download"></i></a> 
              <a href="{{ url(''.URL::current().'/xml/'.$factura['id'])}}" target="_blank" class="btn btn-success btn-xs"><i  class="fa fa-file-pdf-o"></i> XML <i  class="fa fa-download"></i></a> 
            </tr>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
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