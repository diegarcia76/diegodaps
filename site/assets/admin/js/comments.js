// JavaScript Document
var Comments = function() {
	
	var handleTable = function(){
		
		var table = $("#tblComentarios").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 0, "desc" ]],
			"pageLength": '1000',
			"lengthMenu": [[-1,'1000','500',"200","100","50"],['Todos','1000','500',"200","100","50"]],
			ajax: {
				url: __SITEURL+'admin/comments/datasource',
				type: 'POST'
			},
			"fnDrawCallback": function( oSettings ) {
				$('[data-toggle="tooltip"]').tooltip();
			},				
			language: {
				url: __SITEURL+'assets/common/plugins/datatables/Spanish.json'
			},
			columns: [
				{  // 0
					data: 'Id',
					name: 'd.id',
					orderable: false,
					searchable: false,
				},
				{   // 1
					data: 'fecha',
					name: 'd.id',
					orderable: true,
					searchable: true
				},
				{   // 4
					data: 'cliente',
					name: 'd.id',
					orderable: true,
					searchable: true
				},
				{   // 5
					data: 'comentario',
					name: 'd.comentario',
					orderable: true,
					searchable: true
				},
				{   // 6
					data: 'hidden',
					name: 'c.id',
					orderable: false,
					searchable: true,
					visible: false
				},
				
				
				
				
			]						
		});
	}

var handleFiltros = function(){
		
		$('#filtro-cliente').change(function(){
			var clienten = $(this).val();
			if (!clienten){
				clienten = '';
			}
			var datatable = $("#tblComentarios").DataTable();
			datatable.column(4)
                    .search(clienten)
                    .draw();
			//handleSubt();
		});
				
	}
	
	var handleSpinners = function(){
		$('.spinner_fed').spinner({value:0, min: 0, max: 9999});
	}

	

	

	var handleSelect = function(){
		$('select.select2').each(function(){
			var thePlaceholder = $(this).attr('placeholder');
			$(this).select2({
				placeholder: thePlaceholder,
				allowClear: true
			});
		});
	}

	
    return {
		initListado: function(){
			handleSelect();
			handleTable();
			handleFiltros();
			},
	
	}
}();