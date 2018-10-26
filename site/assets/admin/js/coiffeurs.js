// JavaScript Document
var Coiffeurs = function() {
	
	var handleTable = function(){
		
		var table = $("#tblCoiffeurs").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 0, "desc" ]],
			ajax: {
				url: __SITEURL+'admin/coiffeurs/datasource',
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
					data: 'foto',
					name: 'd.id',
					orderable: false,
					searchable: false,
				},
				{   // 2
					data: 'nombre',
					name: 'd.nombre'
				},				
				{   // 4
					data: 'descripcion',
					name: 'd.descripcion',
					orderable: true,
					searchable: true
				},
				{   // 11
					data: 'acciones',
					orderable: false,
					searchable: false,
					width: '280px'
				}
				
				
				
			]						
		});
	}


	
	var handleForm = function(){
		$('#frmSaveCoiffeurs').each(function(){
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
		$('#tblCoiffeurs').on('click','a.btn-eliminar', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de eliminar el Coiffeur <strong>'+usuarioNombre+'</strong>. Si esta seguro que desea eliminar el Coiffeur haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer eliminar el Coiffeur?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								$('#tblCoiffeurs').DataTable().draw();
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
		$('.btn-eliminar-coiffeur').on('click', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de eliminar el Coiffeur <strong>'+usuarioNombre+'</strong>. Si esta seguro que desea eliminar el Coiffeur haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer eliminar el Coiffeur?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								window.location.href = __SITEURL + 'admin/coiffeurs';
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
			
		var form = $('#frmSaveCoiffeurs');
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
							window.location.href = __SITEURL+'admin/coiffeurs';
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
				url: __SITEURL+'admin/coiffeurs/eliminar_todos/',
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
			handleEliminarTodos();
		},
		initForm: function(archivos){
			handleForm();			
			handleSpinners();
			handleImageThumb();
			//handleFileUpload(archivos);
		},
		initVer: function(){
			handleDeleteVer();
		}
	}
}();