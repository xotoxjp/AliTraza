<?php
include("../controller/funciones.php");
include("../controller/controllerMenu.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	 <title><?php echo $_SESSION["acceso_logg"]."&nbsp&nbsp";?>MENU </title>
	 <meta name="viewport" content="width=device-width,initial-scale=1">             
	 <meta charset="utf-8" />
	 <!-- <link rel="shortcut icon" href="fotos/menu.ico">  -->
	 <link rel="stylesheet" href="css/index_style.css" /> 
 </head>
 
<body>

<header>
	<div id="menuOperaciones">		
			<div class="contenedor" id="anaMuestras">
				<img class="icon" src="images/tagger.png">
				<p class="texto"><a href="presupuestos.php" id="Muestras" >Compras</a></p>
			</div>
			<div class="contenedor" id="anaAnalisis">
				<img class="icon" src="images/labo.png">
				<p class="texto"><a href="laboratorio.php" id="Analisis" >Laboratorio</a></p>
			</div>
<!-- 			<div class="contenedor" id="anaExt_Acop">
				<img class="icon" src="images/ordencompra.png">
				<p class="texto"><a href="extaco1.php" id="Ext_Acop" >Orden de Compra</a></p>
			</div> -->
	</div>
</header>
	
<header>	
	<div id="menu">		
		<div class="contenedor" id="anaProvedores">
			<img class="icon" src="images/honeycomb.png">
			<p class="texto"><a  href="productores.php" id="Provedores" >Productores</a></p>
		</div>
		<div class="contenedor" id="anaAlmacenes">
			<img class="icon" src="images/depositos2.png">
			<p class="texto"><a href="tablasAccesorias.php" id="Almacenes" >Depósitos y Salas</a></p>
		</div>
		<div class="contenedor" id="anaTipos_Analisis">
			<img class="icon" src="images/laboratorio.png">
			<p class="texto"><a  href="tiposAnalisis.php" id="Tipos_Analisis" >Tipos de Analisis</a></p>
		</div>
		<div class="contenedor" id="anaUsuario">
			<img class="icon" src="images/users.png">
			<p class="texto"><a href="userMngmnt.php" id='usuario'>Usuarios</a></p>
		</div>
	</div>
</header>
<script type="text/javascript" src="plugins/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script>
var id_usuario = "<?php echo $id_usuario; ?>"; 
$.getJSON("../controller/consultaMenu.php?id="+id_usuario, function(data){  
    for(var i in data){
        var id = data[i].pantalla;   
        var acceso = data[i].acceso;				
        console.log(acceso);
        if(acceso=='on'){
            $("#ana"+id).css("display","inline");
            $("#"+id).css("display","inline");
            if (i == 4){
                if (id_usuario == 25){
                    $("#anaUsuario").css("display","inline");
                    $("#usuario").css("display","inline");
                }
            }
        }	
    }	
});
</script>
</body>    
</html>