<?php
//connect to your database
$db = mysql_connect("localhost", "root", "root1234")
or die("Connection Error: " . mysql_error());
mysql_select_db("chmiel") or die("Error conecting to db.");
$SQL = 'SET character_set_results=utf8';
$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());

$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends

$qstring = "SELECT c1 as value0, razon_social as value1, prov_id as id,  c2 as sala FROM provedores WHERE razon_social LIKE '%".$term."%' OR c1 LIKE '%".$term."%'";
$result = mysql_query($qstring);//query the database for entries containing the term

while ($row = mysql_fetch_array($result,MYSQL_ASSOC))//loop through the retrieved values
{
	$row['value0']=htmlentities(stripslashes($row['value0']));
	$row['value1']=htmlentities(stripslashes($row['value1']));
	$row['sala']=htmlentities(stripslashes($row['sala']));
	$row['id']=(int)$row['id'];
	$row['value']=$row['value0'].'-'.$row['value1'];
	$row_set[] = $row;//build an array
}
echo json_encode($row_set);//format the array into json data
?>