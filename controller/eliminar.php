<?php
session_start();
include_once("funciones.php");
require 'usuario.php';
$usuario = new Usuario();

$id = $usuario->eliminarUsuario($_GET['id']); 

// esto es para mantener el autoincremet controlado
$SQL_MAX  = 'SELECT MAX(id_usuario) FROM usuario';
$query1 = new Query();
$query1->executeQuery($SQL_MAX);
$ID_MAX = $query1->fetchAll();

$SQL_AUTO = 'ALTER TABLE usuario AUTO_INCREMENT ='.$ID_MAX[0][0];
$query2 = new Query();
$query2->executeQuery($SQL_AUTO);

echo json_encode($ID_MAX); 