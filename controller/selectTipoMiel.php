<?php

	//connect to your database
	$db = mysql_connect("localhost", "root", "root1234")
	or die("Connection Error: " . mysql_error());

	mysql_select_db("chmiel") or die("Error conecting to db.");
	
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