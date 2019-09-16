<?php
header('Content-type: application/json');
require_once 'grid/config.php';  

$tipoMuestra = $_GET['tipoMuestra']; // tipo de muestra elegido ej EXT 
$id_tambor= $_GET['id_tambor'];

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
    global $ops;
    if($oper == 'bw' || $oper == 'bn') $val .= '%';
    if($oper == 'ew' || $oper == 'en' ) $val = '%'.$val;
    if($oper == 'cn' || $oper == 'nc' || $oper == 'in' || $oper == 'ni') $val = '%'.$val.'%';
	$p=" WHERE $col {$ops[$oper]} '$val' AND stat ='$tipoMuestra2'";
    return $p;
	//echo $p;
}

$where = "WHERE stat ='$tipoMuestra'"; //if there is no search request sent by jqgrid, $where should be empty
$searchField = isset($_GET['searchField']) ? $_GET['searchField'] : false;
$searchOper = isset($_GET['searchOper']) ? $_GET['searchOper']: false;
$searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;
if ($_GET['_search'] == 'true') {
    $where = getWhereClause($searchField,$searchOper,$searchString);
}



if (isset( $_GET['id_tambor'])){
    $id_tambor= $_GET['id_tambor'];
    $id_tambor = ltrim($id_tambor, '0');
    //echo($id_tambor);
    $where = " WHERE laboratorio.id_tambor LIKE '%".$id_tambor."%' AND stat ='$tipoMuestra'" ; 
    //echo "$where";
}


if (isset( $_GET['num_presupuesto'])){
    $num_presupuesto= $_GET['num_presupuesto'];
    $where = " WHERE laboratorio.num_presupuesto LIKE '".$num_presupuesto."%' AND stat ='$tipoMuestra'" ; 
}

if (isset( $_GET['razon_social'])){
    $productor= $_GET['razon_social'];
    $where = " WHERE provedores.razon_social LIKE '".$productor."%' AND stat ='$tipoMuestra'" ; 
}

if (isset( $_GET['localidad'])){
  $localidad= $_GET['localidad'];     
  $where = " WHERE provedores.Localidad  LIKE '".$localidad."%' AND stat ='$tipoMuestra'" ; 
}


if (isset( $_GET['hmf'])){
  $hmf= $_GET['hmf'];     
  $where = " WHERE laboratorio.hmf LIKE '".$hmf."%' AND stat ='$tipoMuestra'" ; 
}


if (isset( $_GET['color'])){
  $color= $_GET['color'];     
  $where = " WHERE laboratorio.color LIKE '".$color."%' AND stat ='$tipoMuestra'" ; 
}


if (isset( $_GET['humedad'])){
  $humedad= $_GET['humedad'];     
  $where = " WHERE laboratorio.humedad LIKE '".$humedad."%' AND stat ='$tipoMuestra'" ; 
}


if (isset( $_GET['acidez'])){
  $acidez= $_GET['acidez'];     
  $where = " WHERE laboratorio.acidez LIKE '".$acidez."%' AND stat ='$tipoMuestra'" ; 
}


if (isset( $_GET['resultado'])){
  $resultado= $_GET['resultado'];     
  $where = " WHERE laboratorio.resultado LIKE '".$resultado."%' AND stat ='$tipoMuestra'" ; 
}

if (isset( $_GET['observaciones'])){
  $observaciones= $_GET['observaciones'];     
  $where = " WHERE laboratorio.observaciones LIKE '".$observaciones."%' AND stat ='$tipoMuestra'" ; 
}




$result = mysql_query("SELECT COUNT( DISTINCT id_tambor ) AS count FROM laboratorio ");
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

//echo "$where";

$SQL= "SELECT id_tambor, laboratorio.num_presupuesto, provedores.razon_social, provedores.Localidad, hmf, color, humedad, acidez, resultado, observaciones FROM laboratorio 
      INNER JOIN provedores ON laboratorio.id_productor=provedores.prov_id ".$where." GROUP BY id_tambor ORDER BY ".$sidx." ".$sord." LIMIT ".$start." , ".$limit." ";

//echo $SQL;
$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce= new stdClass();
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count; 

$i=0; 
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
	$responce->rows[$i]['id']=$row['id_tambor'];
 	$responce->rows[$i]['cell']=array($row['id_tambor'],$row['num_presupuesto'],$row['razon_social'],$row['Localidad'],$row['hmf'],$row['color'],$row['humedad'],$row['acidez'],$row['resultado'],$row['observaciones'],"");
 	$i++;
} 
echo json_encode($responce);
?>		