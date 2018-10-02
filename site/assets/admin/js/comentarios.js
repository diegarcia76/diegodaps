// JavaScript Document
var Comentarios = function() {
	
	var handleTable = function(){
		
		var table = $("#tblComentarios").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 0, "desc" ]],
			"pageLength": '1000',
			"lengthMenu": [[-1,'1000','500',"200","100","50"],['Todos','1000','500',"200","100","50"]],
			ajax: {
				url: __SITEURL+'admin/comentarios/datasource',
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
				{   // 2
					data: 'coiffeur',
					name: 'd.id',
					orderable: true,
					searchable: true
				},
				{   // 3
					data: 'estrellas',
					name: 'd.estrellas',
					orderable: true,
					className: 'dt-right',
					searchable: true
				},
				{   // 4
					data: 'cliente',
					name: 'd.id',
					orderable: false,
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
				{   // 7
					data: 'fechaActualDesde',
					name: 'd.fecha',
					orderable: false,
					searchable: false,
					visible: false
				},
				{   // 8
					data: 'fechaActualHasta',
					name: 'd.fecha',
					orderable: false,
					searchable: false,
					visible: false
				}
				
			]						
		});
	}


	
	var handleSpinners = function(){
		$('.spinner_fed').spinner({value:0, min: 0, max: 9999});
	}

	var handleDatepickers = function(){
				
		
		if (jQuery().daterangepicker) {
            $('#filtro-fecha').daterangepicker({
				"timePickerIncrement": 1,
				ranges: {
				   'Hoy': [moment(), moment()],
				   'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				   'Últimos 7 dí­as': [moment().subtract(6, 'days'), moment()],
				   'Últimos 30 dí­as': [moment().subtract(29, 'days'), moment()],
				   'Este mes': [moment().startOf('month'), moment().endOf('month')],
				   'Último Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				"locale": {
				    format: 'DD/MM/YYYY',
					"applyLabel": "Aplicar",
					"cancelLabel": "Cancelar",
					"fromLabel": "Desde",
					"toLabel": "hasta",
					"customRangeLabel": "Editar",
					"daysOfWeek": [
						"Do",
						"Lu",
						"Ma",
						"Mi",
						"Ju",
						"Vi",
						"Sa"
					],
					"monthNames": [
						"Enero",
						"Febrero",
						"Marzo",
						"Abril",
						"Mayo",
						"Junio",
						"Julio",
						"Agosto",
						"Septiembre",
						"Octubre",
						"Noviembre",
						"Diciembre"
					],
					"firstDay": 1
				},
				"startDate": moment().subtract(365, 'days').format("DD/MM/YYYY"),
				"endDate": moment().format("DD/MM/YYYY"),
				"opens": "left",
				"drops": "down",
				"buttonClasses": "btn btn-sm",
				"applyClass": "btn-success",
				"cancelClass": "btn-default"
			}, function(start, end, label) {
			   // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
				var datatable = $("#tblComentarios").DataTable();
				datatable.column(7)
						.search(start.format('DD/MM/YYYY'))
						.column(8)
						.search(end.format('DD/MM/YYYY'))
						.draw();

			});
			
			
			
        }
	}	

	var handleFiltros = function(){
		
		$('#filtro-coiffeur').change(function(){
			var clienten = $(this).val();
			if (!clienten){
				clienten = '';
			}
			var datatable = $("#tblComentarios").DataTable();
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
			handleFiltros();
			handleSelect();
			handleTable();
			handleDatepickers();
		},
		/*initForm: function(archivos){
			handleForm();			
			handleSpinners();
			handleImageThumb();
			//handleFileUpload(archivos);
		},
		initVer: function(){
			handleDeleteVer();
		}*/
	}
}();