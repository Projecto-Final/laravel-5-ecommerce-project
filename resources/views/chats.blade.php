@extends('layouts.madre')


@section('titulo', 'Chats')
@stop

@section('extclases')
<!-- ESTILO CHAT -->
<link href="{{ url('css/chat.css') }}" rel="stylesheet">

@stop

@section('chats')
<div id="sns_content" class="wrap layout-m">
	<div class="container">
		<div class="row">

			<div id="sns_main" class="col-md-12 col-main">
				<div id="wrapper">
				<CENTER><h1> CHAT </h1></CENTER>
				<CENTER><b style="color:green;">Recibido</b> / <b style="color:red;">Enviado</b></CENTER>
					<div class="message-container">
						<div class="message-north">
							<ul class="message-user-list">
								@foreach($mensajesEnviados as $mensajeEnviado)
								<li>
									<a class="userChat" onClick="cargarChatsEmisor({{ $mensajeEnviado->id }});" style="border-right: 4px red solid;">
										<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeEnviado->imgperf) }}'/></span>
										<span class="user-title">{{ $mensajeEnviado->titulo }}</span>
										<p class="user-desc">{{ $mensajeEnviado->username }}</p>
									</a>
								</li>
								@endforeach
								@foreach($mensajesRecibidos as $mensajeRecibido)
								<li>
									<a onClick="cargarChatsReceptor({{ $mensajeRecibido->id }});" style="border-right: 4px green solid;">
										<span class="user-img"><img src='{{ url('images/profiles/'.$mensajeRecibido->imgperf) }}'/></span>
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
							SELECCIONA UN CHAT, PARA INICIAR LA CONERSACIÓN.
							</div>
						</div>
						<div class="message-south" style="display:none;">
							<textarea class="nuevoMensaje" cols="20" rows="3"></textarea>
							<button class="envBoton"onClick="enviarMensaje({{ Auth::user()->id }});">Enviar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('extrascripts')
<script>

	$(document).ready(
		function() {
			setInterval(function() {
				if($('.emisorId').html()==1){
					cargarChatsEmisor($('.chatId').html());
				} else if($('.emisorId').html()!="") {
					cargarChatsReceptor($('.chatId').html());
				}
				$('.message-thread').scrollTop(5000);
			}, 2000);
		});

	function enviarMensaje(idEmisor){
		if($('.nuevoMensaje').val()==""){
			alert("Introduce un mensaje!");
		} else {
			$.ajax({
				method: "POST",
				url: "{{ url(''.'chats/enviar_mensaje') }}",
				data: { "mensaje_id" : $('.chatId').html(), "texto" : $('.nuevoMensaje').val(), "emisor" : $('.emisorId').html(), "_token": "{{{ csrf_token() }}}", "_method" : "PUT" }
			})
			.done(function( msg ) {
				if(msg==1){
					cargarChatsEmisor($('.chatId').html());
				} else {
					cargarChatsReceptor($('.chatId').html());
				}
				$('.nuevoMensaje').val("");
				$('.nuevoMensaje').focus();
				$('.message-thread').scrollTop(5000);
			});
		}
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
		mostrarInput();
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
		mostrarInput();
	}

	function mostrarInput(){
		$(".message-south").css("display","block");
	}
</script>
@stop