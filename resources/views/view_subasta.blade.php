<?php use App\Articulo; use App\Puja;?>
@extends('layouts.madre')

@section('extclases')

@stop

@section('titulo', 'PAGINA PRINCIPAL')

@stop


@section('info_extra')
<script src="{{ url('js/subasta.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>
@if ($aviso = Session::get('message'))
<!-- Mensaje o no. -->
@endif
<div id="single-bid-view">
  <div class="container">
    <section class="row">
      <div class="col-lg-5 col-md-6 col-xs-4">
        <div id="fotosArt">
        @for ($i = 0; $i < count($imagenes); $i++)
        @if ($i  == 0)
        <a class="image-gallery col-md-12" href="#">
          @elseif($i  == 1 || $i  == 2)
          <a class="image-gallery col-md-6" href="#">
           @elseif($i  == 3 || $i  == 4 || $i  == 5)
           <a class="image-gallery col-md-4" href="#">
            @endif
            <div class="image-art" style="background-image: url('{{ url('images/subastas/'.$imagenes[$i]->imagen) }}');"></div>
          </a>
          @endfor
</div>
          <div id="ultimasPujas"></div>
        </div>

        <div class="col-lg-7 col-md-6 col-xs-8 article-content">
          <div class="bid">
            <h5>PRECIO ACTUAL DEL ARTICULO </h5>
            <form  class="form-inline">
              <input type="hidden" id="cargarPrecio" value="{{url('cargar_precio')}}">
              <input type="hidden" id="subastaId" value="{{ $subasta['id'] }}">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">€</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="{{ $subasta['puja_mayor'] }}" disabled="true">
                </div>
              </div>
              <!-- <button type="submit" class="btn btn-primary" onclick="pujar({{ $subasta['id'] }})"> PUJAR {{ $subasta['incremento_precio'] }}€</button> -->
               <input id="botonPuja" type="button" class="btn btn-primary" onclick='pujar({{ $subasta['id'].',"'.url('add_puja') }}")' value="PUJAR {{ $subasta['incremento_precio']+$subasta['puja_mayor'] }}€">   
            </form>
            <p colspan="3">* El incremento de puja actual es de {{ $subasta['incremento_precio']}}€</p>
          </div>
          <div>
            <h5>Informació Básica</h5>
            <table class="table table-bordered">
              <tbody><tr>
                <td>Artículo:</td>
                <td colspan="3">                
                  {{ $subasta['nombre_producto']}}
                </td>
                <tr>
                  <td>Modelo:</td>
                  <td colspan="3"> 
                    {{ $subasta['modelo']}}
                  </td>
                </tr>
                <tr>
                  <td>Descripción:</td>
                  <td colspan="3"> 
                    {{ $subasta['descripcion']}}
                  </td>
                </tr>
                <tr>
                  <td>Estado:</td>
                  <td colspan="3"> 
                    {{ $subasta['estado']}}
                  </td>
                </tr>            
              </tbody></table>
            </div>                   
            <table class="table table-bordered">
              <tbody><tr>
                <td>Categoria:</td>
                <td colspan="3">                
                  {{ $categoria['nombre']}}
                </td>
                
                  <td>Subcategoria:</td>
                  <td colspan="3"> 
                    {{ $subcategoria['nombre']}}
                  </td>
                </tr>           
              </tbody></table>
            <div id="datosSubastador">
              <h5>Usuario Subastador</h5></br>

               <img id="fotoSubastador" src="{{ url('images/profiles/'.$subastador['imagen_perfil']) }}">

                <!--  <div id="fotoSubastador" style="background-image: url({{ url('images/profiles/'.$subastador['imagen_perfil']) }}) ;"></div>   -->
              <div>
                <h1>{{$subastador['username']}}</h1>
                <input id="input-id" type="number" data-min="0" data-max="5" class="rating" data-show-caption="false" data-show-clear="false" data-disabled="true" data-size="xs" value="{{$subastador['reputacion']}}"></input>
              </div>
            </div>


            <div id="masinfoS">
              <h5>Mas Información</h5>
              <table class="table table-bordered">
                <tbody>
                 <tr>
                  <td>Pujas Por Este Articulo:</td>
                  <td colspan="3" id="numPujas">{{ $pujas}}</td>
                  <td>Ubicación:</td>
                  <td colspan="3">                
                    {{ $subasta['localizacion']}}
                  </td>
                  <tr>
                    <td>Fecha Finalizacion Subasta:</td>
                    <td colspan="3">{{ $subasta['fecha_final']}}</td>


                    <td>Fecha Inicio Subasta:</td>
                    <td colspan="3">{{ $subasta['fecha_inicio']}}</td>

                    <tr>
                      <td>Precio Actual:</td>
                      <td colspan="3" id="tdPrecio">{{ $subasta['puja_mayor']}}€</td>


                      <td>Precio Inicial:</td>
                      <td colspan="3">{{ $subasta['precio_inicial']}}€</td>
                    </tr>  
                  </tbody></table>
                </div>
              </section>
            </div>




            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>

          </div>
          @stop