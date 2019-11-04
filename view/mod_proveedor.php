<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include_once("../controller/funciones.php");
include("../controller/controllerModProductor.php")
?>

<html>
	<head>   	
   	<? echo '<TITLE>Editando el Productor '.$prov_id.'</TITLE>';?>
   	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="fotos/chmiel.ico">    
    <script src="plugins/js/jquery-1.11.1.js"></script>    
    <link rel="stylesheet" href="css/estilo_mod_prov.css">
	</head>

	<body>

  <form id="idFormulario" name='formulario'>
	    <div id="general">

	    <h1 id="titulo">DATOS DEL PRODUCTOR <? echo "$prov_id"; ?> </h1>
        
        <div id="contenedor1">  
			    <?
            echo "<p id='fecha'>FECHA DE ALTA:<input type='date' name='fecha_ini' id='fecha_ini' value='".$fecha_ini."' placeholder ='al Sistema'/></p>";                    
            echo "NOMBRE PRODUCTOR:<input id='razon' name='nombre' type='text'  value='$nombre' size='50' maxlength='50' required/>";
  	        echo "&nbsp;&nbsp;RENAPA:<input name='c1' type='text' id='renapa'  value='$c1' size='13' maxlength='13' required />";
    		    
            echo"<p>SALA DE EXTRACCIÓN:";
            
            /* $cx_validar = mysql_pconnect("localhost","root","root1234");
            mysql_select_db("chmiel"); */
            $actualizar1="SELECT razon_social FROM almacenes WHERE tipo_almacen=1 ORDER BY razon_social" ;
            $rs_validar1 = mysql_query($actualizar1,$cx_validar);

            echo '<select name="c2" id="c2">';
            while ($v_validar1 = mysql_fetch_array($rs_validar1)){
              echo  '<option value='.$v_validar1[0];
              if ($v_validar1[0]==$c2){
                echo ' SELECTED ';
                $c2=$v_validar1[0];
                //echo " $c2 ";
              }
              echo '>'.$v_validar1[0].'</option>'; 
            }
            echo '</select></p> ';// fin datos de sala de ext

            echo "<p>DIRECCI&Oacute;N: <input name='dir1' type='text' id='dir1'  value='$dir1' size='50' maxlength='50' required /></p>";
  			    echo"<p>LOCALIDAD <input name='localidad' type='text' id='localidad'  value='$localidad'  size='30' maxlength='30' />&nbsp;&nbsp;";
  			    echo"&nbsp;&nbsp;C&Oacute;DIGO POSTAL&nbsp;<input name='cod_postal' type='text' id='cod_postal'  value="."'".$cod_postal."'"."  size='8' maxlength='10' /></p>";  		   
            echo"PROVINCIA<input name='provincia' type='text' id='provincia'  value='$provincia'  size='20' maxlength='20' required />";
  			    echo"&nbsp;&nbsp;PAIS<input name='pais' type='text' id='pais' value='$pais'  size='20' maxlength='20' /></p>";
  	      ?>			
			</div>
      <!-- fin contenedor 1 -->
      <h4><img id="abrir_contenedor2" src="images/desplegar0.png"/> DATOS ADICIONALES </h4>

      <div id="contenedor2">
        <?
           // comienzo de los datos adicionales
          echo"<p>Contacto&nbsp;<input name='contacto' type='text' id='contacto'  value='$contacto' size='50' maxlength='80' />";          
          echo"&nbsp;&nbsp;Telefono&nbsp;<input name='tel' type='text' id='tel'  value='$tel' size='30' maxlength='30' /></p>";

          echo"<p>Celular&nbsp;<input name='cel' type='text' id='cel' value='$cel'  size='15' maxlength='15' />";
          echo"&nbsp;&nbsp;Nextel&nbsp;<input name='nextel' type='text' id='nextel' value='$nextel'  size='10' maxlength='30' /></p>";

          echo"<p>&nbsp;&nbsp;email&nbsp;<input name='email' type='text' id='email'  value='$email' size='50' maxlength='80' />";
          echo"&nbsp;&nbsp;Fax<input name='fax' type='text' id='fax'  value='$fax' size='15' maxlength='15' /></p>";
        ?>
      </div><!--fin contenedor2-->
      <br>      
      
      <h4><img id="abrir_contenedor3" src="images/desplegar0.png"/> DATOS ADICIONALES </h4>
      
      <div id="contenedor3">
        <?
          // comienzo de los datos adicionales 
          echo"<p>Contacto&nbsp;<input name='contacto1' type='text' id='contacto1'  value='".$contacto1."' size='50' maxlength='80' />";
          echo"&nbsp;&nbsp;Telefono&nbsp;<input name='tel1' type='text' id='tel1'  value='".$tel1."' size='30' maxlength='30' /></p>";
          
          echo"<p>Celular<input name='cel1' type='text' id='cel1' value="."'".$cel1."'"."  size='15' maxlength='15' />";
          echo"&nbsp;&nbsp;email<input name='email1' type='text' id='email1' value="."'".$email1."'"."  size='30' maxlength='80' /></p>";
       ?> 
      </div><!--fin contenedor3-->
      <br>
      <h4> DATOS FISCALES </h4> 
      <div id="contenedor4">
      <?
         /* agregue esta llamada a BD para habilitar el selector de tipo de iva ya que sin ella quedaba indefinido 10-11-2014 */
          $actualizar1="select cod_iva from  ".$_SESSION["tabla_iva"]." where cod_iva<>"."'".$cond_iva."'" ;
          $rs_validar1 = mysql_query($actualizar1,$cx_validar); 
          /* fin llamada a BD para habiilitar el selector de tipo de iva */
          echo  '<p id="datosFiscales">&nbsp;&nbsp;&nbsp;Condici&oacute;n de Iva:'."&nbsp";
          echo  '<select name="cond_iva" id="cond_iva">';
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
          echo "<input name='nro_cuit' ID='nro_cuit' type='text'  value='$nro_cuit'  size='13' maxlength='13' />";
                             
          echo "&nbsp;&nbsp;&nbsp;Agente de retenci&oacute;n de IVA&nbsp";

          echo  '<select name="ret_iva" id="ret_iva">';
          echo  "<option ";   
          if ($ret_iva=="Si") {
            echo ' selected ';
            echo "value='Si'>Si</option>";
            echo  "<option value='No'>No</option>";}
          else    {
            echo ' selected ';
            echo "value='No'>No</option>";
            echo  "<option value='Si'>Si</option>";}
          echo "</select></p>";
          
          echo"<p id='datosFiscales'>&nbsp&nbsp&nbsp&nbspIngresos Brutos&nbsp";

          echo  "<select name='ret_bru' id='ret_bru'>";
          echo  "<option ";   
          if ($ret_bru=="Si") {
            echo ' selected ';
            echo "value='Si'>Si</option>";
            echo  "<option value='No'>No</option>";}
          else    {
            echo ' selected ';
            echo "value='No'>No</option>";
            echo  "<option value='Si'>Si</option>";}

          echo "</select>&nbsp&nbsp&nbsp&nbspGanancias&nbsp";

          echo  '<select name="ret_gan" id="ret_gan">';
          echo  "<option ";   
          if ($ret_gan=="Si") {
            echo ' selected ';
            echo "value='Si'>Si</option>";
            echo  "<option value='No'>No</option>";}
          else    {
            echo ' selected ';
            echo "value='No'>No</option>";
            echo  "<option value='Si'>Si</option>";}
          
          echo "</select></p>";
      ?>          
      </div><!--fin contenedor4 --> 
      <br>
      <div id="contenedor5"> 
        <button id="btnvolver"  name="volver" value"volver">VOLVER</button>
        <button id="btnguardar" name="guardar" value"guardar">GUARDAR</button>
        <!--button id="btnimprimir" name="imprimir" value"imprimir">IMPRIMIR</button-->        
      </div><!--fin contenedor5 -->  
     
	  </div><!--fin contenedor general -->
	</form>   
  
  <?
    echo "<input id='prov_id' type='hidden' name='' value='".$prov_id."'>";  
    // solo funciona si se edita el archivo
    if($edit=="edit"){
     echo "<input id='accion' type='hidden' name='' value='edit'>";
    }
    // solo funciona si es nuevo el archivo
    if ($agrego_cliente=="si"){
      echo "<input id='accion' type='hidden' name='' value='nuevo'>";        
    }
  ?>
      
	</body>
  <script src="js/botoneraProvedores.js" type="text/javascript"> </script>     
</html>