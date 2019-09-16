<?php
    include("grid/config.php");
    $act="SELECT max( cod_anal_id ) FROM analitico_inf";
    $rs_validar = mysql_query($act,$cx_validar) ;
    while ($v_validar = mysql_fetch_array($rs_validar)){
        $cantidadAnalisis = $v_validar[0];    
    }
    echo "<h3 id='cabecera3'> CANTIDAD DE TIPOS DE ANALISIS ".$cantidadAnalisis."</h3>";
    $a1="SELECT cod_anal_id,nomencl FROM analitico_inf ORDER BY cod_anal_id"; //WHERE cod_anal_id < 13";
    $r1 = mysql_query($a1,$cx_validar);
    $i=0;
    while ($v1 = mysql_fetch_array($r1)){     
        //CHECK DESDE EL 1 AL 12 QUE SALE POR PATALLA
        // este if deja checked los analisis principales pero con posibilidad de cambio y los demas libres de eleccion
        if($v1[0] <= 4 ){
            echo '<label><input id="analisis'.$v1[0].'" type="checkbox"  name="ch[]" value="'.$v1[0].'" checked >'.$v1[0].'&nbsp'.$v1[1].'</label><br>';             
        }
        else{     
            echo '<label><input id="analisis'.$v1[0].'" type="checkbox" name="ch[]" value="'.$v1[0].'">'.$v1[0].'&nbsp'.$v1[1].'</label><br>';
        }       
        $i++; 
    }// fin while 
?>