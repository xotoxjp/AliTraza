<?php
include("grid/config.php");

$tambor = $_GET["tam"];
$fechaAnalisis = $_GET["fecha"];


function chequearRango($valHMF,$valHUME,$valAC){
	echo " hmf es: $valHMF ";
	echo " acid es: $valAC ";
	echo " humed es: $valHUME ";

	//*************************************LIMITES********************************************************************//

	$traerLimitesHMF= 'SELECT esp_inf, esp_sup FROM analitico_inf WHERE cod_anal_id=1';
	$limitHMF =mysql_query($traerLimitesHMF) or die("Couldn't execute query.".mysql_error());
	while ($v = mysql_fetch_array($limitHMF)){
	  $hmfINF=$v[0];
	  $hmfSUP=$v[1];
	  //echo $hmfINF;
	  //echo $hmfSUP;
	}
	$traerLimitesHUMEDAD= 'SELECT esp_inf, esp_sup FROM analitico_inf WHERE cod_anal_id=3';
	$limitHUMEDAD =mysql_query($traerLimitesHUMEDAD) or die("Couldn't execute query.".mysql_error());
	while ($v = mysql_fetch_array($limitHUMEDAD)){
	  $humedadINF=$v[0];
	  $humedadSUP=$v[1];
	  //echo $humedadINF;
	  //echo $humedadSUP;
	}
	$traerLimitesACID= 'SELECT esp_inf, esp_sup FROM analitico_inf WHERE cod_anal_id=4';
	$limitACID =mysql_query($traerLimitesACID) or die("Couldn't execute query.".mysql_error());
	while ($v = mysql_fetch_array($limitACID)){
	  $acidINF=$v[0];
	  $acidSUP=$v[1];
	  //echo $acidINF;
	  //echo $acidSUP;
	}

	//*************************************LIMITES********************************************************************//
	$valido="no cumple";
	$pass1="false";
	$pass2="false";
	$pass3="false";
	if ($valHMF>=$hmfINF and $valHMF<=$hmfSUP) {
		$pass1="true";		
		if ($valHUME>=$humedadINF and $valHUME<=$humedadSUP){
			$pass2="true";			
			if ($valAC>=$acidINF and $valAC<=$acidSUP){
				$pass3="true";
				$valido="cumple";
			}
		} 
	}	
	$resultado=$valido;
	//echo "valido es: $valido";
	//echo "pass es: $pass1";
	//echo "pass es: $pass2";
	//echo "pass es: $pass3";
	return $resultado;
}; 

//Recibimos el Array y lo decodificamos desde json, para poder utilizarlo como objeto
$array 	= json_decode(stripslashes($_POST['data']));
//print_r($array);
 $codigoAnalisis = array();
 $tambores = array();
 // es la variable  que voy usar en el sql para cambiar las muestras
 $a=0;

foreach($array as  $key => $val) { 

	if($key==0){
		// cargo datos adicionales utilizados en los siguientes IF
		// y que me serviran para las condiciones corte en cada FOR 
        $columnas = $val->columnas;		    
        $filas =  $val->filas;		     
	}
    if($key==1){
       //cargo los tambores 
	   for($j=0; $j<$filas; $j++){
	   	   $tambores[$j] = $val->$j;     
	       //echo $tambores[$j]."<br>";
	   }
	} 
    
    if($key==2){
		//cargo loscodigo de analisis
	   for($j=0; $j<$filas; $j++){
	   	   $conclusion[$j] = $val->$j;     
	       //echo $conclusion[$j]."<br>";
	   }	   
	}

	if($key==3){
		//cargo loscodigo de analisis
	   for($j=0; $j<$columnas; $j++){
	   	   $codigoAnalisis[$j] = $val->$j;     
	       //echo $codigoAnalisis[$j]."<br>";
	   }	
	}  
	
	if($key > 3){
       // cargo los resultados 

       for($j=0; $j<$columnas; $j++){
	   	   $resultado[$j] = $val->$j;     
	       //echo $resultado[$j]."<br>";
	   }

        // va entrar la cantidad que tenga de muestras y luego es recorrido segun su analisis y su resultado
        // luego la variable $a declarada al comienzo del foreach es incrementada para la siguiente muestra 
            
        for($i=0; $i<$columnas; $i++){
        
           $SQL = 'UPDATE analisis SET resultado ="'.$resultado[$i].'" 
           WHERE (id_tambor ="'.$tambores[$a].'" AND cod_analisis_id ="'.$codigoAnalisis[$i].'")';
           //echo $SQL."<br>";
		   $result =mysql_query($SQL) or die("Couldn't execute query.".mysql_error());

        
        }//fin for interno        
        $a++;  
	            
	}// fin if $key 

}// fin for each    

    // actualizo los resultados para cada muestra en la tabla labortorio

	// for($t=0; $t<$filas; $t++){         
 //          $SQL2 = 'UPDATE laboratorio SET resultado="'.$conclusion[$t].'" WHERE id_tambor ="'.$tambores[$t].'"';
	//       //echo $SQL2."<br>";
 //          $result =mysql_query($SQL2) or die("Couldn't execute query.".mysql_error());
 //    }   

	// }//fin for
    
    // IDEA : como la tabla de analisis va actualizarse en la query de arriba ya voy a tener los datos disponibles 
    // en la base y con esos datos actualizo la tabla de laboratorio atendiendo el correspondiente codigo de analisis
   
   for($j=0; $j<$filas; $j++){
	    
	    $SQL3='SELECT cod_analisis_id, resultado FROM analisis 
	           WHERE id_tambor = "'.$tambores[$j].'" AND cod_analisis_id BETWEEN 1 AND 4 GROUP BY cod_analisis_id';
	    
	    $result =mysql_query($SQL3) or die("Couldn't execute query.".mysql_error());
	    
	    // en el caso de que la consulta resulte vacia no realiza nada, ya que no habria nada para actualizar
	    if($result!=0){

	        while($row = mysql_fetch_array($result)){
	          
		        if($row[0]==1){
		            $hmf=$row[1];
		            //echo "hmf : ".$hmf."<br>";
		        }
		        //
		        if($row[0]==2){
		            $color=$row[1];
		            //echo "color : ".$color."<br>";
		        }
		        //
		        if($row[0]==3){
		            $humedad=$row[1];  
		            //echo "humedad : ".$humedad."<br>";
		        }		        
		        //
		        if($row[0]==4){
		            $acidez=$row[1];
		            //echo "acidez : ".$acidez."<br>";
		        }
	        
	        }//fin while
        
        // ojo!!! el resultado de esta consulta corresponde a la tabla de laboratorio 
	    $resultado = chequearRango($hmf,$humedad,$acidez);    
        echo"resultado es : ".$resultado;
        $SQL4= 'UPDATE laboratorio SET fecha_analisis ="'.$fechaAnalisis.'" ,resultado="'.$resultado.'" , hmf="'.$hmf.'" , humedad="'.$humedad.'", color="'.$color.'", acidez="'.$acidez.'"
                WHERE id_tambor = "'.$tambores[$j].'" ';
        //echo"$SQL4";
        $result =mysql_query($SQL4) or die("Couldn't execute query.".mysql_error());       
        
        $SQL5= 'INSERT INTO labohistorico (fecha_analisis,id_tambor,resultado,hmf,humedad,color,acidez) 
        	VALUES ("'.$fechaAnalisis.'","'.$tambores[$j].'","'.$resultado.'","'.$hmf.'","'.$humedad.'","'.$color.'","'.$acidez.'")';
        //echo"$SQL5";
        $result =mysql_query($SQL5) or die("Couldn't execute query.".mysql_error());
	    }
    } 

?>