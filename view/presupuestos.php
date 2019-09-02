<?php
include("../controller/controllerPresupuestos.php");
?>
<!DOCTYPE html>
<html>
<head>	
	<title>Planilla de Presupuesto</title>
  	<link rel='shortcut icon' href='fotos/icono1.ico'>
	<link href="css/jquery-ui-1.11.4.min.css" rel="stylesheet">
	<link href="css/estiloformulario.css" rel="stylesheet">
	<link href="css/presupuestos.css" rel="stylesheet">
    <script src="js/jquery-1.11.1.js"></script>
	<script src="js/jquery-1.11.4.ui.min.js"></script>
	<script src="js/jquery-ui.datepicker-es.js"></script>
	<script src="../controller/conexionAjaxCompras.js"></script>	
</head>
<style>
	.ui-autocomplete-loading {
		background: white url("../view/plugins/css/images/ui-anim_basic_16x16.gif") right center no-repeat;
	}
</style>
<body>
	<div id="contenedor">
		<form name='formulario' method='POST' action='../controller/cargardatoscompras.php'>
		<?
		$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
		mysql_select_db($_SESSION["base_acc"]);
		?>
		<div class="cuadrogeneral">
			<h1>PLANILLA DE PRESUPUESTO</h1>
			<div class="fila1">	
				<p id="numeropres"> Numero de Presupuesto <input type='text' name='lote_env_sec' id='lote_env_sec' placeholder='Presup.No.' size='8' maxlength='8' required/></p>		
				<p id="radio1">Con muestra <input type="radio" name="tienemuestra" value="conmuestra"></p>
				<p id="radio2">Sin muestra <input type="radio" name="tienemuestra" value="sinmuestra"></p>			
			</div>
			<div class="fila2">
				<p>FECHA: <input type="text" id="datepicker" name='fecha_ini' placeholder='fecha ingreso' required/></p>
				<!-- codigo de comprador  -->
				COMPRADOR: 
				<?
				$a="SELECT almacen_id,razon_social,dir1,localidad,abrev FROM  ".$_SESSION["tabla_almacenes"] .' WHERE tipo_almacen=7';
				$r1 = mysql_query($a,$cx_validar);
				?>			
				<select name="almacen_id" id="selectcomprador">;
				<?
				while ($v1 = mysql_fetch_array($r1)){ 
					echo "<option value="."'".$v1[0]."'";
					if ($almacen_id==0) {echo ' SELECTED ';$almacen_id=$v1[0];}
					echo ">".$v1[4].'-'.$v1[1].'-'.$v1[2].'-'.$v1[3].'-'."</option>";}
				?>
				</select>
				<!-- Fin codigo de comprador  -->
				<h4>DATOS DEL PRODUCTOR</h4>
				

				<!-- codigo de productor  -->
				<p>PRODUCTOR:  <input type="text" id="buscaProductor" placeholder='insertar productor o renapa' /></p>
				<!-- codigo para traer el codigo de RENAPA-->
				<!-- Fin codigo de productor-->

				<!-- codigo de sala extraccion  -->
				SALA:			
				<?
				$a="SELECT almacen_id,razon_social,localidad FROM  ".$_SESSION["tabla_almacenes"] .' WHERE tipo_almacen=1 Order by razon_social ';
				//echo"$a";
				$r1 = mysql_query($a,$cx_validar);
				?>
				<select name="sala_ext" id="sala_ext">;
				<?
				while ($v1 = mysql_fetch_array($r1)){ 
				echo  "<option value="."'".$v1[0]."'";
				if ($sala_ext==0) {echo ' SELECTED ';$sala_ext=$v1[0];}
				echo ">".$v1[1].'-'.$v1[2]."</option>"; 
				}
				?>
				</select>
				<!-- Fin codigo de sala extraccion  -->				
				<br>
				<br>
				<br>
			</div>
			<!-- Codigo para cantidad de tambores -->
			<div id="TamboresIngresadosSegunPresupuesto">
				<!-- Tabla de Tambores ingresados por numero de presupuesto -->
				<p>Rango de Muestras a Agregar: <input type="number" class="spinner" name="tambini" id="rangoini" required/> a <input type="number" class="spinner" name="tambfin" id="rangofin" required/></p>
				<button type='button' id="btnok">Agregar</button>
				<!-- Fin Codigo para cantidad de tambores -->
				<!-- Codigo para incluir tabla segun numero de presupuesto-->
				<div id="contenedorTabla">
					<table id="tabladeTambores">
						<tr>
							<th class='numerico'>Muestra N&ordm</th>
						    <th class='nombre'>Productor</th> 						    
						    <th class='nombre'>Tipo Producto</th>
						    <th class="bordetransp"  id="delAll">
						    	<a href="#"><img src="images/undo.png" width="20" height="20"/></a>
						    </th> 	
						</tr>						  
					</table>
				</div>
				<!-- Fin Codigo para incluir tabla segun numero de presupuesto-->
				<br>
				<br>				
			</div>
			<br>
			<input type='Submit' id="cargar" value='Cargar' name='ID' class='btn'	width='1'>
			<a href="menu_1b.php"><button type='button' class='btn' id="btnfinalizar">Salir</button></a>
			<!--<input type='Text' value='Finalizar'  name='ID'   width='1'>-->		
		</div>
			<input type='hidden' id='ctambores' name='ctambores' value='0'>						
			<input type='hidden' name='cosecha' value='<?php echo $cosecha ?>'>
			<input type='hidden' name='pers_ini' value='<?php echo $id_usuario ?>'>
			<input type='hidden' id='prov_id' name='prov_id' value='<?php echo $prov_id ?>'>
			<input type='hidden' id='sala_asoc' name='sala_asoc' value='<?php echo $sala_asoc ?>'>									
		</form>
	</div>
	<input type='hidden' id="mensaje" value='<?php echo $mensaje ?>'>
	<div style="display:none" id="dialog" title="Aviso">Muestras Cargadas con Exito!</div>
	<script>
		$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd"});
		$("#rangoini").change(function() {
		    $("#rangofin").val($(this).val());
		});
		$( "#lote_env_sec" ).focusout(function(){ 
			var value = $( this ).val();			
			recuperarTambores(value)
		});
		$( "#btnok" ).click(function(){ 
			var ini = $("#rangoini").val();
			var fin = $("#rangofin").val();
			//var cant_tambores = fin - ini + 1;			
			for(i = ini; i <=fin; i++){
				existen ={"propiedad":"si"};
				chequearExistencia(existen,i);
				if(existen.propiedad=="no"){
				 	//console.log("entra en append...");	
     				$("#tabladeTambores").append('<tr><td class="editar"><input type="text" name="tamb[]" value='+i+'></td><td></td><td><select id="selectfrom" name="selectfrom"><option>Multiflora</option></select></td><td class="bordetransp"  id="del"><a href="#"><img src="images/Trash_Can.png" width="20" height="20"/></a></td></tr>');
 				}
 			}
 			//no tiene mucho sentido
 			var filas= $("#tabladeTambores>tbody>tr").length - 1;
 			//console.log(filas);
 			var cant_tambores = filas; 			        
  		});
  		function chequearExistencia(existen,tambor){
  			var respuesta;
  			$.ajax({
      			url:"../controller/buscarTambor.php",
      			type: "POST",
      			async: false,
      			data: {"tambor": tambor},
      			success: function(response){
      				//console.log(response);
        			if (response =="no existe"){        				
			           	//console.log(response);
			           	existen["propiedad"]='no'
			        }  
			  		//console.log(existen);	    
      			}
    		});
		}
		// Evento que selecciona la fila y la elimina 
		$(document).on("click","#del",function(){
			var parent = $(this).parents().get(0);
			$(parent).remove();
			cant_tambores = $("#ctambores").val();
			cant_tambores = cant_tambores-1;
			$("#cant_tambores").val(cant_tambores);
		});
		$(document).on("click","#delAll",function(){
			$('#tabladeTambores').find("tr:gt(0)").remove();			
		});
		//modal de cargado correctamente
		$(window).load(function() {
   			var mensaje = $("#mensaje").val();
   			console.log(mensaje);
   			if (mensaje != ""){
   			 	$("#dialog").dialog({
					modal: true,
					resizable: false,
					buttons: {
						"Aceptar": function() {
							$(this).dialog("close");
						}
					}
				});
   			}			
		}); 
		$(function() {
		    function split( val ) {
		      return val.split( /,\s*/ );
		    }
		    function extractLast( term ) {
		      return split( term ).pop();
		    }
		 
		    $( "#buscaProductor" )
		      	// don't navigate away from the field on tab when selecting an item
		      	.bind( "keydown", function( event ) {
			        if ( event.keyCode === $.ui.keyCode.TAB &&
			            $( this ).autocomplete( "instance" ).menu.active ) {
			          event.preventDefault();
			        }
		      	})
		      	.autocomplete({
			      	delay: 500,
			        source: function( request, response ) {
			          $.getJSON( "../controller/search_productor.php", {
			          	term: extractLast( request.term )
			          }, 
			          response );
			        },
		        	search: function() {
		          		// custom minLength
		          		var term = extractLast( this.value );
		          		if ( term.length < 2 ) {
		            		return false;
		          		}
		        	},
		        	focus: function() {
		          		// prevent value inserted on focus
		          		return false;
		        	},
		        	select: function( event, ui ) {
		          		var terms = split( this.value);
		          		// remove the current input
		          		terms.pop();
		          		// add the selected item
		          		terms.push( ui.item.value );
		          		// add placeholder to get the comma-and-space at the end
		          		terms.push( "" );
		          		this.value = terms.join( ", " );
		          		$('#prov_id').val(ui.item.id);  		
		          		$('#sala_asoc').val(ui.item.sala);
		          		return false;
		        	}
		    	});
		});
		//cambia select de salas
		$('#buscaProductor').click(function(){
        	var sala = $('#sala_asoc').val();
        	$.ajax({
      			url:"../controller/buscaSalaSelect.php",
      			type: "POST",
      			async:false,
      			data:"idsala="+$("#sala_asoc").val(),
      			success: function(opciones){      				     				
        			$("#sala_ext").html(opciones);
      			}
    		})
    	});
		//select de tipos miel
	    $('#selectfrom').change(function (){
			$.ajax({
      			url:"../controller/selectTipoMiel.php",
      			type: "POST",
      			//data:"idsala="+$("#sala_asoc").val(),
      			success: function(opciones){
        			$("#selectfrom").html(opciones);
      			}
    		})
	    });
	</script>	
</body>
</html>