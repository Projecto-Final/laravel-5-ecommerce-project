@extends('layouts.madre') @section('extclases') @stop @section('titulo', 'PAGINA PRINCIPAL') @stop @section('info_extra')
<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>
<script src="{{ url('js/subasta.js') }}"></script>

@if ($aviso = Session::get('message'))
<!-- Mensaje o no. -->
@endif
<div id="single-bid-view">
  <div class="container">
    <section class="row">

      <div class="col-lg-5 col-md-6 col-xs-4">
        <div id="fotosArt">
          @for ($i = 0; $i
          < count($imagenes); $i++) @if ($i==0 ) <a class="image-gallery col-md-12" href="#">
          @elseif($i == 1 || $i == 2)
          <a class="image-gallery col-md-6" href="#">
           @elseif($i  == 3 || $i  == 4 || $i  == 5)
           <a class="image-gallery col-md-4" href="#">
            @endif
            <div class="image-art" style="background-image: url('{{ url('images/subastas/'.$imagenes[$i]->imagen) }}');"></div>
          </a> @endfor
        </div>
        <div id="ultimasPujas"></div>
      </div>

      <div class="col-lg-7 col-md-6 col-xs-8 article-content">


        <div class="bid">
          <h5>PRECIO ACTUAL DEL ARTICULO</h5>
          <h1 id="pruevas"></h1>
          <form class="form-inline">
            @if ($logueado == true) 
            <input type="hidden" id="cargarPrecio" value="{{url('cargar_precio')}}">
            <input type="hidden" id="cargarPujaAut" value="{{url('cargarPujaAut')}}">
          @elseif($logueado == false)
            <input type="hidden" id="cargarPrecio" value="{{url('cargar_precioGuest')}}">
            <input type="hidden" id="cargarPujaAut" value="no">
            @endif            
            <input type="hidden" id="subastaId" value="{{ $subasta['id'] }}">
            <input type="hidden" id="cambiarConf" value="{{url('cambiarConf')}}">
            <input type="hidden" id="cancelarConf" value="{{url('cancelarConf')}}">
            <input type="hidden" id="crearConfPuja" value="{{url('crearConfPuja')}}">
            
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">€</div>
                <input type="text" class="form-control" id="exampleInputAmount" value="{{ $subasta['puja_mayor'] }}" disabled="true">
              </div>
            </div>
            

           @if ($logueado == true) 
            <input id="botonPuja" type="button" class="btn btn-primary" onclick='pujar( {{ $subasta["id"].' , "'.url("add_puja").'"' }} )' value="PUJAR {{ $subasta['incremento_precio']+$subasta['puja_mayor'] }}€">
          @elseif($logueado == false)
            <input id="botonPuja" type="button" class="btn btn-primary" onclick='avisoLog()' value="PUJAR {{ $subasta['incremento_precio']+$subasta['puja_mayor'] }}€">
            @endif
            
          </form>
          <p colspan="3">* El incremento de puja actual es de {{ $subasta['incremento_precio']}}€</p>
        </div>


        <div>

           @if ($logueado == true) 
            <button class="formConfPuja-button" type="button" onClick="mostrar_cp();">Configurar Pujas Automáticas <i class='fa fa-floppy-o'></i></button>
          @elseif($logueado == false)
            <button class="formConfPuja-button" type="button" onClick="avisoLog();">Configurar Pujas Automáticas <i class='fa fa-floppy-o'></i></button>
            @endif
          
          <div class="formConfPuja">
            <div id="formConf">
              <form class="form-inline" id="form-validate">
                <h2>Cantidad Máxima Que Pujara</h2>
              <p>  <input trype="text" id="cantidadMax" name="cantidadMax"/>€</p>
                <br>
                <span class='errorJS' id='cantidadMax_error'>&nbsp;Campo obligatorio</span>
                <span class='errorJS' id='cantidadMax_error2'>&nbsp;Debe ser un numero positivo, con dos decimales como máximo</span>
              </form>
         <p>     <input id="crearConf" type="button" class="btn btn-primary" onclick='crear_confPuja()' value="GUARDAR"> <i class='fa fa-flag-o'></i></p>
    
              
            </div>
          </div>
        </div>

        <div style="float: left;width: 100%;margin-top: 12px;">
          <h5>Informació Básica</h5>
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
        <img id="fotoSubastador" src="{{ url('images/profiles/'.$subastador['imagen_perfil']) }}" />
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
            </tr>
            <tr>
              <td>Fecha Finalizacion Subasta:</td>
              <td colspan="3">{{ $subasta['fecha_final']}}</td>


              <td>Fecha Inicio Subasta:</td>
              <td colspan="3">{{ $subasta['fecha_inicio']}}</td>
            </tr>
            <tr>
              <td>Precio Actual:</td>
              <td colspan="3" id="tdPrecio">{{ $subasta['puja_mayor']}}€</td>


              <td>Precio Inicial:</td>
              <td colspan="3">{{ $subasta['precio_inicial']}}€</td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
      

    </section>
  </div>
</div>
@stop