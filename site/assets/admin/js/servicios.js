// JavaScript Document
var Servicios = function() {
	
	var handleTable = function(){
		
		var table = $("#tblServicios").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 1, "asc" ]],
			ajax: {
				url: __SITEURL+'admin/servicios/datasource',
				type: 'POST'
			},
			"fnDrawCallback": function( oSettings ) {
				$('[data-toggle="tooltip"]').tooltip();
			},	
			language: {
				url: __SITEURL+'assets/common/plugins/datatables/Spanish.json'
			},
			columns: [
				{ 
					data: 'id',
					name: 'd.id',
					orderable: false,
					searchable: false,
					visible: false
				},
				{   // 2
					data: 'nombre',
					name: 'd.nombre'
				},				
				{   // 4
					data: 'precio',
					name: 'd.precio_default',
					orderable: true,
					searchable: true
				},				
				{   // 4
					data: 'comision',
					name: 'd.comision_default',
					orderable: true,
					searchable: true
				},				
				{   // 4
					data: 'duracion',
					name: 'd.duracion',
					orderable: true,
					searchable: true
				},				
				{   // 4
					data: 'servicio',
					name: 'd.servicioEnApp',
					orderable: true,
					searchable: true
				},
				{   // 11
					data: 'acciones',
					orderable: false,
					searchable: false,
					width: '240px'
				}
				
				
				
			]						
		});
	}


	
	var handleForm = function(){
		$('#frmSaveServicios').each(function(){
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
					
					if ($(form).find('#files-container').find('.btn-process').size() > 0){
						
						$(form).find('fieldset').attr('disabled',true);
						$(form).find('#files-container').find('.btn-process').each(function(){
							var aData = $(this).data();
							var aBtn = $(this);
							aData.submit().always(function () {
								aBtn.html('Subido!').removeClass('btn-primary').addClass('btn-success');
							});						
						});
	
						return false;
					} else {
						submitForm();
					}
					
				}
			});	

		});	
	}
		
	
	var handleDelete = function(){
		$('#tblServicios').on('click','a.btn-eliminar', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de eliminar el Servicio <strong>'+usuarioNombre+'</strong>. Si esta seguro que desea eliminar el Servicio haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer eliminar el Servicio?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								$('#tblServicios').DataTable().draw();
							} else {
								alert(jsonData.message);
							}
						}
					});
				}
			});
			
		});
	}

	var handleDeleteVer = function(){
		$('.btn-eliminar-servicio').on('click', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de eliminar el Servicio <strong>'+usuarioNombre+'</strong>. Si esta seguro que desea eliminar el Servicio haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer eliminar el Servicio?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								window.location.href = __SITEURL + 'admin/servicios';
							} else {
								alert(jsonData.message);
							}
						}
					});
				}
			});
			
		});
	}

	var handleSpinners = function(){
		$('.spinner_fed').spinner({value:0, min: 0, max: 9999});
	}


	var submitForm = function(){
			
		var form = $('#frmSaveServicios');
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
							window.location.href = __SITEURL+'admin/servicios';
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

	var handleImageThumb = function(){
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#imageThumb').attr('src', e.target.result);
	            }

	            reader.readAsDataURL(input.files[0]);
	        }
	    }

	    $("#imagen").change(function(){
	    	//alert('asdasd');
	        readURL(this);
	    });
	}
	
	var handleListadoPrecios = function(){

		$('.frmCambiarPrecioServicio').each(function(){
			var aForm = $(this);
			aForm.ajaxForm({
				type: 'post',
				dataType: 'json',
				beforeSubmit: function(formData, jqForm, options){
				
					aForm.closest('tr').find('button[type="submit"]').html('GUARDANDO...').attr('disabled','disabled');
					
				},
				success: function(jsonData){
					//alert(jsonData.status);
					aForm.closest('tr').find('button[type="submit"]').html('GUARDAR').removeAttr('disabled');
					if (jsonData.status == true){
						aForm.closest('TR').removeClass('warning');
						aForm.closest('TR').addClass('success');
					} else {
						aForm.closest('TR').addClass('danger');
					}
				}
			});
		});


		$('input.number').change(function(){
			if ($(this).val() != $(this).data('default')){
				$(this).closest('TR').addClass('warning');
			} else {
				$(this).closest('TR').removeClass('warning');
			}
		});
	}

	var handleNumberInput = function(){
		$('input.number').number(true, 2);
	}

	var handleGuardarTodos = function(){
		$('#guardar_todos').on('click', function(e){
			e.preventDefault();
			
			if($('tr.warning').length>0)
				$('tr.warning').find('.frmCambiarPrecioServicio').submit();
			
		});
	}
	
	
	var handleEliminarTodos = function(){
		$('#eliminar_todos').on('click', function(e){
			e.preventDefault();
			var lote = new Array ();
			var elimina =  $('input[name="eliminar[]"]');
			//alert(lote);
			for(i = 0; i < elimina.length; i++){
				if (elimina[i].checked){
				lote[i]=elimina[i].value;
				//alert("SI");	
					}
					
					//
				
				//alert(lote[i]);
			}
			
			
			WebDialogs.doLoading({
				message: 'Eliminando Seleccionados',
				title: 'Eliminar'						
			});

			$.ajax({
				url: __SITEURL+'admin/servicios/eliminar_todos/',
				data: {
					lote:lote
				},
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){					
					//alert(jsonData.message);
					WebDialogs.doCloseLoading();
					
					WebDialogs.doAlert({
						message: 'Se realizó la operación',
						title: 'Éxito',
						onConfirm: function(){
							window.location.reload();
						}
					});
				}
			});
			
		});
	}

    return {
		initListado: function(){
			handleTable();
			handleDelete();
		},
		initForm: function(archivos){
			handleForm();			
			handleSpinners();
			handleImageThumb();
			//handleFileUpload(archivos);
		},
		initVer: function(){
			handleDeleteVer();
		},
		initListadoPrecios: function(){
			handleNumberInput();
			handleListadoPrecios();
			handleGuardarTodos();
			handleEliminarTodos();
		}
	}
}();