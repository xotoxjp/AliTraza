<?php
$id = $_GET['id'];

$conexion = mysql_pconnect("localhost","root","root1234");
mysql_select_db("chmiel");

$sql = "SELECT acceso,orden,proceso,pantalla FROM accesos_op WHERE id_usuario =".$id." AND proceso<>'' ORDER BY orden ASC";

$datos = array();

$respuesta = mysql_query($sql);

while( $row = mysql_fetch_assoc($respuesta)){
   $datos[] = $row; 
} 

echo json_encode($datos); 

?>