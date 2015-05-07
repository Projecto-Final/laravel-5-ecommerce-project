<?php use App\Articulo; ?>


@extends('layouts.madre')


@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')
<div id="sns_content" class="wrap layout-m">
    <div class="container">
      <div class="row">
        <div id="sns_main" class="col-md-12 col-main">
          <div id="sns_mainmidle">
          <div class="col-md-4">Tu horrible foto de perfil: <img src="{{ url('images/profiles/'.Auth::user()->imagen) }}" /></div>
          <div class="col-md-8">Tu Reputación asquerosa:{{ Auth::user()->reputacion }} </div>
          </div>
        </div>
        </div>
        </div>
        </div>
@stop

@section('content')
@stop