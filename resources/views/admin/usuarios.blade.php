@extends('layouts.admin')

@section('titulo', 'Escritorio -> Usuarios')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Usuarios')

@section('descripcion_pagina', 'Listado de usuarios y opciones CRUD.')



@section('contenido')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Listado</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ count($usuarios) }}</span>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">

       <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr>
            <th>id</th>
            <th>Imagen_Perfil</th>
            <th>N.Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Reputación</th>
            <th>Activa</th>
            <th>Permisos</th>
            <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($usuarios as $usuario)
          <tr>
            <td>{{ $usuario['id'] }}</td>
            <td><img src="{{ url('images/profiles/'.$usuario['imagen_perfil']) }}" width=50 height=50 /></td>
            <td>{{ $usuario['username'] }}</td>
            <td>{{ $usuario['nombre'] }}</td>
            <td>{{ $usuario['apellido'] }}</td>
            <td>{{ $usuario['email'] }}</td>
            <td>{{ $usuario['reputacion'] }}</td>
            <td>
            @if($usuario['activa']==1)
             <b class="text-green">activa</b>  
            @else 
            <b class="text-red">inactiva</b>  
            @endif
          </td>
            <td>
             @if($usuario['permisos']==1)
             <b class="badge bg-green">ADMIN</b>
             @else 
             <b class="badge bg-grey">USER</b>
             @endif
           </td>
           <td> 
            <a href="{{ url(''.URL::current().'/editar/'.$usuario['id'])}}" class="btn btn-success btn-xs"><i  class="fa fa-pencil-square-o"></i> Editar </a> 
            <a href="{{ url(''.URL::current().'/eliminar/'.$usuario['id'])}}" class="btn btn-danger btn-xs"><i href="" class="fa fa-trash-o"></i> Eliminar</a>
              @if($usuario['activa']==1)
            <a href="{{ url(''.URL::current().'/desactivar/'.$usuario['id'])}}" class="btn btn-warning btn-xs"><i  class="fa fa-toggle-on"></i>  Desactivar </a>  
            @else 
            <a href="{{ url(''.URL::current().'/activar/'.$usuario['id'])}}" class="btn btn-warning btn-xs"><i  class="fa fa-toggle-off"></i>  Activar </a>  
            @endif
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