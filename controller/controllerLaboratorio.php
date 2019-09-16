<?php
	session_start();
	include_once("funciones.php");
	  //echo "La variable de sesi&oacute;n es: " . session_id();
	$nivel_dato=$_SESSION["acceso_acc"];
	$ccli=$_SESSION["acceso_sector"];
	$id_usuario=$_SESSION["id_usuario"];
	$i = $id_usuario + 0;
	if ($i<1)  {$_SESSION["mensaje"]="NO TIENE ACCESO CON ESTA CLAVE";header("Location: ../index.php"); echo '1';}
	$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
	mysql_select_db($_SESSION["base_acc"]);
	$a='SELECT acceso,alta,baja,modifica FROM '.$_SESSION["tabla_acc_op"].' where id_usuario='.$id_usuario.' and proceso="Procesos" and orden=5 and acceso="on"';
	$r=mysql_query($a,$cx_validar);$i=0;
	while ($v = mysql_fetch_array($r)){
	  $acceso=$v[0];
	  $alta=$v[1];
	  $baja=$v[2];
	  $modifica=$v[3];
	  $i++;break;
	}
	if ($i<1) {$_SESSION["mensaje"]="NO TIENE ACCESO CON ESTA CLAVE";header("Location: ../index.php"); }

	$last_ing = date("Y-m-d H:i:s"); ;
	$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
	mysql_select_db($_SESSION["base_acc"]);
	$actualizar="UPDATE ".$_SESSION["tabla_acc"]." set fec_ult_ut='$last_ing' ,prog_utl='analisis1.php'  where id_usuario=".$_SESSION["id_usuario"];
	mysql_query($actualizar,$cx_validar);
	$actualizar='DELETE FROM '.$_SESSION["tabla_respuesta"].' where login="'.$_SESSION["acceso_logg"].'" and respuesta="ana" and com1="'.session_id().'"' ;
	mysql_query($actualizar,$cx_validar);

	$login=$_SESSION["acceso_logg"];
?>