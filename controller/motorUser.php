<?
// actualizo la ultima entrada del usuario 
$last_ing = date("Y-m-d H:i:s");
$query = new Query();
$SQL=" UPDATE ".$_SESSION["tabla_acc"]." SET fec_ult_ut='$last_ing' ,prog_utl='abm.clientes'  WHERE id_usuario=".$_SESSION["id_usuario"] ;
$query->executeQuery($SQL);
?>