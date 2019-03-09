// JavaScript Document
var Login = function () {
	
	var ajaxCheckNotificaciones;
	
	var handleLoginForm = function(){
		
		$('form.frmLogin').each(function(){

			var loginFrom;
			var aForm = $(this);
			
			loginFrom = aForm.validate({
	
				errorElement: 'span', //default input error message container
				errorClass: 'text-danger', // default input error message class
				focusInvalid: true, // do not focus the last invalid input
				ignore: "",
				 rules: {
					username: {
						email:true,
						required: true
					},
					pass: {
						required: true,
						minlength: 5,
						maxlength: 15,
					}
				 },
				errorPlacement: function(error, element) {
					error.appendTo( element.closest('.form-group') );
				},
				submitHandler: function(form){
		
					$(form).ajaxSubmit({
						dataType: 'json',
						beforeSubmit: function(formData, jqForm, options){
							$(jqForm[0]).find('button[type="submit"]').html('<i class="fa fa-circle-o-notch fa-spin"></i> Validando usuario...').attr('disabled','disabled');
						},
						success: function(jsonData, statusText, xhr, jqForm){
							
							$(jqForm[0]).find('button[type="submit"]').html('Ingresar').removeAttr('disabled');
							$(jqForm[0]).find('span.loading').remove();
							//alert(jsonData.status);
							if (jsonData.status == true){
									//window.location.reload();		
								window.location.href = __SITEURL+'home';
									/*if(jsonData.calendario == true){
										window.location.href = __SITEURL + 'servicios/ver/'+jsonData.servicio_id;
									}else{
										window.location.href = __SITEURL;	
									}*/
									
							} else {
								//alert(jsonData.message);
								//Hacele un lindo modal
								
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
	
	

	var handleOlvidoForm = function(){
		
		var loginFrom;
		
		loginFrom = $('form#frmRecuperar').validate({

			errorElement: 'span', //default input error message container
			errorClass: 'text-danger', // default input error message class
			focusInvalid: true, // do not focus the last invalid input
			ignore: "",
			errorPlacement: function(error, element) {
				error.appendTo( element.closest('.form-group') );
			},
			submitHandler: function(form){
	
				$(form).ajaxSubmit({
					dataType: 'json',
					beforeSubmit: function(formData, jqForm, options){
						$(jqForm[0]).find('button[type="submit"]').html('Enviando...').attr('disabled','disabled');
						var span = $('<span>').addClass('loading');
						var icon = $('<i>').addClass('fa fa-circle-o-notch fa-spin');
						
						$(jqForm[0]).find('button[type="submit"]').after(span.append('&nbsp;').append(icon).append('&nbsp;Validando usuario&nbsp;'));

					},
					success: function(jsonData, statusText, xhr, jqForm){
						
						$(jqForm[0]).find('button[type="submit"]').html('Enviar').removeAttr('disabled');
						$(jqForm[0]).find('span.loading').remove();
						
						if (jsonData.status == true){
							$(jqForm[0]).resetForm();
							
							WebDialogs.doAlert({
								message: jsonData.message,
								title: 'Recuperar contraseña'
							});						
						} else {
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

	var handlePerfilTop = function(){

		$(document).on('click','#bt_perfil_top',function(){
			$('#perfil-top').toggleClass('hidden');
		});
		

	}

	var handleNotificaciones = function(){

		$(document).on('click','#bt_notificacion', function(){	
			var theSelect = $('#dropdownMenu');	
			theSelect.empty();
			theSelect.append('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');
			$.ajax({
				url: __SITEURL+'home/cambiarAVistaNotificaciones/',
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
					theSelect.empty();
					if(jsonData.status){
						
						if(jsonData.notificaciones){
							$.each(jsonData.notificaciones, function(i, item){
								theSelect.append('<li class="unread"><a href="#"><p>'+item.titulo+': '+item.descripcion+'</p><p><small><i class="fa fa-clock-o" aria-hidden="true"></i> '+item.fecha+'</small></p></a></li>');
								//theSelect.append('');
								//theSelect.append('');
							});
							theSelect.append('<li><a href="'+__SITEURL+'home/notificaciones" class="vertodas">VER TODAS</a></li>');
						}
	                }else{
						theSelect.append('<li><p class="text-center p-t-1 bg-white"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Sin novedades</p></li>');
						theSelect.append('<li><a href="'+__SITEURL+'home/notificaciones" class="vertodas">VER ANTERIORES</a></li>');
					}
                	$('.button_badge').addClass('hidden');

				}
			});
		});

	}


	var checkNotificaciones = function(){		
		setInterval('checkNotific()',30000);
	}


	var checkNotific = function(){
		//alert('asd');
		if (this.ajaxCheckNotificaciones && this.ajaxCheckNotificaciones.abort){
		   this.ajaxCheckNotificaciones.abort()
		}

		$.ajax({
			url: __SITEURL+'home/checkNotificaciones/',
			type: 'POST',
			dataType: 'json',
			success: function (jsonData){
	           
	            if(jsonData.status){
	           		$('.button_badge').removeClass('hidden');
	            }else{
	           		$('.button_badge').addClass('hidden');
	            }	                

			}
		});
	}

	
	return{
		init: function(){
			handleLoginForm();
			handleOlvidoForm();
			handlePerfilTop();
			handleNotificaciones();
			checkNotificaciones();
		}
	}
}();

