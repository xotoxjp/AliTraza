<?
session_start();
include_once('funciones.php');
$_SESSION["level_req"]="a";
$logg = $_SESSION["acceso_logg"];
$pass =$_SESSION["acceso_pass"];
validar($logg,$pass);
$nivel_dato=$_SESSION["acceso_acc"];
$id_usuario=$_SESSION["id_usuario"];
$id_menu=$_SESSION["menu"];

if ($id_menu!="Estandar"){ header("Location: ../view/menu_1b.php"); }
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);

$cta = array('','','','','','','','','','','','');
$nta = array('','','','','','','','','','','','');
$ta1[1]="CLIENTES";   $ta2[1]="Clientes";
$ta1[2]="PROVEDORES"; $ta2[2]="Productores";
$ta1[3]="ALMACENES";  $ta2[3]="Almacenes";
$ta1[4]="PRODUCTOS";  $ta2[4]="Productos";
$ta1[5]="PRIMARIOS";  $ta2[5]="Envases Primarios";
$ta1[6]="SECUNDARIOS";$ta2[6]="Envases Secundarios";
$ta1[7]="TERCIARIOS"; $ta2[7]="Envases Terciarios";
$ta1[8]="MOVIMIENTOS";$ta2[8]="Tipos de Movimientos";
$ta1[9]="ANALISIS";   $ta2[9]="Tipos de Analisis";
$ta1[10]="TIPOALMA";  $ta2[10]="Tipos de Almacenes";
$ta1[11]="DESPACHANTE";  $ta2[11]="Despachantes";
$ta1[12]="ADUANA";  $ta2[12]="Aduanas";
$ta1[13]="PASOS";  $ta2[13]="Pasos Fronterizos";
$ItemsTablas=0;
$a='SELECT acceso,orden,proceso,pantalla FROM '.$_SESSION["tabla_acc_op"].' where id_usuario='.$id_usuario.' and proceso="Tablas" order by orden asc';

$r=mysql_query($a,$cx_validar);
while ($v = mysql_fetch_array($r)) {
  $ItemsTablas++;
  $cta[$ItemsTablas]=$ta1[$v[1]];
  $nta[$ItemsTablas]=$ta2[$v[1]];
}

$cim = array('','','','','','','','','','','','');
$nim = array('','','','','','','','','','','','');
$im1[1]="SENASA";    $im2[1]="Certificados Senasa";
$im1[2]="PACLIS";  $im2[2]="Packing List";
$im1[3]="CERTNAC"; $im2[3]="Cert. Nacionales";
$im1[4]="CERTPROV";$im2[4]="Cert. Provinciales";
$im1[5]="CERTLOC"; $im2[5]="Cert. Locales";
$ItemsImprimir=0;
$a='SELECT acceso,orden,proceso,pantalla FROM '.$_SESSION["tabla_acc_op"].' where id_usuario='.$id_usuario.' and proceso="Imprime" order by orden asc';
$r=mysql_query($a,$cx_validar);
while ($v = mysql_fetch_array($r)) {
  $ItemsImprimir++;
  $cim[$ItemsImprimir]=$im1[$v[1]];
  $nim[$ItemsImprimir]=$im2[$v[1]];
}

$cpr = array('','','','','','','','','','','','');
$npr = array('','','','','','','','','','','','');
$pr1[1]="MOV_ENTRE_CAMPOS";    $pr2[1]="Mov.de Colmena entre Campos";
$pr1[2]="MOV_COL_EXT";         $pr2[2]='Colmenas a Sala de Extracci&oacute;n';
$pr1[3]="EXTRACCION";          $pr2[3]='Extracci&oacute;n';
$pr1[4]="MUESTRAS_CAMPO";      $pr2[4]='Personal de campo';
$pr1[5]="MOV_ANALISIS";        $pr2[5]='Laboratorio';
$pr1[6]="MOV_EXTR_ACOPIO";     $pr2[6]='Orden de compra';
$pr1[7]="MOV_EXTR_ENVASADO";   $pr2[7]='Desde Extracci&oacute;n a Envasado';
$pr1[8]="MOV_ACOPIO_EMBASADO"; $pr2[8]="Desde Acopio a Envasado";
$pr1[9]="REPROCESO";           $pr2[9]="Dep&oacute;sito";
$pr1[10]="MOV_PROD_TERMINADO"; $pr2[10]="Traslados de Producto Terminado";
$pr1[11]="REMITOS";            $pr2[11]="Remitos";
$pr1[12]="STOCK";              $pr2[12]="Stock ingresado";
$pr1[13]="STOCKLC";            $pr2[13]="Stock x Lugar/Acopio";
$pr1[14]="EMBARQUE";           $pr2[14]="Exportaci&oacute;n";
$ItemsProcesos=0;
$a='SELECT acceso,orden,proceso,pantalla FROM '.$_SESSION["tabla_acc_op"].' where id_usuario='.$id_usuario.' and proceso="Procesos" order by orden asc';
$r=mysql_query($a,$cx_validar);
while ($v = mysql_fetch_array($r)) {
  $ItemsProcesos++;
  $cpr[$ItemsProcesos]=$pr1[$v[1]];
  $npr[$ItemsProcesos]=$pr2[$v[1]];
}

$_SESSION["filtro_lugar"]="";
$_SESSION["filtro_color"]="";
$_SESSION["filtro_cod_mov"]="";
$_SESSION["filtro_movil"]="";
$_SESSION["filtro_chapa"]="";
$_SESSION["filtro_chofer"]="";
$_SESSION["id_cliente"]="";
$_SESSION["id_operador"]=".";
$_SESSION["filtro_nombre"]="";
$_SESSION["filtro_localidad"]="";
$_SESSION["filtro_direccion"]="";
$_SESSION["filtro_id_cli"]="";
$_SESSION["filtro_cod_prov"]="";
$_SESSION["filtro_provincia"]="";
$_SESSION["filtro_codigo_postal"]="";
$_SESSION["filtro_cod_localidad"]="";
$_SESSION["filtro_localidad"]="";
$_SESSION["filtro_concepto"]="";
$_SESSION["filtro_tipo_mov"]="";
$_SESSION["filtro_almacenes"]="";
$_SESSION["filtro_sala_ext"]="";
$_SESSION["filtro_cosecha"]="";
$_SESSION["filtro_fecha_nece"]="";
$_SESSION["filtro_prioridad"]="";
$_SESSION["filtro_productor"]="";
$_SESSION["reg_desde"]=0;
$_SESSION["otro_prov"]=0;
$logg = $_SESSION["acceso_logg"];
$_SESSION[entrax]=" ";
$cx_validar = mysql_pconnect($_SESSION["host_acc"],$_SESSION["user_acc"],$_SESSION["pass_acc"]);
mysql_select_db($_SESSION["base_acc"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <TITLE><?echo $_SESSION["acceso_logg"]."&nbsp&nbsp";?>MENU  </TITLE>
  <meta name="viewport" content="width=device-width,initial-scale=1">             
  <meta charset="utf-8" />
  <link rel="stylesheet" href="menu_1.css" />

<script type="text/javascript">
<!--
function nueva_nota(elemento)
 {tx=document.getElementById('Eleccion');
  tx.value=elemento;
  btn=document.getElementById('ent');
  btn.click();}
-->
</script>
</head>
<body>
<link rel="shortcut icon" href="fotos/chmiel.ico">
<form name='formulario' method='POST' action='menu_1p.php'>

<?
$m=$_SESSION["acceso_nombre"];
if ($i>0) {echo "<FONT COLOR='#FF0000'>Tiene notas sin leer. Saludos</FONT>";}
?>

<table border=0 width="100%"><tr><td width=20%>&nbsp;</td><td align="center" width=60%>
  <img src="../view/images/logop.jpg" alt="Logo de la Empresa" width="350"/></td>

<? echo '<td align="middle" width=20%><img src="../view/images/'.$_SESSION["acceso_logg"].'.JPG" alt=" " width="28"/>&nbsp;&nbsp;';
   $l = date("Y-m-d H:i:s"); $l=0+substr($l,11,2); if (($l>=6) and ($l<12)) {echo 'Bu&eacute;n d&iacute;a '.$m;}
   if (($l>=12) and ($l<20)){echo 'Buenas tardes '.$m;} if ( (($l>=20) and ($l<=24)) or $l<6){echo 'Buenas Noches '.$m;}
?>
</td></tr></table>
<table border="0" width="100%"><tr>
<td bgcolor="#192A48" style="font-family: Calibri"><div align="center"><span class="Estilo34" style="color: #FFFFFF; font-size: 24px">MENU DE ENTRADA</span></td></tr></table>

<table id="menu_principal" border="1" width="100%">
<tr>
<?
if ($ItemsTablas>0){ echo '<TH width="34%">Tablas</TH>';}
if ($ItemsImprimir>0){ echo '<TH width="34%">Listados</TH>';}
if ($ItemsProcesos>0){ echo '<TH width="34%">Registros/Procesos</TH>';}
echo '</tr>';
$puseop=0;

for($renglon=1;$renglon<=13;$renglon++){
  if ( ( ($ItemsTablas>0) and ($ItemsTablas>=$renglon) ) or ( ($ItemsImprimir>0) and ($ItemsImprimir>=$renglon) ) or ( ($ItemsProcesos>0) and ($ItemsProcesos>=$renglon) ))
  { echo '<tr>'; }
  if ($ItemsTablas>0) {
    if ($ItemsTablas>=$renglon)  {
      echo '<TD width="34%" onclick='."'".'nueva_nota("'.$cta[$renglon].'")'."'".'>'.$nta[$renglon].'</TD>';
    }
    else {
      if ((stristr($nivel_dato, 'z')!= FALSE) and ($puseop<1)){$puseop++;
        echo '<TD width="34%" onclick='."'".'nueva_nota("USUARIOS")'."'".'>Operadores</TD>';
      }
      else {
        if  ( ( ($ItemsImprimir>0) and ($ItemsImprimir>=$renglon) ) or ( ($ItemsProcesos>0) and ($ItemsProcesos>=$renglon) ) ){
          echo '<TD>&nbsp;</TD>';
        }
      }  
    }
  }

  if ($ItemsImprimir>0) {
    if ($ItemsImprimir>=$renglon)  {
      echo '<TD width="34%" onclick='."'".'nueva_nota("'.$cim[$renglon].'")'."'".'>'.$nim[$renglon].'</TD>';
    }
    else {
      if  ( ( ($ItemsTablas>0) and ($ItemsTablas>=$renglon) ) or ( ($ItemsProcesos>0) and ($ItemsProcesos>=$renglon) ) ){
          echo '<TD>&nbsp;</TD>';
        }
    }
  }
  if ($ItemsProcesos>0) {
    if ($ItemsProcesos>=$renglon)  {
      echo '<TD width="34%" onclick='."'".'nueva_nota("'.$cpr[$renglon].'")'."'".'>'.$npr[$renglon].'</TD>';
    }
    else {
      if  ( ( ($ItemsTablas>0) and ($ItemsTablas>=$renglon) ) or ( ($ItemsImprimir>0) and ($ItemsImprimir>=$renglon) ) ){
          echo '<TD>&nbsp;</TD>';
        }
    }
  }
  if ( ( ($ItemsTablas>0) and ($ItemsTablas>=$renglon) ) or ( ($ItemsImprimir>0) and ($ItemsImprimir>=$renglon) ) or ( ($ItemsProcesos>0) and ($ItemsProcesos>=$renglon) ))
  { echo '</tr>'; }
}
?>  

</table>
<INPUT TYPE=HIDDEN NAME='ID' id='Eleccion' VALUE='NA'>
<INPUT TYPE='Submit' VALUE=''  id='ent' style='top: 100px;'>

</form>
</BODY>
</HTML>