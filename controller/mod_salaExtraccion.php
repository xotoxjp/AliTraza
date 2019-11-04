<?php
session_start();
include_once("funciones.php");
$_SESSION["level_req"]="f";
$logg = $_SESSION["acceso_logg"];
$pass =$_SESSION["acceso_pass"];
$nivel_dato=$_SESSION["acceso_acc"];
$id_usuario=$_SESSION["id_usuario"];
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$a='SELECT acceso,alta,baja,modifica FROM '.$_SESSION["tabla_acc_op"].' WHERE id_usuario='.$id_usuario.' AND proceso="Tablas" AND orden=2 AND acceso="on"';
$r=mysql_query($a,$cx_validar);
$i=0;
while ($v = mysql_fetch_array($r)) {
  $acceso=$v[0];
  $alta=$v[1];
  $baja=$v[2];
  $modifica=$v[3];
  $i++;
  break;
}
if ($i<1){
   $_SESSION["mensaje"]="NO TIENE ACCESO CON ESTA CLAVE";
   header("Location: ../index.php");
 }
$cod_postal = 0; $lat=0;  $lon=0; $ret_iva = 'No' ;$ret_ib = 'No';  $ret_gan= 'No';
$almacen_id = $_GET["ID"];
// $edit = $_GET["EDIT"];
/**************************************************************************************************/
// solo va a funcionar si es nuevo cliente
$agrego_almacen = $_GET["nuevoalmacen"];
if ($agrego_almacen== "si"){
  $act="SELECT max( almacen_id ) FROM ".$_SESSION["tabla_almacenes"];
  $rs_validar = mysql_query($act,$cx_validar) ;
  while ($v_validar = mysql_fetch_array($rs_validar)){
    $num_almacen_proximo = 1 + $v_validar[0];    
  }
  // con esta dato engaño de que se esta mostrando el prov_id 
  // del posible nuevo cliente aunque todavia no lo haya agregado a la BD   
  $almacen_id = $num_almacen_proximo;
}
/********************************************************************************************************/
  $edit = $_GET["EDIT"];
  if( $edit =='edit'){
    $conexion = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
    mysql_select_db($_SESSION["base_acc"]);
    $consulta ="SELECT * FROM  ".$_SESSION["tabla_almacenes"]. " WHERE almacen_id=".$almacen_id ;
    $respuesta = mysql_query($consulta,$conexion);
    while ($v_validar = mysql_fetch_array($respuesta)){
      $almacen_id= $v_validar[0];
      $nombre= $v_validar[1];
      $dir1= $v_validar[2];      
      $localidad=$v_validar[4];
      $cod_postal=$v_validar[5];
      $provincia=$v_validar[6];
      $pais=$v_validar[7];         
      $tipo_almacen=$v_validar[26];      
      $hab_senasa=$v_validar[28];
    }   
    $cod_postal = 0 + $cod_postal;  
    // para que se pueda ver la fecha en el calendario porque en la base esta dsitinto que en el formato de html
    // si es 0000-00-00 queda dd/mm/YYYY 
    $date=date_create($fecha_ini);
    $fecha_ini = date_format($date,"Y-m-d");
    // 
  }
  include("../view/tablasAccesoriasEditSalaExt.php");
?>