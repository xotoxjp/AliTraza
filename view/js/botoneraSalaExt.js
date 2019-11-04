    // si pasa por el archivo de edit  carga la variable accion
    var accion = $("#accion").val();
    console.log(accion);    
    /* if (accion == 'edit'){
      var ruta = '../controller/guardar_modSalaExt.php?accion='+accion;
      //console.log(ruta);
    }
    else{
      ruta = '../controller/guardar_modSalaExt.php?accion='+accion;
    }   */
    ruta = '../controller/guardar_modSalaExt.php?accion='+accion;
    $("#btnvolver").click(function(){
      event.preventDefault();
      location.href="../view/tablasAccesorias.php";
    });
    $("#btnguardar").click(function(){ 
      var form =$("form");
      if (form[0].checkValidity()){
         guardarDatos();
      }   
     });
    function guardarDatos(){
      // event.preventDefault();
      // dato aparte de los necesarios, el id proximo
      var almacen = $("#almacen_id").val();
      var tipo_almacen = $("#tipo_almacen").val();
      var razon = $("#razon").val();
      var senasa = $("#senasa").val();
      var localidad = $("#localidad").val();
      var cod_postal = $("#cod_postal").val();
      var provincia = $("#provincia").val();
      var pais = $("#pais").val();
      var DATA = [];
      var item = {}
      item["razon"] = razon;
      item["senasa"] = senasa;
      item["localidad"] = localidad;
      item["cod_postal"] = cod_postal;
      item["provincia"] = provincia;
      item["pais"] = pais;
      item["almacen"] = almacen;
      item["tipo_almacen"] = tipo_almacen;
      DATA.push(item);
      var aInfo = JSON.stringify(DATA);
      INFO  = new FormData();
      INFO.append('data', aInfo);      
      //console.log(INFO);     
      //console.log(aInfo);
      event.preventDefault();           
      $.ajax({
              data: INFO,
              type: 'POST',
              dataType: 'json',
              url: ruta,
              processData: false, 
              contentType: false,
              success: function(response){
                //Una vez que se haya ejecutado de forma exitosa hacer el código para que muestre esto mismo.
                console.log(response.mensaje);
              }
      });               
      location.href="../view/tablasAccesorias.php"; 
    }
    $("#abrir_contenedor2").click( function(){
    $("#contenedor2").slideToggle("slow");    
      if (  $( this ).css( "transform" ) == 'none' ){
        $(this).css("transform","rotate(180deg)");
      } else {
        $(this).css("transform","" );
      }
    });