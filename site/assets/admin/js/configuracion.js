// JavaScript Document
var Configuracion = function() {
	
	
	var handleForm = function(){
		$('#frmSaveConfiguracion').each(function(){
			var aForm = $(this);
			
			aForm.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },


                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },
				
				error: function(){
					alert('error');
				},
	
				success: function (label) {
					label
						.addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
						.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				},
					
				submitHandler: function (form) {
					
					submitForm();
					
				}
			});	

		});	
	}
		

	var handleSpinners = function(){
		$('.spinner_fed').spinner({value:0, min: 0, max: 9999});
	}


	var submitForm = function(){
			
		var form = $('#frmSaveConfiguracion');
		$(form).ajaxSubmit({
			dataType: 'json',
			type: 'post',
			
			beforeSubmit: function(formData, jqForm, options){
				
				$(jqForm[0]).find('button[type="submit"]').html('Enviando...').attr('disabled','disabled');
				var span = $('<span>').addClass('loading');
				var icon = $('<i>').addClass('fa fa-circle-o-notch fa-spin');
				
				$(jqForm[0]).find('button[type="submit"]').parent().append(span.append('&nbsp;').append(icon).append('&nbsp;Validando datos&nbsp;'));							
	
			},
	
			success: function(jsonData, statusText, xhr, jqForm){
			
				//alert(jsonData);
				$(jqForm[0]).find('button[type="submit"]').html('Guardar').removeAttr('disabled');
				$(jqForm[0]).find('span.loading').remove();						
				
				if (jsonData.status == true){
					WebDialogs.doAlert({
						message: jsonData.message,
						title: jsonData.title,
						onConfirm: function(){
							window.location.href = __SITEURL+'admin/configuracion';
						}
					});
					
				} else {
					WebDialogs.doAlertError({
						message: jsonData.message,
						title: jsonData.title,
						onConfirm: function(){
							$(form).find('fieldset').attr('disabled',false);							
						}

					});							
				}
	
				// alert(jsonData.message);
				
			}
		});

	}

	var handleHorasEspeciales = function(){

		$('.form-control.datepicker').datepicker({
			  format: 'yyyy-mm-dd',
			  autoclose: true,
			  forceParse: false,
			  Default: true,
			  pickDate: true,
			  todayHighlight: true,
			  language: 'es',

		});

		// ELiminar
		$('#tblHorariosEspeciales').on('click','.btnEliminar',function(e){
			e.preventDefault();
			var id = $(this).closest('.tr-especial').find('.horario_especial_id').val();
			var tr_a_eliminar = $(this).closest('tr');
			//alert(id);
			//revisar que no tenga horarios asociados
			$.ajax({
				url: __SITEURL+'admin/configuracion/tieneHorariosAsociados/'+id,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
					if (jsonData.status == true){
						//$('#tblServicios').DataTable().draw();
						WebDialogs.doConfirm({
							message: 'Este Rango de Fechas tiene fechas de coiffeur asociadas. ¿Está Seguro?',
							title: '¿Está seguro de querer eliminarlas?',
							onConfirm: function(){
								tr_a_eliminar.remove();
								regenerateHorariosIds()
							}
						});

					} else{
						tr_a_eliminar.remove();
						regenerateHorariosIds();
					}

				}
			});
	
		
		});


		$('#tblHorariosEspeciales').on('click','.btnAddEspecial', function(e){
			e.preventDefault();
			//$('#especial-layout').find('.btnEditar').addClass('hidden');
			var aHorario = $('#especial-layout').find('tr').clone(false);	
			//$(this).closest('.tr-especial').after(aHorario);
			
			aHorario.find('.btnEditar').addClass('hidden');

			$('#wpr-especial-body').append(aHorario);	

			$('.form-control.datepicker').datepicker({
				  format: 'yyyy-mm-dd',
				  autoclose: true,
				  forceParse: false,
				  Default: true,
				  pickDate: true,
				  todayHighlight: true,
				  language: 'es',

			});

			regenerateHorariosIds();
		});


		/*$('.btnAddEspecial').click(function(e){
			e.preventDefault();

			var aAusencia = $('#especial-layout').find('tr').clone();
			aAusencia.show().removeAttr('id');
			$('#wpr-especial-body').append(aAusencia);
			$('.form-control.datepicker').datepicker({
				  format: 'yyyy-mm-dd',
				  autoclose: true,
				  forceParse: false,
				  Default: true,
				  pickDate: true,
				  todayHighlight: true,
				  language: 'es',

			});

		});*/


	}

	var regenerateHorariosIds = function(){
		
		$('#wpr-especial-body .fechaInicio').each(function(index, element){
			$(element).attr('id','fechaInicio-'+index)
		});

		$('#wpr-especial-body .fechaFin').each(function(index, element){
			$(element).attr('id','fechaFin-'+index)
		});
	
	}
	

    return {		
		initForm: function(){
			handleForm();			
			handleSpinners();	
			handleHorasEspeciales();
		}
	}
}();