setInterval(confPujaSuperada,7000);
get_Pendientes();

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
				bootbox.alert(mensaje);
			};
		}
	});
}

function formatoFecha(fecha){
	var dateAr = fecha.split(' ');
	var newDate = dateAr[1] + " " + dateAr[0].split('-')[2] + '/' + dateAr[0].split('-')[1] + '/' + dateAr[0].split('-')[0];
	return newDate;

}


function get_Pendientes(){
	var url = "usuario/get_Pendientes";
	$.get(url,function(data,status){
		if(data != 0){
			bootbox.alert("Tienes pendiente "+data+" valoraciones. Ves al apartado de valoraciones pendientes y rellenalas");
		}
	});
}