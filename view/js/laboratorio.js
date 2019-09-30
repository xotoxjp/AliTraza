$('#tab-container').easytabs();
$(document).ready(function(){
	var User = $('#currentUser').val();
	//console.log(User);
	if (User == 'com'){
		$("#selMuestra option[value=EXT]").attr('disabled','disabled');
		$("#selMuestra").val('LAB');
		// ejecutamos el evento change()
		$("#selMuestra").change();
		$("#seleccion").css("left","-200px");
	}
	if (User == 'com'){
		$("#selMuestra").val('EXT');
		// ejecutamos el evento change()
		$("#selMuestra").change();
	}
	/*****************************************************************************************/	
	/*************************habilitar o deshabilitar botones segun select*******************/	
	/*****************************************************************************************/	
	$("#selMuestra").change(function(){
		var estado=$(this).val();
		if (estado=='0'){
			$("#botonera_Analisis").attr('disabled');
		}
		else{
			$("#botonera_Analisis").removeAttr('disabled');	
		}
		console.log(estado);
	}).change();
});	