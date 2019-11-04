<?php
    error_reporting(0);
    require_once 'config.php';
     
    $page = $_GET['page']; // get the requested page
    $limit = $_GET['rows']; // get how many rows we want to have into the grid
    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
    $sord = $_GET['sord']; // get the direction
    if(!$sidx) $sidx =1; // connect to the database
     
    //array to translate the search type
    $ops = array(
        'cn'=>'LIKE', // contains
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
        'nc'=>'NOT LIKE'  //doesn't contain
    );

    function getWhereClause($col, $oper, $val){
        global $ops;
        if($oper == 'bw' || $oper == 'bn') $val .= '%';
        if($oper == 'ew' || $oper == 'en' ) $val = '%'.$val;
        if($oper == 'cn' || $oper == 'nc' || $oper == 'in' || $oper == 'ni') $val = '%'.$val.'%';
        return " WHERE $col {$ops[$oper]} '$val' ";
    }
    $where = ""; //if there is no search request sent by jqgrid, $where should be empty
    $searchField = isset($_GET['searchField']) ? $_GET['searchField'] : false;
    $searchOper = isset($_GET['searchOper']) ? $_GET['searchOper']: false;
    $searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;

    if ($_GET['_search'] == 'true') {
        $where = getWhereClause($searchField,$searchOper,$searchString);
    }
     
    $result = mysql_query("SELECT COUNT(*) AS count FROM provedores");
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $count = $row['count'];
     
    if( $count >0 ) { 
        $total_pages = ceil($count/$limit);
        //$total_pages = ceil($count/1);
    } else {
        $total_pages = 0; 
    } if ($page > $total_pages) 
    $page=$total_pages; 
    $start = $limit*$page - $limit; // do not put $limit*($page - 1) 
    $SQL = 'SET character_set_results=utf8';
    $result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());

    $SQL ="SELECT `prov_id`,`razon_social`,`dir1`,`dir2`,`Localidad`,`cod_postal`,`provincia`,`pais`,`cond_iva`,`nro_cuit`,`ret_iva`,`ret_gan`,`ret_bru`,`contacto`,`tel`,`cel`,`fax`,`nextel`,`email`,`sector`,`contacto1`,`tel1`,`cel1`,`email1`,`sector1`,`contacto2`,`tel2`,`cel2`,`email2`,`sector2`,`lat`,`lon`,`c1`,`c2`,`c3`,`campos_reg`,`colmenas_reg`,`abrev`,`fecha_alta`,score.calidad FROM provedores as prod 
    LEFT JOIN scoring as score on prod.prov_id= score.productorID ".$where."ORDER BY $sidx $sord LIMIT $start , $limit";
    //echo $SQL;
    // $SQL = "SELECT * FROM provedores ".$where."ORDER BY $sidx $sord LIMIT $start , $limit"; 
    $result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
    $responce= new stdClass();
	$responce->page = $page;
    $responce->total = $total_pages;
    $responce->records = $count; 
    $i=0;
    while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
        $responce->rows[$i]['id']=$row['prov_id'];
        $responce->rows[$i]['cell']=array($row['prov_id'],$row['razon_social'],$row['c1'],$row['dir1'],$row['Localidad'],$row['provincia'],$row['contacto'],$row['email'],$row['tel'],$row['calidad'],""); 
        $i++;
    } 
    echo json_encode($responce);
?>