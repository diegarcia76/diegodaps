// JavaScript Document
var Tickets = function() {
	
	var handleTable = function(){
		
		var table = $("#tblTickets").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 0, "desc" ]],
  			"pageLength": '100',
			"lengthMenu": ["100","50","10"],
			ajax: {
				url: __SITEURL+'admin/tickets/datasource',
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
					data: 'Nro',
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
				{   // 2
					data: 'Cliente',
					name: 'd.id',
					orderable: true,
					searchable: true
				},
				{   // 2
					data: 'Estado',
					name: 'd.id',
					orderable: true,
					searchable: true
				},
				{   // 3
					data: 'Total',
					name: 'd.id',
					orderable: true,
					searchable: true
				},
				{   // 11
					data: 'acciones',
					orderable: false,
					searchable: false,
					width: '240px'
				},
				{   // 6
					data: 'hidden',
					name: 'c.id',
					orderable: false,
					searchable: true,
					visible: false
				}
				
			]						
		});
	}


var handleFiltros = function(){
		
		$('#filtro-cliente').change(function(){
			var clienten = $(this).val();
			if (!clienten){
				clienten = '';
			}
			var datatable = $("#tblTickets").DataTable();
			datatable.column(6)
                    .search(clienten)
                    .draw();
			//handleSubt();
		});
				
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