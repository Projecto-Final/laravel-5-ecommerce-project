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
            <th>Modelo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Localización</th>
            <th>Fecha Finalización</th>
            <th>Tiempo Restante</th>
            <th>Precio Inicial/Actual</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
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