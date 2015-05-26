

 /*window.onload = function() {


	alert("funco");


 }
 */
 var error=false; 
 var ndecimal = 2;

 function formValidator(){
 	var formulario = document.getElementById('form-validate');
 	validator();
 	validarDropdowns();
 	if(error==false){
 		formulario.submit();
 	}
 }

	
 function validator(){

 	
 	var formulario = document.getElementById('form-validate');
 	var porTagName = formulario.getElementsByTagName("input");
 	var current;
 	var val;
 	var aux;

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
 						error= true;
 						bootbox.alert("Debe aceptar las condiciones de uso y politica de privacidad");
 						getIdMsg(current,true,false);
 						//error=true;
 					}
 				}
 				


 				val = current.value;
 				if(val==""){ getIdMsg(current,false,true);}

 				if(val!=""){
	//el no campo esta vacio
	getIdMsg(current,false,false);
	if(current.name=="email"){
		if(validarEmail(val)==false){
			getIdMsg(current,true,true);
		}
	}

	if(current.name=="nombre" || current.name =="apellido"){
		if(AllowAlphabet(val)==false){
			getIdMsg(current,true,true);
		}else{
			getIdMsg(current,false,true);
		}
	}

	//cantidad maxima de puja automatica
	//valida los dcimales
	if(current.name=="cantidadMax"||current.name=="precio_inicial"||current.name=="incremento_precio"){


		if( isNaN(val)){
			getIdMsg(current,true,true);
		}else{
			if(val<0){
				getIdMsg(current,true,true);
			}else{	
				var posicComa = val.indexOf(',');
				var dectext = val.substring(val.indexOf(',')+1, val.length);
				
				if(posicComa!=-1){
					if (dectext.length > ndecimal)
					{
						getIdMsg(current,true,true);
					}
				}else{
					getIdMsg(current,false,true);
				}
			}
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
	// if(error==false){
	// 	//alert("submit");
	// 	//formulario.submit();
	// 	return true;
	// }else{
	// 	//alert("no submit")
	// 	return false;
	// }
}

// recoje el id del campo y si debe mostrar o no ocultar el error y si es un error especial
//elem    id lemento
//si   mostrar o no 
//especial     si es especial
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
//	alert(idElem);
error=true;
document.getElementById(idElem).style.display="inline";
}

function ocultaError(idElem) {
	var error = document.getElementById(idElem);
	if(error!=null){
		error.style.display="none";
	}
	
}
function isDNI(dni) {
	var numero, let, letra;
	var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

	dni = dni.toUpperCase();

	if(expresion_regular_dni.test(dni) === true){
		numero = dni.substr(0,dni.length-1);
		numero = numero.replace('X', 0);
		numero = numero.replace('Y', 1);
		numero = numero.replace('Z', 2);
		let = dni.substr(dni.length-1, 1);
		numero = numero % 23;
		letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
		letra = letra.substring(numero, numero+1);
		if (letra != let) {
			//alert('Dni erroneo, la letra del NIF no se corresponde');
			return false;
		}else{
			//alert('Dni correcto');
			return true;
		}
	}else{
		//alert('Dni erroneo, formato no válido');
		return false;
	}
}

//le paso el valor  del campo y compruevo que solo sea alfabetico si no lo es devuelve false
function AllowAlphabet(value){
	if (!value.match(/^[\sa-zA-ZñÑ]+$/))
	{
		return false;
	}
}

//le paso el elemento y del el miro el selected index para que escoja algo del dropdown si no ha escojido devuelve false
function JSFunctionValidate(elemento)
{
	if(elemento.selectedIndex == 0)
	{
		//alert("Please select ddl");
		return false;
	}
	return true;
}



 function validarDropdowns(){

 	error=false; 	
 	var formulario = document.getElementById('form-validate');
 	var porTagName = formulario.getElementsByTagName("select");
 	var current;
 	var val;

 	for (i=0;i<porTagName.length;i++)
 	{
 		
 		current = porTagName[i];
 		if(JSFunctionValidate(current)==false){
 				getIdMsg(current, true,false);
 		}else{
 			getIdMsg(current, false,false);
 		}


	}
	// if(error==false){
	// 	//alert("submit");
	// 	//formulario.submit();
	// 	return true;
	// }else{
	// 	//alert("no submit")
	// 	return false;
	// }
}
