var id_usuario = "<?php echo $id_usuario; ?>"; 
$.getJSON("../controller/consultaMenu.php?id="+id_usuario, function(data){  
    for(var i in data){
        // el dato es de tipo json es accesible mediante el punto y la palabra pantalla que es el nombre de la columna 
        //que esta en la tabla accesos_op en BD
        var id = data[i].pantalla;
        //console.log(id);
        //ACLARACION:
        // El if que agregue pregunta por el acceso porque es en el mismo momento,
        // o sea en el la misma variable i (del for) que recorre cuando obtengo la pantalla y
        // tambiem obtengo el acceso.
        // El acceso pertenece a la misma fila obtenida de la BD con lo cual si el acceso no esta 
        // encendido ('on') en la BD, no mostrara la puerta de acceso a la pantalla.    
        var acceso = data[i].acceso;				
        console.log(acceso);
        if(acceso=='on'){
            /* divs */
            $("#ana"+id).css("display","inline");
            /* enlaces*/
            $("#"+id).css("display","inline");
            if (i == 4){
                if (id_usuario == 25){
                    /* divs */
                    $("#anaUsuario").css("display","inline");
                    /* enlaces*/
                    $("#usuario").css("display","inline");
                }
            }
        }	
    }	
});


$(".contenedor").click(function() {
    var currentId = $(this).attr('id');
    window.location = $(this).find("a").attr("href"); 
    return false;
});