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
					<a class="userChat" onClick="cargarChatsEmisor({{ $mensajeEnviado->id }});">
						<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeEnviado->imgperf) }}'/></span>
						<span class="user-title">{{ $mensajeEnviado->titulo }}</span>
						<p class="user-desc">{{ $mensajeEnviado->username }}</p>
					</a>
				</li>
				@endforeach
				@foreach($mensajesRecibidos as $mensajeRecibido)
				<li>
					<a onClick="cargarChatsReceptor({{ $mensajeRecibido->id }});">
						<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeEnviado->imgperf) }}'/></span>
						<span class="user-title">{{ $mensajeRecibido->titulo }}</span>
						<p class="user-desc">{{ $mensajeRecibido->username }}</p>
					</a>
				</li>
				@endforeach
			</ul>
			<h4 class="chatTitulo"></h4>
			<span class="chatId" style="display:none;"></span>
			<span class="receptorId" style="display:none;"></span>
			<span class="emisorId" style="display:none;"></span>
			<div class="message-thread">
				
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
			<textarea class="nuevoMensaje" cols="20" rows="3"></textarea>
			<button onClick="enviarMensaje({{ Auth::user()->id }});">Send</button>
		</div>
	</div>
</div>
@stop

@section('extrascripts')
<script>
	function enviarMensaje(idEmisor){
		$.ajax({
			method: "POST",
			url: "{{ url(''.'chats/enviar_mensaje') }}",
			data: { "mensaje_id" : $('.chatId').html(), "texto" : $('.nuevoMensaje').val(), "emisor" : $('.emisorId').html(), "_token": "{{{ csrf_token() }}}", "_method" : "PUT" }
		})
		.done(function( msg ) {
			alert( "Mensaje enviado: " + msg );
			if(msg==1){
				cargarChatsEmisor($('.chatId').html());
			} else {
				cargarChatsReceptor($('.chatId').html());
			}
		});
	}
	function cargarChatsEmisor(idChat){
		$.getJSON("{{ url('get_conversacion_as_emisor') }}"+"/"+idChat, function(result){
			var scatm = "";
			var chatTitulo = "";
			$.each(result, function(i, field){
				if(field.propietario==1){
					scatm += "<div class='message bubble-right'>";
				} else {
					scatm += "<div class='message bubble-left'>";
				}
				if(field.propietario==1){
					scatm += '<label class="message-user">Yo</label>';
				} else {
					scatm += '<label class="message-user">'+field.usuario+'</label>';
				}
				scatm += '<label class="message-timestamp">'+field.fecha+'</label>';
				scatm += "<p>"+field.mensaje+"</p>";
				scatm += "</div>";
				chatTitulo = field.titulo;
				$(".chatId").html(field.mid);
				$(".receptorId").html(field.eid);
			});
			$(".emisorId").html("1");
			$(".chatTitulo").html("titulo: "+chatTitulo);
			$(".message-thread").html(scatm);
		});
	}

	function cargarChatsReceptor(idChat){
		$.getJSON("{{ url('get_conversacion_as_receptor') }}"+"/"+idChat, function(result){
			var scatm = "";
			var chatTitulo = "";
			$.each(result, function(i, field){
				if(field.propietario==0){
					scatm += "<div class='message bubble-right'>";
				} else {
					scatm += "<div class='message bubble-left'>";
				}
				if(field.propietario==0){
					scatm += '<label class="message-user">Yo</label>';
				} else {
					scatm += '<label class="message-user">'+field.usuario+'</label>';
				}
				scatm += '<label class="message-timestamp">2 Hours Ago</label>';
				scatm += "<p>"+field.mensaje+"</p>";
				scatm += "</div>";
				chatTitulo = field.titulo;
				$(".chatId").html(field.mid);
			});
			$(".emisorId").html("0");
			$(".receptorId").html({{ Auth::user()->id }});
			$(".chatTitulo").html("titulo: "+chatTitulo);
			$(".message-thread").html(scatm);
		});
	}
</script>
@stop