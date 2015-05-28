@extends('layouts.madre')


@section('titulo', 'Chats')
@stop

@section('extclases')
<!-- ESTILO CHAT -->
<link href="{{ url('css/chat.css') }}" rel="stylesheet">
@stop

@section('chats')
<div id="wrapper">
	<div class="message-container">
		<div class="message-north">
			<ul class="message-user-list">
				@foreach($mensajesEnviados as $mensajeEnviado)
				<li>
					<a id="" class="userChat">
						<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeEnviado->imgperf) }}'/></span>
						<span class="user-title">{{ $mensajeEnviado->titulo }}</span>
						<p class="user-desc">{{ $mensajeEnviado->username }}</p>
					</a>
				</li>
				@endforeach
				@foreach($mensajesRecibidos as $mensajeRecibido)
				<li>
					<a>
						<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeEnviado->imgperf) }}'/></span>
						<span class="user-title">{{ $mensajeRecibido->titulo }}</span>
						<p class="user-desc">{{ $mensajeRecibido->username }}</p>
					</a>
				</li>
				@endforeach
			</ul>

			<div class="message-thread">
				selecciona un chat para empezar...
				<!-- <div class="message bubble-right">
					<label class="message-user">Jack Johnson</label>
					<label class="message-timestamp">2 Hours Ago</label>
					<p>;-)</p>
				</div>
				<div class="message bubble-left">
					<label class="message-user">Bryan Adams</label>
					<label class="message-timestamp">2 Hours Ago</label>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus. Donec at lorem eget sapien iaculis porttitor id quis ligula feugiat nunc ut nibh justo eget elit aliquet interdum tempus.</p>
				</div> -->
			</div>
		</div>
		<div class="message-south">
			<textarea cols="20" rows="3"></textarea>
			<button>Send</button>
		</div>
	</div>
</div>
@stop

@section('extrascripts')
<script>
	$( ".userChat" ).click(function() {
		alert("fired");
 	// Script pro rellenar dropdown!
 	$.getJSON("{{ url('get_allCategories') }}", function(result){
 		var scatm = "";
 		$.each(result, function(i, field){
 			scatm += "<option value="+field.id+">"+field.nombre+"</option>";
 		});
 		$("#categoria-art").html($("#categoria-art").html()+scatm);
 	});
 });
</script>
@stop