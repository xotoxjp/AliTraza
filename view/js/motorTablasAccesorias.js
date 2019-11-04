jQuery("#rowed2").jqGrid({
    url:'../controller/grid/serveralma.php?q=1',
 datatype: "json",
    colNames:['NOMBRE', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','TELEFONO','ID'], 
 colModel:[ 
     {name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
     {name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
     {name:'localidad',index:'localidad', width:160,classes: 'cvteste',editable:true},
     {name:'provincia',index:'provincia', width:200, sortable:false,classes: 'cvteste',editable:true},
     {name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},				
     {name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true},
     {name:'almacen_id',index:'almacen_id', width:90,align:"center",classes: 'cvteste'},		
 ],
    rowNum:10,
    rowList:[10,20,30],
    pager: '#prowed2',
    sortname: 'almacen_id',
 viewrecords: true,
 height:'100%',
 width:'100%',
 sortorder: "asc" ,
 hiddengrid: true,
 caption: "Salas de Extracción"
 });
 jQuery("#rowed2").jqGrid('navGrid',"#prowed2",{edit:false,add:false,del:false,search:true},
     {},{},{},{sopt : ['cn','eq']}
 );	   

 /*custom edit button */
 jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
              var myGrid = $('#rowed2'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 location.href="../controller/mod_salaExtraccion.php?ID="+cellValue+"&EDIT=edit";
              }else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });	

 /*custom add button */
 jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){ 
              location.href='../controller/mod_salaExtraccion.php?nuevoalmacen=si';
              }, 
    position:"last"
 });

 
 $(".ui-jqgrid-titlebar").click(function() {
      $(".ui-jqgrid-titlebar-close", this).click();
 });
 
 jQuery("#rowed2").navGrid('#prowed2',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#prowed2',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
             var myGrid = $('#rowed2'),
             selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
             cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
             
             if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 
                 if(confirm("SEGURO DE BORRAR ESTA SALA DE EXTRACCION?")){
                     $.get('../controller/baja_X_elemento.php?ID='+cellValue+'&datoRuta=tablasAccesorias',function(respuesta){
                             if(respuesta){
                                                                        
                                    $("#rowed2").trigger('reloadGrid');								   	                        
                              }
                     });
                 }// fin if confirm	    
             }
             else{
                 alert("Por favor seleccione una fila");
             }
             }, 
    position:"last"
 });
 
 /**************************************************************************************************/
 /*************************************tabla acopio*************************************************/
 /**************************************************************************************************/
 jQuery("#tacopio").jqGrid({
    url:'../controller/grid/serveralma.php?q=4',
 datatype: "json",
    colNames:['NOMBRE', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','TELEFONO','ID'], 
 colModel:[ 

     {name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
     {name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
     {name:'localidad',index:'localidad', width:160,classes: 'cvteste',editable:true},
     {name:'provincia',index:'provincia', width:200, sortable:false,classes: 'cvteste',editable:true},
     {name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},
     {name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true},
     {name:'almacen_id',index:'almacen_id', width:90,align:"center",classes: 'cvteste'}						
 ],
    rowNum:10,
    rowList:[10,20,30],
    pager: '#ptacopio',
    sortname: 'almacen_id',
 viewrecords: true,
 height:'100%',
 width:'100%',
 sortorder: "asc" ,
 hiddengrid: true,
 caption: "Salas de Acopio"
 });
 jQuery("#tacopio").jqGrid('navGrid',"#ptacopio",{edit:false,add:false,del:false,search:true},
     {},{},{},{sopt : ['cn','eq']}
 );	   

 /*custom edit button */
 jQuery("#tacopio").navGrid('#ptacopio',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptacopio',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
              var myGrid = $('#tacopio'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 location.href="../controller/mod_salaAcopio.php?ID="+cellValue+"&EDIT=edit";
              }else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });	

 /*custom add button */
 jQuery("#tacopio").navGrid('#ptacopio',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptacopio',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){ 
              location.href='../controller/mod_salaAcopio.php?nuevoalmacen=si';
              }, 
    position:"last"
 });

 jQuery("#tacopio").navGrid('#ptacopio',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptacopio',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
              var myGrid = $('#tacopio'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 
                 if(confirm("SEGURO DE BORRAR ESTA SALA DE ACOPIO?")){ 
                    $.get('includes/baja_X_elemento.php?ID='+cellValue+'&datoRuta=almacenes1',function(respuesta){
                            if(respuesta){
                                         
                                    $("#tacopio").trigger('reloadGrid');								   	                        
                             }
                     });
                 }// fin if confirm

              }else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });

 
 $(".ui-jqgrid-titlebar").click(function() {
      $(".ui-jqgrid-titlebar-close", this).click();
 });

 /**************************************************************************************************/
 /*************************************tabla envasado*************************************************/
 /**************************************************************************************************/
 jQuery("#tenv").jqGrid({
    url:'../controller/grid/serveralma.php?q=3',
 datatype: "json",
    colNames:['NOMBRE', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','TELEFONO','ID'], 
 colModel:[   
     {name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
     {name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
     {name:'localidad',index:'localidad', width:160,classes: 'cvteste',editable:true},
     {name:'provincia',index:'provincia', width:200, sortable:false,classes: 'cvteste',editable:true},
     {name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},
     {name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true},
     {name:'almacen_id',index:'almacen_id', width:90,align:"center",classes: 'cvteste'},						
 ],
    rowNum:10,
    rowList:[10,20,30],
    pager: '#ptenv',
    sortname: 'almacen_id',
 viewrecords: true,
 height:'100%',
 width:'100%',
 sortorder: "asc" ,
 hiddengrid: true,
 caption: "Salas de Envasado"
 });
 jQuery("#tenv").jqGrid('navGrid',"#ptenv",{edit:false,add:false,del:false,search:true},
     {},{},{},{sopt : ['cn','eq']}
 );	   

 /*custom edit button */
 jQuery("#tenv").navGrid('#ptenv',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptenv',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
              var myGrid = $('#tenv'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 location.href="mod_salaEnvasado.php?ID="+cellValue+"&EDIT=edit";
               }
               else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });	

 /*custom add button */
 jQuery("#tenv").navGrid('#ptenv',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptenv',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){ 
              location.href='mod_salaEnvasado.php?nuevoalmacen=si';							
              }, 
    position:"last"
 });

 jQuery("#tenv").navGrid('#ptenv',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptenv',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
              var myGrid = $('#tenv'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
             if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 
                 if(confirm("SEGURO DE BORRAR ESTA SALA DE ENVASADO ?")){
                     $.get('includes/baja_X_elemento.php?ID='+cellValue+'&datoRuta=almacenes1',function(respuesta){
                            if(respuesta){
                                    
                                    $("#tenv").trigger('reloadGrid');								   	                        
                             }
                         });
                 }// fin if confirm
             }
             else{
                 alert("Por favor seleccione una fila");
             }
             }, 
    position:"last"
 });	

 $(".ui-jqgrid-titlebar").click(function() {
      $(".ui-jqgrid-titlebar-close", this).click();
 });

 /**************************************************************************************************/
 /*************************************tabla compra*************************************************/
 /**************************************************************************************************/
 jQuery("#tcompra").jqGrid({
    url:'../controller/grid/serveralma.php?q=7',
 datatype: "json",
    colNames:['NOMBRE', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','TELEFONO','ID'], 
 colModel:[ 
     {name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
     {name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
     {name:'localidad',index:'localidad', width:160,classes: 'cvteste',editable:true},
     {name:'provincia',index:'provincia', width:200, sortable:false,classes: 'cvteste',editable:true},
     {name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},
     {name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true},
     {name:'almacen_id',index:'almacen_id', width:90,align:"center",classes: 'cvteste'}
 ],
    rowNum:10,
    rowList:[10,20,30],
    pager: '#ptcompra',
    sortname: 'almacen_id',
 viewrecords: true,
 height:'100%',
 width:'100%',
 sortorder: "asc" ,
 hiddengrid: true,
 caption: "Compra"
 });
 jQuery("#tcompra").jqGrid('navGrid',"#ptcompra",{edit:false,add:false,del:false,search:true},
     {},{},{},{sopt : ['cn','eq']}
 );	   

 /*custom edit button */
 jQuery("#tcompra").navGrid('#ptcompra',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptcompra',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
              var myGrid = $('#tcompra'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 location.href="mod_salaCompra.php?ID="+cellValue+"&EDIT=edit";
              }else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });	

 /*custom add button */
 jQuery("#tcompra").navGrid('#ptcompra',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptcompra',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){ 
              location.href='mod_salaCompra.php?nuevoalmacen=si';
              }, 
    position:"last"
 });

 jQuery("#tcompra").navGrid('#ptcompra',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptcompra',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
             var myGrid = $('#tcompra'),
             selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
             cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
             if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 
                 if(confirm("SEGURO DE BORRAR ESTA SALA DE COMPRA ?")){
                     
                     $.get('includes/baja_X_elemento.php?ID='+cellValue+'&datoRuta=almacenes1',function(respuesta){
                            if(respuesta){			    	                       	
                                    $("#tcompra").trigger('reloadGrid');								   	                        
                             }
                         });
                 }// fin if confirm    
             }
             else{
                 alert("Por favor seleccione una fila");
             }
             }, 
    position:"last"
 });		

 $(".ui-jqgrid-titlebar").click(function() {
      $(".ui-jqgrid-titlebar-close", this).click();
 });

 /**************************************************************************************************/
 /*************************************tabla exportador*************************************************/
 /**************************************************************************************************/
 jQuery("#texport").jqGrid({
    url:'../controller/grid/serveralma.php?q=6',
 datatype: "json",
    colNames:['NOMBRE', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','TELEFONO','ID'], 
 colModel:[ 
     {name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
     {name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
     {name:'localidad',index:'localidad', width:160,classes: 'cvteste',editable:true},
     {name:'provincia',index:'provincia', width:200, sortable:false,classes: 'cvteste',editable:true},
     {name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},
     {name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true},
     {name:'almacen_id',index:'almacen_id', width:90,align:"center",classes: 'cvteste'}
 ],
    rowNum:10,
    rowList:[10,20,30],
    pager: '#ptexport',
    sortname: 'almacen_id',
 viewrecords: true,
 height:'100%',
 width:'100%',
 sortorder: "asc" ,
 hiddengrid: true,
 caption: "Exportador"
 });
 jQuery("#texport").jqGrid('navGrid',"#ptexport",{edit:false,add:false,del:false,search:true},
     {},{},{},{sopt : ['cn','eq']}
 );	   

 /*custom edit button */
 jQuery("#texport").navGrid('#ptexport',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptexport',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
              var myGrid = $('#texport'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 location.href="mod_salaExportador.php?ID="+cellValue+"&EDIT=edit";
              }else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });
 

 /*custom add button */
 jQuery("#texport").navGrid('#ptexport',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptexport',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){ 
              location.href='mod_salaExportador.php?nuevoalmacen=si';
              }, 
    position:"last"
 });	

 jQuery("#texport").navGrid('#ptexport',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptexport',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
              var myGrid = $('#texport'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 
                 if(confirm("SEGURO DE BORRAR ESTA SALA DE EXPORTADOR ?")){
                     $.get('includes/baja_X_elemento.php?ID='+cellValue+'&datoRuta=almacenes1',function(respuesta){
                            if(respuesta){		    	                       	
                                    $("#texport").trigger('reloadGrid');								   	                        
                             }
                     });
                 }// fin if confirm    
             }
             else{
                 alert("Por favor seleccione una fila");
             }
             }, 
    position:"last"
 });				

 $(".ui-jqgrid-titlebar").click(function() {
      $(".ui-jqgrid-titlebar-close", this).click();
 });

 /**************************************************************************************************/
 /*************************************tabla laboratorio*************************************************/
 /**************************************************************************************************/
 jQuery("#tlabo").jqGrid({
    url:'../controller/grid/serveralma.php?q=2',
 datatype: "json",
    colNames:['NOMBRE', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','TELEFONO','ID'], 
 colModel:[ 				
     {name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
     {name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
     {name:'localidad',index:'localidad', width:160,classes: 'cvteste',editable:true},
     {name:'provincia',index:'provincia', width:200, sortable:false,classes: 'cvteste',editable:true},
     {name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},
     {name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true},
     {name:'almacen_id',index:'almacen_id', width:90,align:"center",classes: 'cvteste'}		
 ],
    rowNum:10,
    rowList:[10,20,30],
    pager: '#ptlabo',
    sortname: 'almacen_id',
 viewrecords: true,
 height:'100%',
 width:'100%',
 sortorder: "asc" ,
 hiddengrid: true,
 caption: "Laboratorios"
 });
 jQuery("#tlabo").jqGrid('navGrid',"#ptlabo",{edit:false,add:false,del:false,search:true},
     {},{},{},{sopt : ['cn','eq']}
 );	   

 /*custom edit button */
 jQuery("#tlabo").navGrid('#ptlabo',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptlabo',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
              var myGrid = $("#tlabo"),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
              
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 location.href="mod_salaLaboratorio.php?ID="+cellValue+"&EDIT=edit";
              }else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });	

 /*custom add button */
 jQuery("#tlabo").navGrid('#ptlabo',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptlabo',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){ 
              location.href='mod_salaLaboratorio.php?nuevoalmacen=si';
              }, 
    position:"last"
 });

 jQuery("#tlabo").navGrid('#ptlabo',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptlabo',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
              var myGrid = $("#tlabo"),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
               
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 
                 if(confirm("SEGURO DE BORRAR ESTA SALA DE LABORATORIO ?")){
                     $.get('../controller/baja_X_elemento.php?ID='+cellValue+'&datoRuta=tablasAccesorias',function(respuesta){
                            if(respuesta){
                                    
                                    $("#tlabo").trigger('reloadGrid');								   	                        
                             }
                     });
                 }// fin if confirm    
              }
              else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });

 

 $(".ui-jqgrid-titlebar").click(function() {
      $(".ui-jqgrid-titlebar-close", this).click();
 });

 /**************************************************************************************************/
 /*************************************tabla preembarque********************************************/
 /**************************************************************************************************/
 jQuery("#tpreembar").jqGrid({
    url:'../controller/grid/serveralma.php?q=5',
 datatype: "json",
    colNames:['NOMBRE', 'DIRECCION', 'LOCALIDAD','PROVINCIA','CONTACTO','TELEFONO','ID'], 
 colModel:[ 
     {name:'razon_social',index:'razon_social', width:190,classes: 'cvteste',editable:true}, 
     {name:'dir1',index:'dir1', width:220,classes: 'cvteste',editable:true},
     {name:'localidad',index:'localidad', width:160,classes: 'cvteste',editable:true},
     {name:'provincia',index:'provincia', width:200, sortable:false,classes: 'cvteste',editable:true},
     {name:'contacto',index:'contacto', width:180, sortable:false,classes: 'cvteste',editable:true},
     {name:'tel',index:'tel', width:120, sortable:false,classes: 'cvteste',editable:true},
     {name:'almacen_id',index:'almacen_id', width:90,align:"center",classes: 'cvteste'}		
 ],
    rowNum:10,
    rowList:[10,20,30],
    pager: '#ptpreembar',
    sortname: 'almacen_id',
 viewrecords: true,
 height:'100%',
 width:'100%',
 sortorder: "asc" ,
 hiddengrid: true,
 caption: "Preembarque"
 });
 jQuery("#tpreembar").jqGrid('navGrid',"#ptpreembar",{edit:false,add:false,del:false,search:true},
     {},{},{},{sopt : ['cn','eq']}
 );	   

 /*custom edit button */
 jQuery("#tpreembar").navGrid('#ptpreembar',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptpreembar',{caption:"", buttonicon:"ui-icon-pencil", onClickButton: function(){     
              var myGrid = $('#tpreembar'),
              selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
              cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
               
              if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 location.href="mod_salaPreembarque.php?ID="+cellValue+"&EDIT=edit";
              }else{
                 alert("Por favor seleccione una fila");
              }
              }, 
    position:"last"
 });	

 /*custom add button */
 jQuery("#tpreembar").navGrid('#ptpreembar',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptpreembar',{caption:"", buttonicon:"ui-icon-plus", onClickButton: function(){ 
              location.href='mod_salaPreembarque.php?nuevoalmacen=si';
              }, 
    position:"last"
 });		
 
 jQuery("#tpreembar").navGrid('#ptpreembar',{edit:false,add:false,del:false,search:false})
     .navButtonAdd('#ptpreembar',{caption:"", buttonicon:"ui-icon-trash", onClickButton: function(){     
             var myGrid = $("#tpreembar"),
             selectedRowId = myGrid.jqGrid ('getGridParam', 'selrow'),
             cellValue = myGrid.jqGrid ('getCell', selectedRowId, 'almacen_id');
               
             if (cellValue!==false){
                 /*pasa el vinculo con el id que se guardo en cellValue de la fila seleccionada*/
                 
                 if(confirm("SEGURO DE BORRAR ESTA SALA DE PREEMBARQUE ?")){
                     $.get('includes/baja_X_elemento.php?ID='+cellValue+'&datoRuta=almacenes1',function(respuesta){
                            if(respuesta){
                                    
                                    $("#tpreembar").trigger('reloadGrid');								   	                        
                             }
                     });
                 }// fin if confirm    
             }
             else{
                alert("Por favor seleccione una fila");
             }
             }, 
    position:"last"
 });

 $(".ui-jqgrid-titlebar").click(function() {
      $(".ui-jqgrid-titlebar-close", this).click();
 });