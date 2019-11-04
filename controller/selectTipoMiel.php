<?php
  	include("grid/config.php");
	$SQL = 'SET character_set_results=utf8';
	$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());
	$id = $_GET['mielId'];
	$sql = 'SELECT * FROM tipo_campo WHERE tipo_campo_id = ' . (int)$id;
	$result = $db->query($sql);
	$json = array();
	while ($row = $result->fetch_assoc()) {
	  $json[] = array(
	    'id' => $row['mielId'],
	    'name' => $row['tipoCampo'] // Don't you want the name?
	  );
	}
	echo json_encode($json);
?>