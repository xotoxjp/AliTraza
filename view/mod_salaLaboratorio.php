<?php
session_start();
include_once("../controller/funciones.php");
include("../controller/controllerModSalaLabo.php");
?>

<html>
	<head>   	
   	<? echo '<TITLE>Editando Laboratorio '.$almacen_id.'</TITLE>';?>
   	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="plugins/js/jquery-1.11.1.js"></script>
    <link rel="stylesheet" href="plugins/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo_mod_prov.css">
	</head>

	<body>

  <form id="idFormulario" name='formulario'>
    <div id="general">

    <h1 id="titulo">DATOS LABORATORIO <? echo "$almacen_id"; ?> </h1>
    
    <div id="contenedor1Laboratorio"> 
        <label class="control-label col-sm-2" for="razon">Nombre:</label>
        <input id='razon' name='nombre' type='text' class='form-control' value='<?echo$nombre?>' size='50' maxlength='50' required/><br>
        <label class="control-label col-sm-2" for="senasa">Habilitación de SENASA:</label>
        <input name='hab_senasa' type='text' class='form-control' id='senasa' value='<?echo$hab_senasa?>'  size='20' maxlength='20' />
        <label class="control-label col-sm-2" for="dir1">Dirección:</label>
        <input name='dir1' type='text' class='form-control' id='dir1'  value='<?echo$dir1?>' size='50' maxlength='50' required />
      <?
        
        
        
        echo"<p>LOCALIDAD&nbsp;<input name='localidad' type='text' id='localidad' class='form-control' value='$localidad'  size='30' maxlength='30' />&nbsp;&nbsp;";
		    echo"C&Oacute;DIGO POSTAL&nbsp;<input name='cod_postal' type='text'class='form-control' id='cod_postal'  value="."'".$cod_postal."'"."  size='8' maxlength='10' /></p>";  		   
        echo"PROVINCIA&nbsp;<input name='provincia' type='text' id='provincia'class='form-control'  value='$provincia'  size='20' maxlength='20' required />";
		    echo"&nbsp;&nbsp;PAIS&nbsp;<input name='pais' type='text' id='pais'class='form-control' value='$pais'  size='20' maxlength='20' /></p>";
      ?>  
    </div><!-- fin contenedor1Exportador -->     
    <br>  
    <h4> <img id="abrir_contenedor3" src="images/desplegar0.png"/> DATOS ADICIONALES</h4>
    <div id="contenedor3">
      <?
        // comienzo de los datos adicionales 
        echo"<p>CONTACTO&nbsp;<input name='contacto1' type='text' id='contacto1'  value='".$contacto1."' size='30' maxlength='30' />";
        echo"&nbsp;&nbsp;TELEFONO&nbsp;<input name='tel1' type='text' id='tel1'  value='".$tel1."' size='15' maxlength='15' /></p>";
        
        echo"<p>CELULAR&nbsp;<input name='cel1' type='text' id='cel1' value="."'".$cel1."'"."  size='15' maxlength='15' />";
        echo"&nbsp;&nbsp;EMAIL&nbsp;<input name='email1' type='text' id='email1' value="."'".$email1."'"."  size='12' maxlength='30' /></p>";
     ?> 
    </div><!--fin contenedor3-->
    <br>
    <h4> DATOS FISCALES </h4> 
    <div id="contenedor4Exportador">
    <?
       /* agregue esta llamada a BD para habilitar el selector de tipo de iva ya que sin ella quedaba indefinido 10-11-2014 */
        $actualizar1="select cod_iva from  ".$_SESSION["tabla_iva"]." where cod_iva<>"."'".$cond_iva."'" ;
        $rs_validar1 = mysql_query($actualizar1,$cx_validar); 
        /* fin llamada a BD para habiilitar el selector de tipo de iva */
        echo  '<p id="datosFiscales">&nbsp;&nbsp;&nbsp;CONDICI&Oacute;N DE IVA:'."&nbsp";
        echo  '<select class="btn dropdown-toggle" name="cond_iva" id="cond_iva">';
        echo  "<option value=".$cond_iva.">".$cond_iva."</option>";
        while ($v_validar1 = mysql_fetch_array($rs_validar1)){
          if ($v_validar1[0]==$cond_iva){
            echo "<option value=".$v_validar1[0]." selected >".$v_validar1[0]."</option>";
          }
          else {
            echo  "<option value="."'".$v_validar1[0]."'>".$v_validar1[0]."</option>"; 
          }
         }
         echo  "&nbsp;".'N&uacute;mero  de Cuit:'."&nbsp";
         echo "<input name='nro_cuit' id='nro_cuit' type='text'  value='$nro_cuit'  size='13' maxlength='13' />";
      ?>    
    </div><!--fin contenedor4 -->   	
    
    <h4> <img id="abrir_contenedorHORA" src="images/desplegar0.png"/> HORARIOS DE ATENCI&Oacute;N </h4>
      
    <div id="contenedorHORA">
       <?
        echo"HORARIO 1<input name='hor1' type='text' id='hora1'  value='".$hor1."' size='50' maxlength='40'>";
        echo"&nbsp;&nbsp;HORARIO 2<input name='hor2' type='text' id='hora2'  value='".$hor2."' size='50' maxlength='40'>";
       ?> 
    </div>  <!-- fin contenedor hora -->
      
    <br>
    <div id="contenedor5"> 
      <button id="btnvolver" class="btn" name="volver" value"volver">VOLVER</button>
      <button id="btnguardar" class="btn" name="guardar" value"guardar">GUARDAR</button>
      <!--button id="btnimprimir" name="imprimir" value"imprimir">IMPRIMIR</button-->        
    </div><!--fin contenedor5 -->  
 
	</div><!--fin contenedor general -->
</form>   
  
  <?
    // este dato del $tipo_almacen lo seteo fijo, ya que si no lo tiene la tabla no recoge nada
    // porque la condicion where toma los datos segun tipo de almacen
    $tipo_almacen = 2;
    echo "<input id='tipo_almacen' type='hidden' name='' value='".$tipo_almacen."'>";   
    echo "<input id='almacen_id' type='hidden' name='' value='".$almacen_id."'>";  
    
    // solo funciona si se edita el archivo
    if($edit=="edit"){
     echo "<input id='accion' type='hidden' name='' value='edit'>";
    }
    // solo funciona si es nuevo el archivo
    if ($agrego_almacen=="si"){
      echo "<input id='accion' type='hidden' name='' value='nuevo'>";        
    }

  ?>    
	</body>
  <script src="js/botoneraSalaLaboratorio.js" type="text/javascript"> </script>     
</html>