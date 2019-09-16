<?php
header('Content-type: application/json');
require_once 'config.php';  
 
//$examp = $_GET["q"]; //query number

$id = $_GET['id'];

$tipoMuestra = $_GET['tipoMuestra']; 


$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
if(!$sidx) $sidx =1;


$result = mysql_query("SELECT COUNT( DISTINCT id_tambor ) AS count FROM laboratorio WHERE stat ='$tipoMuestra' AND num_presupuesto =".$id." ");
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count'];

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
if ($start < 0) $start = 0;




$SQL = 'SET character_set_results=utf8';
$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());


$SQL= "SELECT id_tambor, provedores.razon_social, provedores.Localidad, hmf, color, humedad, acidez, resultado, observaciones FROM laboratorio INNER JOIN provedores
    ON laboratorio.id_productor=provedores.prov_id WHERE stat ='$tipoMuestra' AND num_presupuesto =".$id." GROUP BY id_tambor ORDER BY ".$sidx." ".$sord." LIMIT ".$start." , ".$limit." ";


$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce= new stdClass();
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count; 
$i=0; 
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
	$responce->rows[$i]['id']=$row['id_tambor'];
 	$responce->rows[$i]['cell']=array($row['id_tambor'],$row['razon_social'],$row['Localidad'],$row['hmf'],$row['color'],$row['humedad'],$row['acidez'],$row['resultado'],$row['observaciones'],"");
 	$i++;
} 
echo json_encode($responce);
?>				