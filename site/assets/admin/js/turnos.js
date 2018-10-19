// JavaScript Document
var Turnos = function() {

	var coiffeur_id = null;

	function cargarTurnos(){
		

		var date = $('#Adatepicker').datepicker("getDate");
		var formatted = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
		//alert(formatted);
		$.ajax({
			url: __SITEURL+'admin/turnos/getTurnosOcupados',
			type: 'POST',
			data:{
				fecha: formatted
			},
			dataType: 'json',
			beforeSend: function(){

				$( "#tab-turnos" ).empty().html('<div class="alert alert-warning" role="alert""><i class="fa fa-spin fa-circle-o-notch"></i> Cargando turnos fecha'+formatted+'...</div>');
			},
			success: function (jsonData){

       			$('#ocultar_coiffeur').hide();
       			var dataArr = $.makeArray(jsonData);

       			var aTable = $('<Table>').addClass('table');

       			var aTableHead = $('<thead>');
       			var aTableBody = $('<tbody>');

       			// encabezados
       			var aTr = $('<TR>');
       			var aTh = $('<TH>');
       			aTr.append(aTh).appendTo(aTableHead);


       			$.each(jsonData.coiffeurs, function(index, aCoiffeur){
       				aTh = $('<TH>').addClass('coiffeur').html(aCoiffeur.nombre).appendTo(aTr);
       			});


				// Contenido para el TBODY
				// Recorremos todas las horas
				for (var index = parseInt(jsonData.hora_min); index < parseInt(jsonData.hora_max); index++) {

					var strHs = '00'+index;
				//	alert(strHs);
					strHs = strHs.substr(-2);
					//alert(strHs);
					// armamos la fila correspondiente al horario
	       			var aTr = $('<TR>').appendTo(aTableBody);

	       			// la primer columna es la hora
	       			var aTd = $('<Td>').append(strHs+'Hs');
	       			aTr.append(aTd);

	       			// por cada coifeur armamos una TD para cada hora
	       			$.each(jsonData.coiffeurs, function(index, aCoiffeur){

       					var aTd = $('<td>').appendTo(aTr);
	       				if (aCoiffeur['horas'][strHs]){
		       				$.each(aCoiffeur['horas'][strHs], function(index,aButton){



			       				 var htmlButton =  $('<a>').addClass('fc-bg nexter btn').attr('href', 'turnos/editar/'+aButton.id);
			       				 aTd.append(htmlButton).append('<br>');
			       				 htmlButton.addClass(aButton.className);

			       				 htmlButton.css({
			       				 	padding: "5px 10px",
			       				 	margin: 5,
			       				 	'text-align': 'left'
			       				 });


			       				 htmlButton.attr('data-fecha', aButton.fecha_turno).data('fecha', aButton.fecha_turno);
			       				 htmlButton.attr('data-coiffeur', aCoiffeur.id).data('coiffeur', aCoiffeur.id);

			       				 if (aButton.className != 'nodisponible'){
			       				 	htmlButton.addClass('nexter');
			       				 } else {
			       				 	htmlButton.attr('disabled', true);
			       				 }

			       				 htmlButtonInner = $('<div>').addClass('fc-title').appendTo(htmlButton);
			       				 htmlButtonInner.html('<strong><i class="fa fa-clock-o" aria-hidden="true"></i> '+aButton.start+' HS</strong><br>'+aButton.cliente+'<br>'+aButton.telefono+' <br> '+aButton.servicio);

			       				 if (aButton.prioridad > 0){
			       				 	htmlButton.addClass('sobreturno');
			       				 	var labelHtml = $('<span class="label sobreturno">sobreturno</span><br/>');
			       				 	labelHtml.prependTo(htmlButtonInner);
			       				 }

		       				});
		       			}
	       			});

				}



       			aTable.append(aTableHead).append(aTableBody);

				$( "#tab-turnos" ).empty().append(aTable)

			}
		});

	}

	function cargarHorariosServicio(){

		var theSelect = $('#coiffeur');
		var servicio_id = $('#servicio').val();
		var cliente_id = $('#cliente').val();
		var turno_id = $('#turno_id').val();
		//alert(cliente_id);
		var date = $('#Adatepicker').datepicker("getDate");
		var formatted = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();

		if(cliente_id!=''){


			$( "#listado_horario" ).empty().html('Cargando...');

			$.ajax({
				url: __SITEURL+'admin/turnos/cargarHorariosTodosCoiffeurs',
				//url: __SITEURL+'admin/turnos/cargarHorarios/'+coiffeur_id+'/'+formatted,
				data:{servicio_id:servicio_id, fecha:formatted, cliente_id:cliente_id, turno_id:turno_id},
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){

					if(jsonData.status){

		       			$('#ocultar_coiffeur').hide();
		       			var dataArr = $.makeArray(jsonData);

		       			var aTable = $('<Table>').addClass('table');

		       			var aTableHead = $('<thead>');
		       			var aTableBody = $('<tbody>');

		       			// encabezados
		       			var aTr = $('<TR>');
		       			var aTh = $('<TH>');
		       			aTr.append(aTh).appendTo(aTableHead);


		       			$.each(jsonData.coiffeurs, function(index, aCoiffeur){
		       				aTh = $('<TH>').addClass('coiffeur').html(aCoiffeur.nombre).appendTo(aTr);
		       			});


						// Contenido para el TBODY
						// Recorremos todas las horas
						for (var index = parseInt(jsonData.hora_min); index < parseInt(jsonData.hora_max); index++) {

							var strHs = '00'+index;
							strHs = strHs.substr(-2);

							// armamos la fila correspondiente al horario
			       			var aTr = $('<TR>').appendTo(aTableBody);

			       			// la primer columna es la hora
			       			var aTd = $('<Td>').append(strHs+'Hs');
			       			aTr.append(aTd);

			       			// por cada coifeur armamos una TD para cada hora
			       			$.each(jsonData.coiffeurs, function(index, aCoiffeur){

		       					var aTd = $('<td>').appendTo(aTr);
			       				if (aCoiffeur['horas'][strHs]){
				       				$.each(aCoiffeur['horas'][strHs], function(index,aButton){

					       				 var htmlButton =  $('<button>').addClass('btn btn-sm bt_reserva');
					       				 htmlButton.attr('type','button')
					       				 htmlButton.addClass(aButton.className);
					       				 htmlButton.attr('data-fecha', aButton.fecha_turno).data('fecha', aButton.fecha_turno);
					       				 htmlButton.attr('data-coiffeur', aCoiffeur.id).data('coiffeur', aCoiffeur.id);
					       				 htmlButton.html('<i class="fa fa-clock-o" aria-hidden="true"></i>').append(aButton.start);
										// <button type="button" class="btn btn-sm {{:className}} bt_reserva" data-fecha="{{:fecha_turno}}"> {{:start}} </button>

					       				 aTd.append(htmlButton).append('<br/>');

				       				});
				       			}
			       			});

						}



		       			aTable.append(aTableHead).append(aTableBody);

						$( "#listado_horario" ).empty().append(aTable)

					}else{

						WebDialogs.doAlertError({
							message: jsonData.message,
							title: 'Error'
						});

					}


				}
			});
		}

	}

	function cargarHorarios(){
		var coiffeur_id = $('#coiffeur').val();
		var servicio_id = $('#servicio').val();

		var date = $('#Adatepicker').datepicker("getDate");
		var formatted = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
		//alert(date);
		/*if($('#fecha_sola').val()!=''){
			formatted = $('#fecha_sola').val();
		}*/
		//alert(formatted);
		$.ajax({
			url: __SITEURL+'admin/turnos/cargarHorariosTodos/'+servicio_id+'/'+coiffeur_id+'/'+formatted,
			//url: __SITEURL+'admin/turnos/cargarHorarios/'+coiffeur_id+'/'+formatted,
			type: 'POST',
			dataType: 'json',
			success: function (jsonData){
       			$('#ocultar_coiffeur').hide();
				$( "#listado_horario" ).html(
					$( "#template_horario" ).render( jsonData )
				);

			}
		});

	}

	setInterval(function(){
		console.log('Cargando horarios');
		cargarTurnos();

	}, 60000);

	/* ---------------------------------------------- */
	/* Maneja el datepicker en el dashboard de Turnos */
	/* ---------------------------------------------- */
	var handleDatePickers = function (){
		$('.date-picker').each(function(){
			$(this).datepicker({
				language: 'es',
				format: 'YYYY-mm-dd',

			}).on('changeDate', function (ev) {
			    //alert(ev.date);

			    //alert($('li.active a[data-toggle="tab"]').data('id-coiffeur'));
			    cargarTurnos();
			});

			//$(this).datepicker('update');
			$(this).datepicker('setDate', new Date());

			//cargarTurnos($());

		});

	}

	var handleCalendario = function(){

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	        var target = $(e.target).attr("href") // activated tab
	        coiffeur_id = $(e.target).data("id-coiffeur");
	        //alert(target);
	        //if(target=='#now'){

			/*var d = new Date();
			//var n = d.getDay();
			var datestring = d.getFullYear()  + "-" + (d.getMonth()+1) + "-" + d.getDate();
			*/
			cargarTurnos();

	        //}

    	});

	}

	var handleForm = function(){
		$('#frmSaveTurnos').each(function(){
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

	var submitForm = function(){

		var servicio_id = $('#servicio').val();
		var cliente_id = $('#cliente').val();
		var coiffeur_id = $('#coiffeur').val();
		var fecha = $('#fecha').val();
		var turno_id = $('#turno_id').val();
		var nombreturno = $('#nombreturno').val();
		var telefonoturno = $('#telefonoturno').val();
		var email = $('#emailturno').val();

				WebDialogs.doLoading({
					message: 'Aguarde...',
					title: 'Estamos guardando el turno'

				});

		$.ajax({
			url: __SITEURL+'admin/turnos/save',
			data:{
				servicio: servicio_id,
				coiffeur: coiffeur_id,
				cliente: cliente_id,
				fecha: fecha,
				turno_id: turno_id,
				nombreturno: nombreturno,
				telefonoturno: telefonoturno,
				email: email
			},
			type: 'post',
			dataType: 'json',
			beforeSubmit: function(){
				alert('a');
			},
			success: function(jsonData){

				WebDialogs.doCloseLoading();

				if (jsonData.status == true){
					WebDialogs.doAlert({
						message: jsonData.message,
						title: jsonData.title,
						onConfirm: function(){
							window.location.href = __SITEURL+'admin/turnos';
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

			}

		});
		/*
		var form = $('#frmSaveTurnos');
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
							window.location.href = __SITEURL+'admin/turnos';
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
		*/
	}



	var handleDatePickers2 = function (){
		/*$('.date-picker').each(function(){
			$(this).datepicker({
				language: 'es',
				todayHighlight: true,
				format: 'YYYY-mm-dd',
			}).on('changeDate', function (ev) {
			    //alert(ev.date);

			    //alert($('li.active a[data-toggle="tab"]').data('id-coiffeur'));
			    if($('#coiffeur').val()>0)
			    	cargarHorarios();
			});

			//$(this).datepicker('update');
			$(this).datepicker('setDate', new Date());

			//cargarTurnos($());

		});	*/


		$('#Adatepicker').datepicker(
		{
		  format: 'yyyy-mm-dd',
		  autoclose: true,
		  forceParse: false,
		  Default: true,
		  pickDate: true,
		  todayHighlight: true,
		  language: 'es',

		}).on('changeDate', function (ev) {

			    //alert($('li.active a[data-toggle="tab"]').data('id-coiffeur'));
			    if( ($('#servicio').val()>0))
			    	cargarHorariosServicio();
			});

		if($('#fecha_sola').val()!=''){
			//alert(new Date($('#fecha_sola').val()));
			var tomorrow = new Date($('#fecha_sola').val());
			tomorrow.setDate(tomorrow.getDate()+1);
			$('#Adatepicker').datepicker('setDate', tomorrow);
		}else{
			$('#Adatepicker').datepicker('setDate', new Date());
		}

	}

	var handleSpinners = function(){
		$('.spinner_fed').spinner({value:0, min: 0, max: 9999});
	}

	var handleServicios = function(){

		$('.formulario').on('change','.change_calendar', function(){

			if( ($('#servicio').val()>0))
				cargarHorariosServicio();

			/*$.ajax({
				url: __SITEURL+'admin/servicios/getCoiffeursXServicio/'+servicio_id,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
	               //alert('asd');
	                theSelect.empty();
					theSelect.append('<option value="">Selecciona Coiffeur</option>');

					$.each(jsonData.coiffeurs, function(i, item){
						theSelect.append('<option value="'+item.id+'" >'+item.nombre+'</option>');
					});

				}
			});*/


		});

		$('.formulario').on('change','.change_cliente', function(){
			if( ($('#servicio').val()>0) )
				cargarHorariosServicio();

			var cliente_id = parseInt($('#cliente').val())
			if ( cliente_id == 0){
				$('#cliente_nuevo').removeClass('hidden');
			} else {
				$('#cliente_nuevo').addClass('hidden').val('');
			}

		});


		$('.formulario').on('change','#coiffeur', function(){
			cargarHorarios();
		});

		$('.formulario').on('click','.bt_reserva', function(){
			//alert($(this).hasClass('disponible'));
			if($(this).hasClass('disponible') || $(this).hasClass('ocupado')){
				$('#fecha').val($(this).data('fecha'));
				$('#coiffeur').val($(this).data('coiffeur'));
				submitForm();
				//alert('si');
			}else{
				alert('No se puede reservar este turno');
			}

		});
		
		$('.nocliente').on('click', function(){
			nombre = $('#nombreturno').val();
			telefono = $('#telefonoturno').val();
			email = $('#emailturno').val();
			
			
				$.ajax({
				url: __SITEURL+'admin/turnos/altaNoTurno/',
				type: 'POST',
				dataType: 'json',
				data:{
					nombre: nombre,
					telefono: telefono,
					email: email
				},
				success: function (jsonData){
	              	if (jsonData.status == true){
					alert("Cargado al sistema exitosamente");
					}else{
					alert("El mail ya se encuentra cargado en el sistema. Ingrese otro Email");	
					}
				}
			});

			
			
			
		});

	}

	var handleFotoForm = function(){
		$('#frmSaveTurnosFotos').each(function(){
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
						submitForm2();
					}

				}
			});

		});
	}

	var submitForm2 = function(){

		var form = $('#frmSaveTurnosFotos');

		$(form).ajaxSubmit({
			dataType: 'json',
			type: 'post',


			beforeSubmit: function(formData, jqForm, options){
				$(jqForm[0]).find('button[name="btn-publicar"]').html('Enviando...').attr('disabled','disabled');
				var span = $('<span>').addClass('loading');
				var icon = $('<i>').addClass('fa fa-circle-o-notch fa-spin');

				$(jqForm[0]).find('button[name="btn-publicar"]').parent().append(span.append('&nbsp;').append(icon).append('&nbsp;Validando datos&nbsp;'));

			},

			success: function(jsonData, statusText, xhr, jqForm){

				//alert(jsonData);
				$(jqForm[0]).find('button[name="btn-publicar"]').html('Guardar').removeAttr('disabled');
				$(jqForm[0]).find('span.loading').remove();

				if (jsonData.status == true){
					WebDialogs.doAlert({
						message: jsonData.message,
						title: jsonData.title,
						onConfirm: function(){
							window.location.href = __SITEURL+'admin/turnos/editar/'+jsonData.id;
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

	var handleFileUpload = function(archivos){
	    /*
		// Initialize the jQuery File Upload widget:
		$.each( archivos, function( key, value ) {
		  //alert( key + ": " + value.id );
		  $('#imagenes_actuales').append('<input type="hidden" name="images[]" value="'+value.id+'" /><div style="float:left; align:center;"><img name="imageThumb" id="imageThumb" src="'+value.url+'" class="img-responsive"> <label><input name="borrar_imagen[]" type="checkbox" value="'+value.id+'" >Borrar ImÃ¡gen </label></div>');
		});
		*/

		$('#files-container').on('click', '.btn-danger', function(){
			var $this = $(this);
			$this.closest('.wpr-image').remove();
		});


	    $('#fileupload').each(function(){
		    var theForm = $(this).closest('form');
			//alert('as');
			var removeImageButton = $('<button/>')
				.addClass('btn btn-danger btn-xs')
				.html('<i class="fa fa-close"></i>');


			var uploadButton = $('<button/>')
				.addClass('btn btn-primary btn-process')
				.prop('disabled', true)
				.prop('type', 'button')
				.text('Processing...');

		    $(this).fileupload({
		        // Uncomment the following to send cross-domain cookies:
		        //xhrFields: {withCredentials: true},
		        url: __SITEURL+'admin/turnos/uploadfile',
				autoUpload: false,
				acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
				maxFileSize: 999000,
				sequentialUploads: true,
				// Enable image resizing, except for Android and Opera,
				// which actually support image resizing, but fail to
				// send Blob objects via XHR requests:
				disableImageResize: /Android(?!.*Chrome)|Opera/
					.test(window.navigator.userAgent),
				previewMaxWidth: 120,
				previewMaxHeight: 120,
				previewCrop: true


			}).on('fileuploadadd', function (e, data) {
				data.context = $('<div class="wpr-image"/>').appendTo('#files-container');
				//alert('asd');
				$.each(data.files, function (index, file) {
					var node = $('<p/>').append($('<span/>').text(file.name+' ')).append(removeImageButton.clone(true));

					node.append('<br>')
						//.append('<label><input type="radio" name="imagen_destacada" /> Principal </label><br/>')
						.append(uploadButton.clone(true).data(data));

					node.appendTo(data.context);

					// data.context.find('input[type=radio]').uniform();

				});
			}).on('fileuploadprocessalways', function (e, data) {

				var index = data.index,
					file = data.files[index],
					node = $(data.context.children()[index]);

				if (file.preview) {
					node.prepend(file.preview);
				}
				if (file.error) {
					node
						.append('<br>')
						.append($('<span class="text-danger"/>').text(file.error));


				}
				if (index + 1 === data.files.length) {
					data.context.find('button.btn-process')
						.text('Esperando para subir...')
						.prop('disabled', !!data.files.error);
				}


			}).on('fileuploadprogressall', function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .progress-bar').css(
					'width',
					progress + '%'
				);
			}).on('fileuploaddone', function (e, data) {

				console.log(data.result);
				$.each(data.result.files, function (index, file) {
					console.log(file);
					//alert('ss');
					var aInput = $('<input type="hidden" name="images[]" />').val(file.id);
					aInput.appendTo(data.context);

					//data.context.find('input[name="imagen_destacada"]').val(file.id)

				});

			}).on('fileuploadfail', function (e, data) {
				$.each(data.files, function (index) {
					var error = $('<span class="text-danger"/>').text('File upload failed.');
					$(data.context.children()[index])
						.append('<br>')
						.append(error);
				});
			}).on('fileuploadstop', function(e){

					submitForm2();

			}).prop('disabled', !$.support.fileInput)
				.parent().addClass($.support.fileInput ? undefined : 'disabled');

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

	var handleCambioEstado = function(){

	    $('.formulario').on('change','#estado', function(){
			//alert($(this).val());
			$.ajax({
				url: __SITEURL+'admin/admin/cambiar_estado/'+$('#turno_id').val()+'/'+$(this).val(),
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
					alert('estado cambiado');
				}
			});
		});

	}

    return {
		init: function(){
			handleDatePickers();
			// handleCalendario();
		},
		initForm: function(archivos){
			handleForm();
			handleDatePickers2();
			handleServicios();
			handleCambioEstado();
		},
		initFotoForm: function(archivos){
			handleFotoForm();
			handleImageThumb();
			handleFileUpload(archivos);
		}

	}
}();
