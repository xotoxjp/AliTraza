<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include_once("../controller/funciones.php");
include("../controller/controllerProductores.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>  Productores  </title>
		<link href='plugins/css/jquery-ui-custom.css' rel='stylesheet' type="text/css"/>
		<link href='plugins/css/ui.jqgrid.css' rel='stylesheet' type="text/css"/>
		<script src='plugins/js/jquery-1.9.0.min.js'></script>
		<script src='plugins/js/grid.locale-es.js'></script>
		<script src='plugins/js/jquery.jqGrid.min.js'></script>
		<link href="css/clientes1.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/x-icon" href="images/icono1.ico">	
	</head>

	<body>
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al menú principal</a>
		</div> 
		<h1>Productores</h1>
		<div class='wrapper'>
			<table id="rowed2"></table> 
			<div id="prowed2"></div>	
		</div>	
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al menú principal</a>
		</div>		

		<script>
			jQuery("#rowed2").jqGrid({
   			url:'../controller/grid/serverprod.php?q=3',
			datatype: "json",
   			colNames:['ID','RAZON SOCIAL','RENAPA', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','E-MAIL','TELEFONO'], 
			colModel:[ 
				{name:'id',index:'id', hidden:true}, 
				{name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
				{name:'renapa',index:'c1', width:80,classes: 'cvteste',editable:true}, 
				{name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
				{name:'Localidad',index:'Localidad', width:160,classes: 'cvteste',editable:true},
				{name:'provincia',index:'provincia', width:100, classes: 'cvteste',editable:true},
				{name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},
				{name:'email',index:'email', width:200, sortable:false,classes: 'cvteste',editable:true},
				{name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true}						
			],
   			rowNum:10,
   			rowList:[10,20,30],
   			pager: '#prowed2',
   			sortname: 'razon_social',
			autoencode: true,			
			viewrecords: true,
			height:'100%',
			width:'100%',
			sortorder: "asc" 
			});

			jQuery("#rowed2").jqGrid('navGrid',"#prowed2",{edit:false,add:false,del:false,search:true},
				{url:'grid/updateprov.php'},{url:'grid/addprov.php'},{url:'grid/deleteprov.php'},{sopt : ['cn','eq']}
			);	   

			/*custom edit button */
			jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
				.navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
						 var myGrid = $('#rowed2'),
						 selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
						 cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'id');		 
						 if (cellValue!==false){
							/*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
							location.href="mod_proveedor.php?ID="+cellValue+"&EDIT=edit";
						 }else{ alert("Por favor seleccione una fila"); }
						 }, 
			   position:"last"
			});	

			/*custom add button */
			jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
				.navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){     						                 
						 location.href='mod_proveedor.php?nuevocliente=si';							
						 }, 
			   position:"last"
			});
			
			jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
				.navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
						 var myGrid = $('#rowed2'),
						 selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
						 cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'id');		 
						 
						if (cellValue!==false){
							/*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
							
							// solo si se confirma la baja actua en consecuencia
							if(confirm("SEGURO DE BORRAR ESTE PROVEEDOR ?")){                                    
								$.get('includes/baja_X_elemento.php?ID='+cellValue+'&datoRuta=provedores1',function(respuesta){
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
			   position:"last"
			});	
		</script>   
</body>
</HTML>