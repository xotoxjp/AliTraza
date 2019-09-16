<?php
include("grid/config.php");
/*
$db = mysql_connect(localhost, root, root1234)
or die("Connection Error: " . mysql_error());
mysql_select_db(chmiel) or die("Error conecting to db.");
$SQL = 'SET character_set_results=utf8';
$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());
*/
$array = array(); 
$cadena=$_GET["tambores"];
$vector=explode(",",$cadena);
$cantidad=count($vector);
console.log($cadena); 
for ( $a=0; $a < $cantidad; $a++){
    $SQL = "SELECT analitico_inf.nomencl, analisis.id_tambor, analisis.cod_analisis_id, analisis.resultado,laboratorio.resultado as conclusion, laboratorio.fecha_analisis
			FROM analisis INNER JOIN analitico_inf ON analisis.cod_analisis_id = analitico_inf.cod_anal_id 
			INNER JOIN laboratorio ON laboratorio.id_tambor = analisis.id_tambor 
			WHERE analisis.id_tambor = ".$vector[$a]." AND analisis.cod_analisis_id BETWEEN 1 AND 25 GROUP BY analisis.cod_analisis_id ORDER BY analisis.cod_analisis_id ASC";
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
	$i=0;
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		$array[$i] = $row;
		$i++;
	}
}
echo json_encode($array);
?>