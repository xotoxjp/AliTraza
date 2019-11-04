<?php
include("grid/config.php");
$SQL = 'SET character_set_results=utf8';
$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());
//Recibimos el Array y lo decodificamos desde json, para poder utilizarlo como objeto
$accion = $_GET["accion"];
$array = new stdClass();
$array = json_decode(stripslashes($_POST['data']));
//print_r($array);
//por cada uno de estos arrays vamos a crear una query para poder hacer un update en la base de datos. y para eso necesitamos recorrer el array por cada uno de sus posiciones
foreach($array as  $key => $val) { 
  //echo "$key : $val->fecha_ini";
  //una vez que recorremos cada posición entramos a esta donde tenemos cada array con la información necesaria para el update
    $razon = ($val->razon);
    $senasa = ($val->senasa);
    $localidad = ($val->localidad);
    $cod_postal = ($val->cod_postal);
    $provincia =($val->provincia); 
    $pais = ($val->pais);    
    $almacen_id = ($val->almacen);
    $tipo_almacen = ($val->tipo_almacen);                
// datos que quizas se agreguen a  set :  dir2="'.$dir2.'", lon="'.$lon.'", lat="'.$lat.'", 
if($accion=="edit"){        
    $SQL = 'UPDATE almacenes 
        SET razon_social="'.$razon.'", Localidad="'.$localidad.'", cod_postal="'.$cod_postal.'", provincia="'.$provincia.'", pais="'.$pais.'", hab_senasa="'.$senasa.'"
        WHERE almacen_id = "'.$almacen_id.'"';
}
else{
    $SQL = "INSERT INTO almacenes (almacen_id,razon_social, Localidad, cod_postal, provincia, pais,tipo_almacen, hab_senasa)  
            VALUES ('$almacen_id','$razon','$localidad','$cod_postal','$provincia','$pais','$tipo_almacen','$senasa')";
}
echo $SQL;   
//echo $SQL;
//EJECUCIÓN DE QUERYS CREADAS.
$result =mysql_query($SQL) or die("Couldn't execute query.".mysql_error());
$response = new stdClass();
if($result){
   $response->mensaje = "todo OK!";
}
else{
   $response->mensaje = " errorrrr verifique";
}
echo json_encode($response);
}
?>