var eleccionTipoMuestra = $("#selMuestra").val();  
console.log(eleccionTipoMuestra);
$( "#seleccion" ).change(function () {
    $( "#seleccion option:selected" ).each(function() {
      eleccionTipoMuestra = $( this ).val();
      //console.log(eleccionTipoMuestra);
    });
    $("#listsg11").setGridParam({url:'../controller/tablaLaboratorio.php?tipoMuestra='+eleccionTipoMuestra});
    $("#listsg11").trigger("reloadGrid");     
  }).change();
var data=[]; //list of RowIDs for rows which have been ticked onSelectRow
var idsOfSelectedRows = [],
updateIdsOfSelectedRows = function (id, isSelected) {
    console.log("en el update");
    var index = $.inArray(id, idsOfSelectedRows);
    if (!isSelected && index >= 0) {
        idsOfSelectedRows.splice(index, 1); // remove id from the list
    } else if (index < 0) {
        idsOfSelectedRows.push(id);
    }
	console.log(idsOfSelectedRows);
};
jQuery("#listsg11").jqGrid({
   	url:'../controller/tablaLaboratorio.php?tipoMuestra='+eleccionTipoMuestra,
	datatype: "JSON",
	colNames:['Numero Presupuesto','Provincia','Fecha', 'Cosecha', 'Prioridad','Cant. Muestras'],
   	colModel:[
   		{name:'num_presupuesto',index:'num_presupuesto', align: 'center', width:250, resizable: true},
		{name:"provincia",index:"provincia",width:300, align: 'center', },   		
   		{name:'fecha',index:'fecha', width:200, align: 'center', resizable: true},
   		{name:'cosecha',index:'cosecha', width:200, align: 'center',  resizable: true},
   		{name:'prioridad',index:'prioridad', width:150, align: 'center',  resizable: true},
   		{name:'cantidad',index:'cantidad', width:200, align: 'center',  resizable: true},					
   	],
   	rowNum:15,
   	rowList:[10,20,30],
   	pager: '#pagersg11',
   	sortname: 'num_presupuesto',
    viewrecords: true,
    sortorder: "desc",	
	subGrid: true,
	width: 'auto',	
	height: 'auto',	
	caption: "Grilla de Muestras",	
	subGridRowExpanded: function(subgrid_id, row_id) {
		// we pass two parameters
		// subgrid_id is a id of the div tag created whitin a table data
		// the id of this elemenet is a combination of the "sg_" + id of the row
		// the row_id is the id of the row
		// If we wan to pass additinal parameters to the url we can use
		// a method getRowData(row_id) - which returns associative array in type name-value
		// here we can easy construct the flowing		 
		var subgrid_table_id, pager_id;
		subgrid_table_id = subgrid_id+"_t";
		pager_id = "p_"+subgrid_table_id;
		$("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
		jQuery("#"+subgrid_table_id).jqGrid({
			url:"../controller/grid/analisisSubgrid.php?tipoMuestra="+eleccionTipoMuestra+"&id="+row_id,
			datatype: "JSON",
			colNames: ['Muestras','Productor','Localidad','HMF','Color','Humedad','Acidez','Resultado','Observaciones'],
			colModel: [
				{name:"id_tambor",index:"id_tambor",width:80, align: 'center', key:true},
				{name:"productor",index:"productor",width:200, align: 'center', },
				{name:"localidad",index:"localidad",width:100, align: 'center', },
				{name:"hmf",index:"hmf",width:100, align: 'center', },
				{name:"color",index:"color",width:100, align: 'center', },				
				{name:"humedad",index:"humedad",width:100, align: 'center', },
				{name:"acidez",index:"acidez",width:100, align: 'center', },
				{name:"resultado",index:"resultado",width:100, align: 'center', },
				{name:"observaciones",index:"observaciones", width:250, align: 'center',editable:true,},
			],
			mtype: 'GET',
			'cellEdit': true,
			'cellsubmit':'clientArray',
			beforeSubmitCell: function(rowid, cellname, value, iRow, iCol){
                $.ajax({
				  url: '../controller/grid/analisisUpdObservaciones.php',
				  type: 'GET',
				  data: { ID: arguments[0], obs: arguments[2] }
				})						   
            },
			editurl: '../controller/grid/analisisUpdObservaciones.php',
		   	rowNum:100,
		   	rowList:[15,20,30,50,100,150,200,250,300],		   	
		   	sortname: 'id_tambor',
		    sortorder: "asc",
			multiselect: true,
			viewrecords:true,
			width:'100%',
		    height: '100%',
		    pager:pager_id,	

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
		jQuery("#"+subgrid_table_id).jqGrid('navGrid',"#"+pager_id,{edit:false,add:false,del:false});
	   	//analizar muestras donde se setean los tipos de analisis a realizar
		jQuery("#analizar").click(function(){     
		 var myGrid = $("#"+subgrid_table_id);		 
		 selectedRowId = myGrid.jqGrid ('getGridParam', 'selarrrow');
		 var tamselect = idsOfSelectedRows.sort(function(a,b){
	 		return a-b;
	 	 });
		 if(selectedRowId != 0){
		    location.href='definicionAnalisis.php?tambores='+selectedRowId;			
		 }
		 else{
			 //$("#c").show(300).delay(1000).hide(3000);
			console.log("Modal de Labo comun!");
			$("#myModal").modal({show: true});
			
		 }	 		
		});
		//grabar envia muestras seleccionadas para su edicion de analisis
		jQuery("#editar_analisis").click(function(){     
		 var myGrid = $("#"+subgrid_table_id);		
		 selectedRowId = myGrid.jqGrid ('getGridParam', 'selarrrow');         
		 var registrar = "registrar";
		 var tamselect = idsOfSelectedRows.sort(function(a,b){
	 		return a-b;
	 	 });
	 	 console.log(tamselect);
	 	 location.href='edicionMuestra.php?quiero='+registrar+'&tambores='+ tamselect ;
		});	
	    //ver
	    jQuery("#ver_analisis").click(function(){     
		 var myGrid = $("#"+subgrid_table_id);
		 selectedRowId = myGrid.jqGrid ('getGridParam', 'selarrrow');
	 	 var ver = "ver";
	 	 var tamselect = idsOfSelectedRows.sort(function(a,b){
	 		return a-b;
	 	 });
	 	 location.href='edicionMuestra.php?quiero='+ver+'&tambores='+ tamselect;
		});	
    },
	subGridRowColapsed:function(subgrid_id, row_id) {
	}   
});
jQuery("#listsg11").jqGrid('navGrid','#pagersg11',{add:false,edit:false,del:false,search:true},{},{},{},{sopt : ['cn','eq']} );