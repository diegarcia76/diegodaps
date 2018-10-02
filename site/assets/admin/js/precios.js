var Precios = function () {

	var validateForm = function(){
		// for more info visit the official plugin documentation: 
		// http://docs.jquery.com/Plugins/Validation

		var form1 = $('#frmPremios');
		
		form1.ajaxForm({ 
			success: function(jsonData){
				if (jsonData.status == true){
					WebDialogs.doAlert({
						message: jsonData.message,
						title: '',
						onConfirm: function(){
							window.location = __SITEURL+'admin/coiffeurs';
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

		$('.form-control.timepicker').timepicker();
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
			$('.form-control.timepicker').timepicker();

		});


		$('#wpr-imagenes-carrusel').on('click','.checks', function(e){
			if($(this).is(":checked")){
				//alert('checked');
				$(this).parent().find('input[type=hidden]').remove();
			}else{
				//alert('no');
				$(this).parent().append('<input type="hidden" name="especial[]" value="0" />');
			}
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
			$('.form-control.timepicker').timepicker();
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


	var handleChangeServicio = function(){
		$('#wpr-imagenes-carrusel').on('change','.servicio', function(){
			//e.preventDefault();
			//alert($("option:selected", this).data('precio-default'));
			$(this).closest('tr.admin-imagen-carrusel').find('.precio').val($("option:selected", this).data('precio-default'));
			$(this).closest('tr.admin-imagen-carrusel').find('.precio_efectivo').val($("option:selected", this).data('precio-efectivo-default'));
			$(this).closest('tr.admin-imagen-carrusel').find('.comision').val($("option:selected", this).data('comision-default'));
		});

	}

    return {
        //main function to initiate the module
        init: function () {
			validateForm();
			handleBtnEliminar();
			handleBtnAdd();
			handleSortable();
			handleChangeServicio();
		}
	};

}();
