<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include_once("../controller/funciones.php");
include("../controller/controllerTiposAnalisis.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Analisis Definidos</title>
		<link href='plugins/css/jquery-ui-custom.css' rel='stylesheet' type="text/css"/>
		<link href='plugins/css/ui.jqgrid.css' rel='stylesheet' type="text/css"/>
		<script src='plugins/js/jquery-1.9.0.min.js'></script>
		<script src="plugins/js/jquery-ui-1.11.2.js"></script>
		<script src='plugins/js/grid.locale-es.js'></script>
		<!-- <script src='plugins/js/grid.especial-locale-es.js'></script> -->
		<script src='plugins/js/jquery.jqGrid.min.js'></script>
		<!-- <link rel="shortcut icon" type="image/x-icon" href="fotos/icono1.ico"> -->
		<link href='css/productores.css' rel='stylesheet' type="text/css"/>
	</head>
<body> 
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al menú principal</a>
		</div>
       <h1>Tipos de Analisis</h1>
		<div class='wrapper'>
			<table id="rowed2"></table> 
			<div id="prowed2"></div>	
		</div>	
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al menú principal</a>
		</div>
        <div id="dialog">        	
        
        </div>      

	  	<script>
			jQuery("#rowed2").jqGrid({
   			url:'../controller/controllerTablasAnalisis.php?=3',			
			datatype: "json",
   			colNames:['ID','NOMENCLADOR', 'DETALLE', 'LIMITE INFERIOR','LIMITE SUPERIOR','UNIDAD','APLICA EL RECHAZO'], 
			colModel:[ 
				{name:'cod_anal_id',index:'cod_anal_id', width:90,align:"center",classes: 'cvteste'}, 
				{name:'nomenclador',index:'nomenclador', width:220,classes: 'cvteste',editable:true}, 
				{name:'detalle',index:'detalle', width:190,classes: 'cvteste',editable:true},
				{name:'limite_inf',index:'limite_inf', width:160,classes: 'cvteste',editable:true},			
				{name:'limite_sup',index:'limite_sup', width:160,classes: 'cvteste',editable:true},
				{name:'unidad',index:'unidad', width:100, sortable:false,classes: 'cvteste',editable:true},
				{name:'aplica',index:'aplica', width:180,classes: 'cvteste',editable:true}	 
			],
   			rowNum:10,
   			rowList:[10,20,30],			
   			pager: '#prowed2',
   			sortname: 'cod_anal_id',
			viewrecords: true,
			height:'100%',
			width:'100%',
			sortorder: "asc",
            gridComplete: function(){
		      var ids = jQuery("#rowed2").jqGrid('getDataIDs');
		      for(var i=0;i<ids.length;i++){
			    var cl = ids[i];
				be = "<input style='height:22px;width:60px;' type='button' value='Editar' onclick=\"jQuery('#rowed2').jqGrid('editRow','"+cl+"');\"  />"; 
				se = "<input style='height:22px;width:80px;' type='button' value='Guardar' onclick=\"jQuery('#rowed2').jqGrid('saveRow','"+cl+"');\"  />"; 
				ce = "<input style='height:22px;width:90px;' type='button' value='Cancelar' onclick=\"jQuery('#rowed2').jqGrid('restoreRow','"+cl+"');\" />"; 
				jQuery("#rowed2").jqGrid('setRowData',ids[i],{act:be+se+ce});
				}	
			},
			
			//editurl: 'grid/updateanalisis.php'			
			});
			/*
			jQuery("#rowed2").jqGrid('navGrid',"#prowed2",{edit:false,add:false,del:false,search:true},
				{
					//url:'grid/updateanalisis.php'
				},{
					//url:'grid/addanalisis.php'
				},{
					//url:'grid/deleteanalisis.php'
				},{}
			);
			*/	   
			
			/*custom edit button */
			jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
				.navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
						 var myGrid = $('#rowed2'),
						 selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
						 cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'cod_anal_id');						
						 unidad = myGrid.jqGrid ('getCell', selectedRowId, 'unidad');		 
						 
						 if (cellValue!==false){
							/*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
							location.href='editInfoAnalisis.php?ID='+cellValue+'&EDIT=edit&unidad='+unidad;
						 }else{
							alert("Por favor seleccione una fila");
						 }
						 }, 
			   position:"last"
			});

			jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
				.navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){     
						 location.href='editInfoAnalisis.php?nuevoAnalisis=si';	
						}, 
			   position:"last"
			});	

			jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
				.navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
						var myGrid = $('#rowed2'),
						selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
						cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'cod_anal_id');		 
                        
                        if (cellValue!==false){
							/*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
						    if(confirm("SEGURO DE BORRAR ESTE TIPO DE ANALISIS?")){
							    $.get('includes/baja_X_elemento.php?ID='+cellValue+'&datoRuta=analitico_inf',function(respuesta){
			    	                   if(respuesta){
				    	                        $("#rowed2").trigger('reloadGrid');								   	                        
			                            }
			    	            });
                            }// fin if confirm
						}
						else{
						   alert("Por favor seleccione una fila"); 
						}
						
						 },
			   position:"last",

			});           
           
		</script>      
	</body>
</HTML>