

 /*window.onload = function() {


	alert("funco");


 }
 */
function formValidator(){
	var formulario = document.getElementById('form-validate');
	var confirm = validator();
	if(confirm==true){
		formulario.submit();
	}
}

 var error = false;
 function validator(){

 	error=false; 	
 	var formulario = document.getElementById('form-validate');
 	var porTagName = formulario.getElementsByTagName("input");
 	var current;
 	var val;
 	var aux;

 /*	for (var i = 0; i < porTagName.length; i++) {
 		if(porTagName[i].type!="hidden"){
 			alert(porTagName[i].value);
 		}
 	}*/

 	for (i=0;i<porTagName.length;i++)
 	{
 		current = porTagName[i];
 		//alert(current.name);
 		if(current.type!="hidden"){
 			if(current.type!="button"){
 				if(current.type=="checkbox"){
 					//alert(current.name);
 					//alert(current.value);
 					//alert(current.checked);

 					if(current.checked==false){
 						alert("Debe aceptar las condiciones de uso y politica de privacidad");
 						getIdMsg(current,true,false);
 						//error=true;
 					}
 				}
 				val = current.value;
 				
if(val==""){getIdMsg(current,false,true);}

 				if(val!=""){
	//el no campo esta vacio
	getIdMsg(current,false,false);
	if(current.name=="email"){
		if(validarEmail(val)==false){
			getIdMsg(current,true,true);
		}
	}
	if(current.name=="cantidadMax"){


			if( isNaN(val)){
			getIdMsg(current,true,true);
		}else{
			getIdMsg(current,false,true);
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
		//alert("submit");
		//formulario.submit();
		return true;
	}else{
		//alert("no submit")
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
		//return ele;
	}
	

	function comprovarPass(element){
		var pass1 = document.getElementById('password').value;
		var pass2 = element.value;
		if(pass1==pass2){
		//si son iguales devuelve true
		getIdMsg(element, false,true);
		return true;
	}else{
		//al ser diferentes devuelve false
		getIdMsg(element, true,true);
		return false;
	}
}

function validarEmail( email ) {
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if ( !expr.test(email) ){
       // alert("Error: La dirección de correo " + email + " es incorrecta.");
       return false;
   }
}

function mostraError(idElem) {
	error=true;
	document.getElementById(idElem).style.display="inline";
}

function ocultaError(idElem) {
	document.getElementById(idElem).style.display="none";
}