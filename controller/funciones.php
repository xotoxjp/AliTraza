<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
session_start();
$_SESSION["sumtiempo"]=0*3600;
$_SESSION['cant_nro']=8;
$_SESSION['cant_boca']=4;
$_SESSION['boca_remi']=2;
$_SESSION['boca_recep']=1;
//sergio
$_SESSION["guarde"]="formulario_guardado";
 
$_SESSION["aquien"]="Mieles Client";
$_SESSION["title"]="MENU PRINCIPAL";
$_SESSION["ematab"]=" ";
$_SESSION["web"]=" ";
$_SESSION["wini"]="<br>";

if (empty($_SESSION["entrax"])) {$_SESSION["entrax"]=".";}
if (empty($_SESSION["id_tipo"])) {$_SESSION["id_tipo"]=".";}
if (empty($_SESSION["id_familia"])) {$_SESSION["id_familia"]=".";}
if (empty($_SESSION["id_cliente"])) {$_SESSION["id_cliente"]=".";}
if (empty($_SESSION["id_operador"])) {$_SESSION["id_operador"]=".";}
if (empty($_SESSION["filtro_nombre"])){$_SESSION["filtro_nombre"]="";}
if (empty($_SESSION["filtro_localidad"])){$_SESSION["filtro_localidad"]="";}
if (empty($_SESSION["filtro_direccion"])){$_SESSION["filtro_direccion"]="";}
if (empty($_SESSION["filtro_direccion"])){$_SESSION["filtro_id_cliente"]="";}

if (empty($_SESSION["filtro_cod_prov"])) {$_SESSION["filtro_cod_prov"]="";}
if (empty($_SESSION["filtro_provincia"])) {$_SESSION["filtro_provincia"]="";}
if (empty($_SESSION["filtro_codigo_postal"])) {$_SESSION["filtro_codigo_postal"]="";}
if (empty($_SESSION["filtro_cod_localidad"])) {$_SESSION["filtro_cod_localidad"]="";}
if (empty($_SESSION["filtro_localidad"])) {$_SESSION["filtro_localidad"]="";}
if (empty($_SESSION["reg_desde_cp"])) {$_SESSION["reg_desde_cp"]="0";}
if (empty($_SESSION["reg_hasta_cp"])) {$_SESSION["reg_hasta_cp"]="100";}
if (empty($_SESSION["filtro_concepto"])){$_SESSION["filtro_concepto"]="";}
if (empty($_SESSION["filtro_tipo"])) {$_SESSION["filtro_tipo"]="";}
if (empty($_SESSION["filtro_familia"])) {$_SESSION["filtro_familia"]="";}
if (empty($_SESSION["filtro_producto"])) {$_SESSION["filtro_producto"]="";}
if (empty($_SESSION["filtro_id_producto"])) {$_SESSION["filtro_id_producto"]="";}
if (empty($_SESSION["filtro_capacidad"])) {$_SESSION["filtro_capacidad"]="";}
if (empty($_SESSION["vu_anu"])) {$_SESSION["vu_anu"]=0;}
if (empty($_SESSION["otro_prov"])) {$_SESSION["otro_prov"]=0;}

IF ($_SERVER["SERVER_ADDR"] == "127.0.0.1")
  { // base de datos de accesos desde PC.
  $_SESSION["host_acc"]="localhost";
  $_SESSION["user_acc"]="root";
  $_SESSION["pass_acc"]="root1234";
  $_SESSION["base_acc"]="chmiel";
  $_SESSION["tabla_acc"]="usuario";
  $_SESSION["tabla_iva"]="iva";
  $_SESSION["tabla_almacenes"]="almacenes";
  $_SESSION["tabla_analisis"]="analisis";
  $_SESSION["tabla_analitico"]="analitico";
  $_SESSION["tabla_analitico_inf"]="analitico_inf";
  $_SESSION["tabla_campos"]="campos";
  $_SESSION["tabla_clientes"]="clientes";
  $_SESSION["tabla_colmenas"]="colmenas";
  $_SESSION["tabla_colmenas_mov"]="colmenas_mov";
  $_SESSION["tabla_env_primario"]="env_primario";
  $_SESSION["tabla_env_secundario"]="env_secundario";
  $_SESSION["tabla_env_terciario"]="env_terciario";
  $_SESSION["tabla_esp_producto"]="esp_producto";
  $_SESSION["tabla_movimientos"]="movimientos";
  $_SESSION["tabla_mov_cabecera"]="mov_cabecera";
  $_SESSION["tabla_mov_detalle"]="mov_detalle";
  $_SESSION["tabla_rech_cabecera"]="rech_cabecera";
  $_SESSION["tabla_rech_detalle"]="rech_detalle";
  $_SESSION["tabla_mov_det_anal"]="mov_det_anal";
  $_SESSION["tabla_per_campo"]="per_campo";
  $_SESSION["tabla_productos"]="producto";
  $_SESSION["tabla_provedores"]="provedores";
  $_SESSION["tabla_stock"]="stock";
  $_SESSION["tabla_tipos"]="tipo_mov";
  $_SESSION["tabla_tipo_almacen"]="tipo_almacen";
  $_SESSION["tabla_unidades"]="unidades";
  $_SESSION["tabla_tipo_abejas"]="tipo_abejas";
  $_SESSION["tabla_tipo_colmenas"]="tipo_colmenas";
  $_SESSION["tabla_tipo_estado"]="tipo_estado";
  $_SESSION["tabla_respuesta"]="respuesta";
  $_SESSION["tabla_numeros"]="numeros";
  $_SESSION["tabla_mco_cabecera"]="mco_cabecera";
  $_SESSION["tabla_mco_detalle"]="mco_detalle";
  $_SESSION["tabla_mov_lotes"]="mov_lotes";
  $_SESSION["tabla_paises"]="paises";
  $_SESSION["tabla_acc_op"]="accesos_op";
  $_SESSION["tabla_prioridad"]="prioridad";
  $_SESSION["tabla_despachantes"]="despachantes";
  $_SESSION["tabla_aduanas"]="aduanas";
  $_SESSION["tabla_pasos"]="pasos";
  $_SESSION["tabla_mov_embarque"]="mov_embarque";
  $_SESSION["tabla_transporte"]="transporte";  
  $_SESSION["tabla_tipo_producto"]="tipo_producto";
  $_SESSION["tabla_tipo_items"]="tipo_items";
  $_SESSION["tabla_especie"]="especie";
  $_SESSION["tabla_tipo_campo"]="tipo_campo";
  $_SESSION["tabla_tipo_color"]="tipo_color";
  }
else
  {  //base de datos de accesos desde web.
  //$_SESSION["host_acc"]="10.0.0.92";
  //$_SESSION["host_acc"]="192.0.0.229";

  $_SESSION["host_acc"]="localhost";
  $_SESSION["user_acc"]="root";
  $_SESSION["pass_acc"]="root1234";
  $_SESSION["base_acc"]="chmiel";
  $_SESSION["tabla_acc"]="usuario";
  $_SESSION["tabla_iva"]="iva";
  $_SESSION["tabla_almacenes"]="almacenes";
  $_SESSION["tabla_analisis"]="analisis";
  $_SESSION["tabla_analitico"]="analitico";
  $_SESSION["tabla_analitico_inf"]="analitico_inf";
  $_SESSION["tabla_campos"]="campos";
  $_SESSION["tabla_clientes"]="clientes";
  $_SESSION["tabla_colmenas"]="colmenas";
  $_SESSION["tabla_colmenas_mov"]="colmenas_mov";
  $_SESSION["tabla_env_primario"]="env_primario";
  $_SESSION["tabla_env_secundario"]="env_secundario";
  $_SESSION["tabla_env_terciario"]="env_terciario";
  $_SESSION["tabla_esp_producto"]="esp_producto";
  $_SESSION["tabla_movimientos"]="movimientos";
  $_SESSION["tabla_mov_cabecera"]="mov_cabecera";
  $_SESSION["tabla_mov_detalle"]="mov_detalle";
  $_SESSION["tabla_rech_cabecera"]="rech_cabecera";
  $_SESSION["tabla_rech_detalle"]="rech_detalle";
  $_SESSION["tabla_mov_det_anal"]="mov_det_anal";
  $_SESSION["tabla_per_campo"]="per_campo";
  $_SESSION["tabla_productos"]="producto";
  $_SESSION["tabla_provedores"]="provedores";
  $_SESSION["tabla_stock"]="stock";
  $_SESSION["tabla_tipos"]="tipo_mov";
  $_SESSION["tabla_tipo_almacen"]="tipo_almacen";
  $_SESSION["tabla_unidades"]="unidades";
  $_SESSION["tabla_tipo_abejas"]="tipo_abejas";
  $_SESSION["tabla_tipo_colmenas"]="tipo_colmenas";
  $_SESSION["tabla_tipo_estado"]="tipo_estado";
  $_SESSION["tabla_respuesta"]="respuesta";
  $_SESSION["tabla_numeros"]="numeros";
  $_SESSION["tabla_mco_cabecera"]="mco_cabecera";
  $_SESSION["tabla_mco_detalle"]="mco_detalle";
  $_SESSION["tabla_mov_lotes"]="mov_lotes";
  $_SESSION["tabla_paises"]="paises";
  $_SESSION["tabla_acc_op"]="accesos_op";
  $_SESSION["tabla_prioridad"]="prioridad";
  $_SESSION["tabla_despachantes"]="despachantes";
  $_SESSION["tabla_aduanas"]="aduanas";
  $_SESSION["tabla_pasos"]="pasos";
  $_SESSION["tabla_mov_embarque"]="mov_embarque";
  $_SESSION["tabla_transporte"]="transporte";  
  $_SESSION["tabla_tipo_producto"]="tipo_producto";
  $_SESSION["tabla_tipo_items"]="tipo_items";
  $_SESSION["tabla_especie"]="especie";
  $_SESSION["tabla_tipo_campo"]="tipo_campo";
  $_SESSION["tabla_tipo_color"]="tipo_color";
}

function act_presupuesto($nro_presupuesto,$novedades){
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$actualizar = 'SELECT id_cliente FROM '.$_SESSION["tabla_cpre"]." WHERE `nro_presupuesto`='".$nro_presupuesto."'";
$rs_validar = mysql_query($actualizar,$cx_validar); while ($v_validar1 = mysql_fetch_array($rs_validar)){$id_cliente=$v_validar1[0];}
$actualizar = 'SELECT cod_iva FROM '.$_SESSION["tabla_clientes"].' WHERE `id_cliente`='.$id_cliente;
$rs_validar = mysql_query($actualizar,$cx_validar); while ($v_validar1 = mysql_fetch_array($rs_validar)){$cod_iva=$v_validar1[0];}
$actualizar = 'SELECT porc_1,porc_2,porc_3,porc_4,porc_5,porc_6 FROM '.$_SESSION["tabla_iva"]." WHERE `cod_iva`='".$cod_iva."'";
$rs_validar = mysql_query($actualizar,$cx_validar);
while ($v_validar1 = mysql_fetch_array($rs_validar))
  {$i1=$v_validar1[0];
   $i2=$v_validar1[1];
   $i3=$v_validar1[2];
   $i4=$v_validar1[3];
   $i5=$v_validar1[4];
   $i6=$v_validar1[5];}
$actualizar = 'SELECT iva_exento,p_total FROM '.$_SESSION["tabla_dpre"]." WHERE `nro_presupuesto`='".$nro_presupuesto."'";
$rs_validar = mysql_query($actualizar,$cx_validar);
$i=0 ;$ip1=0;$ip2=0;$ip3=0;$ip4=0;$ip5=0;$ip6=0;
while ($v_validar1 = mysql_fetch_array($rs_validar))
 {
 $i=$i+$v_validar1[1];
 if ($v_validar1[0]!="Si")
 { $ip1=$ip1+($v_validar1[1]*$i1/100);$ip2=$ip2+($v_validar1[1]*$i2/100);$ip3=$ip3+($v_validar1[1]*$i3/100);
   $ip4=$ip4+($v_validar1[1]*$i4/100);$ip5=$ip5+($v_validar1[1]*$i5/100);$ip6=$ip6+($v_validar1[1]*$i6/100);}}
$total_con_imp=$i+$ip1+$ip2+$ip3+$ip4+$ip5+$ip6;
$actualizar = 'update '.$_SESSION["tabla_cpre"].' set total_con_imp='.$total_con_imp.', total_sin_imp='.$i.', imp_porc_1='.$ip1.', imp_porc_2='.$ip2;
$actualizar =$actualizar.', imp_porc_3='.$ip3.', imp_porc_4='.$ip4.', imp_porc_5='.$ip5.', imp_porc_6='.$ip6 .',novedades='.$novedades."  WHERE `nro_presupuesto`='".$nro_presupuesto."'";
mysql_query($actualizar,$cx_validar);}

function act_factura($nro_factura){
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$actualizar = 'SELECT id_cliente FROM '.$_SESSION["tabla_cfac"]." WHERE `nro_factura`='".$nro_factura."'";
$rs_validar = mysql_query($actualizar,$cx_validar); while ($v_validar1 = mysql_fetch_array($rs_validar)){$id_cliente=$v_validar1[0];}
if ($id_cliente>0){
$actualizar = 'SELECT cod_iva FROM '.$_SESSION["tabla_clientes"].' WHERE `id_cliente`='.$id_cliente;
$rs_validar = mysql_query($actualizar,$cx_validar);

 while ($v_validar1 = mysql_fetch_array($rs_validar))
 {$cod_iva=$v_validar1[0];}
$actualizar = 'SELECT porc_1,porc_2,porc_3,porc_4,porc_5,porc_6 FROM '.$_SESSION["tabla_iva"]." WHERE `cod_iva`='".$cod_iva."'";
$rs_validar = mysql_query($actualizar,$cx_validar);
while ($v_validar1 = mysql_fetch_array($rs_validar))
  {$i1=$v_validar1[0];
   $i2=$v_validar1[1];
   $i3=$v_validar1[2];
   $i4=$v_validar1[3];
   $i5=$v_validar1[4];
   $i6=$v_validar1[5];}
$actualizar = 'SELECT iva_exento,p_total FROM '.$_SESSION["tabla_dfac"]." WHERE `nro_factura`='".$nro_factura."'";
$rs_validar = mysql_query($actualizar,$cx_validar);
$i=0 ;$ip1=0;$ip2=0;$ip3=0;$ip4=0;$ip5=0;$ip6=0;
while ($v_validar1 = mysql_fetch_array($rs_validar))
 {
 $i=$i+$v_validar1[1];
 if ($v_validar1[0]!="Si")
 { $ip1=$ip1+($v_validar1[1]*$i1/100);$ip2=$ip2+($v_validar1[1]*$i2/100);$ip3=$ip3+($v_validar1[1]*$i3/100);
   $ip4=$ip4+($v_validar1[1]*$i4/100);$ip5=$ip5+($v_validar1[1]*$i5/100);$ip6=$ip6+($v_validar1[1]*$i6/100);}}
$total_con_imp=$i+$ip1+$ip2+$ip3+$ip4+$ip5+$ip6;
$actualizar = 'update '.$_SESSION["tabla_cfac"].' set total_con_imp='.$total_con_imp.', total_sin_imp='.$i.', imp_porc_1='.$ip1.', imp_porc_2='.$ip2;
$actualizar =$actualizar.', imp_porc_3='.$ip3.', imp_porc_4='.$ip4.', imp_porc_5='.$ip5.', imp_porc_6='.$ip6 ."  WHERE `nro_factura`='".$nro_factura."'";
mysql_query($actualizar,$cx_validar);}}


function validar ($logg,$pass){// VALIDA QUE EL USUARIO CORRIENTE EXISTA Y TENGA ACCESO A LO REQUERIDO
$_SESSION["mensaje"]="  ";
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$que_validar="select * from ".$_SESSION["tabla_acc"]." where login='$logg' and password='$pass'";

$rs_validar = mysql_query($que_validar,$cx_validar);
$v_validar = mysql_fetch_array($rs_validar);
$valor=$v_validar["nivel"];

$srchstrng = $_SESSION["level_req"];
if (stristr($valor, $srchstrng)== FALSE)
   { $_SESSION["mensaje"]="NO TIENE ACCESO CON ESTA CLAVE";
     //HAGO EL SALTO EN LA FUNCION DE LLAMADA ---
     header("Location: ../index.php"); }
else
  { $tt= ($v_validar["nombre"]);
    $ap= ($v_validar["apellido"]);
    $vv= ($v_validar["login"]);
    $pp= ($v_validar["password"]);
    $em= ($v_validar["email"]);
    $esec= ($v_validar["sector"]);
    $ttt= ($v_validar["id_usuario"]);
    $ttp= ($v_validar["pref_imp"]);
    $menu=($v_validar["menu"]);
    $_SESSION["menu"]=$menu;

    $_SESSION["pref_imp"]=$ttp;
    $_SESSION["acceso_nombre"]=$tt;
    $_SESSION["acceso_apellido"]=$ap;
    $_SESSION["acceso_logg"]=$vv;
    $_SESSION["acceso_pass"]=$pp;
    $_SESSION["acceso_email"]=$em;
    $_SESSION["acceso_acc"]=$valor;
    $_SESSION["acceso_sector"]=$esec;
    $_SESSION["mensaje"]=" ";
    $_SESSION["id_usuario"]=$ttt ;
    $_SESSION["id_empresa"]=($v_validar["id_empresa"]) ;
  }
 }



function flag ()
{
 $flag=$_REQUEST["flag"];
 if ($flag==1) {
 $flag=0;
 $_SESSION["acceso_logg"]=$_REQUEST["logg"];
 $_SESSION["acceso_pass"]=$_REQUEST["pass"];
	}
}

function pongo_cero( $aNumber, $intPart) {
  $formattedNumber = $aNumber;
    $formattedNumber = str_repeat("0",($intPart + -1 - floor(log10($formattedNumber)))).$formattedNumber;
  return $formattedNumber;
  }

function add_insumo($id_producto,$insumo,$orden,$nro_remito) {
  if ($insumo>100) { // es un certificado   {add_insumo($id_producto,621,'B',$nro_remito);}
    $m1=$insumo;
    $cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
    mysql_select_db($_SESSION["base_acc"]);
    $ac3='SELECT id_familia,id_tipo,id_concepto,cod_prod,producto FROM '.$_SESSION["tabla_productos"]." where id_producto=".$insumo;
  }
  else {
    $cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
    mysql_select_db($_SESSION["base_acc"]);
    $ac3="SELECT id_repuesto,nombre from  ".$_SESSION["tabla_repuestos"]." where id_producto=".$id_producto." and insumo=".$insumo." and orden='".$orden."'" ;
    $rs = mysql_query($ac3,$cx_validar);
    while ($v = mysql_fetch_array($rs))
    {$m1=$v[0];$m2=$v[1];break;}
    $ac3='SELECT id_familia,id_tipo,id_concepto,cod_prod,producto FROM '.$_SESSION["tabla_productos"]." where id_producto=".$m1;
  }
  $rs = mysql_query($ac3,$cx_validar);
  while ($v = mysql_fetch_array($rs)){$id_familia=$v[0];$id_tipo=$v[1];$id_concepto=$v[2];$cod_prod=$v[3];$producto=$v[4];}
  $ac3='INSERT INTO '.$_SESSION["tabla_dcrto"]." (`documento`,`cantidad`,`id_producto`,`id_familia`,`id_tipo`,`id_concepto`,`cod_prod`,`producto`,`login`,`marca1`) VALUES ('";
  $ac3=$ac3.$nro_remito."',";
  $ac3=$ac3.'1,'.$m1.','.$id_familia.','.$id_tipo.','.$id_concepto.",'".$cod_prod."','".$producto."','".$_SESSION["acceso_logg"]."','ret')";
  mysql_query($ac3,$cx_validar);
}




function restaFechas($dFecIni, $dFecFin){
$dFecIni = str_replace("-","",$dFecIni);
$dFecFin = str_replace("-","",$dFecFin);
ereg( "([0-9]{4})([0-9]{1,2})([0-9]{1,2})", $dFecIni, $aFecIni);
ereg( "([0-9]{4})([0-9]{1,2})([0-9]{1,2})", $dFecFin, $aFecFin);
$date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[3], $aFecIni[1]);
$date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[3], $aFecFin[1]);
return round(($date2 - $date1) / (60 * 60 * 24));}


function borra_renglon($nro_presupuesto,$renglon) {
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$actualizar="DELETE from  ".$_SESSION["tabla_dpre"]." where nro_presupuesto='".$nro_presupuesto."' and renglon=$renglon" ;
$rs_validar = mysql_query($actualizar,$cx_validar);
$last_ing = date("Y-m-d H:i:s");

$actualizar="select max(novedades) as nov from  ".$_SESSION['tabla_npre']." where nro_presupuesto='".$nro_presupuesto."'";
$rs_validar = mysql_query($actualizar,$cx_validar);
$v_validar1 = mysql_fetch_array($rs_validar);
$novedades=$v_validar1[0];
if ($novedades<=0) {$novedades=1;}

$m= $_SESSION["acceso_logg"];
$actualizar1="insert into ".$_SESSION['tabla_npre']." (`nro_presupuesto`,`fecha_hora`,`novedades`,`operador_nov`,`data1`,`data2`,`data3`,`data4`,`data5`,`cliente_atte`)";
$actualizar1=$actualizar1." VALUES ('" .$nro_presupuesto ."','".$last_ing."',".$novedades.",'".$m."','Anula renglon ".$renglon."','  ','  ','  ','  ','  ' )";

mysql_query($actualizar1,$cx_validar);
}

function act_colmenas($d){
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$cam=0;$col=0;
if ($d>0) {
    $a='select count(*) as campos from  '.$_SESSION['tabla_campos'].' where prov_id='.$d;
    $r = mysql_query($a,$cx_validar);
    while ($v1 = mysql_fetch_array($r)){$cam=$v1[0];}
    $a='select count(*) as colmenas from  '.$_SESSION['tabla_colmenas'].' where prov_id='.$d;
    $r = mysql_query($a,$cx_validar);
    while ($v1 = mysql_fetch_array($r)){$col=$v1[0];}
    $a="UPDATE  ".$_SESSION['tabla_provedores'].' set campos_reg='.$cam.', colmenas_reg='.$col.' where prov_id='.$d; 
    mysql_query($a,$cx_validar);
}
else {
  $ap='select prov_id from  '.$_SESSION['tabla_provedores'];
  $rp = mysql_query($ap,$cx_validar);
  while ($vp = mysql_fetch_array($rp)){
    $d=$vp[0];$cam=0;$col=0;
    $a='select count(*) as campos from  '.$_SESSION['tabla_campos'].' where prov_id='.$d;
    $r = mysql_query($a,$cx_validar);
    while ($v1 = mysql_fetch_array($r)){$cam=$v1[0];}
    $a='select count(*) as colmenas from  '.$_SESSION['tabla_colmenas'].' where prov_id='.$d;
    $r = mysql_query($a,$cx_validar);
    while ($v1 = mysql_fetch_array($r)){$col=$v1[0];}
    $a="UPDATE  ".$_SESSION['tabla_provedores'].' set campos_reg='.$cam.', colmenas_reg='.$col.' where prov_id='.$d; 
    mysql_query($a,$cx_validar);
  }
}
}

function act_col_cam($d,$c){
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
$cam=0;$col=0;
if (($d>0) and ($c>0)){
  $a='select count(*) as colmenas from  '.$_SESSION['tabla_colmenas'].' where prov_id='.$d.' and campo_id='.$c.' and tipo_colmena="Colmena"' ;
  $r = mysql_query($a,$cx_validar); 
  while ($v1 = mysql_fetch_array($r)){$cam=$v1[0];}
  $a='select count(*) as colmenas from  '.$_SESSION['tabla_colmenas'].' where prov_id='.$d.' and campo_id='.$c.' and tipo_colmena="Nucleo"' ;
  $r = mysql_query($a,$cx_validar); 
  while ($v1 = mysql_fetch_array($r)){$col=$v1[0];}
  $a="UPDATE  ".$_SESSION['tabla_campos'].' set colmenas='.$cam.', nucleos='.$col.' where prov_id='.$d.' and campo_id='.$c ; 
  mysql_query($a,$cx_validar);
}
else {
  if (($d>0) and ($c==0)){
    $ap='select distinct campo_id from  '.$_SESSION['tabla_campos'].' where prov_id='.$d ;
    $rp = mysql_query($ap,$cx_validar);
    while ($vp = mysql_fetch_array($rp)){
      $c=$vp[0];$cam=0;$col=0;
      $a='select count(*) as colmenas from  '.$_SESSION['tabla_colmenas'].' where prov_id='.$d.' and campo_id='.$c.' and tipo_colmena="Colmena"' ;
      $r = mysql_query($a,$cx_validar); 
      while ($v1 = mysql_fetch_array($r)){$cam=$v1[0];}
      $a='select count(*) as colmenas from  '.$_SESSION['tabla_colmenas'].' where prov_id='.$d.' and campo_id='.$c.' and tipo_colmena="Nucleo"' ;
      $r = mysql_query($a,$cx_validar); 
      while ($v1 = mysql_fetch_array($r)){$col=$v1[0];}
      $a="UPDATE  ".$_SESSION['tabla_campos'].' set colmenas='.$cam.', nucleos='.$col.' where prov_id='.$d.' and campo_id='.$c ; 
      mysql_query($a,$cx_validar);
    }
  }
}
}