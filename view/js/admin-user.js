$(document).ready( function(){
      var id = '';            
      var indice = '';      
      $('tr').click( function(){
        id = $(this).find('td:eq(0)').text();
        indice = $(this).attr('id');
        $(this).toggleClass("sel");   
      });
      
      $('#editar').click( function(){
        if($('tr').hasClass('sel')){
          location.href ='cambios-view.php?id='+id+'&modo=EDIT';
        }else{
          $("#par1").html("NO SE HA SELECCIONADO NINGUN USUARIO!")              
          $("#myModal").modal();          
        }
      });
      
      $('#nuevo').click( function(){         
          location.href ='cambios-view.php?modo=NUEVO';
      });
      
      $('#eliminar').click( function(event){
          // es el unico que va realizar la accion de manera asincrona 
          if($('tr').hasClass('sel')){
            event.preventDefault();
            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url:'../controller/eliminar.php?id='+id,
                processData: false, 
                contentType: false,            
                success: function( response ){                  
                  //console.log(indice);
                  $("#"+indice).html("");                
                }
              });
              $("#par1").html(" EL USUARIO HA SIDO ELIMINADO CORRECTAMENTE!")
              $("#myModal").modal();
              // espero el momento que el usuario acepte la eliminacion para luego actualizar la pagina
              $("#modalClick").click( function(){
                    window.location.replace('usuarios.php');
              });              
            }
          else{
            $("#par1").html("NO SE HA SELECCIONADO NINGUN USUARIO!")              
            $("#myModal").modal();
          }    
      });   
      
      $('#volver').click( function(){
        location.href ='menu_1b.php';
      });
    });