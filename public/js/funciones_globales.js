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

function formatoFecha(fecha){
	var dateAr = fecha.split(' ');
	var newDate = dateAr[1] + " " + dateAr[0].split('-')[2] + '/' + dateAr[0].split('-')[1] + '/' + dateAr[0].split('-')[0];
	return newDate;
}