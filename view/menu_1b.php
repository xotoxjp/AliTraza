<?php
session_start();
include_once("../controller/funciones.php");
$_SESSION["level_req"]="a";
$logg = $_SESSION["acceso_logg"];
$pass =$_SESSION["acceso_pass"];

validar($logg,$pass);

$nivel_dato=$_SESSION["acceso_acc"];
$id_usuario=$_SESSION["id_usuario"];
$id_menu=$_SESSION["menu"];

if ($id_menu!="Botones"){
	header("Location: menu_1.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	 <title><?php echo $_SESSION["acceso_logg"]."&nbsp&nbsp";?>MENU </title>
	 <meta name="viewport" content="width=device-width,initial-scale=1">             
	 <meta charset="utf-8" />
	 <link rel="shortcut icon" href="fotos/menu.ico"> 
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
				<p class="texto"><a href="analisis1.php" id="Analisis" >Laboratorio</a></p>
			</div>
			<div class="contenedor" id="anaExt_Acop">
				<img class="icon" src="images/ordencompra.png">
				<p class="texto"><a href="extaco1.php" id="Ext_Acop" >Orden de Compra</a></p>
			</div>
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
			<p class="texto"><a href="almacenes1.php" id="Almacenes" >Depósitos y Salas</a></p>
		</div>
		<div class="contenedor" id="anaUsuario">
			<img class="icon" src="images/users.png">
			<p class="texto"><a href="controlador/usuario.php" id='usuario'>Usuarios</a></p>
		</div>
	</div>
</header>

    
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" >
	var id_usuario = "<?php echo $id_usuario; ?>"; 
	$.getJSON("consultaMenu.php?id="+id_usuario, function(data){  
		for(var i in data){
			// el dato es de tipo json es accesible mediante el punto y la palabra pantalla que es el nombre de la columna 
			//que esta en la tabla accesos_op en BD
			var id = data[i].pantalla;
			//console.log(id);
			//ACLARACION:
			// El if que agregue pregunta por el acceso porque es en el mismo momento,
			// o sea en el la misma variable i (del for) que recorre cuando obtengo la pantalla y
			// tambiem obtengo el acceso.
			// El acceso pertenece a la misma fila obtenida de la BD con lo cual si el acceso no esta 
			// encendido ('on') en la BD, no mostrara la puerta de acceso a la pantalla.    
			var acceso = data[i].acceso;				
			console.log(acceso);
            if(acceso=='on'){
				/* divs */
				$("#ana"+id).css("display","inline");
	            /* enlaces*/
				$("#"+id).css("display","inline");
				if (i == 4){
					if (id_usuario == 25){
						/* divs */
						$("#anaUsuario").css("display","inline");
						/* enlaces*/
						$("#usuario").css("display","inline");
					}
				}
			}	
		}	
   });
	
	
	$(".contenedor").click(function() {
		var currentId = $(this).attr('id');
		window.location = $(this).find("a").attr("href"); 
		return false;
	});
</script>

</body>    
</html>