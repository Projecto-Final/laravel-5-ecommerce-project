@extends('layouts.admin')

@section('titulo', 'Escritorio -> Subastas')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Subastas')

@section('descripcion_pagina', 'Listado de subastas y opciones CRUD.')



@section('contenido')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Listado</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ count($subastas) }}</span>
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
            <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($subastas as $subcategoria)
          <tr>
            <td>{{ $subcategoria['id'] }}</td>
            <td>{{ $subcategoria['modelo'] }}</td>
            <td>{{ $subcategoria['nombre_producto'] }}</td>
            <td>{{ $subcategoria['descripcion'] }}</td>
            <td>{{ $subcategoria['estado'] }}</td>
            <td>{{ $subcategoria['localizacion'] }}</td>
            <td>{{ $subcategoria['fecha_final'] }}</td>
            <td> 
              <a href="{{ url(''.URL::current().'/editar/'.$subcategoria['id'])}}" class="btn btn-success btn-xs"><i  class="fa fa-pencil-square-o"></i> Editar </a> 
              <a href="{{ url(''.URL::current().'/eliminar/'.$subcategoria['id'])}}" class="btn btn-danger btn-xs"><i href="" class="fa fa-trash-o"></i> Eliminar</a> 
              <a onClick="ver_pujas_subasta({{$subcategoria['id']}});" class="btn bg-orange btn-xs"><i href="" class="fa fa-trash-o"></i> Ver Pujas</a></td>
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
        <h3 class="box-title">Listado ( pujas en opcion en subasta )</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ count($subastas) }}</span>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">

       <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr>
            <th>id</th>
            <th>Cantidad</th>
            <th>articulo_id</th>
            <th>pujador_id</th>
            <th>Fecha Puja</th>
          </tr>
        </thead>

        <tbody id="pujastble">
        </tbody>
      </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div>
</div>
<div id="cacatest"></div>
@stop

@section('scripts_extra')
<script>
  function ver_pujas_subasta(id_subasta){


    $.getJSON('{{ URL::current()."/pujas/" }}'+id_subasta, function( data ) {
      var concat = "";
      $.each( data, function( key, val ) {

       
       concat += "<tr>";
       concat += "<td>"+val.id+"</td>";
       concat += "<td>"+val.cantidad+"</td>";
       concat += "<td>"+val.articulo_id+"</td>";
       concat += "<td>"+val.pujador_id+"</td>";
       concat += "<td>"+val.fecha_puja+"</td>";
       concat += "</tr>";
       

     });
      if(concat!=""){
        $("#pujastble").html(concat);
      } else  {
       $("#pujastble").html("No hay resultados");
     }
   });

  }
  $(document).ready(function() {
    $('#example').dataTable();
    $('#example2').dataTable();
  });
</script>
@stop