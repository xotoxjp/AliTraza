    // si pasa por el archivo de edit  carga la variable accion
    var accion = $("#accion").val();
    //console.log(accion);    
    if (accion == 'edit'){
      var ruta = '../controller/guardar_modProveedor.php?accion='+accion;
      //console.log(ruta);
    }
    else{
      ruta = '../controller/guardar_modProveedor.php?accion='+accion;
    }  

    $("#btnvolver").click(function(){
      event.preventDefault();
      location.href="productores.php";
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
      var cliente = $("#prov_id").val();

      var fecha_ini = $("#fecha_ini").val();      
      var razon = $("#razon").val();
      var renapa = $("#renapa").val();
      var c2 = $("#c2").val();
      var dir1 = $("#dir1").val();
      //var dir2 = ("#dir2").val();
      //var lon = ("#lon").val();
      //var lat = ("#lat").val();
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
      var ret_iva = $("#ret_iva").val();
      var ret_bru = $("#ret_bru").val();
      var ret_gan = $("#ret_gan").val();

      var DATA = [];
      var item = {}
      
      item["fecha_ini"] = fecha_ini;
      item["razon"] = razon;
      item["renapa"] = renapa;
      item["c2"] = c2;
      item["dir1"] = dir1;
      //item["dir2"] = dir2;
      //item["lon"] = lon;
      //item["lat"] = lat;
      item["localidad"] = localidad;
      item["cod_postal"] = cod_postal;
      item["provincia"] = provincia;
      item["pais"] = pais;
      item["cond_iva"] = cond_iva;
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
      item["nro_cuit"] = nro_cuit;
      item["ret_iva"] = ret_iva;
      item["ret_bru"] = ret_bru;
      item["ret_gan"] = ret_gan;
      item["cliente"] = cliente;
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
      location.href="productores.php"; 
    }     
   

    $("#abrir_contenedor2").click( function(){
    $("#contenedor2").slideToggle("slow");    
      if (  $( this ).css( "transform" ) == 'none' ){
        $(this).css("transform","rotate(180deg)");
      } else {
        $(this).css("transform","" );
      }
    });  
    $("#abrir_contenedor3").click( function(){
    $("#contenedor3").slideToggle("slow");
      if (  $( this ).css( "transform" ) == 'none' ){
        $(this).css("transform","rotate(180deg)");
      } else {
        $(this).css("transform","" );
      }   
    });   

    /*$("#btnimprimir").click(function(){
      event.preventDefault();
     //location.href ="imp1.php?&ar=$prov_id"; 
    });*/   