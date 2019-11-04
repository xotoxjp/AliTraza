<?php
session_start();
require 'usuario.php';
$usuarioEspejo= new Usuario();
$usuarioOtro = new Usuario();
$id = $_GET['id'];
$modo = $_GET['modo'];

if(isset($id)){
   $usuarioOtro = $usuarioEspejo->buscarUsuario($id); 
}
//*****************************

$query = new Query();
$SQL = "SELECT MAX(id_usuario) FROM usuario";
$query->executeQuery($SQL);
$row = $query->fetchAll();
// este id es el siguiente aunque aun NO SE HALLA GUARDADO
// puedo mostrar cual es el siguiente usuario que se va a guardar
$id=$row[0][0] + 1;
