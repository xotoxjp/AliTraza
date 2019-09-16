$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd"});
$("#rangoini").change(function() {
    $("#rangofin").val($(this).val());
});
$( "#lote_env_sec" ).focusout(function(){ 
    var value = $( this ).val();			
    recuperarTambores(value)
});
$( "#btnok" ).click(function(){ 
    var ini = $("#rangoini").val();
    var fin = $("#rangofin").val();
    //var cant_tambores = fin - ini + 1;			
    for(i = ini; i <=fin; i++){
        existen ={"propiedad":"si"};
        chequearExistencia(existen,i);
        if(existen.propiedad=="no"){
             //console.log("entra en append...");	
             $("#tabladeTambores").append('<tr><td class="editar"><input type="text" name="tamb[]" value='+i+'></td><td></td><td><select id="selectfrom" name="selectfrom"><option>Multiflora</option></select></td><td class="bordetransp"  id="del"><a href="#"><img src="images/Trash_Can.png" width="20" height="20"/></a></td></tr>');
         }
     }
     //no tiene mucho sentido
     var filas= $("#tabladeTambores>tbody>tr").length - 1;
     //console.log(filas);
     var cant_tambores = filas; 			        
  });
  function chequearExistencia(existen,tambor){
      var respuesta;
      $.ajax({
          url:"../controller/buscarTambor.php",
          type: "POST",
          async: false,
          data: {"tambor": tambor},
          success: function(response){
              //console.log(response);
            if (response =="no existe"){        				
                   //console.log(response);
                   existen["propiedad"]='no'
            }  
              //console.log(existen);	    
          }
    });
}
// Evento que selecciona la fila y la elimina 
$(document).on("click","#del",function(){
    var parent = $(this).parents().get(0);
    $(parent).remove();
    cant_tambores = $("#ctambores").val();
    cant_tambores = cant_tambores-1;
    $("#cant_tambores").val(cant_tambores);
});
$(document).on("click","#delAll",function(){
    $('#tabladeTambores').find("tr:gt(0)").remove();			
});
//modal de cargado correctamente
$(window).load(function() {
       var mensaje = $("#mensaje").val();
       console.log(mensaje);
       if (mensaje != ""){
            $("#dialog").dialog({
            modal: true,
            resizable: false,
            buttons: {
                "Aceptar": function() {
                    $(this).dialog("close");
                }
            }
        });
       }			
}); 
$(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#buscaProductor" )
          // don't navigate away from the field on tab when selecting an item
          .bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
              event.preventDefault();
            }
          })
          .autocomplete({
              delay: 500,
            source: function( request, response ) {
              $.getJSON( "../controller/search_productor.php", {
                  term: extractLast( request.term )
              }, 
              response );
            },
            search: function() {
                  // custom minLength
                  var term = extractLast( this.value );
                  if ( term.length < 2 ) {
                    return false;
                  }
            },
            focus: function() {
                  // prevent value inserted on focus
                  return false;
            },
            select: function( event, ui ) {
                  var terms = split( this.value);
                  // remove the current input
                  terms.pop();
                  // add the selected item
                  terms.push( ui.item.value );
                  // add placeholder to get the comma-and-space at the end
                  terms.push( "" );
                  this.value = terms.join( ", " );
                  $('#prov_id').val(ui.item.id);  		
                  $('#sala_asoc').val(ui.item.sala);
                  return false;
            }
        });
});
//cambia select de salas
$('#buscaProductor').click(function(){
    var sala = $('#sala_asoc').val();
    $.ajax({
          url:"../controller/buscaSalaSelect.php",
          type: "POST",
          async:false,
          data:"idsala="+$("#sala_asoc").val(),
          success: function(opciones){      				     				
            $("#sala_ext").html(opciones);
          }
    })
});
//select de tipos miel
$('#selectfrom').change(function (){
    $.ajax({
          url:"../controller/selectTipoMiel.php",
          type: "POST",
          //data:"idsala="+$("#sala_asoc").val(),
          success: function(opciones){
            $("#selectfrom").html(opciones);
          }
    })
});