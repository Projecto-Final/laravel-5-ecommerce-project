$(document).ready(function(){
	cargarPujaAut();
	setInterval(cargarPujaAut,7000);
	setInterval(recargarPrecios, 7000);
});



function pujar(id_subasta,url){

	//alert(url);
	if(confirm("Seguro Que Desea Pujar?")){
		var puja_mayor = $("#exampleInputAmount").val();
		$.get(url,{
			id_subasta: id_subasta,
			puja_mayor : puja_mayor
		})
		.done(function(data) {
			if(data=="Error"){
				alert("El precio mostrado ha cambiado");
			}else{
				recargarPrecios();
			}
			

		});
	}
}

function recargarPrecios(){
	var url = $("#cargarPrecio").val();
	var id_subasta = $("#subastaId").val();

	$.get(url,{
		id_subasta: id_subasta
	})
	.done(function(data) {


		var precio = data[0]['incremento_precio']+data[0]['puja_mayor'];

		$("#botonPuja").val("PUJAR "+ precio +"€");

		$("#exampleInputAmount").val(data[0]['puja_mayor']) ;

		$("#tdPrecio").html(data[0]['puja_mayor']+"€");

		//por motivos que desconozco sin el aux no va
		var aux = data[1]
		$("#numPujas").html(aux);
		if(data[2]!=null){
			if(data[2]['pujador_id']==data[3]){
				$( "#botonPuja" ).prop( "disabled", true );
			}else{
				$( "#botonPuja" ).prop( "disabled", false );
			}
		}


	});

}


function mostrar_cp(){
	interruptor_visible($(".formConfPuja").css("display"));
}

function interruptor_visible(estado){
	if(estado=="none"){
		$(".formConfPuja").slideDown(800);
		$(".formConfPuja-button").html("Mejor No <i class='fa fa-ban'></i>");
	} else {
		$(".formConfPuja").slideUp(800);
		$(".formConfPuja-button").html("Configurar Pujas Automáticas <i class='fa fa-floppy-o'></i>");
	}
}


function crear_confPuja(id_subasta,url){
	var puja_max = $("#cantidadMax").val();
	
	if(validator()==true){
		
		$.get(url,{
			id_subasta: id_subasta,
			puja_max : puja_max
		})
		.done(function(data) {

			alert("Configuracion de Puja Guardada");


		});

	}
}


function cargarPujaAut(){
	var url = $("#cargarPujaAut").val();
	var id_subasta = $("#subastaId").val();

	$.get(url,{
		id_subasta: id_subasta
	})
	.done(function(data) {
$("#pruevas").html(data);
//alert(data);

/*		var precio = data[0]['incremento_precio']+data[0]['puja_mayor'];

		$("#botonPuja").val("PUJAR "+ precio +"€");

		$("#exampleInputAmount").val(data[0]['puja_mayor']) ;

		$("#tdPrecio").html(data[0]['puja_mayor']+"€");

		//por motivos que desconozco sin el aux no va
		var aux = data[1]
		$("#numPujas").html(aux);
		if(data[2]!=null){
			if(data[2]['pujador_id']==data[3]){
				$( "#botonPuja" ).prop( "disabled", true );
			}else{
				$( "#botonPuja" ).prop( "disabled", false );
			}
		}

*/
	});

}