<?php
session_start();
$_SESSION["level_req"]="a";
$logg = $_SESSION["acceso_logg"];
$pass =$_SESSION["acceso_pass"];

validar($logg,$pass);

$nivel_dato=$_SESSION["acceso_acc"];
$id_usuario=$_SESSION["id_usuario"];
$id_menu=$_SESSION["menu"];



if ($id_menu!="Botones"){
  
	header("Location: ../controller/menu_1.php");
}
?>