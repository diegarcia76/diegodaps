// JavaScript Document
var Marcas = function() {

	var handleTable = function(){

		var table = $("#tblMarcas").DataTable({
			serverSide: true,
			processing: true,
			"order": [[ 0, "desc" ]],
			ajax: {
				url: __SITEURL+'admin/productos/datasource_marca',
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
					orderable: true,
					searchable: true
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
					width: '240px'
				}



			]
		});
	}



	var handleForm = function(){
		$('#frmSaveMarcas').each(function(){
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
		$('#tblMarcas').on('click','a.btn-eliminar', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('titulo');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de eliminar la Marca <strong>'+usuarioNombre+'</strong>. Si esta seguro que desea eliminar la Marca haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer eliminar la Marca?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								$('#tblMarcas').DataTable().draw();
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
		$('.btn-eliminar-marca').on('click', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de eliminar la Marca <strong>'+usuarioNombre+'</strong>. Si esta seguro que desea eliminar la Marca haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer eliminar la Marca?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							if (jsonData.status == true){
								window.location.href = __SITEURL + 'admin/productos/listar_marcas';
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

		var form = $('#frmSaveMarcas');
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
							window.location.href = __SITEURL+'admin/productos/listar_marcas';
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

	
	var handleBtnAdd = function(){
		$('.btnAddPremio').click(function(e){
			e.preventDefault();
			
			var htmlData = '';
			    htmlData += '             <tr>';
			    htmlData += '             	<td><i class="icon-fullscreen"></i><input type="hidden" class="submarca_id" name="submarca_id[]" value="" /></td>';
			    htmlData += '               <td><input type="text" name="nombreS[]" value="" class="form-control nombreS" /></td>';
			    htmlData += '             	<td><input type="text" name="descripcionS[]" value="" class="form-control descripcionS" /></td>';
			    htmlData += '             	<td><a class="btn mini red btnEliminarPremio" href="#"><i class="fa fa-times"></i></a></td>';
			    htmlData += '             </tr>';
			
			
			$('#tblPremiosSorteo').find('tbody').append(htmlData);
			regenerateSubrubrosIds();
		});
		
	};


	var handleBtnEliminar = function(){
		$('#tblPremiosSorteo').on('click','.btnEliminarPremio',function(e){
			e.preventDefault();
			$(this).closest('tr').remove();
			//refreshPuestos();	
			regenerateSubrubrosIds();
		});
	};

	var regenerateSubrubrosIds = function(){
		//alert('asd');
		$('.frmSaveRubro .submarca_id').each(function(index, element){
			$(element).attr('id','submarca_id-'+index)
		});

		$('.frmSaveRubro .nombreS').each(function(index, element){
			$(element).attr('id','nombreS-'+index)
		});

		$('.frmSaveRubro .descripcionS').each(function(index, element){
			$(element).attr('id','descripcionS-'+index)
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
			handleBtnEliminar();
			handleBtnAdd();
		},
		initVer: function(){
			handleDeleteVer();
		}
	}
}();
