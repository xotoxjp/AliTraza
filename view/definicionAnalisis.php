<?php
include("../controller/controllerdefinicionAnalisis.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Laboratorio</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/matraz.jpg">  
  <link rel="stylesheet" href="css/definicionAnalisis.css">
  <script src="plugins/js/jquery-1.11.1.js"></script>
  <script src="plugins/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="afuera">
    <h2 id="cabecera2">MUESTRAS SELECCIONADAS</h2>
  </div>
  
  <form class="miform"  method="POST" action="../controller/guardarDefAnalisis.php">  
    <div id="general">
      <h2 id="cabecera2">DEFINICI&Oacute;N DE ANALISIS</h2>
      <div id="contenedor1" >   
        <br><br><b id="titulo">LUGAR DE INSPECCI&Oacute;N</b>
        <?php
          include("../controller/definicionAnalisisLugarInspeccion.php");
        ?> 
      </div><!-- contenedor1 -->
      <div id="contenedor2">
        <img src="images/microscopio.jpg" alt="microscopio">
        <div id="tituloeleccion"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Datos de Env&iacute;o&nbsp;</b></div><br><br>
          <b>Fecha:&nbsp;<input type="date" name="fecha" /></b><br><br>   
          <br><br> 
          <!-- prioridad -->
          <br><div id="prioridad">
          <b>Prioridad:</b>
          <?php
            include("../controller/controllerdefinicionAnalisisPrioridad.php");
          ?>
          <br><br>
        </div><!--prioridad-->
        <!-- operador --> 
        <br>
        <div id="quienOp">
        </div> 
      </div><!--  fin contenedor2 -->
      <div id="contenedor3">
        <div id="btneleccion">
          <br><div id="tituloeleccion"><b>AN&Aacute;LISIS PARA LAS MUESTRAS</b></div><br>
          <button type="button" id="todos" class="btn" value="">TODOS</button>
          <button type="button" id="ninguno" class="btn" value="">NINGUNO</button>
          <button type="button" id="principales" class="btn" value="">AN&Aacute;LISIS PRINCIPALES</button>
        </div>
        <!-- col1 -->  
        <div id="col1">
          <?php
            include("../controller/controllerdefinicionAnalisisTipos.php");
          ?>
        </div>
        <!-- fin col1 -->
        <!-- col1 -->
        <!-- <div id="col2"> -->   
      </div>  
      <!-- fin contenedor3 --> 
      <?php
        /*agrego esta parte de php para poder enviar los tambores que luego seran guardados*/
        echo '<input id="cadena" type="hidden" name="tamborescadena" value="'.$cadena.'">';
      ?>
      <br>
      <div id="accion">
        <a href="laboratorio.php"><button type="button" class="btn" title="volver">VOLVER</button></a>
        <button id="procesa" class="btn" value="procesa">PROCESA</button>
      </div>
    </div><!--fin general-->
    <!-- mecanismo de los botones -->
    <script src="js/motorDefinicionAnalisis.js"></script>
  </form>
</body>
</html>