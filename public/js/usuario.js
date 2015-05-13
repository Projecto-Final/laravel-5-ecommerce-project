$(document).ready(function() {
	perfil();
});


function perfil(){
	var url = "get_perfil";
	$.get(url,function(data,status){
		var txt = "<h3>Información básica</h3>"
		+"<p>Apodo :</p>"+data.username
		+"<p>Nombre :</p>"+data.nombre
		+"<p>Apellidos :</p>"+data.apellido
		+"<p>Direccion :</p>"+data.direccion
		+"<p>Email :</p>"+data.email
		+"<p>Fecha de creación de la cuenta :</p>"+data.created_at;
		$(".contact-info").html(txt);
	});
}	


function ventas(){
	var url = "get_ventas";
	var txt="";
	$.get(url,function(data,status){
		txt+='<table class="table table-striped">';
		txt+= '<thead><tr class="success">';
		txt +="<th></th>";
		txt +="<th>Producto</th>";
		txt +="<th>Fecha inicio</th>";
		txt +="<th>Fecha final</th>";
		txt +="<th>Precio inicial</th>";
		txt +="<th>Fecha venta</th>";
		txt +="<th>Precio venta</th></tr></thead>";
		for (var i = 0; i < data.length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><img src='http://www.imagenesparadescargar.org/wp-content/uploads/buscar-Fotos-de-skate..jpg' height='auto' width='60px'/></td>";
			txt +="<td>"+data[i].nombre_producto+"</td>";
			txt +="<td>"+data[i].fecha_inicio+"</td>";
			txt +="<td>"+data[i].fecha_final+"</td>";
			txt +="<td>"+data[i].precio_inicial+"</td>";
			txt +="<td>"+data[i].fecha_venda+"</td>";
			txt +="<td>"+data[i].precio_venta+"</td></tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}

function pujas(){
	var url = "get_pujas";
	var txt="";
	$.get(url,function(data,status){
		txt+='<table class="table table-striped">';
		txt+= '<thead><tr class="success">';
		txt +="<th>Producto</th>";
		txt +="<th>Cantidad</th>";
		txt +="<th>Fecha</th></tr></thead>";
		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td>"+data[1][i].nombre_producto+"</td>";
			txt +="<td>"+data[0][i].cantidad+"</td>";
			txt +="<td>"+data[0][i].fecha_puja+"</td></tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}

function subastas(){
	var url = "get_subastas";
	var txt="";
	$.get(url,function(data,status){
		txt+='<table class="table table-striped">';
		txt+= '<thead><tr class="success">';
		txt +="<th></th>";
		txt +="<th>Producto</th>";
		txt +="<th>Fecha inicio</th>";
		txt +="<th>Fecha final</th>";
		txt +="<th>Precio inicial</th>";
		txt +="<th>Precio venta</th></tr></thead>";
		for (var i = 0; i < data.length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><img src='http://www.imagenesparadescargar.org/wp-content/uploads/buscar-Fotos-de-skate..jpg' height='auto' width='60px'/></td>";
			txt +="<td>"+data[i].nombre_producto+"</td>";
			txt +="<td>"+data[i].fecha_inicio+"</td>";
			txt +="<td>"+data[i].fecha_final+"</td>";
			txt +="<td>"+data[i].precio_inicial+"</td>";
			txt +="<td>"+data[i].precio_venta+"</td></tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}