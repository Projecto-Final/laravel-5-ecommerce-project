<?php use App\Articulo; ?>
<?php use App\Usuario; ?>

@extends('layouts.madre')


@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')
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
              || Reputacion
              <input id="input-id" type="number" data-min="0" data-max="5" class="rating" data-show-clear="false" data-disabled="true" data-size="xs" value="{{$user->reputacion}}"></input>
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
         <div class="bb"><a href="usuario" role="button">Perfil</a></div>
         <div class="bb"><a href="mis-pujas" role="button">Mis Pujas</a></div>
         <div class="bb"><a href="pujas-auto" role="button">Pujas automaticas</a></div>
         <div class="bb"><a href="mis-pujas" role="button">Mis Ventas</a></div>
         <div class="bb"><a href="usuario" role="button">Mis valoraciones</a></div>
         <div class="bb"><a href="mis-pujas" role="button">Mis Subastas</a></div>
       </div>
       <div class="col-md-6 contact-info" >
        <h3 >Información básica</h3>
        <p>Apodo :</p>{{ Auth::user()->username }}
        <p>Nombre :</p>{{ Auth::user()->nombre }}
        <p>Apellidos :</p>{{ Auth::user()->apellido }}
        <p>Direccion :</p>{{ Auth::user()->direccion }}
        <p>Email :</p>{{ Auth::user()->email }}
        <p>Status :</p>{{ Auth::user()->permisos }} Standard
        <p>Fecha de creación de la cuenta :</p>{{ Auth::user()->created_at }}
      </div>
    </div>
  </div>
</div>
</div>

@stop

@section('content')
@stop