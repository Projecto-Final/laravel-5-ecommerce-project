function mostrar_filtros(){
	interruptor_visibilidad($(".parametros-filtrado").css("display"));
}

function interruptor_visibilidad(estado){
	if(estado=="none"){
		$(".parametros-filtrado").show(800);
		$(".parametros-button").html("ocultar opciones <i class='fa fa-eye-slash'></i>");
	} else {
		$(".parametros-filtrado").hide(800);
		$(".parametros-button").html("mostrar opciones <i class='fa fa-eye'></i>");
	}
}