function mostrar_filtros(){
	interruptor_visibilidad($(".parametros-filtrado").css("display"));
}

function interruptor_visibilidad(estado){
if(estado=="none"){
	$(".parametros-filtrado").show(800);
} else {
$(".parametros-filtrado").hide(800);
}
}