<?php
include("grid/config.php");

$productorA;
$resultadoA;
$cantA;
$score;

$traerAnalisis = "SELECT id_productor,resultado,count(*) FROM laboratorio WHERE resultado<>' ' GROUP BY id_productor,resultado";
$SQLana= mysql_query($traerAnalisis) or die("Couldn't execute query.".mysql_error());
while ($v = mysql_fetch_array($SQLana)){
    $productorB=$v[0];
    $resultadoB=$v[1];
    $cantB=$v[2];
    //si es la primera fila
    if ($productorA==null) {
        $productorA=$productorB;
        $resultadoA=$resultadoB;
        $cantA=$cantB;
    }else{
        if($productorB==$productorA){
            if($cantB>$cantA){
                //echo 'pe '.$productorB;
                if($resultadoB=="cumple"){
                   $score='A';
                }else{
                   $score='C';
                }
                $productorA=null;
                $resultadoA=null;
                $cantA=null;
            }elseif($cantB<$cantA){
                //echo 'ju '.$productorB;
                if($resultadoB=="no cumple"){
                    $score='A';
                    //echo $score;
                }else{
                    $score='C';
                    //echo $score;
                }
                $productorA=null;
                $resultadoA=null;
                $cantA=null;
            }else{
                //echo 'ad '.$productorB;
                $score='B';
                $productorA=null;
                $resultadoA=null;
                $cantA=null;
            }
        }
        if($score<>" "){
            //echo"el score vino con valor ".$score;
            $cambioScore="UPDATE scoring SET calidad ='$score' WHERE productorID = ".$productorB;
            $SQL= mysql_query($cambioScore) or die("Couldn't execute query.".mysql_error());

        }
        
    }
}
//header("Location: ../view/menu_1b.php")
?>