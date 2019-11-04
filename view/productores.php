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
		<link href="css/productores.css" rel="stylesheet" type="text/css">
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

		<script src='js/motorProductores.js'></script> 
</body>
</HTML>