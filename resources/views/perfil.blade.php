@extends('layouts.madre')


@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')
<link href="{{ url('css/perfil_user.css') }}" rel="stylesheet">
<script src="{{ url('js/usuario_public.js') }}"></script>

<div id="sns_content" class="wrap layout-m">
  <div class="container-fluid header_perfil" >
    <div class="row back_img" style="background-image: url({{ url('images/profiles_wallpapers/'.$user[0]->imagen_background.'') }});">
      <div class="stadistic_info_user col-xs-12 col-md-12">
        <div class="container">
          <div class="img_perfil col-xs-12" style="background-image: url({{ url('images/profiles/'.$user[0]->imagen_perfil.'') }}) ;"></div>
          <div class="col-md-8 info_active col-xs-12">
            Compras {{count($user[0]->compras)}} <i class="fa fa-shopping-cart"></i>  || Ventas {{count($user[0]->ventas)}} <i class="fa fa-money"></i>
            || Pujas {{count($user[0]->pujas)}} <i class="fa fa-fire"></i>
          </br>
          Reputacion
          <input id="input-id" type="number" data-min="0" data-max="5" class="rating" data-show-caption="false" data-show-clear="false" data-disabled="true" data-size="xs" value="{{$user[0]->puntuacion}}"></input>
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
         <button class="bb" onclick="subastas();" >Subastas</button>
         <p></p>
         <button class="bb" onclick="ventas();" >Ventas</button>
         <p></p>
         <button class="bb" onclick="valoraciones();" >Valoraciones</button>      
       </div>
       <div class="col-md-9 contact-info">
        <div class='col-md-8'>
          <p>Apodo : </p> {{$user[0]->username}}
          <p>Nombre : </p> {{$user[0]->nombre}}
          <p>Apellidos : </p> {{$user[0]->apellido}}
          <p>Direccion : </p> {{$user[0]->direccion}}
          <p>Email : </p> {{$user[0]->email}}
          <p>Fecha de creación de la cuenta : </p> {{$user[0]->created_at}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<input type="hidden" id="idUsuario" name="idUsuario" value="{{$user[0]->id}}">

@stop

@section('content')
@stop