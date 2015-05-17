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


function compras(){
	var url = "get_compras";
	var txt="";
	txt+="<h3>Mis Ventas</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";
	txt +="<th>Producto</th>";
	txt +="<th>Fecha inicio</th>";
	txt +="<th>Fecha final</th>";
	txt +="<th>Precio inicial</th>";
	txt +="<th>Fecha venta</th>";
	txt +="<th>Precio venta</th></tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Compras Que Mostrar</h3>";
		}

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


function ventas(){
	var url = "get_ventas";
	var txt="";
	txt+="<h3>Mis Ventas</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";
	txt +="<th>Producto</th>";
	txt +="<th>Fecha inicio</th>";
	txt +="<th>Fecha final</th>";
	txt +="<th>Precio inicial</th>";
	txt +="<th>Fecha venta</th>";
	txt +="<th>Precio venta</th></tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Ventas Que Mostrar</h3>";
		}
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
function confPuj(){
	var url = "get_confPuj";
	var txt="";
	txt += "<h3>Mis Configuracion Pujas</h3>";
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";//foto
	txt +="<th>Producto</th>";
	txt +="<th>Cantidad Maxima De Puja</th>";
	txt +="<th>Estado Puja</th>";
	txt +="<th>Fecha Configuracion</th>";
	txt +="<th>Estado Subasta</th></tr></thead>";
	$.get(url,function(data,status){
		
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Configuradas Que Mostrar</h3>";

		}
		for (var i = 0; i < data[0].length; i++) {
			
// if(data[0][i].superada == 1){
// 	color de la tabla rojo
// }

txt+= '<tr class="info">';
if(data[2][i][0]!=null){

	txt +="<td> "+data[2][i][0].imagen+"</td>";

}else{
	txt +="<td>NO</td>";
}



txt +="<td>"+data[1][i].nombre_producto+"</td>";
txt +="<td>"+data[0][i].puja_maxima+"</td>";			

if(data[0][i].superada == 1){
	txt +="<td>Superada</td>";
}else if(data[0][i].superada == 0){
	txt +="<td>No Superada</td>";
}
txt +="<td>"+data[0][i].fecha_config+"</td>";
if(data[1][i].precio_venta == -1){
	txt +="<td>Activa</td></tr>";
}else if(data[1][i].precio_venta != -1){
	txt +="<td>Inactiva</td></tr>";
}
};
txt+="</table>"
$(".contact-info").html(txt);
});
}

function pujas(){
	var url = "get_pujas";
	var vac = true;
	var txt="";
	txt += "<button class='bb' onclick='pujas();' >Pujas Activas</button>";
	txt += "<button class='bb' onclick='pujasI();' >Pujas Inactivas</button>";
	txt += "<h3>Mis Pujas Activas</h3>";
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th>Imagen</th>";
	txt +="<th>Producto</th>";
	txt +="<th>Cantidad Pujada</th>";
	txt +="<th>Tipo</th>";
	txt +="<th>Estado</th>";
	txt +="<th>Fecha Puja</th></tr></thead>";
	$.get(url,function(data,status){

		
		for (var i = 0; i < data[0].length; i++) {
// if(data[0][i].superada == 1){
// 	color de la tabla rojo
// }

if(data[1][i].precio_venta == -1){
	vac=false;
	txt+= '<tr class="info">';
	if(data[2][i][0]!=null){
		txt +="<td>"+data[2][i][0].imagen+"</td>";
	}else{
		txt +="<td>NO</td>";
	}

	txt +="<td>"+data[1][i].nombre_producto+"</td>";
	txt +="<td>"+data[0][i].cantidad+"</td>";			
	if(data[3][i]!=null){
		txt +="<td> Puja Realizada Automaticamente</td>";
		txt +="<td>"+data[3][i].fecha_config+"</td>";
	}else{
		txt+="<td>Manual</td>";
	}
	if(data[0][i].superada == 1){
		txt +="<td>Puja Superada</td>";
	}else if(data[0][i].superada == 0){
		txt +="<td>Puja En Cabeza</td>";
	}
	txt +="<td>"+data[0][i].fecha_puja+"</td></tr>";
}
};
if(vac==true){
	txt+="</table>"
	txt+="<h3>No Hay Pujas Que Mostrar</h3>";
}
txt+="</table>"
$(".contact-info").html(txt);
});
}
function pujasI(){
	var url = "get_pujas";
	var txt="";
	var vac=true;
	txt += "<button class='bb' onclick='pujas();' >Pujas Activas</button>";
	txt += "<button class='bb' onclick='pujasI();' >Pujas Inactivas</button>";
	txt += "<h3>Mis Pujas Inactivas</h3>";
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th>Imagen</th>";
	txt +="<th>Producto</th>";
	txt +="<th>Cantidad Pujada</th>";
	txt +="<th>Tipo</th>";
	txt +="<th>Fecha Puja</th></tr></thead>";
	$.get(url,function(data,status){

		
		for (var i = 0; i < data[0].length; i++) {
			if(data[1][i].precio_venta != -1){
				vac=false;
				txt+= '<tr class="info">';
				if(data[2][i][0]!=null){
					txt +="<td>"+data[2][i][0].imagen+"</td>";
				}else{
					txt +="<td>NO</td>";
				}

				txt +="<td>"+data[1][i].nombre_producto+"</td>";
				txt +="<td>"+data[0][i].cantidad+"</td>";			
				if(data[3][i]!=null){
					txt +="<td> Puja Realizada Automaticamente</td>";
					txt +="<td>"+data[3][i].fecha_config+"</td>";
				}else{
					txt+="<td>Manual</td>";
				}
				txt +="<td>"+data[0][i].fecha_puja+"</td></tr>";
				
			}
		}
		if(vac==true){
			txt+="</table>"
			txt+="<h3>No Hay Pujas Que Mostrar</h3>";
		}
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}

function subastas(){
	var url = "get_subastas";
	var txt="";
	txt += "<button class='bb' onclick='subastas();' >Subastas Activas</button>";
	txt += "<button class='bb' onclick='subastasI();' >Subastas Inactivas</button>";
	txt += "<h3>Mis Subastas Activas</h3>"
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
			txt +="<td><img src='http://www.imagenesparadescargar.org/wp-content/uploads/buscar-Fotos-de-skate..jpg' height='auto' width='60px'/></td>";
			txt +="<td>"+data[0][i].nombre_producto+"</td>";
			txt +="<td>"+data[0][i].fecha_inicio+"</td>";
			txt +="<td>"+data[0][i].fecha_final+"</td>";
			txt +="<td>"+data[0][i].precio_inicial+"</td>";
			txt +="</tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}
function subastasI(){
	var url = "get_subastasI";
	var txt="";
	txt += "<button class='bb' onclick='subastas();' >Subastas Activas</button>";
	txt += "<button class='bb' onclick='subastasI();' >Subastas Inactivas</button>";
	txt += "<h3>Mis Subastas Inactivas</h3>"
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
			txt+="<h3>No Hay Subastas Inactivas</h3>";
		}
		for (var i = 0; i < data.length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><img src='http://www.imagenesparadescargar.org/wp-content/uploads/buscar-Fotos-de-skate..jpg' height='auto' width='60px'/></td>";
			txt +="<td>"+data[i].nombre_producto+"</td>";
			txt +="<td>"+data[i].fecha_inicio+"</td>";
			txt +="<td>"+data[i].fecha_final+"</td>";
			txt +="<td>"+data[i].precio_inicial+"</td>";
			txt +="</tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}

function valoraciones(){
	var url = "get_valoraciones";
	var txt="";
	txt += "<h3>Mis Valoraciones</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
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
			txt +="<td>"+data[1][i]+"</td>";
			txt +="<td>"+data[0][i].puntuacion+"</td>";
			txt +="<td>"+data[0][i].texto+"</td>";
			txt +="<td>"+data[0][i].fecha+"</td>";
			txt +="</tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}