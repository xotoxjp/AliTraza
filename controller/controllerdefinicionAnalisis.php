<?php
session_start();
//include_once("funciones.php");
$logg = $_SESSION["acceso_logg"];
$pass =$_SESSION["acceso_pass"];
$nivel_dato=$_SESSION["acceso_acc"];

$id_usuario=$_SESSION["id_usuario"];
// CONEXION A LA BASE DE DATOS
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$i = $id_usuario + 0;

$a='SELECT acceso,alta,baja,modifica FROM '.$_SESSION["tabla_acc_op"].' WHERE id_usuario='.$id_usuario.' AND proceso="Procesos" AND orden=4 AND acceso="on"';
$r=mysql_query($a,$cx_validar);$i=0;
while ($v = mysql_fetch_array($r)) {
  $acceso=$v[0];
  $alta=$v[1];
  $baja=$v[2];
  $modifica=$v[3];
  $i++;break;
}
$cadena=$_GET["tambores"];//son los numeros de tambores en un vector ej: 371,372 (los separo sacandole la coma)
$vector=explode(",",$cadena);
$cantidad=count($vector);
?>