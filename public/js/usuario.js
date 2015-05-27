setInterval(get_Pendientes,50000);

$(document).ready(function() {
	perfil();

	$("#close_pop_perfil").click(function(){
		$("#confPerfil").fadeOut(500);
	});
	$("#close_pop_portada").click(function(){
		$("#confPortada").fadeOut(500);
	});
	$("#editarFP").click(function(){
		$("#confPerfil").fadeIn(500);
	});
	$("#editarFportada").click(function(){
		$("#confPortada").fadeIn(500);
	});
});


function get_Pendientes(){
	var url = "usuario/get_Pendientes";
	$.get(url,function(data,status){
		if(data != 0){
			bootbox.alert("Tienes pendiente "+data+" valoraciones. Ves al apartado de valoraciones pendientes y rellenalas");
		}
	});
}

function perfil(){
	var url = "usuario/get_perfil";
	$.get(url,function(data,status){
		var txt = "<h3>Información básica</h3>"
		+"<div class='col-md-8'><p>Apodo :</p>"+data[0].username
		+"<p>Nombre :</p>"+data[0].nombre
		+"<p>Apellidos :</p>"+data.apellido
		+"<p>Texto de presentación :</p>"+data[0].texto_presentacion
		+"<p>Direccion :</p>"+data[0].direccion
		+"<p>Email :</p>"+data[0].email
		+"<p>Localidad :</p>"+data[1].nombre
		+"<p>Fecha de creación de la cuenta :</p>"+formatoFecha(data[0].created_at)+"</div>"
		+"<div class='col-md-4'><button class='bb' onclick='formEditar();' >Editar Perfil</button></div>"
		+"<div class='col-md-4'><button class='bb' onclick='mostraCambioContrasena();' >Cambiar Contraseña</button></div>";
		$(".contact-info").html(txt);
	});
}	


function mostraCambioContrasena(){
	$(".contact-info").html("<form  method='post' enctype='multipart/form-data' id='form-validate'>"
		+"<p id='espaciodor'></p><h4>Cambio de contraseña</h4>"
		+"Contraseña vieja: <input type='password' name='password_old' id='password_old' title='password' class='input-text required-entry validate-password'></br></br>"
		+"<span class='errorJS' id='password_old_error'>&nbsp;Campo obligatorio</span></td></br></br>"
		+"<span id='password_old_sistemError' class='errorSys'></span>"
		+"Contraseña : <input type='password' name='password' id='password' title='password' class='input-text required-entry validate-password'>"
		+"<span class='errorJS' id='password_error'>&nbsp;Campo obligatorio</span>"
		+"<span class='errorJS' id='password_error2'>&nbsp;La contraseña debe se der de almenos 6 caracteres</span>"
		+"<span id='password_sistemError' class='errorSys'></span>"
		+"</br>"
		+"</br>Repetir Contraseña : <input type='password' id='password_confirmation' name='password_confirmation' title='Confirm Password' class='input-text required-entry validate-cpassword'>"
		+"<span class='errorJS' id='password_confirmation_error2'>&nbsp;Las contraseñas deben coincidir</span>"
		+"<span class='errorJS' id='password_confirmation_error'>&nbsp;Campo obligatorio</span></td></br></br>"
		+"<span id='password_confirmation_sistemError' class='errorSys'></span>"
		+"<input type='button' title='Submit' class='button' onclick='ValidarCambiosContrasena()' value='Guardar Cambios'>");
}	

function formEditar(){
	var url = "usuario/get_perfil";
	$.get(url,function(data,status){
		var txt = "<form  method='post' enctype='multipart/form-data' id='form-validate'>"
		txt += "<h3>Editar Perfil</h3>"	
		+"<input type='hidden' name='_token' value='{{ csrf_token() }}'>"
		+"<input name='form_key' type='hidden' value='YI43JcRMPlZ5bHvi'>"	
		+"Apodo :  <input type='text' id='username' name='username' value='"+data[0].username+"' title='username' maxlength='255'>"// class='input-text required-entry'
		+"<span class='errorJS' id='username_error'>&nbsp;Campo obligatorio</span>"

		+"<span id='username_sistemError' class='errorSys'></span>"
		+"</br><p class='espaciodor2'></p>"
		+"Nombre :  <input type='text' id='nombre' name='nombre' value='"+data[0].nombre+"' title='nombre' maxlength='255' >"//class='input-text required-entry'
		+"<span class='errorJS' id='nombre_error'>&nbsp;Campo obligatorio</span>"

		+"<span id='nombre_sistemError' class='errorSys'></span>"
		+"</br>"
		+"Apellidos :   <input type='text' id='apellidos' name='apellidos' value='"+data[0].apellido+"' title='apellidos' maxlength='255' >"//class='input-text required-entry'
		+"<span class='errorJS' id='apellidos_error'>&nbsp;Campo obligatorio</span>"

		+"<span id='apellido_sistemError' class='errorSys'></span>"
		+"</br><p class='espaciodor2'></p>"
		+"Direccion :   <input type='text' id='direccion' name='direccion' value='"+data[0].direccion+"' title='direccion' maxlength='255' >"//class='input-text required-entry'
		+"<span class='errorJS' id='direccion_error'>&nbsp;Campo obligatorio</span>"

		+"<span id='direccion_sistemError' class='errorSys'></span>"
		+"</br><p class='espaciodor2'></p>"

		+"Localidad : <select id='localidad'>";
		for (var i = 0; i < data[2].length; i++) {
			txt+="<option value='"+data[2][i].id+"'>"+data[2][i].nombre+"</option>";
		};
		txt+= "</select></br><p class='espaciodor2'></p>";

		txt+="Email :  <input type='text' id='email' name='email' value='"+data[0].email+"' title='email' maxlength='255' >"//class='input-text required-entry'
		+"<span class='errorJS' id='email_error'>&nbsp;Campo obligatorio</span>"
		+"<span class='errorJS' id='email_error2'>&nbsp;Debe ser una direccion de correo valida</span>"

		+"<span id='email_sistemError' class='errorSys'></span>"
		+"</br>"
		+"</br><p class='espaciodor2'></p>"
		+"Texto de Presentacion : </br></br> <textarea  id='texto_presentacion' name='texto_presentacion' rows='5' cols='80' maxlength='255' >"+data[0].texto_presentacion+"</textarea>"//class='input-text required-entry'
		+"</br><p class='espaciodor2'></p>"
		+"<input type='button' title='Submit' class='button' onclick='ValidarCambios()' value='Guardar Cambios'>"
		+"</br></br></br><input type='button' title='Submit' class='button' onclick='baja()' value='Darte de baja'>"

		$(".contact-info").html(txt);
	});
}

function baja(){

	bootbox.confirm("Si te das de baja la unica manera de activar tu cuenta sera enviando un email <b>'info.mail.3fym@gmail.com'</b></br>¿Estas seguro dar de baja tu cuenta?", function(result) {
		if(result){
			$.ajax({
				url: 'usuario/baja',
				type: 'PUT',
				headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
				'data':{ 'num' : 1},
				success: function(data) {
					location.reload();
				}
			});
		}else{}
	}); 

}

function compras(){
	var url = "usuario/get_compras";
	var txt="";
	txt+="<h3>Mis Compras</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";
	txt +="<th>Producto</th>";
	txt +="<th>Fecha inicio</th>";
	txt +="<th>Fecha final</th>";
	txt +="<th>Precio inicial</th>";
	txt +="<th>Fecha venta</th>";
	txt +="<th>Precio venta</th><th></th></tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Compras Que Mostrar</h3>";
		}

		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><a href='subasta/"+data[0][i].id+"'><img style='width:150px;' src='"+data[1][i]+"'/></a></td>";						
			txt +="<td>"+data[0][i].nombre_producto+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_inicio)+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_final)+"</td>";
			txt +="<td>"+data[0][i].precio_inicial+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_venda)+"</td>";
			txt +="<td>"+data[0][i].precio_venta+"</td></tr>";
			txt +="<td><a href='subasta/"+data[0][i].id+"'><span class='glyphicon glyphicon-triangle-right'>Ver la compra <br></span></a></td>";			
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}


function ventas(){
	var url = "usuario/get_ventas";
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
	txt +="<th>Precio venta</th><th></th></tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Ventas Que Mostrar</h3>";
		}
		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><a href='subasta/"+data[0][i].id+"'><img style='width:150px;' src='"+data[1][i]+"'/></a></td>";			
			txt +="<td>"+data[0][i].nombre_producto+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_inicio)+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_final)+"</td>";
			txt +="<td>"+data[0][i].precio_inicial+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_venda)+"</td>";
			txt +="<td>"+data[0][i].precio_venta+"</td></tr>";
			txt +="<td><a href='subasta/"+data[0][i].id+"'><span class='glyphicon glyphicon-triangle-right'></span></a></td>";			
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	});
}
function confPuj(){
	var url = "usuario/get_confPuj";
	var txt="";
	txt += "<h3>Mis Configuracion Pujas</h3>";
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";	
	txt +="<th>Producto</th>";
	txt +="<th>Cantidad Maxima De Puja</th>";
	txt +="<th>Estado Puja</th>";
	txt +="<th>Fecha Configuracion</th>";
	txt +="<th>Estado Subasta</th></tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Configuradas Que Mostrar</h3>";

		}else{
			for (var i = 0; i < data[0].length; i++) {
				txt+= '<tr class="info">';
				txt +="<td><a href='subasta/"+data[1][i].id+"'><img style='width:150px;' src='"+data[2][i]+"'/></a></td>";			
				txt +="<td>"+data[1][i].nombre_producto+"</td>";
				txt +="<td>"+data[0][i].puja_maxima+"</td>";			

				if(data[0][i].superada == 1){
					txt +="<td>Superada</td>";
				}else if(data[0][i].superada == 0){
					txt +="<td>No Superada</td>";
				}
				txt +="<td>"+formatoFecha(data[0][i].fecha_config)+"</td>";
				if(data[1][i].precio_venta == -1){
					txt +="<td>Activa</td></tr>";
				}else if(data[1][i].precio_venta != -1){
					txt +="<td>Inactiva</td></tr>";
				}
			};
		}
		txt+="</table>"
		$(".contact-info").html(txt);
	})	.error(function(data){
		txt+="</table>"
		txt+="<h3>No Hay Configuradas Que Mostrar</h3>";
		txt+="</table>"
		$(".contact-info").html(txt);
	});	
}

function pujas(){
	var url = "usuario/get_pujas";
	var vac = true;
	var txt="";
	txt += "<button class='bb' onclick='pujas();' >Pujas Activas</button>";
	txt += "<button class='bb' onclick='pujasI();' >Pujas Inactivas</button>";
	txt += "<h3>Mis Pujas Activas</h3>";
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";		
	txt +="<th>Producto</th>";
	txt +="<th>Cantidad Pujada</th>";
	txt +="<th>Tipo</th>";
	txt +="<th>Estado</th>";
	txt +="<th>Fecha Puja</th></tr></thead>";
	$.get(url,function(data,status){
		for (var i = 0; i < data[0].length; i++) {
			if(data[1][i].precio_venta == -1){
				vac=false;
				txt+= '<tr class="info">';
				txt +="<td><a href='subasta/"+data[1][i].id+"'><img style='width:150px;' src='"+data[2][i]+"'/></a></td>";			
				txt +="<td>"+data[1][i].nombre_producto+"</td>";
				txt +="<td>"+data[0][i].cantidad+"</td>";			
				if(data[3][i]!=null){
					txt +="<td> Puja Realizada Automaticamente</td>";
					txt +="<td>"+formatoFecha(data[3][i].fecha_config)+"</td>";
				}else{
					txt+="<td>Manual</td>";
				}
				if(data[0][i].superada == 1){
					txt +="<td>Puja Superada</td>";
				}else if(data[0][i].superada == 0){
					txt +="<td>Puja En Cabeza</td>";
				}
				txt +="<td>"+formatoFecha(data[0][i].fecha_puja)+"</td></tr>";
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
	var url = "usuario/get_pujas";
	var txt="";
	var vac=true;
	txt += "<button class='bb' onclick='pujas();' >Pujas Activas</button>";
	txt += "<button class='bb' onclick='pujasI();' >Pujas Inactivas</button>";
	txt += "<h3>Mis Pujas Inactivas</h3>";
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";	
	txt +="<th>Producto</th>";
	txt +="<th>Cantidad Pujada</th>";
	txt +="<th>Tipo</th>";
	txt +="<th>Fecha Puja</th></tr></thead>";
	$.get(url,function(data,status){
		for (var i = 0; i < data[0].length; i++) {
			if(data[1][i].precio_venta != -1){
				vac=false;
				txt+= '<tr class="info">';
				txt +="<td><a href='subasta/"+data[1][i].id+"'><img style='width:150px;' src='"+data[2][i]+"'/></a></td>";							
				txt +="<td>"+data[1][i].nombre_producto+"</td>";
				txt +="<td>"+data[0][i].cantidad+"</td>";			
				if(data[3][i]!=null){
					txt +="<td> Puja Realizada Automaticamente</td>";
					txt +="<td>"+formatoFecha(data[3][i].fecha_config)+"</td>";
				}else{
					txt+="<td>Manual</td>";
				}
				txt +="<td>"+formatoFecha(data[0][i].fecha_puja)+"</td></tr>";
				
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
	var url = "usuario/get_subastas";
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
			txt +="<td><a href='subasta/"+data[0][i].id+"'><img style='width:150px;' src='"+data[1][i]+"'/></a></td>";						
			txt +="<td>"+data[0][i].nombre_producto+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_inicio)+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_final)+"</td>";
			txt +="<td>"+data[0][i].precio_inicial+"</td>";
			txt +="<td><a href='subasta/"+data[0][i].id+"'><span class='glyphicon glyphicon-triangle-right'></span></a></td>";
			txt +="</tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	}).error(function(data){
		txt+="</table>"
		txt+="<h3>No Hay Subastas Activas</h3>";
		txt+="</table>"
		$(".contact-info").html(txt);
	});	
}

function subastasI(){
	var url = "usuario/get_subastasI";
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
	txt +="<th>Precio Venta</th>";
	txt +="<th>Precio inicial</th></tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Subastas Inactivas</h3>";
		}
		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><a href='subasta/"+data[0][i].id+"'><img style='width:150px;' src='"+data[1][i]+"'/></a></td>";									
			txt +="<td>"+data[0][i].nombre_producto+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_inicio)+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha_final)+"</td>";			
			if(data[i].precio_venta==0){
				txt +="<td>No Vendido</td>";
			}else{
				txt +="<td>"+data[0][i].precio_venta+"</td>";
			}
			txt +="<td>"+data[0][i].precio_inicial+"</td>";
			txt +="<td><a href='subasta/"+data[0][i].id+"'><span class='glyphicon glyphicon-triangle-right'></span></a></td>";
			txt +="</tr>";
		};
		txt+="</table>"
		$(".contact-info").html(txt);
	}).error(function(data){
		txt+="</table>"
		txt+="<h3>No Hay Subastas Inactivas</h3>";
		txt+="</table>"
		$(".contact-info").html(txt);
	});	
}

function valoraciones(){
	var url = "usuario/get_valoraciones";
	var txt="";
	txt+="<button class='bb' onclick='valoraciones();'>Valoraciones de mis ventas</button>"
	+"<button class='bb' onclick='valoracionesPendientes();'>Valoraciones pendientes</button>";	
	txt += "<h3>Mis Valoraciones</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";
	txt +="<th>Valorante</th>";
	txt +="<th>Puntuacion</th>";
	txt +="<th>Fecha</th>";
	txt +="</tr></thead>";
	$.get(url,function(data,status){
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Valoraciones Que Mostrar</h3>";
		}			
		for (var i = 0; i < data[0].length; i++) {
			txt+= '<tr class="info">';
			txt +="<td><a href='valorado/"+data[0][i].id+"'><img style='width:150px;' src='"+data[2][i]+"'/></a></td>";												
			txt +="<td>"+data[1][i]+"</td>";
			txt +="<td>"+data[4][i]+"</td>";
			txt +="<td>"+formatoFecha(data[0][i].fecha)+"</td>";
			txt +="</tr>";	
		};
		txt+="</table>";
		$(".contact-info").html(txt);
	}).error(function(data){
		txt+="</table>"
		txt+="<h3>No Hay Valoraciones Que Mostrar</h3>";
		$(".contact-info").html(txt);
	});	
}

function valoracionesPendientes(){
	var url = "usuario/get_valoracionesPendientes";
	var txt="";
	txt+="<button class='bb' onclick='valoraciones();'>Valoraciones de mis ventas</button>"
	txt+="<button class='bb' onclick='valoracionesPendientes();'>Valoraciones pendientes</button>";
	txt += "<h3>Valoraciones pendientes</h3>"
	txt+='<table class="table table-striped">';
	txt+= '<thead><tr class="success">';
	txt +="<th></th>";	
	txt +="<th>Valorar</th>";
	txt +="<th>Producto</th>";
	txt +="<th></th>";
	txt +="</tr></thead>";
	$.get(url,function(data,status){})
	.done(function(data) {
		if(data==""){
			txt+="</table>"
			txt+="<h3>No Hay Valoraciones pendientes</h3>";
		}
		var cap = true;
		if(data[0][0].completada == 1){
			cap = false;
		}
		if(cap == true){
			for (var i = 0; i < data[0].length; i++) {
				txt+= '<tr class="info">';
				txt +="<td><a href='usuario/valoracion/"+data[3][i]+"'><img style='width:150px;' src='"+data[2][i]+"'/></a></td>";															
				txt +="<td>"+data[1][i]+"</td>";
				txt +="<td>"+data[3][i].nombre_producto+"</td>";
				txt +="<td><a href='usuario/valoracion/"+data[3][i].id+"'><span class='glyphicon glyphicon-triangle-right'></span></a></td>";
				txt +="</tr>";
			};
			txt+="</table></div>";
			$(".contact-info").html(txt);
		}else{
			txt+="</table>";
			txt+="<h3>No Hay Valoraciones pendientes</h3>";			
			$(".contact-info").html(txt);
		}	
	}).error(function(data){
		txt+="</table>"
		txt+="<h3>No Hay Valoraciones Pendientes Que Mostrar</h3>";
		$(".contact-info").html(txt);
	});	
}


function editarP(){
	var url = "usuario/get_perfil";
	$.get(url,function(data,status){
		var txt = "<h3>Información básica</h3>"
		+"<p>Apodo :</p>"+data.username
		+"<p>Nombre :</p>"+data.nombre
		+"<p>Apellidos :</p>"+data.apellido
		+"<p>Texto de presentación :</p>"+data.texto_presentacion
		+"<p>Direccion :</p>"+data.direccion
		+"<p>Email :</p>"+data.email
		+"<p>Fecha de creación de la cuenta :</p>"+formatoFecha(data.created_at);
		$(".contact-info").html(txt);
	})
	.done(function(data) {
		perfil();
	})
	.error(function(data){
		bootbox.alert("Error en el servidor vuelve a probar mas tarde");
	});	

}	

function ValidarCambiosContrasena(){
	var confirm = validator();
	if(confirm==true){
		guardarCambiosPass();
	}
}

function ValidarCambios(){
	var confirm = validator();
	if(confirm==true){
		guardarCambios();
	}
}



function perfilGuardar(username,nombre,apellidos,direccion,localidad,email,texto_presentacion){
	var url = "usuario/guardarCambios";
	$.get(url,{
		username: username,
		nombre: nombre,
		apellidos: apellidos,
		direccion: direccion,
		localidad: localidad,
		email: email,
		texto_presentacion: texto_presentacion
	})
	.done(function(data) {
		bootbox.alert("Datos cambiados correctamente");
		perfil();
	})
	.error(function(data){
		var errors = data.responseJSON;
		$('#username_sistemError').html(errors.username);
		$('#nombre_sistemError').html(errors.nombre);
		$('#apellido_sistemError').html(errors.apellidos);
		$('#direccion_sistemError').html(errors.direccion);
		$('#email_sistemError').html(errors.email);
	});	
}

function guardarCambiosPass(){
	var password = document.getElementById('password').value;
	var password_old = document.getElementById('password_old').value;
	var password_confirmation = document.getElementById('password_confirmation').value;
	perfilGuardarPass(password_old,password,password_confirmation);
}

function perfilGuardarPass(password_old,password,password_confirmation){
	var url = "usuario/guardarCambiosPass";
	$.get(url,{
		password_old: password_old,
		password: password,
		password_confirmation: password_confirmation
	})
	.done(function(data) {
		bootbox.alert("Contraseña cambiada correctamente");
		perfil();
	})
	.fail(function(data){
		bootbox.alert("Mal introducida la contraseña vieja");
		//alert("Mal introducida la contraseña vieja");
	})
	.error(function(data){
		var errors = data.responseJSON;
		$('#password_sistemError').html(errors.password);
		$('#password_confirmation_sistemError').html(errors.password_confirmation);
		$('#password_old_sistemError').html(errors.password_old);
	});
}


function guardarCambios(){
	var username = document.getElementById('username').value;
	var nombre = document.getElementById('nombre').value;
	var apellidos = document.getElementById('apellidos').value;
	var direccion = document.getElementById('direccion').value;
	var email = document.getElementById('email').value;
	var texto_presentacion = document.getElementById('texto_presentacion').value;
	var localidad = document.getElementById('localidad').value;


	perfilGuardar(username,nombre,apellidos,direccion,localidad,email,texto_presentacion);
}

function aparencia(){
	$(".contact-info").hide();	
	$(".aparencia").show();	
}
