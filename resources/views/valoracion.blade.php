@extends('layouts.madre')

@section('titulo', 'Mis Cosas')
@stop

@section('opciones_usuario')

<div class="container">
	<div class="row">
		<div class="col-md-offset-4 col-xs-12 col-sm-12"><h1>Valoracion</h1><h3>{{$art->nombre_producto}}</h3></div>
		<div class="col-md-offset-4 col-xs-12 col-sm-12">
			<form action="{{ url('update_valoracion') }}" method="post" enctype="multipart/form-data" id="form-validate">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				{{$valorado->nombre}} </br>
				{{$art->nombre_producto}} -- {{$art->modelo}}  <br>
				<label for="texto" class="required"><em>*</em>Descripcion</label>
				<div class="input-box">
					<input type="text" id="texto" name="texto" value="" title="Nombre" maxlength="255" class="input-text required-entry">
					<span class='errorJS' id='nombre_producto_error'>&nbsp;Campo obligatorio</span></td>
				</div>
				Fecha <?php echo date("Y-m-d H:i:s"); ?><br>
				<input type="hidden" name="id" value="{{$val->id}}">
				<input type='submit' title="Submit" class="button" value="Valora"> 
			</form>
		</div>
	</div>
</div>
@stop