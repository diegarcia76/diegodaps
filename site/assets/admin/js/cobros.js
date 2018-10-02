// JavaScript Document
var Cobros = function() {

	var handleCambioTurno = function (){

		$('#WebDialogs_alert').on('click','.btn-info',function(e){
			e.preventDefault();
			window.open($(this).attr('href'),'_blank');
			window.location.reload();
		});


		$('.btn-confirm-efectivo').click(function(){
			pago_id = $(this).data('id-pago');
			total_efectivo = $('.monto-efectivo').val();
			cb_modificar_fecha = ($('.cb_modificar_fecha').is(':checked'))?1:0;
			fecha_cobro = $('.fecha_cobro').val();

			//alert('combo: '+cb_modificar_fecha);
			//alert('fecha: '+fecha_cobro);

			WebDialogs.doLoading({
				message: 'Enviando Información al cliente',
				title: 'Cobro'						
			});

			$.ajax({
				url: __SITEURL+'admin/cobros/pagar/'+pago_id,
				data: {
					tipo:'efectivo',
					total_efectivo: total_efectivo,
					cb_modificar_fecha:cb_modificar_fecha,
					fecha_cobro:fecha_cobro
				},
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){					
					//alert(jsonData.message);
					WebDialogs.doCloseLoading();
					$('#confirmarCobro').modal('hide');
					WebDialogs.doAlert({
						message: jsonData.message,
						title: 'Éxito',
						onConfirm: function(){
							window.location.reload();
						}
					});
				}
			});
		});

		$('.btn-confirm-no-efectivo').click(function(){
			pago_id = $(this).data('id-pago');
			total_efectivo = $('.monto-efectivo').val();
			total_tarjeta = $(this).data('total-tarjeta');
			cb_modificar_fecha = ($('.cb_modificar_fecha').is(':checked'))?1:0;
			fecha_cobro = $('.fecha_cobro').val();

			WebDialogs.doLoading({
				message: 'Enviando Información al cliente',
				title: 'Cobro'						
			});
			$.ajax({
				url: __SITEURL+'admin/cobros/pagar/'+pago_id,
				data: {
						tipo:'noefectivo',
						monto: total_tarjeta,
						cb_modificar_fecha:cb_modificar_fecha,
						fecha_cobro:fecha_cobro

				},
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){					
					//alert(jsonData.message);
					WebDialogs.doCloseLoading();
					$('#confirmarCobro').modal('hide');
					WebDialogs.doAlert({
						message: jsonData.message,
						title: 'Éxito',
						onConfirm: function(){
							window.location.reload();
						}
					});
				}
			});
		})

		$('.monto-efectivo').numeric();

		$('.btn-mostrar-importe-efectivo').click(function(e){
			e.preventDefault();
			var parent = $(this).closest('.wpr');
			parent.find('.wpr-efectivo').removeClass('hidden');
		});

		$('input[name="cb_modificar_fecha"]').click(function(e){
			//e.preventDefault();
			var parent = $(this).closest('.wpr');
			if($(this).is(':checked')){
				parent.find('.wpr-fecha-cobro').removeClass('hidden');
			}else{
				parent.find('.wpr-fecha-cobro').addClass('hidden');	
			}
			
		});

		$('#Adatepicker').datepicker(
		{
		  format: 'yyyy-mm-dd',
		  autoclose: true,
		  forceParse: false,
		  Default: true,
		  pickDate: true,
		  todayHighlight: true,
		  language: 'es',

		});

		$('.monto-efectivo').change(function(){
			var total_efectivo = $(this).val();
			$('.btn-confirm-efectivo').html('<i class="fa fa-check"></i>Cobrar Efectivo $'+total_efectivo+'.-');
			$('.btn-confirm-no-efectivo').html('<i class="fa fa-check"></i>Cobrar $'+total_efectivo+'.-');
			$('.btn-confirm-no-efectivo').data('total-tarjeta', total_efectivo);

		});



		$('.canjear').click(function(){


			pago_id = $(this).data('id-pago');

			WebDialogs.doConfirm({
				message: 'Esta por confirmar el canje de los puntos. Los puntos ya fueron descontados al cliente.',
				title: 'Canje de puntos',
				onConfirm: function(){

					WebDialogs.doLoading({
						message: 'Enviando Información al cliente',
						title: 'Cobro'						
					});

					$.ajax({
						url: __SITEURL+'admin/cobros/pagar/'+pago_id,
						data: {
								tipo:'noefectivo',
								monto: 0
						},
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){					
							//alert(jsonData.message);
							WebDialogs.doCloseLoading();
							$('#confirmarCobro').modal('hide');

							WebDialogs.doAlert({
								message: 'Canje confirmado',
								title: 'Éxito',
								onConfirm: function(){
									window.location.reload();
								}
							});
						}
					});

				}
			});			




		});



		$('.cobrar').click(function(){

			//alert($(this).data('id-turno'));
			//var turno_id = $(this).data('id-turno');
			//var accion = $(this).data('accion');

			var pago_id = parseInt($(this).data('id-pago'));
			var total = parseFloat($(this).data('total'));
			var descuentos = parseFloat($(this).data('descuentos'));
			//alert($(this).data('descuentos'));
			var total_efectivo = total - descuentos;
			var btnActual = $(this);

			$('.btn-confirm-efectivo').html('<i class="fa fa-check"></i>Cobrar Efectivo $'+total_efectivo+'.-');
			$('.btn-confirm-no-efectivo').html('<i class="fa fa-check"></i>Cobrar $'+total+'.-');
			$('.btn-confirm-efectivo').data('id-pago', pago_id);
			$('.btn-confirm-no-efectivo').data('id-pago', pago_id);
			$('.btn-confirm-no-efectivo').data('total-tarjeta', total);

			$('.monto-efectivo').val(total_efectivo);

			$('#confirmarCobro').modal('show');
			/*WebDialogs.doConfirm({
				message: 'EstÃ¡ por cobrar el pago!',
				title: 'Â¿EstÃ¡ seguro?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: __SITEURL+'admin/cobros/pagar/'+pago_id,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								btnActual.closest('.mt-list-item').remove();
							}
							//alert(jsonData.message);
							WebDialogs.doAlert({
								message: jsonData.message,
								title: 'Ã‰xito'
							});
						}
					});
				}
			});*/

		});

	}

	var handleAgregarItem = function(){
		$('.btn-agregar-item').click(function(e){
			e.preventDefault();

			var pago_id = parseInt($(this).data('id-pago'));
			if (pago_id == 0 || isNaN(pago_id)){
				$('#modal-agregar-item select[name="cliente-id"]').closest('.form-group').show();
			} else {
				$('#modal-agregar-item select[name="cliente-id"]').closest('.form-group').hide();
			}

			$('#modal-agregar-item')
				.find('form').find('input').val('');

			$('#modal-agregar-item')
				.find('form').find('select').val(1).trigger('change');

			$('#modal-agregar-item')
				.modal('show');

			$('#modal-agregar-item')
				.find('form').find('input[name="pago-id"]').val(pago_id);


			$('#modal-agregar-item input[name="precio"]').numeric();


			$('#modal-agregar-item').find('input[name="precio"], select').change(function(){
				var precio = parseFloat($('#modal-agregar-item input[name="precio"]').val());
				if (isNaN(precio)) precio = 0;
				var cantidad = parseInt($('#modal-agregar-item select[name="cantidad"]').val());
				var total = precio * cantidad;

				$('#modal-agregar-item .wpr-total span').html(total.toFixed(2));

			});

		});

		$('#frm-agregar-item').each(function(){
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
								$('#modal-agregar-item').modal('hide');
								WebDialogs.doAlert({
									message: jsonData.message,
									title: jsonData.title,
									onConfirm: function(){
										window.location.reload();
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
			});

		});

	}

	function calcular_precio_producto(){

		var precio = parseFloat($('#modal-agregar-producto select[name="producto-id"] option:selected').data('precio'));
		$('#modal-agregar-producto input[name="precio"]').val(precio);

		if (isNaN(precio)) precio = 0;
		var cantidad = parseInt($('#modal-agregar-producto select[name="cantidad"]').val());
		var total = precio * cantidad;
		var descuento = 0;
		
		$('#modal-agregar-producto .wpr-total span').html(total.toFixed(2));

	}

	var handleAgregarProducto = function(){
		$('.btn-agregar-producto').click(function(e){
			e.preventDefault();

			var pago_id = parseInt($(this).data('id-pago'));
			if (pago_id == 0 || isNaN(pago_id)){
				$('#modal-agregar-producto select[name="cliente-id"]').closest('.form-group').show();
			} else {
				$('#modal-agregar-producto select[name="cliente-id"]').closest('.form-group').hide();
			}

			$('#modal-agregar-producto')
				.find('form').find('input [type=text]').val('');

			$('#modal-agregar-producto')
				.find('form').find('.select').val(1).trigger('change');


			$('#modal-agregar-producto')
				.find('form').find('input[name="pago-id"]').val(pago_id);


			$('#modal-agregar-producto').modal('show');
		});

		$('#modal-agregar-producto').find('select[name="producto-id"], select[name="cantidad"]').change(function(){

			calcular_precio_producto();

		});


		$('#modal-agregar-producto').find('select[name="producto-id"]').trigger('change');




		$('#frm-agregar-producto').each(function(){
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
								$('#modal-agregar-item').modal('hide');
								WebDialogs.doAlert({
									message: jsonData.message,
									title: jsonData.title,
									onConfirm: function(){
										window.location.reload();
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
			});

		});

	}

	var handleEliminarItem = function(){

		$('.btn-eliminar-item').click(function(){
			detalle_id = $(this).data('id-detalle');

			//fijarse si es el último item a eliminar.
			//en caso de que sea el utlimo, mostrar un cartel advirtiendo que
			//los turnos asociados al pago, pasaran a cobrado
			var cantidad = $(this).closest('table').find('tbody tr').length;
			//alert(cantidad);
			if(cantidad==2){

				WebDialogs.doConfirmSecond({
					message: 'Al eliminar el último detalle, los turnos asociados al pago pasaran a estado cobrado',
					title: 'Advertencia!',
					onConfirm: function(){

						WebDialogs.doConfirm({
							message: 'Está seguro?',
							title: 'Eliminar',
							onConfirm: function(){
								$.ajax({
									url: __SITEURL+'admin/cobros/eliminarItem/'+detalle_id,
									type: 'POST',
									dataType: 'json',
									success: function (jsonData){					
										//alert(jsonData.message);
										$('#confirmarCobro').modal('hide');
										WebDialogs.doAlert({
											message: jsonData.message,
											title: 'Éxito',
											onConfirm: function(){
												window.location.reload();
											}
										});
									}
								});
							}
						});

					}
				});

			}else{

				WebDialogs.doConfirm({
					message: 'Está seguro?',
					title: 'Eliminar',
					onConfirm: function(){
						$.ajax({
							url: __SITEURL+'admin/cobros/eliminarItem/'+detalle_id,
							type: 'POST',
							dataType: 'json',
							success: function (jsonData){					
								//alert(jsonData.message);
								$('#confirmarCobro').modal('hide');
								WebDialogs.doAlert({
									message: jsonData.message,
									title: 'Éxito',
									onConfirm: function(){
										window.location.reload();
									}
								});
							}
						});
					}
				});
			}
							
		})
	}

	function calcular_precio_servicio(){

		//el precio sacarlo por ajax con el servicio y el coiffeur
		var precio = parseFloat($('#modal-agregar-servicio select[name="servicio-id"] option:selected').data('precio'));
		

		if (isNaN(precio)) precio = 0;
		var cantidad = parseInt($('#modal-agregar-servicio select[name="cantidad"]').val());
		var total = precio * cantidad;
		var descuento = 0;
		$('#modal-agregar-servicio input[name="precio"]').val(precio);
		//alert(precio);
		$('#modal-agregar-servicio .wpr-total span').html(total.toFixed(2));

	}

	var handleAgregarServicio = function(){
		$('.btn-agregar-servicio').click(function(e){
			e.preventDefault();

			var pago_id = parseInt($(this).data('id-pago'));
			if (pago_id == 0 || isNaN(pago_id)){
				$('#modal-agregar-servicio select[name="cliente-id"]').closest('.form-group').show();
			} else {
				$('#modal-agregar-servicio select[name="cliente-id"]').closest('.form-group').hide();
			}

			$('#modal-agregar-servicio')
				.find('form').find('input [type=text]').val('');

			$('#modal-agregar-servicio')
				.find('form').find('.select').val(1).trigger('change');


			$('#modal-agregar-servicio')
				.find('form').find('input[name="pago-id"]').val(pago_id);

			$('#modal-agregar-servicio')
					.find('form').find('.select').select2();				

			$('#modal-agregar-servicio').modal('show');
		});

		$('#modal-agregar-servicio').find('select[name="servicio-id"], select[name="cantidad"]').change(function(){

			calcular_precio_servicio();

		});


		$('#modal-agregar-servicio').find('select[name="servicio-id"]').trigger('change');




		$('#frm-agregar-servicio').each(function(){
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
								$('#modal-agregar-servicio').modal('hide');
								WebDialogs.doAlert({
									message: jsonData.message,
									title: jsonData.title,
									onConfirm: function(){
										window.location.reload();
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
			});

		});

	}

	var handleComboCoiffeur = function(){

		$('#coiffeur-id').change(function(e){
			e.preventDefault();
			var theSelect = $('#servicio-id');
			coiffeur_id = $(this).val();
			var servicio_id = $(this).data('servicio_id');
			//alert(servicio_id);
			$.ajax({
				url: __SITEURL+'admin/coiffeurs/getServiciosXCoiffeur/'+coiffeur_id,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){					
					//alert(jsonData.message);
					theSelect.empty();
					theSelect.append('<option value="">Selecciona Servicio</option>');

					$.each(jsonData.servicios, function(i, item){
						if(servicio_id==item.servicioXCoiffeur_id)
							theSelect.append('<option data-precio='+item.precio+' selected="selected" value="'+item.servicioXCoiffeur_id+'" >'+item.nombre_servicio+' - $'+item.precio.toFixed(2)+'</option>');
						else
							theSelect.append('<option data-precio='+item.precio+'  value="'+item.servicioXCoiffeur_id+'" >'+item.nombre_servicio+' - $'+item.precio.toFixed(2)+'</option>');	
					});					


					calcular_precio_servicio();

				}
			});

		});

	}


	var handleEditarItem = function(){
		
		$('.btn-modificar-item').click(function(){
			detalle_id = $(this).data('id-detalle');
			$.ajax({
				url: __SITEURL+'admin/cobros/getDetallePago/'+detalle_id,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){					
					//alert(jsonData.detallePago.servicio_id);
					if(jsonData.detallePago.producto_id>0){
						//es producto

						$('#modal-agregar-producto')
							.find('form').find('input[name="detallePago-id"]').val(detalle_id);

						var pago_id = parseInt(jsonData.detallePago.pago_id);	
						$('#modal-agregar-producto')
							.find('form').find('input[name="pago-id"]').val(pago_id);					

						if (pago_id == 0 || isNaN(pago_id)){
							$('#modal-agregar-producto select[name="cliente-id"]').closest('.form-group').show();
						} else {
							$('#modal-agregar-producto select[name="cliente-id"]').closest('.form-group').hide();
						}

						$('#modal-agregar-producto')
							.find('form').find('select[name="cliente-id"]').val(jsonData.detallePago.cliente_id);

						$('#modal-agregar-producto')
							.find('form').find('select[name="producto-id"]').val(jsonData.detallePago.producto_id);

						$('#modal-agregar-producto')
							.find('form').find('select[name="cantidad"]').val(jsonData.detallePago.cantidad);

						$('#modal-agregar-producto')
							.find('form').find('input[name="precio"]').val(jsonData.detallePago.precio);

						$('#modal-agregar-producto')
							.find('form').find('select[name="coiffeur-id"]').val(jsonData.detallePago.coiffeur_id).trigger('change');
					
						$('#modal-agregar-producto')
							.find('form').attr('action',__SITEURL+'admin/cobros/editProducto');

						$('#modal-agregar-producto').modal('show');

						calcular_precio_producto();

					}else if(jsonData.detallePago.servicio_id>0){
						
						$('#modal-agregar-servicio')
							.find('form').find('input[name="detallePago-id"]').val(detalle_id);

						var pago_id = parseInt(jsonData.detallePago.pago_id);	
						$('#modal-agregar-servicio')
							.find('form').find('input[name="pago-id"]').val(pago_id);					

						if (pago_id == 0 || isNaN(pago_id)){
							$('#modal-agregar-servicio select[name="cliente-id"]').closest('.form-group').show();
						} else {
							$('#modal-agregar-servicio select[name="cliente-id"]').closest('.form-group').hide();
						}

						$('#modal-agregar-servicio')
							.find('form').find('select[name="cliente-id"]').val(jsonData.detallePago.cliente_id);

						$('#modal-agregar-servicio')
							.find('form').find('select[name="coiffeur-id"]').data('servicio_id',jsonData.detallePago.servicio_id);

						$('#modal-agregar-servicio')
							.find('form').find('select[name="coiffeur-id"]').val(jsonData.detallePago.coiffeur_id).trigger('change');						

						$('#modal-agregar-servicio')
							.find('form').find('select[name="cantidad"]').val(jsonData.detallePago.cantidad);

						$('#modal-agregar-servicio')
							.find('form').find('input[name="precio"]').val(jsonData.detallePago.precio);

						
						calcular_precio_servicio();

						$('#modal-agregar-servicio')
							.find('form').attr('action',__SITEURL+'admin/cobros/editServicio');


						$('#modal-agregar-servicio').modal('show');						
						
					}else{
						//alert('es item');
						$('#modal-agregar-item')
							.find('form').find('input[name="detallePago-id"]').val(detalle_id);

						var pago_id = parseInt(jsonData.detallePago.pago_id);	
						$('#modal-agregar-item')
							.find('form').find('input[name="pago-id"]').val(pago_id);					

						if (pago_id == 0 || isNaN(pago_id)){
							$('#modal-agregar-item select[name="cliente-id"]').closest('.form-group').show();
						} else {
							$('#modal-agregar-item select[name="cliente-id"]').closest('.form-group').hide();
						}
						
						$('#modal-agregar-item')
							.find('form').find('select[name="cliente-id"]').val(jsonData.detallePago.cliente_id);
						
						$('#modal-agregar-item')
							.find('form').find('select[name="cantidad"]').val(jsonData.detallePago.cantidad);

						$('#modal-agregar-item')
							.find('form').find('input[name="precio"]').val(jsonData.detallePago.precio);

						$('#modal-agregar-item')
							.find('form').find('textarea[name="descripcion"]').val(jsonData.detallePago.descripcion);

						$('#modal-agregar-item')
							.find('form').find('select[name="tipo"]').val(jsonData.detallePago.tipo);

						$('#modal-agregar-item')
							.find('form').attr('action',__SITEURL+'admin/cobros/editItem');

						$('#modal-agregar-item').modal('show');

						$('#modal-agregar-item').find('input[name="precio"], select').change(function(){
							var precio = parseFloat($('#modal-agregar-item input[name="precio"]').val());
							if (isNaN(precio)) precio = 0;
							var cantidad = parseInt($('#modal-agregar-item select[name="cantidad"]').val());
							var total = precio * cantidad;

							$('#modal-agregar-item .wpr-total span').html(total.toFixed(2));

						});
					}

				}
			});

		});

	}

	var handleSelectInModals = function(){

		$('.modal').find('select.select2').each(function(){

			var aSelect = $(this);
			var aModal = aSelect.closest('.modal');

			aSelect.css('width','100%');

			aSelect.select2({
				dropdownParent: aModal
			});

		});

	}

	var handleChangeCliente = function(){

		$('.formulario').on('change','.change_cliente', function(){
					
			var clienteSelect = $(this);

			var cliente_id = parseInt($(clienteSelect).val());
			var wprClienteNuevo = clienteSelect.closest('.form-group').find('.wpr-cliente-nuevo')

			if ( cliente_id == 0){
				$(wprClienteNuevo).removeClass('hidden');
			} else {
				$(wprClienteNuevo).addClass('hidden');
				$(wprClienteNuevo).find('input').val('');
			}

		});

	}

    return {
		init: function(){
			handleCambioTurno();
			handleAgregarItem();
			handleAgregarProducto();
			handleEliminarItem();
			handleAgregarServicio();
			handleComboCoiffeur();
			handleEditarItem();
			handleSelectInModals();
			handleChangeCliente();
		}

	}
}();