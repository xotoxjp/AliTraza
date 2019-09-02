<?php

// valida que se haya especificado una tarea
if (!isset( $_POST['tarea'])) 
{
	print false;
	exit;
}

$tarea = $_POST['tarea']; 
switch($tarea)
{
	case '1':	// recuperar los registros del catalogo
		obtenerTambores();
		break;
			
	default:
		print false;
}


/*
 * Recupera los registros de tambores segun el numero de presupuesto.
 *
 * @history
 *		2014.12.12	16:24		xotox
 */
function obtenerTambores()
{ 
	// recupera el numero de presupuesto
	$numPresupuesto = $_POST['numPresupuesto'];
	// creamos una conexion al servidor
	$conn = mysqli_connect('localhost', 'root', 'root1234');
	if ( !$conn )
	{			
		// no hay conexión al servidor, reportar o loggear
		return false;
	}
	
	// seleccionamos la base de datos
	$db = @mysqli_select_db( $conn, 'chmiel' );
	if ( !$db )
	{			
		// no pudimos acceder a la base de datos, reportar o loggear
		return false;
	}
	
	// establecemos que el mapa de caracteres será UTF8
	@mysqli_query("SET NAMES 'utf8'");
	
	// solicitamos los registros de tambor y productor
	/*$result = mysqli_query( $conn, "SELECT mov_detalle.lote_id, provedores.razon_social
							FROM mov_detalle
							INNER JOIN provedores ON mov_detalle.prov_id = provedores.prov_id
							WHERE lote_env_sec='".$numPresupuesto."'" );
	*/
	$result = mysqli_query( $conn, "SELECT laboratorio.id_tambor, provedores.razon_social
							FROM laboratorio
							INNER JOIN provedores ON laboratorio.id_productor= provedores.prov_id
							WHERE laboratorio.num_presupuesto=".$numPresupuesto." " );
	if ( $result )
	{
		// armamos el resultado en JSON con los datos de los tambores que recuperamos
		$contador = 0;
		print '[';
		while ( $tambor = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) // recupera el siguiente registro
		{
			if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
				//print "{ \"id\" : $tambor[lote_id], \"productor\" : \"$tambor[razon_social]\" }";			
				print "{ \"id\" : $tambor[id_tambor], \"productor\" : \"$tambor[razon_social]\" }";			
		}
		print ']';
	}	
	mysqli_free_result( $result );
	// cierro conexión a la base de datos (no importa si abrimos en modo persistente)
	mysqli_close( $conn );
}
?>