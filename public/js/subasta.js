$(document).ready(function(){
	setInterval(recargarPrecios, 7000);
});



function pujar(id_puja,url){

	//alert(url);
	if(confirm("Seguro Que Desea Pujar?")){
		$.get(url,{
			id_puja: id_puja
		})
		.done(function(data) {


			var precio = data[0]['incremento_precio']+data[0]['puja_mayor'];

			$("#botonPuja").val("PUJAR "+ precio +"€");

			$("#exampleInputAmount").val(data[0]['puja_mayor']) ;

			$("#tdPrecio").html(data[0]['puja_mayor']+"€");

//por motivos que desconozco sin el aux no va
var aux = data[1]
$("#numPujas").html(aux);


if(data[2]['pujador_id']==data[3]){
	$( "#botonPuja" ).prop( "disabled", true );
}else{
	$( "#botonPuja" ).prop( "disabled", false );
}

});
	}
}

function recargarPrecios(){
	var url = $("#cargarPrecio").val();
	var id_puja = $("#subastaId").val();

	$.get(url,{
		id_puja: id_puja
	})
	.done(function(data) {


		var precio = data[0]['incremento_precio']+data[0]['puja_mayor'];

		$("#botonPuja").val("PUJAR "+ precio +"€");

		$("#exampleInputAmount").val(data[0]['puja_mayor']) ;

		$("#tdPrecio").html(data[0]['puja_mayor']+"€");

		//por motivos que desconozco sin el aux no va
		var aux = data[1]
		$("#numPujas").html(aux);

		if(data[2]['pujador_id']==data[3]){
			$( "#botonPuja" ).prop( "disabled", true );
		}else{
			$( "#botonPuja" ).prop( "disabled", false );
		}


	});

}


function mostrar_cp(){
	interruptor_visible($(".formConfPuja").css("display"));
}

function interruptor_visible(estado){
	if(estado=="none"){
		$(".formConfPuja").show(800);
		$(".formConfPuja-button").html("Mejor No <i class='fa fa-ban'></i>");
	} else {
		$(".formConfPuja").hide(800);
		$(".formConfPuja-button").html("Configurar Pujas Automáticas <i class='fa fa-floppy-o'></i>");
	}
}


function crear_confPuja(id_puja,url){

	$.get(url,{
		id_puja: id_puja
	})
	.done(function(data) {

		


	});

}





function ValidarForm(){;

	error=false; 	
	var formulario = document.getElementById('form-validate');
	var porTagName = formulario.getElementsByTagName("input");
	var current;
	var val;
	var aux;

	for (i=0;i<porTagName.length;i++)
	{
		current = porTagName[i];
 		//alert(current.name);
 		if(current.type!="hidden"){
 			if(current.type!="button"){
 				if(current.type=="checkbox"){
 					if(current.checked==false){
 						alert("Debe aceptar las condiciones de uso y politica de privacidad");
 						getIdMsg(current,true,false);
 						//error=true;
 					}
 				}
 				val = current.value;

 				if(val!=""){
	//el no campo esta vacio
	getIdMsg(current,false,false);
	if(current.name=="email"){
		if(validarEmail(val)==false){
			getIdMsg(current,true,true);
		}
	}

	if(current.name=="password"){


		if(val.length<6){
			// alert("value.leng"+val.length);
			getIdMsg(current,true,true);
		}else{
			getIdMsg(current,false,true);
		}
	}
	if(current.name=="password_confirmation"){
		comprovarPass(current);
		//var aux = comprovarPass(current);
		//if(aux==false){
			//error=true;	
	//	}

}

}else{
					//el campo esta vacio
					getIdMsg(current,true,false);
					//error=true;	
				}

			}
		}
	}
	if(error==false){
		
		return true;

	}else{
		return false;
	}

}

function getIdMsg(elem, si,especial){
	var ele = elem.getAttribute("id");
	if (ele == undefined) {
		ele = elem.getAttribute("name")
	};
	// ERROR ESPECIAL O NO
	if(especial==true){
		ele += "_error2";
	}else if(especial==false){
		ele += "_error";
	}
	//  MOSTRAR O OCULTAR
	if(si==true){
		mostraError(ele);
	}else if(si==false){
		ocultaError(ele);	
	}
}

function mostraError(idElem) {
	error=true;
	//alert(idElem);
	document.getElementById(idElem).style.display="inline";
}

function ocultaError(idElem) {
	//alert(idElem);
	document.getElementById(idElem).style.display="none";
}