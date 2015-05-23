$(document).ready(function(){

	var cargarP = $("#cargarPujaAut").val();
	if(cargarP!="no"){
		cargarPujaAut();
	//	setInterval(cargarPujaAut,7000);


}



//setInterval(recargarPrecios, 7000);
});

function avisoLog(){
	alert("Debes estar logueado para pujar");
}


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
			}else if(data=="Ya Pujaste"){
				alert(data);
			}
			recargarPrecios();

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


function crear_confPuja(){
	var puja_max = $("#cantidadMax").val();
	var url = $("#crearConfPuja").val();
	var id_subasta = $("#subastaId").val();
	
	if(validator()==true){
		
		$.get(url,{
			id_subasta: id_subasta,
			puja_max : puja_max
		})
		.done(function(data) {
			if(data=="false"){
				alert("Solo puedes tener una configuracion");
			}else{
				alert("Configuracion de Puja Guardada");
				cargarPujaAut();
			}
			


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
		if(data=="false"){
			//no pasa nada :D
			
		}else{
			var elDiv = document.getElementById("formConf");
			var p = elDiv.getElementsByTagName("p");
			 //mostramos y cambiamos el menu
			 $( ".formConfPuja-button" ).prop( "disabled", true );
			 $(".formConfPuja-button").html("Tu Configuracion De Pujas  <i class='fa fa-flag-o'></i>");
			 $(".formConfPuja").show();

			    //ocultar todos sus P

			    var txt = "<h2>"+data[0]['puja_maxima']+" €</h2> ";
			    txt += "<i class='fa fa-floppy-o'></i> <input id='editConf' type='button' class='btn btn-primary' onclick='editarConfp()' value='Editar'> - -";
			    txt += "<input id='canConf' type='button' class='btn btn-primary' onclick='cancelConf()' value='Cancelar Esta Configuración'><i class='fa fa-bomb'></i>";
			    txt += "<br><p>Nueva Cantidad</p>"
			    $(p[0]).before(txt);

			    var otroTxt = "<p><input id='cambiarla' type='button' class='btn btn-primary' onclick='cambiarla(cambiarla)' value='GUARDAR'></p>";
			    $(p[2]).after(otroTxt);
			    var elDiv = document.getElementById("formConf");
			    var p = elDiv.getElementsByTagName("p");
			    $(p).hide();



		/*	$data[0] = $config;//la configuracion de esa subasta
			$data[1] = $usuario->ultimaPujaSubasta($articuloId);//la ultima puja de ese usuario en la subasta
			$data[2] = $config->pujasArticulo($articuloId);//las pujas de esa conf*/
		}
		$("#pruevas").html(data);

	});

}


function editarConfp(){
	var elDiv = document.getElementById("formConf");
	var p = elDiv.getElementsByTagName("p");



	if($(p[0]).css("display")=="none"){
		$(p[0]).slideDown(800);
		$(p[1]).slideDown(800);
		$(p[3]).slideDown(800);
		$("#editConf").val("Cancelar");
		
	} else {
		$(p[0]).slideUp(800);
		$(p[1]).slideUp(800);
		$(p[3]).slideUp(800);
		$("#editConf").val("Editar");
		
	}
}



function cambiarla(procedimiento){
	var puja_max = $("#cantidadMax").val();
	var id_subasta = $("#subastaId").val();
	var url = $("#cambiarConf").val();



	if(validator()==true){
		
		$.get(url,{
			id_subasta: id_subasta,
			puja_max : puja_max
		})
		.done(function(data) {
			if(data=="false"){
				alert("Error");
			}else{
				alert("Cambios Guardados");
				var elDiv = document.getElementById("formConf");
				var h2 = elDiv.getElementsByTagName("h2");
				$(h2[1]).html(data+" €");
			}
			


		});

	}

}

function cancelConf(){
	var id_subasta = $("#subastaId").val();
	var url = $("#cancelarConf").val();
	alert(url);


	if(confirm("Seguro Que Desea Cancelarla")){

		$.get(url,{
			id_subasta: id_subasta
		})
		.done(function(data) {
			if(data!=1){
				alert(data);
			}else{
				alert("Configuracion Cancelada");

     //reconstruimos el contenido
     $( ".formConfPuja-button" ).prop( "disabled", false );
     $(".formConfPuja-button").html("Configurar Pujas Automáticas <i class='fa fa-floppy-o'></i>");     
     $(".formConfPuja").slideUp(800);
 }
 var txt = " <form class='form-inline' id='form-validate'>";
 txt +=  " <h2>Cantidad Máxima Que Pujara</h2>";
 txt += "<p>  <input trype='text' id='cantidadMax' name='cantidadMax'/>€</p>";
 txt += "<br> <span class='errorJS' id='cantidadMax_error'>&nbsp;Campo obligatorio</span>";
 txt += "<span class='errorJS' id='cantidadMax_error2'>&nbsp;Debe ser un numero positivo, con dos decimales como máximo</span>"
 txt += "</form><p> <input id='crearConf' type='button' class='btn btn-primary' onclick='crear_confPuja()' value='GUARDAR'> <i class='fa fa-flag-o'></i></p>";


 $("#formConf").html(txt);	


});

	}
}



