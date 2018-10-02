// JavaScript Document
var Registro = function () {


	var handleRegistroForm = function(){

		$('form.frmRegistro').each(function(){

			var loginFrom;
			var aForm = $(this);

			loginFrom = aForm.validate({

				errorElement: 'span', //default input error message container
				errorClass: 'text-danger', // default input error message class
				focusInvalid: true, // do not focus the last invalid input
				ignore: "",
				/* rules: {
					username: {
						email:true,
						required: true
					},
					pass: {
						required: true,
						minlength: 6,
						maxlength: 15,
					}
				 },*/
				errorPlacement: function(error, element) {
					error.appendTo( element.closest('.form-group') );
				},
				submitHandler: function(form){

					$(form).ajaxSubmit({
						dataType: 'json',
						beforeSubmit: function(formData, jqForm, options){
							$(jqForm[0]).find('button[type="submit"]').html('<i class="fa fa-circle-o-notch fa-spin"></i> Registrando usuario...').attr('disabled','disabled');
						},
						success: function(jsonData, statusText, xhr, jqForm){

							$(jqForm[0]).find('button[type="submit"]').html('Ingresar').removeAttr('disabled');
							$(jqForm[0]).find('span.loading').remove();
							//alert(jsonData.status);
							if (jsonData.status == true){
									//window.location.reload();

								WebDialogs.doAlert({
									message: jsonData.message,
									title: jsonData.title,
									onConfirm: function(){
										window.location.href = __SITEURL+'home';
									}
								});

									/*if(jsonData.calendario == true){
										window.location.href = __SITEURL + 'servicios/ver/'+jsonData.servicio_id;
									}else{
										window.location.href = __SITEURL;
									}*/

							} else {
								//alert(jsonData.message);

								WebDialogs.doAlertError({
									message: jsonData.message,
									title: 'Error'
								});

							}
						}
					});

				}
			});
		});
	}


	var handleRecuperarPass = function(){
		// Trigger Modal Forgot Password
		var forgotPasswordForm;
		
				
		forgotPasswordForm = $('form#form_forgot').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'text-danger has-error', // default input error message class
			focusInvalid: true, // do not focus the last invalid input
			ignore: "",
			rules:{
				'email':{
					required: true,
					email: true,
					maxlength: 50,
				}
			},
			submitHandler: function(form){
				var actualBtnText;
				$(form).ajaxSubmit({
					dataType: 'json',
					beforeSubmit: function(){
						 actualBtnText = $(form).find('button[type="submit"]').html();
						 $(form).find('button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i> '+actualBtnText).attr('disabled','disabled');						
					},
					success: function(jsonData){

						$(form).find('button[type="submit"]').html(actualBtnText).removeAttr('disabled');						
						
						if (jsonData.status == true){
							
							//$(form).resetForm();
							
							//A PAGINA
							//$('#modal-olvido-pass').modal('show');
							WebDialogs.doAlert({
								message: jsonData.message,
								title: 'Recuperar ContraseÃ±a',
								onConfirm: function(){
									window.location.href = __SITEURL+'home';
								}
							});
							

						} else {
							//$('#modal-olvido-pass-error').modal('show');
							WebDialogs.doAlertError({
									message: jsonData.message,
									title: 'Error'
								});
						}
					}
				});
			}
		});
	
		
	}

	var handleFormRecover = function(){
		
		var recoveryForm;
		
		recoveryForm = $('form#reset_password').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'text-danger has-error', // default input error message class
			focusInvalid: true, // do not focus the last invalid input
			ignore: "",
			rules:{
				'email_reset':{
					required: true,
					minlength: 2,
				},
				'pass':{
					required: true,
					minlength: 6,
					maxlength: 15,
					equalTo: '#pass2'
				},
				'pass2':{
					required: true,
					minlength: 6,
					maxlength: 15,
				}
				
			},
			submitHandler: function(form){
				var actualBtnText;
				$(form).ajaxSubmit({
					dataType: 'json',
					beforeSubmit: function(){
						 actualBtnText = $(form).find('button[type="submit"]').html();
						 $(form).find('button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i> '+actualBtnText).attr('disabled','disabled');						
						 $(form).find('.wpr-error-message').addClass('hidden');
						 $(form).find('.error-message').html();
					},
					success: function(jsonData){

						$(form).find('button[type="submit"]').html(actualBtnText).removeAttr('disabled');						

						if (jsonData.status == true){
							//SACAR Y REDIRECT
							$('#modal-olvido-pass-ok').modal('show');
						} else {
							$('#modal-olvido-passw-error').modal('show');
						}
						
					}
				});
			}
		});
		
	}

	var handleRateitSitio = function(){

		$('.rateit').on('rated', function() { 
			//alert('rating: ' + $(this).rateit('value')); 
			$('.puntuacion_sitio').html($(this).rateit('value'));
			$('#puntuacion_sitio').val($(this).rateit('value'));
		});

		$(".rateit").on('reset', function () { 
			$('.puntuacion_sitio').html('0'); 
			$('#puntuacion_sitio').val(0); 
		});		

		$('.rateit').rateit('value',0);
		
	}

	var handleAddComentario =  function(){

		$('#valoracion_servicio').on('click', '.bt-add-comen', function(){
			//alert($('#puntuacion_sitio option:selected').val());
			if($('#comentario_sitio').val() == '')
				alert('Debe Ingresar un comentario');
			else
				if($('#puntuacion_sitio option:selected').val()>0){

					$.ajax({
						url: __SITEURL+'registro/valorar_sitio',
						type: 'POST',
						dataType: 'json',
						data:{comentario: $('#comentario_sitio').val(), valoracion: $('#puntuacion_sitio option:selected').val(), turnoid: $('#turnoid').val()},
						success: function (jsonData){
							if (jsonData.status == true){
								
								WebDialogs.doAlert({
									message: jsonData.message,
									title: jsonData.title,
									onConfirm: function(){
										window.location.href = __SITEURL+'home';
									}
								});

								$('#comentario_sitio').val('');
								$('.puntuacion_sitio').html('0'); 
								$('#puntuacion_sitio').val(0); 
								//$('#rate_user').rateit('value',0);
								//$("#wpr-modal-valoracion-sitio").modal('hide');

							} else {
								WebDialogs.doAlertError({
									message: jsonData.message,
									title: jsonData.title
								});
							}
						}
					});
				}else{
					alert('Debe puntuar este Sitio!');
				}

		});

	}

	return{
		init: function(){
			handleRegistroForm();
		},
		initRecuperar: function(){
			handleRecuperarPass();
			handleFormRecover();
		},
		initValoracion: function(){
			//handleRateitSitio();
			//handleTableComentarios();
			handleAddComentario();
		}
	}
}();
