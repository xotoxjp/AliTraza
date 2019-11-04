$(document).ready( function(){
	var id = $('input#id').attr('value');
	var modo = $('input#modo').attr('value');
	//console.log(modo);
	if ( id == "25" || modo == "NUEVO"){
		$("#configuracion").css({
			'display':'none',
		});
	}
	/***********************************************/
	$("#guardar").click( function(){
		var login = $("#login").val();
		if(!verificarLogin(login)){
			// alert("otra vez salgo con un alert!!!!!");
			var DATA = []; 
			var item = {};
			item["id"]	   = id;
			item["nombre"] = $("#nombre").val();
			// item["ultima"] = $("#ultima").val();
			item["email"]  = $("#email").val();
			item["login"]  = $("#login").val();
			item["pass"]   = $("#pass").val();
			// item["nivel"]  = $("#nivel").val();
			DATA.push(item);
			aInfo   = JSON.stringify(DATA);   
			INFO  = new FormData();
			INFO.append('data', aInfo); 
			//console.log(DATA);
			$.ajax({
				data: INFO,
				type: 'POST',
				dataType: 'json',
				url: '../controller/guardar.php?modo='+modo,
				processData: false, 
				contentType: false,
				success: function(response){
					console.log(response.NUEVO);                        
					if(response.NUEVO == 'INGRESADO'){
						$('#par1').html("EL USUARIO HA SIDO INGRESADO CON EXITO!!!");
						$('#myModal').modal();
						$("#configuracion").css({
							'display':'inline',
						});
					}
					if(response.EDIT =='EDITADO'){
						$('#par1').html("EL USUARIO HA SIDO EDITADO CON EXITO!!!");
						$('#myModal').modal();
					}
				} 
			});
		}    
	});//fin guardar
	/***********************************************/
	// Verifica si el login se encuentra en la BD y retorna un true
	// si lo encuentra con lo cual el login seria repetido
	function verificarLogin(login){
		var encontrado = false;
		$.ajax({
			dataType: 'json',
			url: '../controller/verificarLogin.php?login='+login,
			processData: false, 
			contentType: false,
			async: false,
			success: function(response){
				var r = response.r;
				//console.log(" el dato recibido es: " + r); 	                 
				if(modo!='EDIT'){
					if (r != 0){
						$('#par1').html("<p><b style='color:red;font-size:15px;'> EL LOGIN YA EXISTE </b> POR FAVOR INGRESE NUEVAMENTE </p> ");                                       
						$("#myModal").modal();	                        	
						encontrado=true;
					}
				}     
			}
		}); 
		return encontrado;
	}//fin function
	/***********************************************/ 
	$("#configuracion").click( function(){           
		location.href = "../controller/configuracion.php?id="+id+"&modo="+modo;           
	});
	/***********************************************/
	$("#volverM").click( function(){
		location.href = href="menu_1b.php";
	}); 
});