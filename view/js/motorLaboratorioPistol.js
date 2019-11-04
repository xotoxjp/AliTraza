   var eleccionTipoMuestra2 = $("#selMuestra").val();  
   console.log(eleccionTipoMuestra2);

   $( "#seleccion" ).change(function () {
    $( "#seleccion option:selected" ).each(function() {
      eleccionTipoMuestra2 = $( this ).val();
      //console.log(eleccionTipoMuestra);
    });
    $("#gridanalisisp").setGridParam({url:'../controller/laboratorioPistolGrid.php?tipoMuestra='+eleccionTipoMuestra2});
    $("#gridanalisisp").trigger("reloadGrid");     
    }).change();

	
	var data=[]; //list of RowIDs for rows which have been ticked onSelectRow
    var idsOfSelectedRows = [],
    updateIdsOfSelectedRows = function (id, isSelected) {
        //console.log("en el update");
        var index = $.inArray(id, idsOfSelectedRows);
        if (!isSelected && index >= 0) {
            idsOfSelectedRows.splice(index, 1); // remove id from the list
        } else if (index < 0) {
            idsOfSelectedRows.push(id);
        }
        //console.log(idsOfSelectedRows);
    };
	
	jQuery("#gridanalisisp").jqGrid({
		url:'../controller/laboratorioPistolGrid.php?tipoMuestra='+eleccionTipoMuestra2,
		datatype: "JSON",
		colNames:['Muestra','Presupuesto','Productor','Localidad','HMF','Color','Humedad','Acidez','Resultado','Observaciones'],
		colModel:[
			{name:"id_tambor",index:"id_tambor",width:100, align: 'center', },
			{name:"num_presupuesto",index:"num_presupuesto",width:100, align: 'center', },
			{name:"productor",index:"razon_social",width:200, align: 'center', },
			{name:"localidad",index:"localidad",width:200, align: 'center', },
			{name:"hmf",index:"hmf",width:100, align: 'center', },
			{name:"color",index:"color",width:100, align: 'center', },				
			{name:"humedad",index:"humedad",width:100, align: 'center', },
			{name:"acidez",index:"acidez",width:100, align: 'center', },
			{name:"resultado",index:"resultado",width:100, align: 'center', },
			{name:"observaciones",index:"observaciones", width:200, align: 'center', editable:true,},			
		],
		rowNum:30,
		rowList:[15,20,30,50,100,150,200,250,300],
		pager: '#pgridanalisisp',
		sortname: 'id_tambor',
		sortorder: "desc",
		mtype: 'GET',
		'cellEdit': true,
		'cellsubmit':'clientArray',
		beforeSubmitCell: function(rowid, cellname, value, iRow, iCol){
           $.ajax({
				url: '../frames/subgrid/upd_observaciones.php',
				type: 'GET',
				data: { ID: arguments[0], obs: arguments[2] }
			})						   
        },
        editurl: '../frames/subgrid/upd_observaciones.php',
		multiselect: true,
		viewrecords:true,		
		width: 'auto',	
		height: 'auto',	
		caption: "Seleccione Analisis",
		
		onSelectRow: function (rowid){ 
			data.push(rowid); 
			updateIdsOfSelectedRows(rowid);
		},
		onSelectAll: function (aRowids, isSelected) {
        	var i, count, id;
	        for (i = 0, count = aRowids.length; i < count; i++) {
	            id = aRowids[i];
	            updateIdsOfSelectedRows(id, isSelected);
	        }
    	},
	    loadComplete: function () {
	        var $this = $(this), i, count;
	        for (i = 0, count = idsOfSelectedRows.length; i < count; i++) {
	            $this.jqGrid('setSelection', idsOfSelectedRows[i], false);
	        }
	    } 		
	});  

	jQuery("#gridanalisisp").jqGrid('filterToolbar', {searchOperators: true}, {searchOnEnter: true} );

	//analizar muestras donde se setean los tipos de analisis a realizar
	jQuery("#analizar").click(function(){     
		var myGrid = $("#gridanalisisp");
		selectedRowId = myGrid.jqGrid ('getGridParam','selarrrow');
		if(selectedRowId != 0){
		    var tamselect = idsOfSelectedRows.sort(function(a,b){
	 		return a-b;
	 		});
			location.href='definicionAnalisis.php?tambores='+tamselect;			
		}
		else{
		 	//$("#c").show(300).delay(1000).hide(3000);
			//$("#c").html("<strong>NO HA SELECCIONADO NINGUNA MUESTRA AUN!</strong>");
			console.log("Modal de Labo Pistol!");
			$("#myModal").modal({show: true});	
		}
	});
	
	
	//grabar envia muestras seleccionadas para su edicion de analisis
	jQuery("#editar_analisis").click(function(){     
		var myGrid = $("#gridanalisisp");
	 	selectedRowId = myGrid.jqGrid ('getGridParam','selarrrow');
	 	var registrar = "registrar";
	 	var tamselect = idsOfSelectedRows.sort(function(a,b){
	 		return a-b;
		 });
	 	//console.log(tamselect);
		if(tamselect>0){
			location.href='edicionMuestra.php?quiero='+registrar+'&tambores='+ tamselect ;
		}else{
			$("#myModal").modal({show: true});
		}
		 
	});	
	
    //ver
    jQuery("#ver_analisis").click(function(){     
	 	var myGrid = $("#gridanalisisp");
	 	selectedRowId = myGrid.jqGrid ('getGridParam', 'selarrrow');
	 	var ver = "ver";
	 	var tamselect = idsOfSelectedRows.sort(function(a,b){
	 		return a-b;
		});
		if(tamselect>0){
			location.href='edicionMuestra.php?quiero='+ver+'&tambores='+ tamselect;
		}else{
			$("#myModal").modal({show: true});
		}
	});