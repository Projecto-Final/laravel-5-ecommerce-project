$(document).ready(function(){

	var cargarP = $("#comprovarEstado").val();

	if(cargarP!="no"){
		comprovarEstado();
		var comprovarEstadoInt =setInterval(comprovarEstado,7000);
		
	}
	//ultimaPuja();
	recargarPrecios();
	var recargarPreciosInt =setInterval(recargarPreciosInt,7000);
	
});
var cont=0;
function prorrogar(url){
	bootbox.prompt("Para poder completar el pago necesitamos su NIF", function(result) {
		var url =$("#prorrogar").val();
		var id_subasta = $("#subastaId").val();
		if(result != null){
			if (isDNI(result)) {
				$.get(url,{
					id_subasta: id_subasta,
					nif: result
				})
				.done(function(data) {
					bootbox.alert("Subasta Prorrogada");
					var id_subasta = $("#subastaId").val();
					var textaco = '<h5>PRECIO ACTUAL DEL ARTICULO</h5>';
					textaco += '<div id="contPujas">Nº Pujas :<br></div>';
					textaco += '<form class="form-inline"><div id="estadoSubasta"><div class="form-group"><div class="input-group">';
					textaco += '<div class="input-group-addon">€</div>';
					textaco += '<input type="text" class="form-control" id="exampleInputAmount" value="" disabled="true">';     
					textaco += '</div></div> <input id="botonPuja" type="button" class="btn btn-primary" onclick="aceptarPuja();" value="Aceptar la Ultima Puja"></form>';   
					
					
					$("#bid").html(textaco);
					recargarPrecios();


				}).fail(function(data){
					bootbox.alert("Debes estar Logueado para Esto");
				});	
			} else {
				bootbox.alert("Hay un error con el NIF");
			}
		}
	});
}

function aceptarPuja(url){
	bootbox.confirm("Seguro Que Aceptas la Ultima Oferta?", function(result) {
		if(url==null){
			url = "../aceptarUltimaP"
		}
		var id_subasta = $("#subastaId").val();
		if(result){
			$.get(url,{
				id_subasta: id_subasta
			})
			.done(function(data) {
				if(data!=0){
					

					bootbox.alert("Felicidades por tu venta!");

					comprovarEstado();
				}else{
					bootbox.alert("No Hay Pujas");
				}
				
			}).fail(function(data){
				bootbox.alert("Debes estar Logueado para Ello");
			});	
		}
	}); 
}

function mostrarTP(){
	
	var estado = $("#TPujas").css("display");
	
	if(estado=="none")	{ 
		cargarTP();
		$("#TPujas").slideDown(800);
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
				txt +="<td style='height:50px;width:50px;'><a href="+data[3][i]+"><img src="+data[2][i]+"></img></a></td>";
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
			$("#bid").html(data);
			$("#datosPujaConf").hide();
			$("#contPujas").hide();



//como ya esta caducada chuto intervalos

//esto lo peta

// clearInterval(comprovarEstadoInt);


// clearInterval(recargarPreciosInt);


}
}).fail(function(data){
	
});	


}



function recargarPrecios(){

	var url = $("#cargarPrecio").val();
	var id_subasta = $("#subastaId").val();

	$.get(url,{
		id_subasta: id_subasta
	})
	.done(function(data) {
		var precio = data[0]['incremento_precio']+data[0]['puja_mayor'];




		$("#exampleInputAmount").val(data[0]['puja_mayor']) ;
		$("#tdPrecio").html(data[0]['puja_mayor']+"€");
		//por motivos que desconozco sin el aux no va
		var aux = data[1]
		$("#numPujas").html(aux);
		$("#contPujas").html("Nº Pujas :<br>"+aux);
	});
}
