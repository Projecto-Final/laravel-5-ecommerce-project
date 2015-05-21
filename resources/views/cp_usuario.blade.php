<?php use App\Articulo; ?>
<?php use App\Usuario; ?>

@extends('layouts.madre')


@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')
<script src="{{ url('js/validaciones.js') }}"></script>
<script src="{{ url('js/usuario.js') }}"></script>

<div id="sns_content" class="wrap layout-m">

  <div class="container-fluid header_perfil" >
    <div class="row back_img" style="background-image: url({{ url('images/profiles/'.$imagBack) }});">
      <div id="" class="col-md-12 col-main col-xs-12" >
        <div id="">
          <div class="stadistic_info_user col-xs-12 col-md-12">
           <div class="container">
            <div class="img_perfil col-xs-12" style="background-image: url({{ url('images/profiles/'.$imagPerf) }}) ;"></div>
 

            <div class="col-md-8 info_active col-xs-12">
              Compras {{$ncompras}} <i class="fa fa-shopping-cart"></i>  || Ventas {{$nventas}} <i class="fa fa-money"></i>
              || Pujas {{$npujas}} <i class="fa fa-fire"></i>

            </br>
            Reputacion
            <input id="input-id" type="number" data-min="0" data-max="5" class="rating" data-show-caption="false" data-show-clear="false" data-disabled="true" data-size="xs" value="{{$reputacion}}"></input>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container">
  <div class="row">
    <div id="sns_main" class="col-md-12 col-main" >
      <div id="sns_mainmidle background_user">
        <div class="col-md-3 conf_perfil">
         <button class="bb" onclick="perfil();" >Perfil</button>
         <p></p>
         <button class="bb" onclick="pujas();" >Mis Pujas</button>  
         <button class="bb" onclick="confPuj()" >Configuraciones Pujas</button>
        <p></p>
         <button class="bb" onclick="subastas();" >Mis Subastas</button>
         <button class="bb" onclick="compras();" >Mis Compras</button>
         <button class="bb" onclick="ventas();" >Mis Ventas</button>
         <p></p>
         <button class="bb" onclick="valoraciones();" >Mis valoraciones</button>         
       </div>
       <div class="col-md-9 contact-info"></div>
     </div>
   </div>
 </div>
</div>


@stop

@section('content')
@stop