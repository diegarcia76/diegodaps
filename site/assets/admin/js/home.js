// JavaScript Document
var Home = function() {	

	var handleDelete = function(){
		$('.dashboard').on('click','a.btn-eliminar', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			WebDialogs.doConfirm({
				message: 'Esta a punto de cancelar el Turno. Si esta seguro haga click en aceptar, de lo contrario cancele la opción.',
				title: '¿Está seguro de querer cancelar el Turno?',
				onConfirm: function(){
					//window.location.href = href;
					$.ajax({
						url: href,
						type: 'POST',
						dataType: 'json',
						success: function (jsonData){
							//alert(jsonData);
							if (jsonData.status == true){
								window.location.href = jsonData.referer;
							} else {
								alert(jsonData.message);
							}
						}
					});

				}
			});
			
		});
	}

	var cambiarEstado = function(turno_id, comentario){

		function recursivoCambiarEstado(arrTurnos, index, total){


			$.ajax({
				url: __SITEURL+'admin/admin/cambiar_estado/'+arrTurnos[index].id,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){

					index++;
					//alert(jsonData.turnosHoy);
					if(index<total){						
						recursivoCambiarEstado(arrTurnos, index, total);
					}else{
						$('#turnosHoyDash .cambioEstado').removeAttr('disabled', 'disabled')
						$('#turnosHoyDash').html(jsonData.turnosHoy);
					}


				}
			});
		}


		$('#turnosHoyDash .cambioEstado').attr('disabled', 'disabled');


		$.ajax({
			url: __SITEURL+'admin/admin/ver_turnos_cliente/'+turno_id,
			type: 'POST',
			data: {comentario:comentario},
			dataType: 'json',
			success: function (jsonData){

				//if(comentario!=''){
					$('#modal-agregar-comentario').modal('hide');
					$('.btn-aceptar-comentario').removeAttr('disabled');
					$('#comentario').val('');
				//}

				if (jsonData.status == true){
					//alert(jsonData.message);
					WebDialogs.doConfirm({
						message: jsonData.message,
						title: '¿Está seguro?',
						onConfirm: function(){
							//window.location.href = href;
							var len = jsonData.turnos.length;

							var i = 0;
							//alert(len);
							recursivoCambiarEstado(jsonData.turnos, i, len);//fin foraech
							//
						}
					});
					//window.location.href = __SITEURL + 'admin';
				} else {
					/*WebDialogs.doConfirm({
						message: 'EstÃ¡ por cambiar el estado a '+accion,
						title: 'Â¿EstÃ¡ seguro?',
						onConfirm: function(){
						*/	//window.location.href = href;

							$('#turnosHoyDash .cambioEstado').attr('disabled', 'disabled');

							$.ajax({
								url: __SITEURL+'admin/admin/cambiar_estado/'+turno_id,
								type: 'POST',
								dataType: 'json',
								success: function (jsonData){
									$('#turnosHoyDash .cambioEstado').removeAttr('disabled', 'disabled');

									if (jsonData.status == true){
										//alert(jsonData.turnosHoy);
										$('#turnosHoyDash').html(jsonData.turnosHoy);
										//window.location.href = __SITEURL + 'admin';
									} else {
										alert(jsonData.message);
									}
								}
							});
					//	}
					//});

				}//fin if
			}//fin succes
		});

	}
	
	var handleCambioTurno = function (){

		$('#modal-agregar-comentario').on('click','.btn-aceptar-comentario',function(){

			$(this).attr('disabled', 'disabled');
			/*if($('#comentario').val()==''){
				alert('Debe ingresar un comentario');
			}else{*/
				cambiarEstado($('#turno_id_modal').val(),$('#comentario').val());
			//}

		});
		
		$('#turnosHoyDash').on('click','.cambioEstado',function(){

			//alert($(this).data('id-turno'));
			var turno_id = $(this).data('id-turno');
			var accion = $(this).data('accion');

			if (accion=='Terminado'){
				//open modal
				$('#turno_id_modal').val(turno_id);
				$('#modal-agregar-comentario').modal('show');
			}else{

				// alert('Ok');

			 	cambiarEstado(turno_id);

			}

			

		});

	}

	var handleVerMasNotifi = function(){
		$ShowHideMore = $('.notificaciones');
		$ShowHideMore.each(function() {
			var $times = $(this).children('.pst');
			if ($times.length > 6) {
			    $ShowHideMore.children(':nth-of-type(n+8)').addClass('moreShown').hide();
			    $('.message').addClass('more-times').html('Ver más <i class="fa fa-chevron-down" aria-hidden="true"></i>');
			}
		});

		$(document).on('click', '.message', function() {
			var that = $(this);
			var thisParent = $('.notificaciones');
			if (that.hasClass('more-times')) {
				thisParent.find('.moreShown').show();
				that.toggleClass('more-times', 'less-times').html('Ver menos <i class="fa fa-chevron-up" aria-hidden="true"></i>');
				that.blur();
			} else {
				thisParent.find('.moreShown').hide();
				that.toggleClass('more-times', 'less-times').html('Ver más <i class="fa fa-chevron-down" aria-hidden="true"></i>');
				that.blur();
			}  
		});
	}

	var handleRefresh = function(){
		setInterval('refreshDashboard()',60000);
	}

    return {		
		init: function(){			
			handleCambioTurno();
			handleDelete();
			handleRefresh();
		},
		initNoti: function(){
			handleVerMasNotifi();
		}
		
	}	


}();

function refreshDashboard(){
	location.reload();
}