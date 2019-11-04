<html>
	<head>   	
        <? echo '<TITLE>Editando Sala de Extraccion '.$almacen_id.'</TITLE>';?>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='../view/plugins/js/jquery-1.9.0.min.js'></script>
        <!-- <script src="js/jquery-1.11.1.js"></script>     -->
        <link rel="stylesheet" href="../view/css/estilo_mod_prov.css">
    </head>
    <body>
    <form id="idFormulario" name='formulario'>
        <div id="general">
            <h1 id="titulo">DATOS DE SALA DE EXTRACCI&Oacute;N <? echo "$almacen_id"; ?> </h1>
            <div id="contenedor1Ext">  
            <?
                echo "SALA:<input id='razon' name='nombre' type='text'  value='$nombre' size='50' maxlength='50' required/><br>";	     
                echo "NUMERO DE HABILITACI&Oacute;N DE SENASA:&nbsp<img src='../view/images/senasa.jpg' width='20' height='20'><input name='hab_senasa' type='text' id='senasa' value="."'".$hab_senasa."'"."  size='20' maxlength='20' />";
            ?>
            </div><!-- fin contenedor1 -->
            <h4><img id="abrir_contenedor2" src="../view/images/desplegar0.png"/> DATOS ADICIONALES </h4>
            <div id="contenedor2">
            <? 
                echo"<p>LOCALIDAD <input name='localidad' type='text' id='localidad'  value='$localidad'  size='30' maxlength='30' />&nbsp;&nbsp;";
                echo"&nbsp;&nbsp;C&Oacute;DIGO POSTAL&nbsp;<input name='cod_postal' type='text' id='cod_postal'  value="."'".$cod_postal."'"."  size='8' maxlength='10' /></p>";  		   
                echo"PROVINCIA <input name='provincia' type='text' id='provincia'  value='$provincia'  size='20' maxlength='20' />";
                echo"&nbsp;&nbsp;PAIS<input name='pais' type='text' id='pais' value='$pais'  size='20' maxlength='20' /></p>";
            ?>       
            </div><!-- fin contenedor2 -->
            <br>
            <div id="contenedor5"> 
                <button id="btnvolver"  name="volver" value"volver">VOLVER</button>
                <button id="btnguardar" name="guardar" value"guardar">GUARDAR</button>  
            </div><!--fin contenedor5 -->  
        </div><!--fin contenedor general -->
	</form>
    <?
    // este dato del $tipo_almacen lo seteo fijo, ya que si no lo tiene la tabla no recoge nada
    // porque la condicion where toma los datos segun tipo de almacen
    $tipo_almacen = 1;
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
  <script src="../view/js/botoneraSalaExt.js" type="text/javascript"> </script>     
</html>