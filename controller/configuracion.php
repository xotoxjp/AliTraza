<?php
session_start();
require 'usuario.php';
$usuario = new Usuario();

$id = $_GET['id'];
$modo = $_GET['modo'];
// vectores contenedores de datos de manera individual 

$pantalla = array();   
$acceso   = array();  
$alta     = array();  
$baja     = array(); 
$modifica = array();

// en el vectro permisos se va contener  todos los accesos 
$permisos = $usuario->acceso->buscarAcciones($id);
$largo = count($permisos);

for ($i=0; $i < $largo; $i++) { 
   $ID[$permisos[$i]['pantalla']]       = $permisos[$i]['id_usuario'];
   $pantalla[$permisos[$i]['pantalla']] = $permisos[$i]['pantalla'];
   $acceso[$permisos[$i]['pantalla']]   = $permisos[$i]['acceso'];
   $alta[$permisos[$i]['pantalla']]     = $permisos[$i]['alta'];
   $baja[$permisos[$i]['pantalla']]     = $permisos[$i]['alta'];
   $modifica[$permisos[$i]['pantalla']] = $permisos[$i]['baja'];
   $orden[$permisos[$i]['pantalla']]    = $permisos[$i]['orden'];
   $proceso[$permisos[$i]['pantalla']]  = $permisos[$i]['proceso'];

}
require '../view/configuracion.php';