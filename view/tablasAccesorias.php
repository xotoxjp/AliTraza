<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include_once("../controller/funciones.php");
include("../controller/controllerTablasAccesorias.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Depósitos y Salas</title>
		<link href="css/estiloalmacenes.css" rel="stylesheet" type="text/css" >
		<link href='plugins/css/jquery-ui-custom.css' rel='stylesheet' type="text/css"/>
		<link href='plugins/css/ui.jqgrid.css' rel='stylesheet' type="text/css"/>
		<script src='plugins/js/jquery-1.9.0.min.js'></script>
		<script src='plugins/js/grid.locale-es.js'></script>
		<script src='plugins/js/jquery.jqGrid.min.js'></script>
	</head>

	<body id="cuerpodepot"> 
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al menú principal</a>
		</div>
		
		<h1>Depósitos y Salas</h1>
		</br>
		<div class='wrapper'>		
			<p>Salas de Extracción</p>
			<table id="rowed2"></table> 
			<div id="prowed2"></div>
			<div id="salaExt"></div>
			</br>
			<p>Salas de Acopio</p>
			<table id="tacopio"></table> 
			<div id="ptacopio"></div>
			</br>
			<p>Salas de Envasado</p>
			<table id="tenv"></table> 
			<div id="ptenv"></div>
			</br>
			<p>Compra</p>
			<table id="tcompra"></table> 
			<div id="ptcompra"></div>
			</br>
			<p>Exportador</p>
			<table id="texport"></table> 
			<div id="ptexport"></div>
			</br>
			<p>Laboratorio</p>
			<table id="tlabo"></table> 
			<div id="ptlabo"></div>
			</br>
			<p>Sala de Preembarque</p>
			<table id="tpreembar"></table> 
			<div id="ptpreembar"></div>			
		</div>	
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al menú principal</a>
		</div>
		<script src='js/motorTablasAccesorias.js'></script>    
</body>
</HTML>