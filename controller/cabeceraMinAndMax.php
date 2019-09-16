<?php
include("grid/config.php");
/*
$db = mysql_connect(localhost, root, root1234)
or die("Connection Error: " . mysql_error());
mysql_select_db(chmiel) or die("Error conecting to db.");
$SQL = 'SET character_set_results=utf8';
$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());
+/
/*********** declaracion de variables *********/ 
$array = array(); 
$cadena=$_GET["muestras"];
$vector=explode(",",$cadena);
$cantidad=count($vector);
$MAX = -1;
$MIN = 100;
for($i=0; $i< $cantidad; $i++){    
	$SQL1 = 'SELECT MIN(cod_analisis_id) AS minimo, MAX(cod_analisis_id) AS maximo FROM analisis 
	         WHERE id_tambor='.$vector[$i];
	$result1 = mysql_query( $SQL1 ) or die("Couldn t execute query.".mysql_error());
	$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
	    if (isset($row1["maximo"])){
	        if ($row1["maximo"] > $MAX){
		 	    $MAX=$row1["maximo"];		 	    		 	    
		    };
	    }
	    if(isset($row1["minimo"])){
	        if ($row1["minimo"] < $MIN){
		 	   $MIN=$row1["minimo"];		 	   		 	   
	 	    };
	 	}	 
	$SQL3 ='SELECT analitico_inf.cod_anal_id AS codigos,analitico_inf.nomencl AS titulos 
			FROM analitico_inf 
			INNER JOIN analisis ON analisis.cod_analisis_id = analitico_inf.cod_anal_id 
			WHERE  analisis.cod_analisis_id BETWEEN '.$MIN.' AND '.$MAX.'
			GROUP BY cod_anal_id
			ORDER BY cod_anal_id  ASC';
	//echo "$SQL3 <br>";
	$result3 = mysql_query( $SQL3 ) or die("Couldn t execute query.".mysql_error());
	$j=0;
	while($ANA_X = mysql_fetch_array($result3,MYSQL_ASSOC)){    
	    // $array contendra todos los nombre de los analisis
	    $array[$j]=$ANA_X;	    
	    $j++;
	};
} 
echo json_encode($array);
?>