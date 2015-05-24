$( "#eEGG" ).keyup(function() {
	if($("#eEGG").val().toLowerCase()=="easter egg"){
		$("html > body > div > div p,html > body > div > div a, h1,h2,h3,h4,h5,h6,span,button").addClass( "big shake shake-hard" );
	}
});