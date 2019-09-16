<?php
    include("grid/config.php");
    $a="SELECT almacen_id,razon_social,dir1,localidad FROM  almacenes WHERE tipo_almacen=2" ;
    $r1 = mysql_query($a,$cx_validar);
    ?>
    <select name="almacen_id" id="almacen_id"> 
    <?
    while ($v1 = mysql_fetch_array($r1)){ 
        echo  "<option value="."'".$v1[0]."'";
        if ($almacen_id==0) {
        echo ' SELECTED ';
        $almacen_id=$v1[0];
        }
        echo ">".$v1[0].'-'.$v1[1].'-'.$v1[2].'-'.$v1[3].'-'."</option>";
    }
    echo '</select>';
?>