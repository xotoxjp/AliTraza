		// recupera la lista de los tambores segun un numero de presupuesto especificada
		function recuperarTambores(numPresupuesto)
		{
			try
			{
				// preparamos el registro con las instrucciones que enviaremos al servidor
				// en este ejemplo practico, utilizaremos una variable de nombre "task" para indicar
				// al servidor lo que queremos hacer, asi como una variable "numPresupuesto" en donde colocaremos
				// el numero para la cual deseamos recuperar la lista de tambores				
				var data = "tarea=1&numPresupuesto="+numPresupuesto;				
				$.ajax(
					{
						type				: "post",								// el tipo de consulta, puede ser "get" y "post".
						url					: "../controller/tambores.php",				// el modulo que nos proveera de la informacion que solicitamos
						data				: data,									// los datos relacionados a la consulta Ajax
						context			    : {"numPresupuesto": numPresupuesto },  //{ "cedula" : cedula },	// un contexto u objeto con informacion complementaria, este no viaja al servidor
						error				: callback_error,						// que rutina se ejecuta si esto falla
						success			    : recuperarTambores_callback       		// que rutina se ejecuta si esto funciona 
					});
			}
			catch(ex)
			{
				alert(ex.description);
			}
		}
		
		// mostramos un mensaje con la causa del problema
		function callback_error(XMLHttpRequest, textStatus, errorThrown)
		{
			// optamos por una solucion simple
			alert(errorThrown);
		}
		
		// recupera la informacion de los tambores asociados al numero de presupuesto		
		function recuperarTambores_callback(ajaxResponse, textStatus)
		{			
			var tambores = procesarRespuesta(ajaxResponse);
			if (!tambores)
			{
				//alert("No se encontraron registros para la cédula especificada");
				return;
			}
			
			// recupera la instancia de la tabla en donde colocaremos los registros que recuperamos
			// y elimina todos los registros salvo el primero, que es donde se encuentra el encabezado de la tabla
			var $tabla = $("#tabladeTambores");
			$tabla.find("tr:gt(0)").remove();			
			// ahora, para cada registro que recuperamos			
			var tambor;			
			for (var idx in tambores)
			{				
				tambor = tambores[idx];				
				$tabla.append("<tr><td class='numerico'>" + tambor.id + "</td><td class='nombre'>" + tambor.productor + "</td></tr>");
			}
		}
		
		// recuperamos la informacion que nos ha enviado el servidor
		function procesarRespuesta(ajaxResponse)
		{ 
			// observa que aqui asumimos que el resultado es un objeto serializado en JSON
			// razon por la cual utilizamos la rutina "eval" para recuperar dicho resultado
			// y convertirlo a un objeto que podamos manejar facilmente
			var response;
			try { eval( 'response=' + ajaxResponse ); } catch(ex) { response = null; }
			
			// si se ha originado una excepción, obtendremos la información de la siguiente manera
			if (response && response.error)
			{
				var info = response.error;
				alert("Código: " + info.code + "\nTipo: " + info.type + "\nArchivo: " + info.file + "\nLínea: " + info.line + "\n\n" + info.message);
				
				return null;
			}
			// de otra forma, es más sencillo si devolvemos los datos recibidos en vez del mensaje completo
			else if (response && response.data)
				return response.data;
			return response;
		}		