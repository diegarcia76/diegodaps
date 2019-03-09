// JavaScript Document
var Caja = function() {
	
	var handleTable = function(){
		
		var table = $("#tblTickets").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 0, "desc" ]],
  			"pageLength": '100',
			"lengthMenu": ["100","50","10"],
			ajax: {
				url: __SITEURL+'admin/caja/datasource',
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
				{   // 11
					data: 'acciones',
					orderable: false,
					searchable: false,
					width: '20px'
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
				{   // 3
					data: 'Totale',
					name: 'd.totale',
					orderable: true,
					searchable: true
				},
				{   // 3
					data: 'Totalt',
					name: 'd.totalt',
					orderable: true,
					searchable: true
				},
				{   // 3
					data: 'forma',
					name: 'd.id',
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
				{   // 6
					data: 'hidden',
					name: 'd.forma',
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
			datatable.column(9)
                    .search(clienten)
                    .draw();
			//handleSubt();
		});
		
		$('#filtro-forma').change(function(){
			var clienten = $(this).val();
			if (!clienten){
				clienten = '';
			}
			var datatable = $("#tblTickets").DataTable();
			datatable.column(10)
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

var handleDelete = function(){
		$('#tblTickets').on('click','a.btn-eliminar', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de eliminar el Pago. Si esta seguro que desea eliminar el Pago haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer eliminar el Pago?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								$('#tblTickets').DataTable().draw();
							} else {
								alert(jsonData.message);
							}
						}
					});
				}
			});
			
		});
	}
	
	
    return {
		initListado: function(){
			handleSelect();
		    handleTable();
			handleFiltros();
			handleDelete();
		},
	}
}();