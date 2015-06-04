<!-- VIEW COMO PUJADOR -->
<!-- PUJABLE -> PUJA_USUARIO -> MADRE -->
@extends('view_subasta')
@section('pujable')
<script src="{{ url('js/subasta.js') }}"></script>
<div class="col-lg-5 col-md-6 col-sm-6 col-xs-8">
 <div class="bid" id="bid">
  @if ($subasta['precio_venta'] == -1)

  <h5>PRECIO ACTUAL DEL ARTICULO</h5>
  <div id="contPujas">Nº Pujas :<br>{{ $pujas}}</div>
  <form class="form-inline">

    <div id="estadoSubasta"> 
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon">€</div>
          <input type="text" class="form-control" id="exampleInputAmount" value="{{ $subasta['puja_mayor'] }}" disabled="true">
        </div>
      </div>

      <input id="botonPuja" type="button" class="btn btn-primary" onclick='pujar( {{ $subasta["id"].' , "'.url("add_puja").'"' }} )' value="PUJAR {{ $subasta['incremento_precio']+$subasta['puja_mayor'] }}€">
    </form>
    <p colspan="3">* El incremento de puja actual es de {{ $subasta['incremento_precio']}}€</p>
  </div>

</div>

<div id="datosPujaConf">

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
      <div id="sistemError" class="errorSys"></div>
    </form>
    <p>     <input id="crearConf" type="button" class="btn btn-primary" onclick='crear_confPuja()' value="GUARDAR"> <i class='fa fa-flag-o'></i></p>
    
    <div id="pujasAutomaticastable"></div>
  </div>
</div>
</div>
@elseif($subasta['precio_venta'] == 0)

<div id="estadoSubasta"> </div>
<p>Subasta caducada </p>
</div>
<div id="formConf"><p></p><p></p><p></p><div>

@elseif($subasta['precio_venta'] != 0 && $subasta['precio_venta'] != -1)

<div id="estadoSubasta"> </div>
<p>Articulo Vendido  - Fecha Venta :  <?php $dateAr = explode(' ',$subasta['fecha_venda']);  echo $dateAr[1] . " " .explode('-',$dateAr[0])[2] . '/' . explode('-',$dateAr[0])[1] . '/' . explode('-',$dateAr[0])[0]; ?>  Precio Venta : {{$subasta['precio_venta']}}</p>

</div>
<div id="formConf"><p></p><p></p><p></p><div>

@endif
  <form class="form-inline">
  @if ($logueado == true) 
  <input type="hidden" id="cargarPrecio" value="{{url('cargar_precio')}}">
  <input type="hidden" id="cargarPujaAut" value="{{url('cargarPujaAut')}}">   
  <input type="hidden" id="comprovarEstado" value="{{url('comprovarEstado')}}">
  @elseif($logueado == false)
  <input type="hidden" id="cargarPrecio" value="{{url('cargar_precioGuest')}}">
  <input type="hidden" id="cargarPujaAut" value="no">
  <input type="hidden" id="comprovarEstado" value="{{url('comprovarEstadoGuest')}}">

  @endif            
  <input type="hidden" id="subastaId" value="{{ $subasta['id'] }}">
  <input type="hidden" id="cambiarConf" value="{{url('cambiarConf')}}">
  <input type="hidden" id="cancelarConf" value="{{url('cancelarConf')}}">
  <input type="hidden" id="crearConfPuja" value="{{url('crearConfPuja')}}">
  <input type="hidden" id="pujasAutom" value="{{url('pujasAutom')}}">
  <input type="hidden" id="ultimaPuja" value="{{url('ultimaPuja')}}">
   <input type="hidden" id="todasPujas" value="{{url('todasPujas')}}">
</form>
@stop