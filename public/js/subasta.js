$(document).ready(function(){
	setInterval(recargarPrecios, 4000);
});



function pujar(id_puja,url){

	//alert(url);
	if(confirm("Seguro Que Desea Pujar?")){
		$.get(url,{
			id_puja: id_puja
		})
		.done(function(data) {


			var precio = data['incremento_precio']+data['puja_mayor'];

			$("#botonPuja").val("PUJAR "+ precio +"€");

			$("#exampleInputAmount").val(data['puja_mayor']) ;

			$("#tdPrecio").html(data['puja_mayor']);

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


		var precio = data['incremento_precio']+data['puja_mayor'];

		$("#botonPuja").val("PUJAR "+ precio +"€");

		$("#exampleInputAmount").val(data['puja_mayor']) ;

		$("#tdPrecio").html(data['puja_mayor']);

	});

}