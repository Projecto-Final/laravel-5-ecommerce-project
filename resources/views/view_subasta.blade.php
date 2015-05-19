<?php use App\Articulo; ?>
@extends('layouts.madre')

@section('extclases')

@stop

@section('titulo', 'PAGINA PRINCIPAL')

@stop


@section('info_extra')
<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>
{{ Session::get('message') }}
@if ($alert = Session::get('message'))
    <div class="alert alert-warning">
        {{ $alert }}
    </div>
@endif
<div id="single-bid-view">
  <div class="container">
    <section class="row">
      <div class="col-lg-5 col-md-6 col-xs-4">
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
        <div class="col-lg-7 col-md-6 col-xs-8 article-content">
          <div class="bid">
            <h5>PRECIO ACTUAL DEL ARTICULO - FECHA CIERRE PUJA {{ $subasta['fecha_final'] }}</h5>
            <form action="{{ url('add_puja') }}" class="form-inline">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="articulo_id" value="{{ $subasta['id'] }}">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">€</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="{{ $subasta['puja_mayor'] }}" disabled="true">
                </div>
              </div>
              <button type="submit" class="btn btn-primary"> PUJAR {{ $subasta['incremento_precio'] }}€</button>
            </form>
            <p colspan="3">* El incremento de puja actual es de {{ $subasta['incremento_precio']}}€</p>
          </div>
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
            <h5>Mas Información</h5>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>Fecha Finalizacion Subasta:</td>
                  <td colspan="3">{{ $subasta['fecha_final']}}</td>


                  <td>Fecha Inicio Subasta:</td>
                  <td colspan="3">{{ $subasta['fecha_inicio']}}</td>

                  <tr>
                    <td>Precio Actual:</td>
                    <td colspan="3">{{ $subasta['puja_mayor']}}</td>


                    <td>Precio Inicial:</td>
                    <td colspan="3">{{ $subasta['precio_inicial']}}</td>
                  </tr>               

                  <tr>
                    <td>Metodo de Pago:</td>
                    <td colspan="3">Tarjeta de credito/debito, contra reembolso</td>                    

                    <td>Devoluciones:</td>
                    <td colspan="3">7 Dias despues de la entrega</td>
                  </tr>
                  <tr>
                    <td>Ubicación:</td>
                    <td colspan="3">                
                      Ubicacio de l'article: {{ $subasta['localizacion']}}
                    </td>
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