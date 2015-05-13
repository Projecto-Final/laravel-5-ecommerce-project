<?php use App\Articulo; ?>
<?php use App\Usuario; ?>

@extends('layouts.madre')


@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')

<script src="{{ url('js/usuario.js') }}"></script>

<div id="sns_content" class="wrap layout-m">

  <div class="container-fluid header_perfil" >
    <div class="row back_img" style="background-image: url({{ url('images/profiles/'.Auth::user()->imagen_background) }});">
      <div id="" class="col-md-12 col-main col-xs-12" >
        <div id="">
          <div class="stadistic_info_user col-xs-12 col-md-12">
           <div class="container">
            <div class="img_perfil col-xs-12" style="background-image: url({{ url('images/profiles/'.Auth::user()->imagen_perfil) }}) ;"></div>

            <?php $id = auth::id();$user = Usuario::find(1);?>
            <div class="col-md-8 info_active col-xs-12">
              Compras {{$user->valCompra->count()}} <i class="fa fa-shopping-cart"></i>  || Ventas {{$user->valVenta->count()}} <i class="fa fa-money"></i>
              || Reputacion <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              || Pujas {{$user->pujas->count()}} <i class="fa fa-fire"></i>
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
         <button class="bb" onclick="" >Mis Pujas</button>
         <button class="bb" onclick="" >Pujas automaticas</button>
         <button class="bb" onclick="" >Mis Ventas</button>
         <button class="bb" onclick="" >Mis valoraciones</button>
         <button class="bb" onclick="" >Mis Subastas</button>
       </div>
       <div class="col-md-9 contact-info"></div>
    </div>
  </div>
</div>
</div>


@stop

@section('content')
@stop