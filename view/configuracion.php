<!DOCTYPE html>
<html>
<head>
   	<title>CONFIGURACIÓN</title>
   	<meta charset="utf-8">
   	<link rel="stylesheet" type="text/css" href="../view/plugins/css/bootstrap.min.css">    	 
   	<link rel="stylesheet" type="text/css" href="../view/css/configuracion.css">  	

<body>
<div id="cabecera">
	<h1><center><strong> CONFIGURACIÓN DE USUARIO <?php echo $id; ?> </strong></center></h1>
</div>
<div id="container">
   <form>
	   <table>
	       <tbody> 	 
		        <tr><th> Páginas </th><th> Acceso </th><th> Alta </th><th> Baja </th><th> Modifica </th></tr>	
				<th id="especial" colspan="5"><h4>Tablas de Datos</h4></th>  
				
				<tr class="1" id="Clientes" name="Tablas">					                       
					<td><label>Clientes</label></td>
					<td>
						<input type="checkbox" name="accesoClientes" <?php if ($acceso['Clientes']=='on') { echo 'checked';} ?> multilple/></br>
				    </td> 
				    <td>
						<input type="checkbox" name="altaClientes"  <?php if ($alta['Clientes']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td> 
				    <td>
						<input type="checkbox" name="bajaClientes"  <?php if ($baja['Clientes']=='on') { echo 'checked';} ?> multilple/></br>
				    </td> 
				    <td>
						<input type="checkbox" name="modificaClientes"  <?php if ($modifica['Clientes']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				    
				</tr>
				<tr class="2" id ="Provedores" name="Tablas">
					<td><label>Provedores</label></td>
					<td>        
						<input type="checkbox" name="accesoProvedores"  <?php if ($acceso['Provedores']=='on') { echo 'checked';} ?> multilple/></br>
				    </td>
				    <td>        
						<input type="checkbox" name="altaProvedores"  <?php if ($alta['Provedores']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td> 
				    <td>        
						<input type="checkbox" name="bajaProvedores"  <?php if ($baja['Provedores']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td> 
				    <td>        
						<input type="checkbox" name="modificaProvedores"  <?php if ($modifica['Provedores']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				    
				</tr>
				<tr class="3" id="Almacenes" name="Tablas" >
					<td><label>Almacenes</label></td>
					<td>         
						<input type="checkbox" name="accesoAlmacenes"  <?php if ($acceso['Almacenes']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td>         
						<input type="checkbox" name="altaAlmacenes"  <?php if ($alta['Almacenes']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td> 
				    <td>         
						<input type="checkbox" name="bajaAlmacenes"  <?php if ($baja['Almacenes']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td> 
				    <td>         
						<input type="checkbox" name="modificaAlmacenes"  <?php if ($modifica['Almacenes']=='on') { echo 'checked';} ?> multilple/></br>
				    </td>				    
				</tr>
				<tr class="9" id="Tipos_Analisis" name="Tablas" >
					<td><label>Tipos de Analisis</label></td>
					<td> 
						<input type="checkbox" name="accesoTipos_Analisis"  <?php if ($acceso['Tipos_Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaTipos_Analisis"  <?php if ($alta['Tipos_Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaTipos_Analisis"  <?php if ($baja['Tipos_Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaTipos_Analisis"  <?php if ($modifica['Tipos_Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>			      
				</tr>
				<th class="especial" colspan="5"><h4>Módulos de Operación</h4></th>                         
				<tr class="4" id="Muestras" name="Procesos">
					<td><label>Muestras</label></td>
					<td> 
						<input type="checkbox" name="accesoMuestras"  <?php if ($acceso['Muestras']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaMuestras"  <?php if ($alta['Muestras']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaMuestras"  <?php if ($baja['Muestras']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaMuestras"  <?php if ($modifica['Muestras']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>					
				</tr>
				<tr class="5" id="Analisis" name="Procesos">
					<td><label>Analisis</label></td>
					<td> 
						<input type="checkbox" name="accesoAnalisis"  <?php if ($acceso['Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaAnalisis"  <?php if ($alta['Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaAnalisis"  <?php if ($baja['Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaAnalisis"  <?php if ($modifica['Analisis']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				       
				</tr>
				<tr class="6" id="Ext_Acop" name="Procesos">
					<td><label>Orden de Compra</label></td>
					<td> 
						<input type="checkbox" name="accesoExt_Acop"  <?php if ($acceso['Ext_Acop']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaExt_Acop"  <?php if ($alta['Ext_Acop']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaExt_Acop"  <?php if ($baja['Ext_Acop']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaExt_Acop"  <?php if ($modifica['Ext_Acop']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				      
				</tr>
				<tr class="0" id="Logistica" name="Procesos">
					<td><label>Logistica</label></td>
					<td> 
						<input type="checkbox" name="accesoLogistica"  <?php if ($acceso['Logistica']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaLogistica"  <?php if ($alta['Logistica']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaLogistica"  <?php if ($baja['Logistica']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaLogistica"  <?php if ($modifica['Logistica']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				    
				</tr>
				<tr class="9" id="Reprocesos" name="Procesos">
					<td><label>Deposito</label></td>
					<td> 
						<input type="checkbox" name="accesoReprocesos"  <?php if ($acceso['Reprocesos']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaReprocesos"  <?php if ($alta['Reprocesos']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaReprocesos"  <?php if ($baja['Reprocesos']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaReprocesos"  <?php if ($modifica['Reprocesos']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				    
				</tr>
				<tr class="12" id="Stock" name="Procesos">
					<td><label>Stock</label></td>
					<td> 
						<input type="checkbox" name="accesoStock"  <?php if ($acceso['Stock']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaStock"  <?php if ($alta['Stock']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaStock"  <?php if ($baja['Stock']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaStock"  <?php if ($modifica['Stock']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				    
				</tr>
				<tr class="14" id="OrdEmb" name="Procesos">
					<td><label>Embarque</label></td>
					<td> 
						<input type="checkbox" name="accesoOrdEmb"  <?php if ($acceso['OrdEmb']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="altaOrdEmb"  <?php if ($alta['OrdEmb']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="bajaOrdEmb"  <?php if ($baja['OrdEmb']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>
				    <td> 
						<input type="checkbox" name="modificaOrdEmb"  <?php if ($modifica['OrdEmb']=='on'){ echo 'checked';} ?> multilple/></br>
				    </td>				    
				</tr>
	        </tbody>
        </table>
        <div id="botonera">
	      <input class="btn btn-success" id="guardar"  type="button" value="Guardar"/>
          <input class="btn btn-danger"  id="volver"  type="botton" value="Volver"/>
          <input type="hidden" id="id" value="<?php echo $id; ?>"/>
	      <input type="hidden" id="modo" value="<?php echo $_GET['modo']; ?>"/>
        </div>        
    </form>
</div>

<!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div id="fondo" class="modal-dialog modal-sm">
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
<script src='../view/plugins/js/jquery-1.11.1.js'></script>
<script src="../view/plugins/js/bootstrap.min.js"></script>
<script src='../view/js/configuracion.js'></script>
</html>