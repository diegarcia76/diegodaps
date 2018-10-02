var Horarios = function () {

	var validateForm = function(){
		// for more info visit the official plugin documentation: 
		// http://docs.jquery.com/Plugins/Validation

		var forms = $('#frmPremios, #frmAusencias');
		
		forms.each(function(){

			var form1 = $(this);

			form1.ajaxForm({ 
				success: function(jsonData){
					//alert(jsonData.url);
					if (jsonData.status == true){
						WebDialogs.doAlert({
							message: jsonData.message,
							title: '',
							onConfirm: function(){
								window.location = __SITEURL+'admin/coiffeurs/'+jsonData.url;
							}
						});
					
					} else {
						WebDialogs.doAlertError({
							message: jsonData.message,
							title: jsonData.title
						});							
					}			
				},
				dataType: 'json'
			}); 
		});


	};
	
	
	var handleBtnEliminar = function(){
		$('#tblPremiosSorteo').on('click','.btnEliminarPremio',function(e){
			e.preventDefault();
			$(this).closest('tr').remove();
			refreshPuestos();	
		});
	};
	
	var refreshPuestos = function(){
		$('#tblPremiosSorteo tbody').find('tr').each(function(index, element){
			var pos = index + 1;
			$(element).find('td:nth-child(2)').html('<strong>'+pos+'Âº</strong>');
		});
	}

	
	var handleBtnAdd = function(){

		$('.form-control.timepicker').timepicker({'showMeridian': false});
		/*
		$('#wpr-imagenes-carrusel').on('click','.timepicker', function(e){
			e.preventDefault();
			$(this).timepicker();
		});
	*/
		$('.btnAddPremio').click(function(e){
			e.preventDefault();
			//alert('a');
			/*var pos = $('#tblPremiosSorteo tbody tr').size() + 1;
			
			var htmlData = '';
			    htmlData += '             <tr>';
			    htmlData += '             	<td><select name="dia[]"> ';                
                htmlData += '   	          	</select>';
                htmlData += '             	</td>';
			    htmlData += '             	<td><input type="text" name="horaDesde[]" value="" required class="required" /></td>';
			    htmlData += '                <td><input type="text" name="horaHasta[]" value="" required class="required"/></td>';
			    htmlData += '             	<td><input type="text" name="duracion[]" value="" required class="required"/></td>';				 
			    htmlData += '             	<td><a class="btn mini red btnEliminarPremio" href="#"><i class="icon-remove"></i></a></td>';
			    htmlData += '             </tr>';
			
			
			$('#tblPremiosSorteo').find('tbody').append(htmlData);*/

			var aHorario = $('#diapositiva-layout').find('tr').clone();
			aHorario.show().removeAttr('id');
			$('#wpr-imagenes-carrusel').append(aHorario);
			$('.form-control.timepicker').timepicker({'showMeridian': false});

		});

		$('#wpr-imagenes-carrusel').on('click','.admin-imagen-carrusel .acctions a.btnEliminar', function(e){
			e.preventDefault();
			$(this).closest('.admin-imagen-carrusel').remove();
		});

		$('#wpr-imagenes-carrusel').on('click','.admin-imagen-carrusel .acctions a.btnAgregar', function(e){
			e.preventDefault();
			var aHorario = $('#diapositiva-layout').find('tr').clone();
			aHorario.show().removeAttr('id');
			$(this).closest('.admin-imagen-carrusel').after(aHorario);
			$('.form-control.timepicker').timepicker({'showMeridian': false});
		});

	};
	
	var handleSortable = function(){
		$('#tblPremiosSorteo tbody').sortable({
			handle: 'i.icon-fullscreen',
			stop: function( event, ui ) {
				refreshPuestos();	
			}
		});
	}

	var handleAusencias = function(){

		// ELiminar
		$('#tblAusencias').on('click','.btnEliminar',function(e){
			e.preventDefault();
			$(this).closest('tr').remove();
		});


		$('#tblAusencias').on('click','.btnAgregar, .btnAddAusencia', function(e){
			e.preventDefault();
			var aHorario = $('#ausencia-layout').find('tr').clone();
			aHorario.show().removeAttr('id');
			$(this).closest('.tr-ausencia').after(aHorario);
			$('.form-control.datepicker').datepicker({
				  format: 'yyyy-mm-dd',
				  autoclose: true,
				  forceParse: false,
				  Default: true,
				  pickDate: true,
				  todayHighlight: true,
				  language: 'es',

			});
		});


		$('.btnAddAusencia').click(function(e){
			e.preventDefault();

			var aAusencia = $('#ausencia-layout').find('tr').clone();
			aAusencia.show().removeAttr('id');
			$('#wpr-ausencias-body').append(aAusencia);
			$('.form-control.datepicker').datepicker({
				  format: 'yyyy-mm-dd',
				  autoclose: true,
				  forceParse: false,
				  Default: true,
				  pickDate: true,
				  todayHighlight: true,
				  language: 'es',

			});

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

	var handleFiltros = function(){
		$('#busqueda_avanzada').on('change','.filtros', function(){

			//alert('sd');
			//if( ( $('#filtro-fecha').val() > 0 ) && ( $('#filtro-coiffeur').val() > 0 ) ){
				//$('#frmPremios').removeClass('hidden');

				window.location.href = __SITEURL+'admin/coiffeurs/administrar_horarios_especiales/'+$('#filtro-fecha').val() +'/'+$('#filtro-coiffeur').val();

			/*else{
				$('#frmPremios').addClass('hidden');
			}*/

		});

		//$('.filtros').trigger('change');

	}

    return {
        //main function to initiate the module
        init: function () {
			validateForm();
			handleBtnEliminar();
			handleBtnAdd();
			handleSortable();
			handleAusencias();
			handleSelect();
			handleFiltros();
		}
	};

}();
