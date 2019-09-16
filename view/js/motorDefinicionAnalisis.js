var largo = "<?php echo $i; ?>";
$("#todos").click(function(){
    // la variable i es la que cuenta los analisis que encuentra en la llamada sql
    for (var i=1; i <=largo; i++){
    $("#analisis"+i).prop("checked",true);             
    }
});
$("#ninguno").click(function(){
    for (var i=1; i<=largo; i++){
    $("#analisis"+i).prop("checked",false); 
    }
});
$("#principales").click(function(){         
        for (var i=1; i <=4; i++){
    $("#analisis"+i).prop("checked",true); 
    }
});
var tam = new Array();
var cadena = $("#cadena").val()        
var vector = cadena.split(',');
//lo uso para saber cuantos entraran en en contenedor
    /*vector = ["1023","1231","5285","2685","1596","1235","1023","1231","5285","2685","1596","1235","1023","1231","5285","2685","1596","1235"]*/ 
// si llega a cargarse muchas muestras genero saltos para que queden dentro del div de tambores seleccionados
var salto = 8;
if (vector.length!='undefined'){ 
    for(var i = 0; i < vector.length;i++){          
    if (i == salto){
        $("#afuera").append('<br>');
        salto+=8;        
    }
    $("#afuera").append('<td id="texto">&nbsp;'+vector[i]+'&nbsp; -</td>');
    }
}        
$("#procesa").click(function(event){
    // si llega a presionar el boton de procesa sin elegir nada, enviaria datos vacios a la base entonces...
    for (var i=1; i <=largo; i++){
        var cantidadchequedos = $(":input[type=checkbox]").filter(":checked").length;             
    }     
    //alert(cantidadchequedos);      
    if (cantidadchequedos == 0){
    alert("NO SE HA SELECCIONADO NADA");// ver alguna otra opccion! 
    }                
    else{       
    var formulario = $(".miform").submit();
    }
    event.preventDefault();
});                   