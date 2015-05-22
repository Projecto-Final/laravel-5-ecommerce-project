@extends('layouts.admin')

@section('titulo', 'Escritorio')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Administración')

@section('descripcion_pagina', 'Estadisticas basicas de la página.')



@section('contenido')
<div class="row">
  <div class="col-xs-3">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Nº Subastas (totales)</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ $nSubastas }}</span>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
       <p>La página tiene un total de <b style='color:red;'> {{ $nSubastas }} </b> subastas almacenadas.</p>
       <button type="submit" class="btn btn-primary">Administrar Subastas</button>
     </div><!-- /.box-body -->
   </div><!-- /.box -->
 </div>

 <div class="col-xs-3">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Nº Imagenes almacenadas</h3>
      <div class="box-tools pull-right">
        <span class="label label-default">{{ $nImagenes }}</span>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
     <p>La página tiene almacenadas <b style='color:blue;'> {{ $nImagenes }} </b> imagenes.</p>
     <p>Que ocupan un promedio de <b style='color:blue;'>{{ ($nImagenes*0.8) }} MB.</b></p>
   </div><!-- /.box-body -->
 </div><!-- /.box -->
</div>

<div class="col-xs-3">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Nº Pujas (Totales)</h3>
      <div class="box-tools pull-right">
        <span class="label label-default">500</span>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
     Descripción
   </div><!-- /.box-body -->
 </div><!-- /.box -->
</div>

<div class="col-xs-3">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Total movimientos €</h3>
      <div class="box-tools pull-right">
        <span class="label label-default">500</span>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
     Descripción
   </div><!-- /.box-body -->
 </div><!-- /.box -->
</div>
</div>
<div class="row">
  <div class="col-xs-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Nº Categorias</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ count($Categorias) }}</span>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">

       <table id="example" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($Categorias as $categoria)
          <tr>
            <td>{{ $categoria['id'] }}</td>
            <td>{{ $categoria['nombre'] }}</td>
            <td>{{ $categoria['descripcion'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div>

  <div class="col-xs-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Nº SubCategorias</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ count($SubCategorias) }}</span>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">

       <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($SubCategorias as $subcategoria)
          <tr>
            <td>{{ $subcategoria['id'] }}</td>
            <td>{{ $subcategoria['nombre'] }}</td>
            <td>{{ $subcategoria['descripcion'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div>
</div>
@stop
