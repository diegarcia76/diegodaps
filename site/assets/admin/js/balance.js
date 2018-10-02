// JavaScript Document
var Balance = function() {

	var handleTable = function(){

		var table = $("#tblBalance").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 1, "desc" ]],
  			"pageLength": '3000',
			"lengthMenu": [[-1,'3000','2000',"1000","500","100"],['Todos','3000','2000',"1000","500","100"]],
			ajax: {
				url: __SITEURL+'admin/balance/datasource',
				type: 'POST'
			},
			"fnDrawCallback": function( oSettings ) {
				$('[data-toggle="tooltip"]').tooltip();
			},
			"footerCallback": function ( row, data, start, end, display ) {
	            var api = this.api(), data;

	            // Remove the formatting to get integer data for summation
	            var intVal = function ( i ) {
	                return typeof i === 'string' ?
	                    i.replace(/[\$,]/g, '')*1 :
	                    typeof i === 'number' ?
	                        i : 0;
	            };

	            // Total over all pages
	           /* total = api
	                .column( 4 )
	                .data()
	                .reduce( function (a, b) {
	                    return intVal(a) + intVal(b);
	                }, 0 );

	            totalComision = api
	                .column( 5 )
	                .data()
	                .reduce( function (a, b) {
	                    return intVal(a) + intVal(b);
	                }, 0 );*/
	            var total = 0;
	            var totalComision = 0;
	            /*$.ajax({
					url: __SITEURL+'admin/balance/getTotales',
					type: 'POST',
					dataType: 'json',
					success: function (jsonData){
						//alert(jsonData['total']);
						total = Math.round(intVal(jsonData['total']) *100 )/100;
						totalComision = Math.round(intVal(jsonData['totalComision']) *100 )/100;

						 // Total over this page
				            pageTotal = api
				                .column( 6, { page: 'current'} )
				                .data()
				                .reduce( function (a, b) {
				                    return Math.round((intVal(a) + intVal(b)) *100 )/100;
				                }, 0 );

				            pageTotalComision = api
				                .column( 7, { page: 'current'} )
				                .data()
				                .reduce( function (a, b) {
				                    return Math.round((intVal(a) + intVal(b)) *100 )/100;
				                }, 0 );

				            // Update footer
				            $( api.column( 5 ).footer() ).html(
				                '$'+pageTotal //+' ( $'+ total +' total)'
				            );

				            $( api.column( 6 ).footer() ).html(
				                '$'+pageTotal //+' ( $'+ total +' total)'
				            );

				            $( api.column( 7 ).footer() ).html(
				                '$'+pageTotalComision //+' ( $'+totalComision+')'
				            );

					}
				});*/

				// Total over this page
							pageTotalPrecio = api
				                .column( 5, { page: 'current'} )
				                .data()
				                .reduce( function (a, b) {
				                    return Math.round((intVal(a) + intVal(b)) *100 )/100;
				                }, 0 );

				            pageTotal = api
				                .column( 6, { page: 'current'} )
				                .data()
				                .reduce( function (a, b) {
				                    return Math.round((intVal(a) + intVal(b)) *100 )/100;
				                }, 0 );

				            pageTotalComision = api
				                .column( 7, { page: 'current'} )
				                .data()
				                .reduce( function (a, b) {
				                    return Math.round((intVal(a) + intVal(b)) *100 )/100;
				                }, 0 );

				            // Update footer
				            $( api.column( 5 ).footer() ).html(
				                '$'+pageTotalPrecio //+' ( $'+ total +' total)'
				            );

				            $( api.column( 6 ).footer() ).html(
				                '$'+pageTotal //+' ( $'+ total +' total)'
				            );

				            $( api.column( 7 ).footer() ).html(
				                '$'+pageTotalComision //+' ( $'+totalComision+')'
				            );



	        },
			language: {
				url: __SITEURL+'assets/common/plugins/datatables/Spanish.json'
			},
			columns: [
				{  // -1
					data: 'pago',
					name: 'p.id',
					orderable: false,
					searchable: false,
				},
				/*{  // 0
					data: 'Id',
					name: 'd.id',
					orderable: false,
					searchable: false,
					visible: false
				},*/
				{   // 1
					data: 'fecha',
					name: 'p.fecha',
					orderable: true,
					searchable: true
				},
				{   // 2
					data: 'coiffeur',
					name: 'c.nombre',
					orderable: true,
					searchable: true
				},
				{   // 3
					data: 'cliente_name',
					name: 'd.id',
					orderable: true,
					searchable: true
				},
				{   // 4
					data: 'descripcion',
					name: 'd.descripcion',
					orderable: true,
					searchable: true
				},
				{   // 5
					data: 'precio',
					name: 'd.precio',
					orderable: true,
					className: 'dt-right',
					searchable: true
				},
				{   // 5
					data: 'importe',
					name: 'd.id',
					orderable: true,
					className: 'dt-right',
					searchable: true
				},
				{   // 6
					data: 'comision',
					name: 'd.comision',
					orderable: true,
					searchable: true,
					className: 'dt-right'
				},
				{   // 7
					data: 'hidden',
					name: 'c.id',
					orderable: false,
					searchable: true,
					visible: false
				},
				{   // 8
					data: 'fechaActualDesde',
					name: 'd.fecha',
					orderable: false,
					searchable: false,
					visible: false
				},
				{   // 9
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
				"startDate": moment().format("DD/MM/YYYY"),
				"endDate": moment().format("DD/MM/YYYY"),
				"opens": "left",
				"drops": "down",
				"buttonClasses": "btn btn-sm",
				"applyClass": "btn-success",
				"cancelClass": "btn-default"
			}, function(start, end, label) {
			   // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
				var datatable = $("#tblBalance").DataTable();
				datatable.column(9)
						.search(start.format('DD/MM/YYYY'))
						.column(10)
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
			var datatable = $("#tblBalance").DataTable();
			datatable.column(8)
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
