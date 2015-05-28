@extends('layouts.madre')

@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')
<div class="container">
	<div class="row">
		<div class="col-md-offset-4 col-xs-12 col-sm-12"><h1>Nosotros</h1></div>
		<div class="col-xs-12 col-sm-12"><h5>Pàgina de : </h5><img class="empresa" src="{{ url('images/empresa.png') }}"/></div>
		<div class="col-xs-12 col-sm-12"><img  src="{{ url('images/pro.jpg') }}"/></div>
</div>
</div>
@stop