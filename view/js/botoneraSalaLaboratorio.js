    // si pasa por el archivo de edit  carga la variable accion
    var accion = $("#accion").val();
    console.log(accion);    
    if (accion == 'edit'){
      var ruta = '../controller/guardar_salaExportador.php?accion='+accion;
      //console.log(ruta);
    }
    else{
      ruta = '../controller/guardar_salaExportador.php?accion='+accion;
    }  

    $("#btnvolver").click(function(){
      event.preventDefault();
      location.href="tablasAccesorias.php";
    });

    
    $("#btnguardar").click(function(){ 
      var form =$("form");
      if (form[0].checkValidity()){
         guardarDatos();
      }   
     });

    function guardarDatos(){
       //event.preventDefault();
      // dato aparte de los necesarios, el id proximo
      var almacen = $("#almacen_id").val();
      var tipo_almacen = $("#tipo_almacen").val();
      

      var razon = $("#razon").val();
      var senasa = $("#senasa").val();
      var dir1 = $("#dir1").val();
      var localidad = $("#localidad").val();
      var cod_postal = $("#cod_postal").val();
      var provincia = $("#provincia").val();
      var pais = $("#pais").val();
      var contacto = $("#contacto").val();
      var tel = $("#tel").val();
      var cel = $("#cel").val();
      var nextel = $("#nextel").val();
      var email = $("#email").val();
      var fax = $("#fax").val();
      var contacto1 = $("#contacto1").val();
      var tel1 = $("#tel1").val();
      var cel1 = $("#cel1").val();
      var email1 = $("#email1").val();
      var cond_iva = $("#cond_iva").val();
      var nro_cuit = $("#nro_cuit").val();
      var hora1 = $("#hora1").val();
      var hora2 = $("#hora2").val();
      
      var DATA = [];
      var item = {}
      
      item["razon"] = razon;
      item["senasa"] = senasa;
      item["dir1"] = dir1;
      item["localidad"] = localidad;
      item["cod_postal"] = cod_postal;
      item["provincia"] = provincia;
      item["pais"] = pais;
      item["contacto"] = contacto;
      item["tel"] = tel;
      item["cel"] = cel;
      item["nextel"] = nextel;
      item["email"] = email;
      item["fax"] = fax;
      item["contacto1"] = contacto1;
      item["tel1"] = tel1;
      item["cel1"] = cel1;
      item["email1"] = email1;
      item["cond_iva"] = cond_iva;
      item["nro_cuit"] = nro_cuit;
      item["hora1"] = hora1;
      item["hora2"] = hora2;
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
      location.href="tablasAccesorias.php"; 
    }     
       
    $("#abrir_contenedor3").click( function(){
    $("#contenedor3").slideToggle("slow");
      if (  $( this ).css( "transform" ) == 'none' ){
        $(this).css("transform","rotate(180deg)");
      } else {
        $(this).css("transform","" );
      }   
    });   
    $("#abrir_contenedorHORA").click( function(){
    $("#contenedorHORA").slideToggle("slow");
      if (  $( this ).css( "transform" ) == 'none' ){
        $(this).css("transform","rotate(180deg)");
      } else {
        $(this).css("transform","" );
      }   
    });  

    $("#btnimprimir").click(function(){
      event.preventDefault();
     
    });   