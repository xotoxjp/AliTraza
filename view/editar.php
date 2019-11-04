<?php
 session_start(); 
 require '../controller/editar.php';
?>
<!DOCTYPE html>
<html>
	<head>
	   	<title> EDITAR USUARIOS </title>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1"> 	
	    <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.min.css">    
		<link rel="stylesheet" type="text/css" href="css/style-form.css">    
	</head>	
    <?php
       require '../vista/form.php';	
    ?>	
    <script src='plugins/js/jquery-1.11.1.js'></script>
    <script src="plugins/js/bootstrap.min.js"></script>
    <script src='js/js-controller.js'></script>    
</html>

