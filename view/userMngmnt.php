<?php
session_start();
include_once("../controller/funciones.php");
include("../controller/usuario.php");
include("../controller/motorUser.php");
?>
<!DOCTYPE HTML>
<html>
<head>
  <title> ADMINISTRADOR DE USUARIO </title>
  <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
  <meta name="viewpost" content="width=divace-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.min.css">  
  <link rel="stylesheet" type="text/css" href="css/admin-user.css">  
</head>
<body>
<div id='color'>
<h1>
  <center>
    <strong> ADMINISTRADOR DE USUARIOS <img src="images/users.png" alt="users" style="width:50px;height:50px"/></strong>
  </center>
</h1>
</div>
<div class='container'>
  <table id="tabla" class='table table-bordered'>  
    <th> ID </th><th>NOMBRE</th><th> E-MAIL </th><th> LOGIN </th><th> PASSWORD </th><th> ULTIMA ENTRADA</th>
  <?php
    $usuario = new Usuario();
    $vecUsuario = $usuario->listarUsuarios();     
    $largo = count($vecUsuario);             
    for ($i=0; $i < $largo; $i++) { 
  ?>   
    <tr id='fila<?php echo $i; ?>'>      
      <td><?php echo $vecUsuario[$i]->getId() .               "</br>"; ?></td>           
      <td><?php echo $vecUsuario[$i]->getNombre() .           "</br>"; ?></td>   
      <td><?php echo $vecUsuario[$i]->getEmail() .            "</br>"; ?></td>
      <td><?php echo $vecUsuario[$i]->getLogin() .            "</br>"; ?></td>
      <td><?php echo $vecUsuario[$i]->getPass() .             "</br>"; ?></td>    
      <td><?php echo $vecUsuario[$i]->getUltimaEnt() .        "</br>"; ?></td>
    </tr>
    <?php
     }
    ?> 
  </table>  
</div>
<div class ='botonera'>    
  <input class='btn' type='button' id='volver' name='volver'  value='volver'/>
  <input class='btn btn-primary' type='button' id='nuevo' name='nuevo'  value='nuevo'/>
  <input class="btn btn-primary" type='button' id='editar' name='editar' value='editar'/>  
  <input class='btn btn-primary'  type='button' id='eliminar' name='elimnar' value='eliminar'/>  
</div>
<?php
  // archivo externo para el modal; muy requerido por varias páginas
  //include("userModal.php");
?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" >
   <div class="modal-dialog modal-lm">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Aviso</h4>
          </div>
          <div class="modal-body">
              <p id="par1"></p>
          </div>
          <div class="modal-footer">
              <button type="button" id="modalClick" class="btn btn-default" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
    </div>
</div>
</body>
<script src='plugins/js/jquery-1.11.1.js'></script>
<script src="plugins/js/bootstrap.min.js"></script>  
<script src="js/admin-user.js"></script>  
</html>