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
            <div class=" img_perfil col-xs-12" style="background-image: url({{ url('images/profiles/'.Auth::user()->imagen_perfil) }}) ;"></div>

            <?php $id = auth::id();$user = Usuario::find(1);?>
            <div class="col-md-8 info_active col-xs-12">
              Compras {{$user->valCompra->count()}} <i class="fa fa-shopping-cart"></i>  || Ventas {{$user->valVenta->count()}} <i class="fa fa-money"></i>
              || Reputacion <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              || Pujas {{$user->pujas->count()}} <i class="fa fa-fire"></i>

              <script> $("#input-id").rating(); $("#input-id").rating(['min'=>1, 'max'=>10, 'step'=>2, 'size'=>'lg']);
              </script>
              <input id="input-id" />

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
        <h2 align="center">Información de contacto</h2>
        <div class="col-md-3 conf_perfil">
          <button>Modificar Perfil</button></br></br>
          <button>Mis pujas</button></br></br>
          <button>Pujas automaticas</button></br></br>
          <button>Mis subastas</button></br></br>
          <button>Mis Ventas</button></br></br>
          <button>Mis Valoraciones</button>
        </div>
        <div class="col-md-6">
          <pre>
            Mi Reputación :{{ Auth::user()->reputacion }} </br>
            Mi Apodo :{{ Auth::user()->username }} </br>
            Nombre :{{ Auth::user()->nombre }} </br>
            Apellidos :{{ Auth::user()->apellido }} </br>
            Direccion :{{ Auth::user()->direccion }} </br>
            Email :{{ Auth::user()->email }} </br>
            Fecha de creación de la cuenta :{{ Auth::user()->created_at }} </br>
          </pre>
        </div>
      </div>
    </div>
  </div>
</div>

</div>


<!--             Tu Reputación :{{ Auth::user()->reputacion }} </br>
            Apodo :{{ Auth::user()->username }} </br>
            Nombre :{{ Auth::user()->nombre }} </br>
            Apellidos :{{ Auth::user()->apellido }} </br>
            Direccion :{{ Auth::user()->direccion }} </br>
            Email :{{ Auth::user()->email }} </br>
            Fecha de creación de la cuenta :{{ Auth::user()->created_at }} </br> -->

            @stop

            @section('content')
            @stop