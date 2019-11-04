<?php
session_start();
require 'usuario.php';

$id = $_GET['id'];
// $modo = $_GET['modo'];
$largo = $_GET['largo'];

$usuario = new Usuario();

// $pantallasEnBD = array();

// $acceso   = ''; 
// $alta     = '';
// $baja     = '';
// $modifica = '';
// $orden    = '';
// $proceso  = '';

// 
// $pantallasEnBD = $usuario->acceso->getPantallas($id);
// $totalPantallas = count($vector);
// para no dejar dudas previamente borro todos los permisos anteriores antes de ingresar los nuevos permisos
// asi no tengo que diferenciar los que edito de los agrego
// for ($j=0; $j < $totalPantallas; $j++) { 
$usuario->acceso->eliminarAcceso($id);  
// }

$pantalla = array();
// recuperom los datos de todos los checkbox y los ordeno en nuevos vectores con clave valor corespondiente
$array = json_decode(stripslashes($_POST['data']));

for ($i=0,$id; $i < $largo; $i++){   

      // armo las claves para luego buscar los datos 
      $clave = 'pantalla'.$i; 
      $pantalla[$i] = $array[6]->$clave;

      $acceso   = "acceso".   $pantalla[$i];      
      $alta     = "alta".     $pantalla[$i];
      $baja     = "baja".     $pantalla[$i];
      $modifica = "modifica". $pantalla[$i];
      $orden    = "orden".    $pantalla[$i];
      $proceso  = "proceso".  $pantalla[$i];   
      
      // una vez obtenidas las claves agrego a cada vector su dato correspondiente; dejo ejemplos
      // $accesos[$acceso]     = $array[0]->$acceso; // ej1 : $array[0]->accesoClientes ej2: $array[0]->accesoProvedores
      // $altas[$alta]         = $array[1]->$alta;   // ej1 : $array[0]->altaClientes   ej2: $array[0]->altaProvedores
      // $bajas[$baja]         = $array[2]->$baja;
      // $modificas[$modifica] = $array[3]->$modifica;
      // $ordenes[$orden]      = $array[4]->$orden;
      // $procesos[$proceso]   = $array[5]->$proceso;
      
      // insert todos los nuevos elementos en la base de datos 
      //$usuario->acceso->cargarAcceso($id,$pantalla[$i],$accesos[$acceso],$altas[$alta], $bajas[$baja], $modificas[$modifica], $ordenes[$orden], $procesos[$proceso]);
      $usuario->acceso->cargarAcceso($id,$pantalla[$i],$array[0]->$acceso,$array[1]->$alta, $array[2]->$baja, $array[3]->$modifica,  $array[4]->$orden, $array[5]->$proceso);
      $usuario->acceso->agregarAccesos();            
}

$response->r = "correcto";
echo json_encode($response);