<?php
    include("grid/config.php");
    $a2="SELECT prioridad FROM  prioridad";
    $r2 = mysql_query($a2,$cx_validar);
    echo '<select name="prioridad" id="prioridad">';
    while ($v2 = mysql_fetch_array($r2)){ 
    echo  "<option value="."'".$v2[0]."'";
    if (($prioridad==$v2[0]) or (strlen($prioridad)==0)){
        echo ' SELECTED ';
        $prioridad=$v2[0];
    }
    echo '>'.$v2[0].'</option>'; 
    } 
    echo '</select>';
?>