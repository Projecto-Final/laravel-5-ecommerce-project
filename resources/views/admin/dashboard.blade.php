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
  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Ultimos Usuarios</h3>
        <div class="box-tools pull-right">
          <span class="label label-danger">{{ count($usuarios) }} Nuevos miembros</span>
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
        <ul class="users-list clearfix">
          @forelse($usuarios as $usuario)
          <li>
            <img src='{{ url("/images/profiles/".$usuario["imagen_perfil"]) }}' alt="User Image">
            <a class="users-list-name" href='{{ url("ver_perfil/".$usuario["id"]) }}'>{{ $usuario['nombre'] }}</a>
            <span class="users-list-date">{{ $usuario['created_at'] }}</span>
          </li>
          @empty
          <p>No hay ningun usuario registrado</p>
          @endforelse
        </ul><!-- /.users-list -->
      </div><!-- /.box-body -->
      <div class="box-footer text-center">
        <a href='{{ url("administracion/usuarios") }}' class="uppercase">Ver todos los usuarios</a>
      </div><!-- /.box-footer -->
    </div><!--/.box -->
  </div>

  <div class="col-xs-6">
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
        <span class="label label-default" >{{ $nPujas }}</span>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
     <p>Hay contabilizadas un total de <b style='color:fuchsia;'> {{ $nPujas }} pujas</b>.</p>
   </div><!-- /.box-body -->
 </div><!-- /.box -->
</div>

<div class="col-xs-3">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Total movimientos €</h3>
      <div class="box-tools pull-right">
        <span class="label label-default">{{ $totalMovimientos }}</span>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
     <p>La página tiene contabilizados un total de <b style='color:coral;'> {{ $totalMovimientos }} € </b> Totales.</p>
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

@section('scripts_extra')
<script>
  $(document).ready(function() {
    $('#example').dataTable();
    $('#example2').dataTable();
  });
</script>
@stop