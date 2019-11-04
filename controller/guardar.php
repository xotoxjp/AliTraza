<?php
session_start();
require 'usuario.php';
$usuario = new Usuario();
$array	= json_decode(stripslashes($_POST['data']));

//print_r($array);
foreach($array as  $key => $val) {
    $id        = $val->id;
    $nombre    = $val->nombre;
    $login     = $val->login; 
    // $ultimaEnt = $val->ultima;
    $email     = $val->email;
    $pass      = $val->pass;
    // $nivel     = $val->nivel;
}

if($_GET['modo']=='NUEVO'){    
   $usuario->cargarUsuario($id, $nombre, $email, $login, $pass,'abcdefghijklmnopqrstuvwxy','','','','Botones');        
   $usuario->agregarUsuario();
   // $response->modo = $modo;
   $response->NUEVO = 'INGRESADO';    
}
if($_GET['modo']=='EDIT'){ 	
   $modo = $usuario->editarUsuario($id, $nombre, $email, $login, $pass,'abcdefghijklmnopqrstuvwxy','','','','Botones');
   // $response->modo = $modo;    
   $response->EDIT = 'EDITADO';    
} 

echo json_encode($response);    