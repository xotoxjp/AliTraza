<?php
header('Content-type: application/json');
require_once 'grid/config.php';  

$tipoMuestra = $_GET['tipoMuestra']; // tipo de muestra elegido ej EXT 

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
if(!$sidx) $sidx =1;


//array to translate the search type
$ops = array(
 'eq'=>'=', //equal
 'ne'=>'<>',//not equal
 'lt'=>'<', //less than
 'le'=>'<=',//less than or equal
 'gt'=>'>', //greater than
 'ge'=>'>=',//greater than or equal
 'bw'=>'LIKE', //begins with
 'bn'=>'NOT LIKE', //doesn't begin with
 'in'=>'LIKE', //is in
 'ni'=>'NOT LIKE', //is not in
 'ew'=>'LIKE', //ends with
 'en'=>'NOT LIKE', //doesn't end with
 'cn'=>'LIKE', // contains
 'nc'=>'NOT LIKE'  //doesn't contain
);
function getWhereClause($col, $oper, $val){
    if($col == 'num_presupuesto') $col = 'num_presupuesto';
    global $ops;
    if($oper == 'bw' || $oper == 'bn') $val .= '%';
    if($oper == 'ew' || $oper == 'en' ) $val = '%'.$val;
    if($oper == 'cn' || $oper == 'nc' || $oper == 'in' || $oper == 'ni') $val = '%'.$val.'%';
	$p=" WHERE $col {$ops[$oper]} '$val' ";
    return $p;
	echo $p;
}
$where = ""; //if there is no search request sent by jqgrid, $where should be empty
$searchField = isset($_GET['searchField']) ? $_GET['searchField'] : false;
$searchOper = isset($_GET['searchOper']) ? $_GET['searchOper']: false;
$searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;
if ($_GET['_search'] == 'true') {
    $where = getWhereClause($searchField,$searchOper,$searchString);
}

$result = mysql_query("SELECT COUNT( DISTINCT num_presupuesto ) AS count FROM laboratorio WHERE stat='$tipoMuestra'");
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

//$SQL = "SELECT a.id, a.invdate, b.name, a.amount,a.tax,a.total,a.note FROM invheader a, clients b WHERE a.client_id=b.client_id ORDER BY $sidx $sord LIMIT $start , $limit";
$SQL = "SELECT laboratorio.num_presupuesto, provedores.provincia, laboratorio.fecha_analisis, laboratorio.cosecha, laboratorio.prioridad FROM laboratorio INNER JOIN provedores
    ON laboratorio.id_productor=provedores.prov_id ".$where." AND laboratorio.stat='$tipoMuestra' GROUP BY laboratorio.num_presupuesto ORDER BY ".$sidx." ".$sord." LIMIT ".$start." , ".$limit." ";

$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce= new stdClass();
 $responce->page = $page;
 $responce->total = $total_pages;
 $responce->records = $count; 
 $i=0; 
 while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 

  //pido cantidad de tambores 
  $numero_presupuesto=$row['num_presupuesto']; 
  $result00 = mysql_query("SELECT COUNT( DISTINCT laboratorio.id_tambor ) AS count FROM laboratorio WHERE laboratorio.stat ='$tipoMuestra' AND laboratorio.num_presupuesto =".$numero_presupuesto." ");
  $rowAux = mysql_fetch_array($result00,MYSQL_ASSOC);
  $cantMuestras = $rowAux['count'];


  $responce->rows[$i]['id']=$row['num_presupuesto'];
  $responce->rows[$i]['cell']=array($row['num_presupuesto'],$row['provincia'],$row['fecha_analisis'],$row['cosecha'],$row['prioridad'],$cantMuestras,"");
  $i++;
 } 
 echo json_encode($responce);
?>