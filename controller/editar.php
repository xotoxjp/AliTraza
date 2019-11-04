<?php
 session_start(); 
 require 'usuario.php';
 $usuarioEspejo= new Usuario();
 $usuarioOtro = new Usuario();
 $usuarioOtro = $usuarioEspejo->buscarUsuario($_GET['id']); 
 $modo = $_GET['modo'];