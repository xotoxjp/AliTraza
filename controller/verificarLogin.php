<?php
 session_start();
 include_once("funciones.php");
 require 'usuario.php';
 
 $usuario = new Usuario();
 $response->r = $usuario->verificarLogin($_GET['login']); 
 
 echo json_encode($response);