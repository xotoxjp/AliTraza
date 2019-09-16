<?php
include("config.php");
$id = $_GET['ID'];
$obs = $_GET['obs'];
//echo"id : $id || obs : $obs";
//$cx_validar = mysql_pconnect("localhost","root","root1234");
//mysql_select_db("chmiel");
$sql = 'UPDATE laboratorio SET observaciones="'.$obs.'" WHERE id_tambor="'.$id.'"';
$r=mysql_query($sql,$cx_validar);
if ($r){ header("Location: ../view/laboratorio.php"); }
?>				