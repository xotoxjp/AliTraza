  $(document).ready(function(){
		    
		    var id = $('input#id').attr('value');
            var modo = $('input#modo').attr('value');
            //console.log(modo);           
            var v = [];            
            var accesos = {};
            var alta = {};
            var baja = {};
            var modifica = {};
            var ordenes = {};
            var procesos = {};
            var pantallas = {}; 
            var DATA = []; 		    

 		   $("#guardar").click( function(e){
		
			    e.preventDefault();
		        
		        // ACLARACION:
		        // 1 - Con esto solo tomo las tr que tiene los chequeados que lleva una clase con la pantalla correspondiente 
		        // 2-  Si los checks vienen tildados de los permisos (dados anteriormente) ya la tendria la pantalla aunque vuelva
		        // a tildar en la misma fila, y si tildo en alguna pantalla que no era accedida tomo la fila y guardo la pantalla
		        // para su posterior uso en el guardado

		        var trs = $(':checked').closest('tr');			        
		        var cantidadChequeados = trs.length;		        

                trs.each( function (index){

                    var pantalla = $(this).attr('id');                    
                    pantallas['pantalla'+index] = pantalla;                    
                    var orden = $(this).attr('class');
                    ordenes['orden'+pantalla] = orden;
                    var proceso = $(this).attr('name');                    
                    procesos['proceso'+pantalla] = proceso;             
                    
                });        
                
                // un filtrado distinto para algunos datos del form donde filtro por palabras claves
                // diseñando asi los objetos clave valor para su mejor reconocimiento 
                var data = $('form').serializeArray();			    		   		    		    
			    		    
			    for (var i in data){
			    	v = data[i].name; 	
			        
			        if(v.search("acceso")!=-1){
                       accesos[v] = data[i].value;
			        }
			        if(v.search("alta")!=-1){
                       alta[v] = data[i].value;
			        }
			        if(v.search("baja")!=-1){
                       baja[v] = data[i].value;
			        }
			        if(v.search("modifica")!=-1){
                       modifica[v] = data[i].value;
			        }			        
			    }		    
			    // agrego los objetos al vector DATA para su posterior envio
                DATA.push(accesos,alta,baja,modifica,ordenes,procesos,pantallas);               
			    aInfo   = JSON.stringify(DATA);   
		        INFO  = new FormData();
		        INFO.append('data', aInfo); 		        			
              
			    $.ajax({
				    data: INFO, 	
				    type:'POST',
			        dataType: 'json',
			        url: '../controller/guardarPermisos.php?id='+id+'&largo='+cantidadChequeados,
			        processData: false, 
			        contentType: false,
			        success: function(response){
			                //console.log(" correcto!!!");
			                if(response.r=='correcto'){
			                	$('#myModal').modal();
			                }

			        },
			        error: function( error){
			        	console.log("el error es: " + error);
			        } 
	            });
	      //       //location.href = href="../vista/editar.php?id=<?php echo $_GET['id'];?>&modo=<?php echo $modo; ?>";              
            });			

			$("#volver").click( function(){
			   var modo ='EDIT';	
			   location.href = "../view/usuario.php";
			   //?id="+id+"&modo="+modo;
			});   
		
		});// fin document           