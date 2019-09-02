<?php
session_start();
include_once("funciones.php");

/********************** protocolo de chequeo ingreso usuario *******************************/
$nivel_dato=$_SESSION["acceso_acc"];
$ccli=$_SESSION["acceso_sector"];
$id_usuario=$_SESSION["id_usuario"];
$i = $id_usuario + 0;

if ($i<1)  {$_SESSION["mensaje"]="NO TIENE ACCESO CON ESTA CLAVE";header("Location: ../index.php");}

$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);

$a='SELECT acceso,alta,baja,modifica FROM '.$_SESSION["tabla_acc_op"].' WHERE id_usuario='.$id_usuario.' AND proceso="Procesos" AND orden=4 AND acceso="on" AND alta="on"';
$r=mysql_query($a,$cx_validar);$i=0;

while ($v = mysql_fetch_array($r)){
  $acceso=$v[0];
  $alta=$v[1];
  $baja=$v[2];
  $modifica=$v[3];
  $i++;break;
}
if ($i<1) {$_SESSION["mensaje"]="NO TIENE ACCESO CON ESTA CLAVE";header("Location: ../index.php"); }
/********************** fin protocolo de chequeo ingreso usuario *******************************/

$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);

//guardo la fecha y hora de ingreso
$last_ing = date("Y-m-d H:i:s");
$ver=$_REQUEST["ver"];
$ver="SI";
$nro_mov=$_REQUEST["nro_mov"]; //viene vacio
$lote_ext=$_REQUEST["lote_ext"]; //viene con cero
$ctambores=$_REQUEST["ctambores"]; 
//$ctambores;


/********************* guardo el registro del usuario que esta haciendo cambios en modulo *************/
$actualizar="UPDATE ".$_SESSION["tabla_acc"].
            " SET fec_ult_ut='$last_ing' ,prog_utl='muencampo.php' 
            WHERE id_usuario=".$_SESSION["id_usuario"];
mysql_query($actualizar,$cx_validar);

/****************** fin guardo el registro del usuario que esta haciendo cambios en modulo *************/

/********************** agrego informacion de fecha de vencimiento ***************************/
if ( (strlen($fecha_vto)<8) or (substr($fecha_vto,0,4)=='0000')){
  $a='SELECT adddate(now(), interval 24 month)';
  $r1 = mysql_query($a,$cx_validar);
  while ($v1 = mysql_fetch_array($r1)){ 
    $f=substr($v1[0],0,10);
    $fecha_vto=substr($f,-2).substr($f,4,4).substr($f,0,4);
  }
}
/**********************************************************************************************/


$campo_id=0;$r='';$lote='';     //inicializa variables
$prov_id=0; $lote_env_sec='';



if ($campo_id>0) {$_SESSION["filtro_campo_id"]=$campo_id;}
if ($prov_id>0) {$_SESSION["filtro_prov_id"]=$prov_id;}

$orden=$_REQUEST["orden"];


foreach ($_POST as $indice => $valor){ 
   switch ($indice) {
    case 'pritambor': $pritambor=$valor; break;
    case 'ctambores': $ctambores=$valor; break;
    case 'almacen_id': $almacen_id=$valor; break;
    case 'lote_env_sec': $lote_env_sec=$valor; break;
    case 'prov_id': $prov_id=$valor; break;
    case 'sala_ext': $sala_ext=$valor; 
    case 'campo_id': $campo_id=$valor; break;
    case 'filtro': $filtro=$valor; break;
    case 'campo': $campo=$valor ; break;
    case 'Submit': $sub=$valor; break;
    case 'fecha_ini': $fecha_ini=$valor ; break;
    case 'fecha_fin': $fecha_fin=$valor ; break;
    case 'hora_inicio': $hora_inicio ; break;
    case 'hora_final': $hora_final=$valor ; break;
    case 'pers_ini': $pers_ini=$valor ; break;
    case 'pers_fin': $pers_fin=$valor ; break;
    case 'lote': $lote=$valor;break;
    case 'ID': $ID=$valor;break;
    case 'lote_ext': $lote_ext=$valor;break;
    case 'cosecha': $cosecha=$valor;break;
    case 'nro_mov': $nro_mov=$valor;break;
    case 'fecha_vto': $fecha_vto=$valor;break;
    case 'tienemuestra': $tienemuestra=$valor;break;
    case 'selectfrom': $tipo_campo=$valor;break;
    case 'sala_acopio': $sala_acopio=$valor; 
    case 'env_sec': $env_sec=$valor;
    case 'tamb': $tamb=$valor;
    
    //echo $env_sec;
    //$actualizar1="SELECT nombre,contiene FROM  ".$_SESSION["tabla_env_secundario"].' WHERE env_sec='.$env_sec ; //trae los tipos de envases que se cargan en BD, quedaria solo el 1 de 200lts
    
    //$rs_validar1 = mysql_query($actualizar1,$cx_validar);
    
    //while ($v_validar1 = mysql_fetch_array($rs_validar1)){$secundario=$v_validar1[0]; $litros=$v_validar1[1];};break;
    case 'forzar': $forzar=$valor;break;

  }
}

// grabo el lote nuevo
$h=date("Y-m-d H:i:s");
$h=substr($h,-8);
$h=substr($h,0,5);
$l=date("Y-m-d");  

//selecciona abreviatura de la sala de extraccion en realidad tiene que pasar la razon social
$a='SELECT razon_social FROM '.$_SESSION["tabla_almacenes"].' 
    WHERE almacen_id='.$sala_ext;//pasado en muencampo1

$rb = mysql_query($a,$cx_validar);
while ($vb = mysql_fetch_array($rb)) {$se=$vb[0]; break;}


/****
//selecciona abreviatura de la sala de acopio
$p='SELECT razon_social FROM '.$_SESSION["tabla_almacenes"].' 
    WHERE almacen_id='.$sala_acopio;//pasado en muencampo1
$rb = mysql_query($p,$cx_validar);

while ($vb = mysql_fetch_array($rb)) {$salaacopio=$vb[0]; break;}
***/

if ($tienemuestra == "conmuestra"){
  //echo "dentro de if de tiene muestra";
  //prepara las variables de BD para cargar datos
  //coloca el prefijo boca: 0003  numero: 59 tipo: EXT por ser id_documento=3
  //busca el numero de operacion en la BD de numeros alli se guardan los numeros de operacion para cada accion dentro del sistema
  $a='SELECT boca,numero,tipo FROM '.$_SESSION["tabla_numeros"].' WHERE id_documento=3';
  $rb = mysql_query($a,$cx_validar);
  
  while ($vb = mysql_fetch_array($rb)) {$boca=$vb[0];$numero=$vb[1];$tipo_mov=$vb[2]; break;}  
  
  $numero++; 
  //$num='00000000'.$numero;
  //$nro_mov=$boca.'-'.substr($num,-8);            
  //sentencia de carga en la BD
  $a1='UPDATE '.$_SESSION["tabla_numeros"]." SET numero=".$numero.',fecha_ult_doc="'.$l.'" WHERE id_documento=3';
  mysql_query($a1,$cx_validar);  
  //echo $a1; 
  //$lote_ext=$numero;  

  
  //********************************SENTENCIA DE CARGA PARA CADA TAMBOR*******************************************          
  //detecta bien la cantidad de tambores a insertar
  $ctambores=count($tamb);
	//echo "$ctambores";
  for ($i=0;$i<$ctambores;$i++){ 
	//echo $i;
    $tipo_campo[$i]="Multiflora";

    $query11="INSERT INTO presupuestos (num_presupuesto,fecha_muestreo,id_comprador,id_productor,id_sala_ext,id_tambor) 
        VALUES (".$lote_env_sec.",'".$fecha_ini."',".$almacen_id.",".$prov_id.",".$sala_ext.",".$tamb[$i].")";
    //echo $query11;
    mysql_query($query11,$cx_validar);

    $query1="INSERT INTO laboratorio (num_presupuesto,fecha_muestreo,cosecha,id_tambor,id_productor,tipo_miel,stat) 
        VALUES (".$lote_env_sec.",'".$fecha_ini."',".$cosecha.",".$tamb[$i].",".$prov_id.",'Multiflora','EXT')";
    //echo $query1;
    mysql_query($query1,$cx_validar);
    $load="cargado";
  }

}else if ($tienemuestra == "sinmuestra"){
  //console.log("dentro de if de los que no tienen muestra");
  //llenar tablas con EXA o numero 6
  //agregar cantidad de tambores con la leyenda N/A
  //prepara las variables de BD para cargar datos
  //coloca el prefijo boca: 0003  numero: 59 tipo: EXA por ser id_documento=6
  //busca el numero de operacion en la BD de numeros alli se guardan los numeros de operacion para cada accion dentro del sistema
  $a='SELECT boca,numero,tipo FROM '.$_SESSION["tabla_numeros"].' WHERE id_documento=6';
  $rb = mysql_query($a,$cx_validar);
  
  while ($vb = mysql_fetch_array($rb)) {$boca=$vb[0];$numero=$vb[1];$tipo_mov=$vb[2]; break;}  
  
  $numero++; $num='00000000'.$numero;
  $nro_mov=$boca.'-'.substr($num,-8);            
  //sentencia de carga en la BD
  $a1='UPDATE '.$_SESSION["tabla_numeros"]." SET numero=".$numero.',fecha_ult_doc="'.$l.'" WHERE id_documento=6';
  mysql_query($a1,$cx_validar);  
  //echo $a1; 
  $lote_ext=$numero;

  
  //********************************SENTENCIA DE CARGA PARA CADA TAMBOR*******************************************          
  for ($i=0;$i<$ctambores;$i++){
              
    $tipo_campo[$i]=Multiflora;
    
    $query21="INSERT INTO presupuestos (num_presupuesto,fecha_muestreo,id_comprador,id_productor,id_sala_ext,id_tambor) 
      VALUES (".$lote_env_sec.",'".$fecha_ini."',".$almacen_id.",".$prov_id.",".$sala_ext.",".$tamb[$i].")";
    //echo $query11;
    mysql_query($query21,$cx_validar);

    $query2="INSERT INTO laboratorio (num_presupuesto,fecha_muestreo,cosecha,id_tambor,id_productor,tipo_miel,resultado,stat) 
        VALUES (".$lote_env_sec.",'".$fecha_ini."',".$cosecha.",".$tamb[$i].",".$prov_id.",'Multiflora','no cumple','EXA')";
    mysql_query($query2,$cx_validar);
    $load="cargado";
  }
}

//mandar mensaje de carga succesfull!!!
header("Location: ../view/presupuestos.php?load=$load");
?>