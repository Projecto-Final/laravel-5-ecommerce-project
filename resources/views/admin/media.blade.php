@extends('layouts.admin')

@section('titulo', 'Escritorio -> Subastas')
@stop

<!-- Por si se usa -->
@section('js')
@stop

@section('nombre_pagina', 'Media')

@section('descripcion_pagina', 'Listado de imagenes almacenadas.')



@section('contenido')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Listado</h3>
        <div class="box-tools pull-right">
          <span class="label label-default">{{ count($imagenes) }}</span>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          @foreach ($imagenes as $imagen)
          <div class="col-md-4">
            <a href="{{ url('/images/subastas/'.$imagen['imagen'])}}" class="thumbnail">
              @if(file_exists('images/subastas/'.$imagen['imagen'])) 
              {{--*/ $imagenurl = url('images/subastas/'.$imagen['imagen']) /*--}} 
              @else 
              {{--*/ $imagenurl = url('images/subastas/default.jpg') /*--}} 
              @endif
              <img src="{{ $imagenurl }}" alt="{{ $imagen['id'] }}{{ $imagen['descripcion'] }}">
            </a>
            <a href="{{ url(''.URL::current().'/eliminar/'.$imagen['id'])}}" class="btn btn-danger btn-xs" style="position: absolute;top: 0px;right: 15px;"><i href="" class="fa fa-trash-o"></i> Eliminar Imagen Inapropiada</a> 
          </div>
          @endforeach
        </div>

      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
@stop

@section('scripts_extra')
@stop