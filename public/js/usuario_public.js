$(document).ready(function() {
	perfil();
});

function perfil(){
	var id = $("#idUsuario").val();
	var url = "get_perfil";
	$.get(url,function(data,status){
		alert(data.username);
		var txt = "<h3>Información básica</h3>"
		+"<div class='col-md-8'><p>Apodo :</p>"+data.username
		+"<p>Nombre :</p>"+data.nombre
		+"<p>Apellidos :</p>"+data.apellido
		+"<p>Direccion :</p>"+data.direccion
		+"<p>Email :</p>"+data.email
		+"<p>Fecha de creación de la cuenta :</p>"+data.created_at+"</div>"
		$(".contact-info").html(txt);
	});
}	

function ventas(){
	var id = $("#idUsuario").val();
	var url = "get_ventas";
	var txt="";
	txt+="<h3>Ventas</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";
	txt +="<th>Producto</th>";
	txt +="<th>Fecha inicio</th>";
	txt +="<th>Fecha final</th>";
	txt +="<th>Precio inicial</th>";
	txt +="<th>Fecha venta</th>";
	txt +="<th>Precio venta</th><th></th></tr></thead>";
	$.get(url,{id: id})
	.done(function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Ventas Que Mostrar</h3>";
		}
		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><a href='subasta/"+data[0][i].id+"'><img style='width:150px;' src='"+data[1][i]+"'/></a></td>";			
			txt +="<td>"+data[0][i].nombre_producto+"</td>";
			txt +="<td>"+data[0][i].fecha_inicio+"</td>";
			txt +="<td>"+data[0][i].fecha_final+"</td>";
			txt +="<td>"+data[0][i].precio_inicial+"</td>";
			txt +="<td>"+data[0][i].fecha_venda+"</td>";
			txt +="<td>"+data[0][i].precio_venta+"</td></tr>";
			txt +="<td><a href='subasta/"+data[0][i].id+"'><span class='glyphicon glyphicon-triangle-right'></span></a></td>";			
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}
function subastas(){
	var id = $("#idUsuario").val();
	var url = "get_subastas";
	var txt="";
	txt += "<h3>Subastas Activas</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";	
	txt +="<th>Producto</th>";
	txt +="<th>Fecha inicio</th>";
	txt +="<th>Fecha finalizacion</th>";
	txt +="<th>Precio inicial</th></tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Subastas Activas</h3>";
		}
		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><a href='subasta/"+data[0][i].id+"'><img style='width:150px;' src='"+data[1][i]+"'/></a></td>";						
			txt +="<td>"+data[0][i].nombre_producto+"</td>";
			txt +="<td>"+data[0][i].fecha_inicio+"</td>";
			txt +="<td>"+data[0][i].fecha_final+"</td>";
			txt +="<td>"+data[0][i].precio_inicial+"</td>";
			txt +="<td><a href='subasta/"+data[0][i].id+"'><span class='glyphicon glyphicon-triangle-right'></span></a></td>";
			txt +="</tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}
function valoraciones(){
	var id = $("#idUsuario").val();	
	var url = "get_valoraciones";
	var txt="";
	txt += "<div class='col-md-8'><h3>Valoraciones</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";
	txt +="<th>Valorante</th>";
	txt +="<th>Puntuacion</th>";
	txt +="<th>Mensaje</th>";
	txt +="<th>Fecha</th>";
	txt +="</tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Valoraciones Que Mostrar</h3>";
		}
		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><a href='subasta/"+data[3][i].id+"'><img style='width:150px;' src='"+data[2][i]+"'/></a></td>";												
			txt +="<td>"+data[1][i]+"</td>";
			txt +="<td>"+data[0][i].puntuacion+"</td>";
			txt +="<td>"+data[0][i].texto+"</td>";
			txt +="<td>"+data[0][i].fecha+"</td>";
			txt +="</tr>";
		};
		txt+="</table></div>";
		$(".contact-info").html(txt);
	});
}