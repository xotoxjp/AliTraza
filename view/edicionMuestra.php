<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="fotos/chmiel.ico">  
    <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='plugins/css/jquery-ui-custom.css'/> 
    <link rel='stylesheet' type="text/css" href='css/edicionMuestra.css'/>
    <script src='plugins/js/jquery-1.11.1.js'></script>
    <script src='plugins/js/jquery.numeric.min.js'></script>         
    <script src="plugins/js/bootstrap.min.js"></script>
    <script src="plugins/js/bootbox.min.js"></script>
  </head>
 <body> 
  <div id="tambores_seleccionados">
    <h2>Análisis de Muestras</h2>
    <h4>Tambores Seleccionados</h4>
    <div id="analisis">
      <p>Fecha de Análisis <input type="date" id="fecha_analisis" tabindex="1">    
      </p>
      <div id="datos">    
        <table id="tablaAnaRestantes">        
        </table>
      </div>
        <div>
  <div>  
  <div id="botonera">                 
    <input type="button" class="boton" id="volver" value="Volver"/>
    <input type="button" class="boton" id="guardar" value="Guardar"/>     
    <input type="button" class="boton" id="exportarExcel" value="Exportar a Excel"/>          
  </div>   
   
   <div id="aviso">
   </div> 

  <div style="display:none" id="dialog" title="Aviso">Operación Exitosa!</div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Aviso</h4>
          </div>
          <div class="modal-body">
            <p>Operación Exitosa!</p>
          </div>
          <div class="modal-footer">
            <button type="button" id="modalClick"class="btn btn-default" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
    </div>
  </div>
  </body>
  <?
    $accion = $_GET["quiero"];
    echo "<input type='hidden' name ='' id ='accion' value=".$accion.">"; 
    $tam=$_GET["tambores"];
    echo "<input type='hidden' name ='' id ='tam' value=".$tam.">";
  ?>
  <script src="js/motorEdicionMuestra.js"></script>
</html>