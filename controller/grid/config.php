<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'chmiel');
define('DB_USER','root');
define('DB_PASSWORD','root1234');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("No se Establecer la conexion: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Fallo al conectar con la Base de Datos: " . mysql_error());
?>