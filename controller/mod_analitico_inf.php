<?php
session_start();
include_once("funciones.php");
$logg = $_SESSION["acceso_logg"];
$pass =$_SESSION["acceso_pass"];
$nivel_dato=$_SESSION["acceso_acc"];
$id_usuario=$_SESSION["id_usuario"];
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$a='SELECT acceso,alta,baja,modifica FROM '.$_SESSION["tabla_acc_op"].' where id_usuario='.$id_usuario.' and proceso="Tablas" and orden=9 and acceso="on"';
$r=mysql_query($a,$cx_validar);$i=0;
while ($v = mysql_fetch_array($r)) {
  $acceso=$v[0];
  $alta=$v[1];
  $baja=$v[2];
  $modifica=$v[3];
  $i++;break;
}
if ($i<1) {$_SESSION["mensaje"]="NO TIENE ACCESO CON ESTA CLAVE";header("Location: ../index.php"); }
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$contr="";
$accion=0;
if ( ($_POST["ID"]=="NA") or ($accion==1))
{ $_SESSION[reg_desde]= $_POST["num_reg_desde"];
  $_SESSION[reg_hasta]= $_POST["num_reg_hasta"];
  header("Location: ../view/tiposAnalisis.php");}
else {
  $cod_anal_id=substr($_POST["ID"],1);
}
//se agrego
$cod_anal_id=$_GET["ID"];
foreach ($_GET as $indice => $valor){
 //  echo $indice.' '.$valor.'- en get<br>';
  switch ($indice) {
    case 'accion': $accion= $valor; break;
    case 'cod_anal_id': $cod_anal_id=$valor; break;
  }
}
foreach ($_POST as $indice => $valor){
  //echo $indice.' '.$valor.'- en post<br>';
  switch ($indice) {
    case 'accion': $accion= $valor; break;
    case 'ent': $ent= $valor; break;
    case 'contr': $contr= $valor; break;
    case 'cod_anal_id': $cod_anal_id=$valor; break;
    case 'nomencl': $nomencl=$valor; break;
    case 'nomencl1': $nomencl1= $valor; break;
    case 'unidad': $unidad=$valor; break;
    case 'esp_inf': $esp_inf=$valor; break;
    case 'esp_sup': $esp_sup=$valor; break;
    case 'leyenda3': $leyenda3=$valor; break;
    case 'leyenda1': $leyenda1=$valor; break;
    case 'leyenda2': $leyenda2=$valor; break;
    case 'aplica_ok': $aplica_ok=$valor; break;
  }
}
if ($ent>0){$cod_anal_id=$ent;}
if ($accion==1){
  $_SESSION[reg_desde]= $_POST["num_reg_desde"];
  $_SESSION[reg_hasta]= $_POST["num_reg_hasta"];
  header("Location: ../view/tiposAnalisis.php");
}
if ($accion==2){ 
  $actualizar="UPDATE ".$_SESSION['tabla_analitico_inf'].' SET  nomencl="'.$nomencl ;
  $actualizar=$actualizar.'" ,nomencl1="'.$nomencl1;
  $actualizar=$actualizar.'" ,cod_anal_id="'.$cod_anal_id;
  $actualizar=$actualizar.'" ,unidad="'.$unidad;
  $actualizar=$actualizar.'" ,esp_inf="'.$esp_inf;
  $actualizar=$actualizar.'" ,esp_sup="'.$esp_sup;
  $actualizar=$actualizar.'" ,leyenda3="'.$leyenda3;
  $actualizar=$actualizar.'" ,leyenda1="'.$leyenda1;
  $actualizar=$actualizar.'" ,leyenda2="'.$leyenda2;
  $actualizar=$actualizar.'" ,aplica_ok="'.$aplica_ok;
  $actualizar=$actualizar.'" WHERE cod_anal_id='.$cod_anal_id ;
  mysql_query($actualizar,$cx_validar);
}
if ($accion==3){
  $actualizar="SELECT max( cod_anal_id ) from ".$_SESSION["tabla_analitico_inf"];
  $rs_validar = mysql_query($actualizar,$cx_validar) ;
  while ($v_validar = mysql_fetch_array($rs_validar)){$cod_anal_id= $v_validar[0] + 1;}
  $actualizar='INSERT INTO '.$_SESSION["tabla_analitico_inf"].' (`cod_anal_id`, `nomencl`, `nomencl1`, `esp_inf`,`esp_sup`,  `unidad` , `leyenda1`, `leyenda2`, `leyenda3`, `aplica_ok`  ';
  $actualizar=$actualizar.') VALUES (';
  $actualizar=$actualizar .$cod_anal_id . ", '" .$nomencl . "', '" .$nomencl1."',";
  $actualizar=$actualizar."'".$esp_inf."','".$esp_sup."','".$unidad."','".$leyenda1."','".$leyenda2."','".$leyenda3."','".$aplica_ok."')";
  mysql_query($actualizar,$cx_validar);  
}
if ($accion==4){
  if ($contr=="BAJA"){
    $cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
    mysql_select_db($_SESSION["base_acc"]);
    $actualizar="DELETE from  ".$_SESSION["tabla_analitico_inf"]." where cod_anal_id=".$cod_anal_id ;
    $rs_validar = mysql_query($actualizar,$cx_validar);header("Location: ../view/tiposAnalisis.php");echo '1';}
  else {echo "Para borrar este Item coloque en el C�digo de Seguridad la palabra BAJA   ";}
}
include_once("funciones.php");
$sub=".";
$orden=$_REQUEST["orden"];
?>