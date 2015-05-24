 function notifications(tipo, mensaje, enlace) { 
		$( document ).ready(function() {

 	var extraTimePerNotification = 200;
 	var errorType = ".notification-box";
 	switch(tipo) {
 		case "error":
 		errorType += ".error";
 		break;
 		case "advertencia":
 		errorType += ".warning";
 		break;
 		case "consejo":
 		errorType += ".advice";
 		break;
 		case "notificacion":
 		errorType += ".notice";
 		break;
 		case "alerta":
 		errorType += ".notice";
 		break;
 	}
 	$(errorType+"> p > b").after(mensaje);
 	$("#contenedor-notificaciones.active").append($(errorType));
 	$(errorType).fadeIn(2000);
 	
 	});
 }
 function closeNotificationBox(boxID){
 	$('.notification-box'+boxID+'').css("transition","all 1s");
 	$('.notification-box'+boxID+'').css("opacity","1");
 	$('.notification-box'+boxID+'').css("opacity","0");
 	setTimeout(function(){
 		var height = $('.notification-box'+boxID+'').height();
 		$('.notification-box'+boxID+'').css("height",""+height+"px");
 		$('.notification-box'+boxID+'').css("margin-left","-100px");
 	}, 100);
 	setTimeout(function(){
 		$('.notification-box'+boxID+'').css("height","0px");
 		$('.notification-box'+boxID+'').css("padding","0px");
 		$('.notification-box'+boxID+'').css("margin","0px");
 	}, 1000);
 	setTimeout(function(){
 		$('.notification-box'+boxID+'').hide();
 	}, 2500);
 }