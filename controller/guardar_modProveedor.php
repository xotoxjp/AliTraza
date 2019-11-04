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
    $fecha_ini = ($val->fecha_ini); 
    $razon = ($val->razon);
    $renapa = ($val->renapa);// en la base es c1 ojo!
    $c2 = ($val->c2);// en la base indica el renapa  
    $dir1 = ($val->dir1);
    //$dir2 =($val->dir2)
    //$lon = ($val->lon);
    //$lat = ($val->lat);
    $localidad = ($val->localidad);
    $cod_postal = ($val->cod_postal);
    $provincia =($val->provincia); 
    $pais = ($val->pais);
    $contacto =($val->contacto); 
    $tel =($val->tel); 
    $cel = ($val->cel);
    $nextel = ($val->nextel); 
    $email = ($val->email);
    $fax = ($val->fax);
    $contacto1 =($val->contacto1);
    $tel1 = ($val->tel1);
    $cel1 = ($val->cel1);
    $email1 = ($val->email1);
    $cond_iva = ($val->cond_iva);
    $nro_cuit = ($val->nro_cuit);
    $ret_iva = ($val->ret_iva); 
    $ret_bru = ($val->ret_bru);
    $ret_gan = ($val->ret_gan);
    $cliente_edit = ($val->cliente);              	

// datos que quizas se agreguen a  set :  dir2="'.$dir2.'", lon="'.$lon.'", lat="'.$lat.'", 
if($accion=="edit"){        
    $SQL = 'UPDATE provedores 
		    SET razon_social="'.$razon.'", c1="'.$renapa.'", c2="'.$c2.'", fecha_alta="'.$fecha_ini.'", cond_iva="'.$cond_iva.'", nro_cuit= "'.$nro_cuit.'",ret_iva="'.$ret_iva.'", ret_bru="'.$ret_bru.'", ret_gan="'.$ret_gan.'", dir1="'.$dir1.'",localidad="'.$localidad.'", cod_postal="'.$cod_postal.'", provincia="'.$provincia.'", pais="'.$pais.'", contacto="'.$contacto.'",tel="'.$tel.'", cel="'.$cel.'", nextel="'.$nextel.'", email="'.$email.'", fax="'.$fax.'",contacto1="'.$contacto1.'",tel1="'.$tel1.'",cel1="'.$cel1.'", email1="'.$email1.'"
		    WHERE prov_id = "'.$cliente_edit.'"';
}
else{
    $SQL = "INSERT INTO provedores (prov_id,razon_social, c1, c2, fecha_alta, cond_iva, nro_cuit ,ret_iva, ret_bru, ret_gan, dir1, localidad, cod_postal, provincia, pais, contacto,tel, cel, email, fax, nextel, contacto1, tel1, cel1, email1)
            VALUES ('$cliente_edit','$razon', '$renapa', '$c2', '$fecha_ini', '$cond_iva','$nro_cuit','$ret_iva','$ret_bru','$ret_gan', '$dir1', '$localidad','$cod_postal','$provincia','$pais','$contacto','$tel','$cel','$email','$fax','$nextel','$contacto1','$tel1','$cel1','$email1')";
}
    
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

//guardado en tabla de scoring
//	scoreID	productorID	cantAprobados	cantNoAprobados	score	calidad
$SQL= "INSERT INTO scoring (productorID,cantAprobados,cantNoAprobados,score,calidad)VALUES('$cliente_edit',0,0,0,'C')";
$result =mysql_query($SQL) or die("Couldn't execute query.".mysql_error());

echo json_encode($response);


}
?>