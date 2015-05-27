$(document).ready(function(){

	var cargarP = $("#cargarPujaAut").val();

	if(cargarP!="no"){
		cargarPujaAut();
		pujasAutom();
		var pujasAutomInt =	setInterval(pujasAutom,7000);
		
		ultimaPuja();
		var ultimaPujaInt =	setInterval(ultimaPuja,7000);
		
	}
	
	comprovarEstado();
	recargarPrecios();
	
});
var cont = 0;

setInterval(comprovarEstado, 15000);

var recargarPreciosInt = setInterval(recargarPrecios, 7000);

function avisoLog(){
	bootbox.alert("Debes estar logueado para pujar");
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

		$("#contPujas").html("Nº Pujas :<br>"+aux);

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
				//alert("Solo puedes tener una configuracion");
				bootbox.alert("Solo puedes tener una configuracion");
			}else{
				bootbox.alert("Configuracion de Puja Guardada");
				cargarPujaAut();
			}
		})
		.error(function(data){
			var errors = data.responseJSON;
			$('#sistemError').html(errors.puja_max);			
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



function cambiarla(){
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
				bootbox.alert("Error");
			}else{
				
				bootbox.alert("Cambios Guardados");
				var elDiv = document.getElementById("formConf");
				var h2 = elDiv.getElementsByTagName("h2");
				$(h2[1]).html(data+" €");
			}
			


		});

	}

}

function cancelConf(){
	bootbox.confirm("Seguro Que Desea Cancelarla?", function(result) {
	var id_subasta = $("#subastaId").val();
	var url = $("#cancelarConf").val();

	if(result){

		$.get(url,{
			id_subasta: id_subasta
		})
		.done(function(data) {
			if(data!=1){
				bootbox.alert(data);
			}else{
				
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
			
		})
	}
	});
}


function pujasAutom(){

	var url = $("#pujasAutom").val();
	var id_subasta = $("#subastaId").val();

	$.get(url,{
		id_subasta: id_subasta
	})
	.done(function(data) {
		if(data!=0){

			var txt = "";
			txt+="<h4>Pujas Generadas Por Esta Configuración</h4>";
			txt += "<div id='pujasGA'>";
			txt+='<table class="table table-striped" >';
			txt+= '<thead><tr class="success">';	
			txt +="<th>Cantidad</th>";
			txt +="<th>Fecha Puja</th>";
			txt +="<th>Estado</th></tr></thead>";

			for (var i = data.length-1; i > -1; i--) {
				txt+= '<tr class="info">';
				txt +="<td>"+data[i].cantidad+"</td>";
				txt +="<td>"+formatoFecha(data[i].fecha_puja)+"</td>";
				if(data[i].superada==0){
					txt +="<td>En Cabeza</td></tr>";
				}else{
					txt +="<td>Superada</td></tr>";
				}
			}
			txt+="</table>";
			txt += "</div>";

			$("#pujasAutomaticastable").html(txt);
		}
	});

}

function ultimaPuja(){

	var url = $("#ultimaPuja").val();
	var id_subasta = $("#subastaId").val();

	$.get(url,{
		id_subasta: id_subasta
	})
	.done(function(data) {
		if(data!=0){

			var txt = "";
			txt+="<h4>Tu Última Puja</h4>";
			txt+='<table class="table table-striped">';
			txt+= '<thead><tr class="success">';	
			txt +="<th>Cantidad</th>";
			txt +="<th>Método</th>";
			txt +="<th>Fecha Puja</th>";
			txt +="<th>Estado</th></tr></thead>";
			
			txt+= '<tr class="info">';
			txt +="<td>"+data[0].cantidad+"</td>";
			if(data[0].confpuja_id!=null){
				txt +="<td> Manual </td>";
			}else{
				txt +="<td> Automática </td>";
			}				
			txt +="<td>"+formatoFecha(data[0].fecha_puja)+"</td>";
			if(data[0].superada==0){
				txt +="<td>En Cabeza</td></tr>";
			}else{
				txt +="<td>Superada</td></tr>";
			}

			txt+="</table>"

			$("#UltimaPujaInfo").html(txt);
		}
	});
}



function pujar(id_subasta,url){

	bootbox.confirm("Seguro Que Desea Pujar?", function(result) {
		if(result){
			var puja_mayor = $("#exampleInputAmount").val();
			$.get(url,{
				id_subasta: id_subasta,
				puja_mayor : puja_mayor
			})
			.done(function(data) {
				if(data=="Error"){
					bootbox.alert("El precio mostrado ha cambiado");
				}else if(data=="Ya Pujaste"){
					bootbox.alert("Ya Pujaste");
				}
				recargarPrecios();

			}).fail(function(data){
				bootbox.alert("Debes estar Logueado para Pujar");
			});	
		}
	}); 
}

function mostrarTP(){
	
	var estado = $("#TPujas").css("display");
	
	if(estado=="none")	{ 
		$("#TPujas").slideDown(800);
		cargarTP();
	}else{
		$("#TPujas").slideUp(800);
	}
}

function cargarTP(){
	
	var url = $("#todasPujas").val();
	var id_subasta = $("#subastaId").val();


	

	$.get(url,{
		id_subasta: id_subasta
	})
	.done(function(data) {
		if(data!=0){
			var txt = "";
			txt+="<h4>Pujas</h4>";
			txt+='<table class="table table-striped">';
			txt+= '<thead><tr class="success">';
			txt +="<th></th>";
			txt +="<th>Usuario</th>";	
			txt +="<th>Cantidad</th>";
			txt +="<th>Fecha Puja</th>";
			txt +="<th>Estado</th></tr></thead>";			

			for (var i = data[0].length-1; i > -1; i--) {
				txt+= '<tr class="info">';
				txt +="<td><a href="+data[3][i]+"><img src="+data[2][i]+"></img></a></td>";
				txt +="<td>"+data[1][i].username+"</td>";
				txt +="<td>"+data[0][i].cantidad+"</td>";
				txt +="<td>"+formatoFecha(data[0][i].fecha_puja)+"</td>";
				if(data[0][i].superada==0){
					txt +="<td>En Cabeza</td></tr>";
				}else{
					txt +="<td >Superada</td></tr>";
				}

			}
			txt+="</table>"


			txt+="</table>"
			
			$("#TPujas").html(txt);
			if(cont==0){
				cont++;
				var cargarTPInt = setInterval(cargarTP,10000);
			}
		}else{
			bootbox.alert("No hay pujas que mostrar");
		}
	});

}


function comprovarEstado(){

	var url = $("#comprovarEstado").val();
	var id_subasta = $("#subastaId").val();

	$.get(url,{
		id_subasta: id_subasta
	})
	.done(function(data) {
		if(data!=0){
			var h5 = document.getElementsByTagName("h5");
			var bid = document.getElementById("bid");
			var p = bid.getElementsByTagName("p");
			$(p).hide();
			$(h5[0]).html(" ");		
			$("#estadoSubasta").html(data);
			$("#datosPujaConf").hide();
			$("#contPujas").hide();
			//como ya esta caducada chuto intervalos
			// clearInterval(recargarPreciosInt);
			// clearInterval(ultimaPujaInt);
		}
	}).fail(function(data){
	});	
}
