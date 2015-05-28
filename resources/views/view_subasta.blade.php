@extends('layouts.madre') 

@section('extclases') 
@stop

@section('titulo', 'PAGINA PRINCIPAL') 
@stop

@section('info_extra')
<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>
<!-- <script src="{{ url('js/subasta.js') }}"></script> -->

@if ($aviso = Session::get('message'))
<!-- Mensaje o no. -->
@endif
<div id="single-bid-view">
  <div class="container">
    <section class="row article-content">

      <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
        <div id="fotosArt">
          @for ($i = 0; $i< count($imagenes); $i++) @if ($i==0 ) 
          <a class="image-gallery col-md-12" href="#">
          @elseif($i == 1 || $i == 2)
          <a class="image-gallery col-md-6" href="#">
           @elseif($i  == 3 || $i  == 4 || $i  == 5)
           <a class="image-gallery col-md-4" href="#">
            @endif
            <div class="image-art" ><img style="width: auto;height:100%;" src="{{ url('images/subastas/'.$imagenes[$i]->imagen) }}" /></div>
          </a> @endfor
        </div>
        <div id="MostrarPujas">
         <button class="MostrarPujas-button" type="button" onClick="mostrarTP();">Mostrar Todas Las Pujas<i class='fa fa-bars'></i></button>
       </div>
       <div id="TPujas"></div>
     </div>

     @yield('pujable')
     @yield('user_subasta')

     <div style="float: left;width: 100%;margin-top: 12px;">
      <div id="UltimaPujaInfo"></div>
       <h4>Informació Básica</h4>
    </div>
    

    <table class="table table-bordered">
     
      <tbody>
        <tr>
          <td>Artículo:</td>
          <td colspan="3">
            {{ $subasta['nombre_producto']}}
          </td>
        </tr>
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
      </tbody>
    </table>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Categoria:</td>
          <td colspan="3">
            {{ $categoria['nombre']}}
          </td>

          <td>Subcategoria:</td>
          <td colspan="3">
            {{ $subcategoria['nombre']}}
          </td>
        </tr>
      </tbody>
    </table>

    <div id="datosSubastador">
      <h5>Usuario Subastador</h5>
      <a href="{{ url('perfil/'.$subastador['id']) }}">
        <img id="fotoSubastador" src="{{ url('images/profiles/'.$subastador['imagen_perfil']) }}"/>
      </a>
      <div>
        <a href="{{ url('perfil/'.$subastador['id']) }}">
          <h1>{{$subastador['username']}}</h1>
        </a>
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
          </tr>
          <tr>
            <td>Fecha Finalizacion Subasta:</td>
            <td colspan="3">
              <?php $dateAr = explode(' ',$subasta['fecha_final']);  echo $dateAr[1] . " " .explode('-',$dateAr[0])[2] . '/' . explode('-',$dateAr[0])[1] . '/' . explode('-',$dateAr[0])[0]; ?></td>


              <td>Fecha Inicio Subasta:</td>
              <td colspan="3">
                <?php $dateAr = explode(' ',$subasta['fecha_inicio']);  echo $dateAr[1] . " " .explode('-',$dateAr[0])[2] . '/' . explode('-',$dateAr[0])[1] . '/' . explode('-',$dateAr[0])[0]; ?></td>
              </tr>
              <tr>
                <td>Precio Actual:</td>
                <td colspan="3" id="tdPrecio">{{ $subasta['puja_mayor']}}€</td>
                <td>Precio Inicial:</td>
                <td colspan="3">{{ $subasta['precio_inicial']}}€</td>
              </tr>
              <tr>
                <td>Metodo de Pago : </td>
                <td colspan="3">{{$metodoPa['nombre']}}</td>
                <td>Metodo Envio : </td>
                <td colspan="3">{{$metodoEnv['nombre']}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
</div>
@stop