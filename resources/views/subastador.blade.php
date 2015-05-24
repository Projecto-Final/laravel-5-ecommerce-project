@extends('view_subasta')
@section('user_subasta')
<script src="{{ url('js/user_subasta.js') }}"></script>
<div class="col-lg-7 col-md-6 col-xs-8 article-content">
 <div class="bid" id="bid">
  @if ($subasta['precio_venta'] == -1)

  <h5>PRECIO ACTUAL DEL ARTICULO</h5>
  <div id="contPujas">Nº Pujas :<br>{{ $pujas}}</div>
  <form class="form-inline">


   <input type="hidden" id="cargarPrecio" value="{{url('cargar_precio')}}">
   <input type="hidden" id="subastaId" value="{{ $subasta['id'] }}">
   <input type="hidden" id="comprovarEstado" value="{{url('comprovarEstado')}}">
   <input type="hidden" id="todasPujas" value="{{url('todasPujas')}}">

   <div id="estadoSubasta"> 
    <div class="form-group">
      <div class="input-group">

        <input type="text" class="form-control" id="exampleInputAmount" value="{{ $subasta['puja_mayor'] }}" disabled="true">
      </div>
    </div>



    <input id="botonPuja" type="button" class="btn btn-primary" onclick='aceptarPuja("{{url("aceptarUltimaP")}}")' value="Aceptar la Ultima Puja">
  </form>
  <p colspan="3">* El incremento de puja actual es de {{ $subasta['incremento_precio']}}€</p>
</div>



</div>
@elseif($subasta['precio_venta'] == 0)
<div id="contPujas">Nº Pujas :<br>{{ $pujas}}</div>
<form class="form-inline">
 <input type="hidden" id="cargarPrecio" value="{{url('cargar_precio')}}">
 <input type="hidden" id="comprovarEstado" value="{{url('comprovarEstado')}}">
 <input type="hidden" id="subastaId" value="{{ $subasta['id'] }}">
 <input type="hidden" id="todasPujas" value="{{url('todasPujas')}}">
</form>
<div id="estadoSubasta"> </div>
Subasta Caducada  <button class='MostrarPujas-button' type='button' onClick='prorrogar("{{url("prorrogar")}}");'>Prorrogar </button> Tiempo prorroga : {{$tiempo_pro}} Dias al Precio de {{$precio_pro}} €"


</div>
<div id="formConf"><p></p><p></p><p></p><div>

  @elseif($subasta['precio_venta'] != 0 && $subasta['precio_venta'] != -1)
  <div id="contPujas">Nº Pujas :<br>{{ $pujas}}</div>
  <form class="form-inline">
   <input type="hidden" id="subastaId" value="{{ $subasta['id'] }}">
   <input type="hidden" id="comprovarEstado" value="no">

 </form>
 <div id="estadoSubasta"> </div>
 <p>Articulo Vendido  - Fecha Venta :  {{$subasta['fecha_venda']}}  Precio Venta : {{$subasta['precio_venta']}}</p>

</div>
<div id="formConf"><p></p><p></p><p></p><div>
  @endif
  @stop