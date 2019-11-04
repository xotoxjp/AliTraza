<?php
include("grid/config.php");
// la variable datoRuta lleva una parte de la ruta 
//que le va indicar al header donde redirigirse luego de borrado
// cada if guia a que tabla debe ir en la BD y asi 
// determinar su id correspondiente para la baja
$datoRuta = $_GET["datoRuta"];

//$conexion = mysql_pconnect("localhost","root","root1234");
//mysql_select_db("chmiel");

// caso de clientes1 
if ($datoRuta == "clientes1"){
	$datoRuta="view/clientes";
	$cliente_id = $_GET["ID"];// recupero dato enviado por Ajax
	$consulta=" DELETE FROM clientes WHERE cliente_id= ".$cliente_id;
	$respuesta = mysql_query($consulta);
	header( 'location: ../'.$datoRuta.'.php');
}
// caso de provedores1
if ($datoRuta == "provedores1"){	
	$datoRuta="view/productores";
	$prov_id = $_GET["ID"];// recupero dato enviado por Ajax
	$consulta=" DELETE FROM provedores WHERE prov_id= ".$prov_id;
	$respuesta = mysql_query($consulta);	
	header( 'location: ../'.$datoRuta.'.php');
}
// caso de almacenes1
if ($datoRuta == "tablasAccesorias"){
	$almacenes_id = $_GET["ID"];// recupero dato enviado por Ajax
	$consulta=" DELETE FROM almacenes WHERE almacen_id= ".$almacenes_id;
	$respuesta = mysql_query($consulta);	
	header( 'location: ../view/'.$datoRuta.'.php');
}
if ($datoRuta == "analitico_inf"){
	$cod_anal_id = $_GET["ID"];// recupero dato enviado por Ajax
	$consulta=" DELETE FROM analitico_inf WHERE cod_anal_id= ".$cod_anal_id;
	$respuesta = mysql_query($consulta);	
	header( 'location: ../'.$datoRuta.'.php');
}
?>