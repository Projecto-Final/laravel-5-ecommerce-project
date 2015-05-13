<?php use App\Articulo; ?>
@extends('layouts.madre')


@section('titulo', 'PAGINA PRINCIPAL')

@stop


@section('info_extra')
<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>
<div id="sns_content" class="wrap layout-m new-subasta">
  <div class="container">
    <div class="row">
      <div id="sns_main" class="col-md-12 col-main">
        <div id="sns_mainmidle"><pre>
        {{ $subasta }}</pre>
        </div>
      </div>
    </div>
  </div>
</div>
@stop