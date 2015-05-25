setInterval(confPujaSuperada,7000);


function mostrar_filtros(){
	interruptor_visibilidad($(".parametros-filtrado").css("display"));
}

function interruptor_visibilidad(estado){
	if(estado=="none"){
		$(".parametros-filtrado").slideDown(500);
		$(".parametros-button").html("ocultar opciones <i class='fa fa-eye-slash'></i>");
	} else {
		$(".parametros-filtrado").slideUp(800);
		$(".parametros-button").html("mostrar opciones <i class='fa fa-eye'></i>");
	}
}

function confPujaSuperada(){
	var url = $("#confPujaSuperada").val();

	$.get(url,function(data,status){
		if(data!=0){
			for (var i = 0; i < data.length; i++) {
				var mensaje = "Tu Configuracion de Pujas por el Artiuclo "+data[i].nombre_producto+" ha sido Superada";
				var enlace = "subasta/"+data[i].id;
				notifications("advertencia", mensaje, enlace);
			};
		}


	});

	
}