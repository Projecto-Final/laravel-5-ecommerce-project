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
			

	});

}