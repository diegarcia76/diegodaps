// JavaScript Document
var Turnos = function () {

	var handleVerMas = function(){
		$ShowHideMore = $('.turnos');
		$ShowHideMore.each(function() {
			var $times = $(this).children('.pst');
			if ($times.length > 8) {
			    $ShowHideMore.children(':nth-of-type(n+8)').addClass('moreShown').hide();
			    $('.message').addClass('more-times').html('Ver más <i class="fa fa-chevron-down" aria-hidden="true"></i>');
			}
		});

		$(document).on('click', '.message', function() {
			var that = $(this);
			var thisParent = $('.turnos');
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

	var handleDelete = function(){
		$('.turnos').on('click','a.btn-eliminar', function(e){
			e.preventDefault();
			var usuarioNombre = $(this).attr('title');
			var href = $(this).attr('href');
			var turnoId = $(this).attr('data-turnoId');
			$.ajax({
				url: __SITEURL+'turnos/checkCancelacion/'+turnoId,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
					//alert('sigue? '+jsonData.status);
					if (jsonData.status == true){

						WebDialogs.doConfirm({
							message: 'No vas a podes sacar otro turno el mismo día.',
							title: '¿Estás seguro de cancelar el turno?',
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

					} else {
						
						WebDialogs.doConfirm({
							message: 'Si usted decide cancelar el turno, se le marcará como ausente y por el lapso de '+jsonData.dias+' días no podrá reservar turnos desde la plataforma!!',
							title: '¿Estás seguro de cancelar(ausencia) el turno?',
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

					}
				}
			});
						

		});
	}
/*
	var handleModificar = function(){

		$('#step-1').on('click','.nexterday',function(){

			//$("#listado_coiffeurs").loadTemplate($("#template_coiffeur"),jsonData.coiffeurs);

			$('#step-1').animateCss('fadeOutLeft');
			$('#step-1').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$('.step').removeClass('active');
				$('#step-4, .count-4').addClass('active');
			});
			$('#step-4').animateCss('fadeInRight');


		});

		$('#step-1').on('click','.nexterservice',function(){

			//$("#listado_coiffeurs").loadTemplate($("#template_coiffeur"),jsonData.coiffeurs);

			$('#step-1').animateCss('fadeOutLeft');
			$('#step-1').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$('.step').removeClass('active');
				$('#step-2, .count-2').addClass('active');
			});
			$('#step-2').animateCss('fadeInRight');


		});

		$('#step-1').on('click','.nextercoiffeur',function(){

			//$("#listado_coiffeurs").loadTemplate($("#template_coiffeur"),jsonData.coiffeurs);

			$('#step-1').animateCss('fadeOutLeft');
			$('#step-1').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$('.step').removeClass('active');
				$('#step-3, .count-3').addClass('active');
			});
			$('#step-3').animateCss('fadeInRight');


		});



		$('#step-2').on('click','.prever',function(){
			$('#step-2').animateCss('fadeOutRight');
			$('#step-2').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$('.step, .count-2').removeClass('active');
				$('#step-1, .count-1').addClass('active');
			});
			$('#step-1').animateCss('fadeInLeft');
		});

		$('#step-2').on('click','.nexter',function(){
			$.ajax({
				url: __SITEURL+'servicios/guardar_servicio/'+$(this).data('id-turno')+'/'+$(this).data('id-servicio'),
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
					//alert(jsonData.coiffeurs);

	                $("#listado_coiffeurs").loadTemplate($("#template_coiffeur"),jsonData.coiffeurs);

					$('#step-2').animateCss('fadeOutRight');
					$('#step-2').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						$('.step, .count-2').removeClass('active');
						$('#step-1, .count-1').addClass('active');
					});
					$('#step-1').animateCss('fadeInLeft');

				}
			});
		});


		$('#step-3').on('click','.prever',function(){
			$('#step-3').animateCss('fadeOutRight');
			$('#step-3').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$('.step, .count-3').removeClass('active');
				$('#step-1, .count-1').addClass('active');
			});
			$('#step-1').animateCss('fadeInLeft');
		});

		$('#step-4').on('click','.prever',function(){
			$('#step-4').animateCss('fadeOutRight');
			$('#step-4').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$('.step, .count-4').removeClass('active');
				$('#step-1, .count-1').addClass('active');
			});
			$('#step-1').animateCss('fadeInLeft');
		});

	}
*/


	return{
		init: function(){
			handleVerMas();
			handleDelete();
		}/*,
		initModificar: function(){
			handleModificar();
		}*/
	}
}();
