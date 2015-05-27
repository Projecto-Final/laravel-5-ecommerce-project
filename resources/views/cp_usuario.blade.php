@extends('layouts.madre')


@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')
<link href="{{ url('bootstrap-star-rating/css/star-rating.min.css')}}" media="all" rel="stylesheet" type="text/css" />
<script src="{{ url('bootstrap-star-rating/js/star-rating.js')}} " type="text/javascript"></script>
<script src="{{ url('js/validaciones.js') }}"></script>
<script src="{{ url('js/usuario.js') }}"></script>

<meta name="_token" content="{{ csrf_token() }}"/>

<div id="sns_content" class="wrap layout-m">
  <div class="container-fluid header_perfil" >
    <span id="editarFportada" class=" glyphicon glyphicon-pencil" aria-hidden="true"></span>
    <div class="row back_img" style="background-image: url({{ url('images/profiles_wallpapers/'.$imagBack) }});">
      <div class="stadistic_info_user col-xs-12 col-md-12">
       <div id="confPerfil" class="col-md-9 pop_up" style="display:none;" >
        <form action="{{ url('usuario/fotoPerfil') }}" method="post" enctype="multipart/form-data">
          <h2>Foto de perfil</h2>
          <span id="close_pop_perfil" class=" glyphicon glyphicon-remove" aria-hidden="true"></span>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <h4>Imagen</h4><div id="img_perfil"><input type="file" id="imgart_1" class="cnt" name="img_perfil"><BR></div>
          <input type='submit' title='Submit' class='button' value='Guardar Cambios'></form>
        </form>
      </div>

      <div id="confPortada" class="col-md-9 pop_up" style="display:none;" >
        <form action="{{ url('usuario/fotoPortada') }}" method="post" enctype="multipart/form-data">
          <h2>Foto de portada</h2>
          <span id="close_pop_portada" class=" glyphicon glyphicon-remove" aria-hidden="true"></span>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <h4>Imagen</h4><div id="img_portada"><input type="file" id="imgart_1" class="cnt" name="img_portada"><BR></div>
          <input type='submit' title='Submit' class='button' value='Guardar Cambios'></form>
        </form>
      </div>
      <div class="container">
        <div class="img_perfil col-xs-12" style="background-image: url({{ url('images/profiles/'.$imagPerf) }}) ;">
        <span id="editarFP" class="" aria-hidden="true"><b class="fa fa-camera">Actualizar foto perfil.</b></span>
       </div>


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