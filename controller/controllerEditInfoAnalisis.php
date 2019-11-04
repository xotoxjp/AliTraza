<?
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$actualizar="select * from  ".$_SESSION["tabla_analitico_inf"]. " where cod_anal_id=".$cod_anal_id;
$rs_validar = mysql_query($actualizar,$cx_validar);
while ($v_validar = mysql_fetch_array($rs_validar)) {
  $cod_anal_id= $v_validar[0];
  $nomencl= $v_validar[1];
  $nomencl1= $v_validar[2];
  $esp_inf=$v_validar[3];
  $esp_sup=$v_validar[4];
  $unidad=$v_validar[5];
  $leyenda1=$v_validar[6];
  $leyenda2=$v_validar[7];
  $leyenda3=$v_validar[8];
}  
$actualizar1="SELECT unidad FROM  ".$_SESSION["tabla_unidades"]." WHERE unidad<>"."'".$unidad."'" ;
$rs_validar1 = mysql_query($actualizar1,$cx_validar);
?>