<html>
	<head>   	
        <? echo '<TITLE>Editando Sala de Acopio '.$almacen_id.'</TITLE>';?>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <script src="js/jquery-1.11.1.js"></script> -->
        <script src='../view/plugins/js/jquery-1.9.0.min.js'></script> 
        <link rel="stylesheet" href="../view/css/estilo_mod_prov.css">
	</head>
	<body>

  <form id="idFormulario" name='formulario'>
    <div id="general">

    <h1 id="titulo">DATOS DE SALA DE ACOPIO <? echo "$almacen_id"; ?> </h1>
    
    <div id="contenedor1Acopio">  
    <?
        echo "SALA DE ACOPIO<input id='razon' name='nombre' type='text'  value='$nombre' size='50' maxlength='50' required/><br>";	     
		echo "N&Uacute;MERO DE HABILITACION DE SENASA:&nbsp<img src='../view/images/senasa.jpg' width='20' height='20'><input name='hab_senasa' type='text' id='senasa' value="."'".$hab_senasa."'"."  size='20' maxlength='20'>";
        echo "<p>DIRECCI&Oacute;N <input name='dir1' type='text' id='dir1'  value='$dir1' size='50' maxlength='50' required /></p>";
        echo"<p>LOCALIDAD <input name='localidad' type='text' id='localidad'  value='$localidad'  size='30' maxlength='30' />&nbsp;&nbsp;";
		echo"&nbsp;&nbsp;C&Oacute;DIGO POSTAL&nbsp;<input name='cod_postal' type='text' id='cod_postal'  value="."'".$cod_postal."'"."  size='8' maxlength='10' /></p>";  		   
        echo"PROVINCIA<input name='provincia' type='text' id='provincia'  value='$provincia'  size='20' maxlength='20' required />";
		echo"&nbsp;&nbsp;PAIS<input name='pais' type='text' id='pais' value='$pais'  size='20' maxlength='20' /></p>";
        
        echo"<p>CONTACTO&nbsp;<input name='contacto' type='text' id='contacto'  value='$contacto' size='30' maxlength='10' />";          
        echo"&nbsp;&nbsp;TELEFONO&nbsp;<input name='tel' type='text' id='tel'  value='$tel' size='30' maxlength='30' /></p>";

        echo"<p>CELULAR&nbsp;<input name='cel' type='text' id='cel' value='$cel'  size='15' maxlength='15' />";
        echo"&nbsp;&nbsp;NEXTEL&nbsp;<input name='nextel' type='text' id='nextel' value='$nextel'  size='8' maxlength='8' /></p>";

        echo"<p>&nbsp;&nbsp;EMAIL&nbsp;<input name='email' type='text' id='email'  value='$email' size='30' maxlength='30' />";
        echo"&nbsp;&nbsp;FAX<input name='fax' type='text' id='fax'  value='$fax' size='15' maxlength='15' /></p>";
    ?>
    </div><!-- fin contenedor1 -->
    <br>      
      
    <h4> <img id="abrir_contenedor3" src="../view/images/desplegar0.png"/> DATOS ADICIONALES</h4>
      
    <div id="contenedor3">
        <?
          // comienzo de los datos adicionales 
          echo"<p>CONTACTO&nbsp;<input name='contacto1' type='text' id='contacto1'  value='".$contacto1."' size='30' maxlength='30' />";
          echo"&nbsp;&nbsp;TELEFONO&nbsp;<input name='tel1' type='text' id='tel1'  value='".$tel1."' size='15' maxlength='15' /></p>";
          
          echo"<p>CELULAR<input name='cel1' type='text' id='cel1' value="."'".$cel1."'"."  size='15' maxlength='15' />";
          echo"&nbsp;&nbsp;EMAIL<input name='email1' type='text' id='email1' value="."'".$email1."'"."  size='12' maxlength='30' /></p>";
       ?> 
    </div><!--fin contenedor3-->
    <br>
    <h4> DATOS FISCALES </h4> 
      <div id="contenedor4Acopio">
      <?
         /* agregue esta llamada a BD para habilitar el selector de tipo de iva ya que sin ella quedaba indefinido 10-11-2014 */
          $actualizar1="select cod_iva from  ".$_SESSION["tabla_iva"]." where cod_iva<>"."'".$cond_iva."'" ;
          $rs_validar1 = mysql_query($actualizar1,$cx_validar); 
          /* fin llamada a BD para habiilitar el selector de tipo de iva */
          echo  '<p id="datosFiscales">&nbsp;&nbsp;&nbsp;CONDICI&Oacute;N DE IVA:'."&nbsp";
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
           echo "<input name='nro_cuit' id='nro_cuit' type='text'  value='$nro_cuit'  size='13' maxlength='13' />";
        ?>    
      </div><!--fin contenedor4 -->   	
      <h4> <img id="abrir_contenedorHORA" src="../view/images/desplegar0.png"/> HORARIOS DE ATENCI&Oacute;N </h4>
      <div id="contenedorHORA">
       <?
        echo"HORARIO 1<input name='hor1' type='text' id='hora1'  value='".$hor1."' size='50' maxlength='40' />";
        echo"&nbsp;&nbsp;HORARIO 2<input name='hor2' type='text' id='hora2'  value='".$hor2."' size='50' maxlength='40' />";
       ?> 
      </div>  <!-- fin contenedor hora -->
      <br>
      <div id="contenedor5"> 
        <button id="btnvolver"  name="volver" value"volver">VOLVER</button>
        <button id="btnguardar" name="guardar" value"guardar">GUARDAR</button>
        <!--button id="btnimprimir" name="imprimir" value"imprimir">IMPRIMIR</button-->        
      </div><!--fin contenedor5 -->  
	  </div><!--fin contenedor general -->
	</form>   
  <?
    // este dato del $tipo_almacen lo seteo fijo, ya que si no lo tiene la tabla no recoge nada
    // porque la condicion where toma los datos segun tipo de almacen
    $tipo_almacen = 4;
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
  <script src="../view/js/botoneraSalaAcopio.js" type="text/javascript"> </script>     
</html>