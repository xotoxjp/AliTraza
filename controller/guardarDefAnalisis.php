<?php
  include("grid/config.php");
  $a1="SELECT cod_anal_id,nomencl FROM analitico_inf WHERE cod_anal_id <= 21";
  $r1 = mysql_query($a1,$cx_validar); 
  /* lo dejo por las dudas que lo necesite */
  foreach( $_POST as $indice => $value){
    //echo "$indice : $value<br>";
    switch ($indice) {
    //case "alm_toma": $alm_toma = $value;
    //break;
    case "almacen_id": $almacen_id = $value;                
                      break;
    case "prioridad": $prioridad = $value;
                      break;
    case "fecha": $fecha = $value;
                      break;
    //case "hora": $hora = $value;
    //break;
    case "tamborescadena": $tamborescadena = $value;
                      break;  
    case "ch": $ch = $value;
                      break;                                        
    }        
  }
  $vector=explode(",",$tamborescadena);
  $cantidad=count($vector);
  //echo $cantidad+" de muestras";
  //print_r($vector);
  for ($i=0; $i < $cantidad; $i++) { // recorre cada tambor
    $adic=''; 
    for($j=0; $j < count($ch); $j++){// recorre cada analisis
       $sql1= " INSERT INTO analisis (id_tambor,cod_analisis_id,id_almacen_lab) VALUES (".$vector[$i].",".$ch[$j].",".$almacen_id.")";
       //echo "$sql1<br>";
       mysql_query($sql1,$cx_validar);
       //echo ' vector de analisis:  '.$ch[$j].'';
       //echo '<br>';
       if ($ch[$j]>=5) {
          $adic="contiene analisis adicionales";
       }
       //echo 'texto de ad: '.$adic.'';
       //echo '<br>';
    }
    $sql2 = "UPDATE laboratorio SET stat='LAB', observaciones='".$adic."', prioridad='".$prioridad."' WHERE id_tambor=".$vector[$i];
              
    //echo "$sql2<br>";
    mysql_query($sql2,$cx_validar);
    //echo "v : ".$vector[$i]."<br>";
  }  
 header("location: ../view/laboratorio.php");// ver como informar que se guardo correctamente!
?>