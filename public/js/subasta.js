function pujar(id_puja){
	var url = "add_puja";
	alert(id_puja);
	$.post(url,{
		id_puja: id_puja
	})
	.done(function(data) {
		
		//perfil();
	});	
}