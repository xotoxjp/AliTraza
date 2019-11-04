<?php
  include("../controller/mod_analitico_inf.php");
?>
<head>
  <title>Editando el Analisis con ID: <? echo"$cod_anal_id"?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width,initial-scale=1">             
  <link rel="stylesheet" href="css/botones.css" />
  <link rel='shortcut icon' href='fotos/icono1.ico'>
  <link rel="stylesheet" href="css/pantalla_edit.css" />
  <link rel="stylesheet" href="plugins/css/bootstrap.min.css" />
  <script type="text/javascript">
    function oprimo(elemento)
    {
      tx=document.getElementById('accion');
      tx.value=elemento;
      btn=document.getElementById('ent');
      btn.click();
    }
  </script>
</head>
<body onLoad='this.document.formulario.nomencl.focus()'>
  <form class="col-md-6" name='formulario' class="form" method='POST' action='../controller/mod_analitico_inf.php'>
<?
  include("../controller/controllerEditInfoAnalisis.php");
?>

 
  <div class="form-group">
    <label >Datos del Análisis: </label>
    <label ><? echo "$cod_anal_id"?> </label>
  </div>
   
  <div class="form-group">
  <label class="control-label col-sm-4" for="nomencl">Nomenclador</label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  name="nomencl" id="nomencl" value="<? echo $nomencl ?>" size='40' maxlength='40' >
    </div>
  </div>


  <div class="form-group">
  <label class="control-label col-sm-4" for="nomencl1">Detalle</label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  name="nomencl1" id="nomencl1" value="<? echo $nomencl1 ?>" size='8' maxlength='8' >
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-4" for="esp_inf">Limite Inferior</label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  name="esp_inf" id="esp_inf" value="<? echo $esp_inf ?>" size='8' maxlength='8' >
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-4" for="esp_sup">Limite Superior</label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  name="esp_sup" id="esp_sup" value="<? echo $esp_sup ?>" size='40' maxlength='40' >
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4" for="unidad">Unidad</label>
    <select class="form-control col-sm-8" name="unidad" id="unidad">
      <option value="<? echo $unidad?>" > <?echo$unidad?> </option>
        <? while ($v_validar1 = mysql_fetch_array($rs_validar1)){ ?>
        <option value="<?echo $v_validar1[0]?>" >
          <? echo$v_validar1[0] ?>
        </option>
        <? } ?>
    </select>
  </div>

  <div class="form-group">
    <label class="col-sm-4" for="aplica_ok">Aplica para Rechazo</label>
    <select class="form-control" name="aplica_ok" id="aplica_ok">
      <? if ($aplica_ok=='No') { ?>
        <option value=No selected="selected">No</option>
        <option value=Si >Si</option>
      <? }else { ?>
        <option value=Si selected="selected">Si</option>
        <option value=No >No</option>
      <? } ?>
    </select>
  </div>
  
  <div class="form-group">
    <label class="col-sm-4" for="leyenda1">Leyendas</label>
    <div class="col-sm-8">
    <input type='text' class="form-control" name='leyenda1' id='leyenda1' value="<?echo$leyenda?>" size='30' maxlength='30'>

    <input type='text' class="form-control" name='leyenda2' id='leyenda2' value="<?echo$leyenda1?>" size='30' maxlength='30'>

    <input type='text' class="form-control" name='leyenda3' id='leyenda3' value="<?echo$leyenda2?>" size='30' maxlength='30'>
    </div>
  </div>

  <div class="form-group">
    <? if ($accion==4)
    {   
      echo "<br>C�digo de Seguridad "."
      <INPUT TYPE=INPUT name='contr' value=" ."'".$contr."'>"; 
    }
    echo "<INPUT TYPE=HIDDEN name='num_reg_desde'  value="."'".$_SESSION[reg_desde]."'>";
    echo "<INPUT TYPE=HIDDEN name='num_reg_hasta'  value="."'".$_SESSION[reg_hasta]."'>";
    echo "<INPUT TYPE=HIDDEN name='cod_anal_id'  value='".$cod_anal_id."''>";
    echo "<INPUT TYPE=HIDDEN name='accion' id='accion' value='".$accion."'>";
    echo "<INPUT TYPE=SUBMIT name='ent'  id='ent'>";
    ?>
  </div>
  
  <div class="form-group"  id="botonera">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-primary"onclick="oprimo(1);" >Volver</button>
      <button class="btn btn-primary"onclick="oprimo(2);" >Guardar</button>
      <button class="btn btn-primary"onclick="oprimo(3);" >Alta</button>
      <button class="btn btn-primary"onclick="oprimo(4);" >Borrar</button>
    </div>
  </div>

  </form>
</body>
</html>