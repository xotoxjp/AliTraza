<?php
include("../controller/controllerLaboratorio.php");
?>
<!DOCTYPE html>
<head>
	<title>Laboratorio</title>
  	<meta name="viewport" content="width=device-width,initial-scale=1">
  	<meta charset="UTF-8"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="images/matraz.jpg">
	<link href='plugins/css/jquery-ui-1.11.4.min.css' rel='stylesheet' type='text/css'/>
	<link href='plugins/css/jquery-ui-custom.css' rel='stylesheet' type='text/css'/>   
	<link href='plugins/css/ui.jqgrid.css' rel='stylesheet' type="text/css"/>
	<link href="plugins/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href='css/laboratorio.css' rel='stylesheet' type='text/css'/>
</head>
<body>
	<div id ="main">
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al men&uacute principal</a>
		</div>
		<h2>Datos de Laboratorio</h2>
		<div style="padding:30px;border:2px solid darkgrey;width:40rem;height:5rem;background:skyblue;display:none;" id ="c">
			NO HA SELECCIONADO NINGUNA MUESTRA AUN!
		</div>	    
		<div id='botonera_Analisis'>
			<ul>
			<?php if (($login=='amt') || ($login=='lab')){  ?>
				<li id='analizar'>
				   <a  class="tooltip-bottom" data-tooltip="Define los analisis a realizar para los elementos seleccionados">Definir Analisis</a>
		        </li>
			
				<li id='editar_analisis'>
				   <a  class="tooltip-bottom" data-tooltip="Edita los valores de analisis para los elementos seleccionados">Editar Valores</a>
				</li>
			<? } ?>	
				<li id='ver_analisis'>
				   <a  class="tooltip-bottom" data-tooltip="Visualiza los valores de analisis para los elementos seleccionados">Ver Resultados</a>
				</li>			
			</ul>      
		</div>
	    <div id="seleccion">
	    	<h3 id=""> Seleccion tipo de Muestra </h3>	
	    								
			<select name='' id='selMuestra'>
				<option value='0'>Selecciona una Opción</option>			
				<option value='EXT'>ESPERANDO DEFINICION DE ANALISIS</option>
				<option value='LAB'>MUESTRAS A ANALIZAR</option>
				<option value='EXA'>COMPRAS SIN MUESTRA</option>
				<option value='MOV'>EN STOCK</option>
			</select>
	    </div>			
	  	<div id="tab-container" class='tab-container'>
	    	<ul class='etabs'>
	      		<li class='tab'><a href="#tabgrillapresupuesto">Muestras por Presupuesto</a></li>
	      		<li class='tab'><a href="#tabgrillamuestras">Muestras por Número</a></li>       
	    	</ul>
	    	<div class='panel-container'>
				<div id='tabgrillapresupuesto'>
					<div id ='subgrid'>
	         			<table id="listsg11"></table>
		     			<div id="pagersg11"></div>
					</div>
				</div>
				<div id='tabgrillamuestras'>
					<div id ='subgrid'>
	         			<table id="gridanalisisp"></table>
		     			<div id="pgridanalisisp"></div>
					</div>
					<!--div id="contenido"></div-->
				</div>
			</div>
		</div>	
		<div id="footer">   
			<img src="images/salir.png" width="20" height="20"/><a href="../controller/menu_1.php" title="volver">Volver al men&uacute principal</a>
		</div>
    </div>
	<input type='hidden' id="currentUser" value='<?php echo $login ?>'>	
</body>
	<script src='plugins/js/jquery-1.11.1.js'></script>
	<script src='plugins/js/jquery.jqGrid.min.js'></script>
	<script src='plugins/js/grid.locale-es.js'></script>
    <script src="plugins/js/jquery.hashchange.min.js" type="text/javascript"></script>
    <script src="plugins/js/jquery.easytabs.min.js" type="text/javascript"></script>
	<script src="plugins/js/bootstrap.min.js"></script>
	<script src="js/motorLaboratorioPistol.js" type="text/javascript"> </script> 
	<script src="js/motorLaboratorio.js" type="text/javascript"> </script>
    <script src="js/laboratorio.js" type="text/javascript"> </script>
</html>