$(document).ready(function(){

	/* STEPS TURNOS */
	//$('#step-1 .nexter').click(function(){
	$('#step-1').on('click','.nexter',function(){
		$('#servicio_id').val($(this).data('id-servicio'));
		$('#puntos_servicio').val($(this).data('puntos-servicio'));
		var servicio_id = $('#servicio_id').val();
		$('#modal-loading').modal('show');
		$.ajax({
			url: __SITEURL+'servicios/getCoiffeursXServicio/'+servicio_id,
			type: 'POST',
			dataType: 'json',
			success: function (jsonData){

                var myHelpers = {
				  turno_id: $('#turno_id').val(),
				  servicio_id: servicio_id
				};

				$('#puntos_servicio_canjear').html($('#puntos_servicio').val());
				$( "#listado_coiffeurs" ).html(
					$( "#template_coiffeur" ).render( jsonData.coiffeurs, myHelpers )
				);

				$('#modal-loading').modal('hide');

				$('#step-1').animateCss('fadeOutLeft');
				$('#step-1').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					$('.step').removeClass('active');
					$('#step-2, .count-2').addClass('active');
				});
				$('#step-2').animateCss('fadeInRight');

			}
		});

	});


	//$('#step-2 .nexter').click(function(){
	$('#step-2').on('click','.nexter',function(){
		$('#coiffeur_id').val($(this).data('id-coiffeur'));
		$('#modal-loading').modal('show');
		var servicio_id = $('#servicio_id').val();//$(this).data('id-servicio');
		var coiffeur_id = $('#coiffeur_id').val();//$(this).data('id-coiffeur');
		//alert(coiffeur_id);
		var d = new Date();
		//alert(d);
		//var n = d.getDay();
		var datestring = d.getFullYear()  + "-" + (d.getMonth()+1) + "-" + d.getDate();
		//alert(datestring);
		$.ajax({
			url: __SITEURL+'turnos/cargarHorarios/'+servicio_id+'/'+coiffeur_id+'/'+datestring,
			type: 'POST',
			dataType: 'json',
			success: function (jsonData){

				if(jsonData.length>0)
					$( "#listado_horario_hoy" ).html(
						$( "#template_horario" ).render( jsonData )
					);
				else{
					$( "#listado_horario_hoy" ).html('<p align="center">No hay turnos disponibles este día</p>');
				}

				$('#puntos_servicio_canjear_3').html($('#puntos_servicio').val());

				$('#modal-loading').modal('hide');

				$('#step-2').animateCss('fadeOutLeft');
				$('#step-2').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					$('.step').removeClass('active');
					$('#step-3, .count-3').addClass('active');
				});
				$('#step-3').animateCss('fadeInRight');

			}
		});

	});



	//$('#step-2 .prever').click(function(){
	$('#step-2').on('click','.prever',function(){
		$('#step-2').animateCss('fadeOutRight');
		$('#step-2').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$('.step, .count-2').removeClass('active');
			$('#step-1, .count-1').addClass('active');
		});
		$('#step-1').animateCss('fadeInLeft');
	});

	//$('#step-3 .nexter').click(function(){
	$('#step-3').on('click','.nexter',function(){
		var lista_de_espera=false;
		$('#fecha_turno').val($(this).data('fecha'));
		//alert($(this).data('fecha'));
		var thiss = $(this);
		if(thiss.hasClass('reservado')){
			WebDialogs.doAlert({
				message: 'Usted ya reservó este turno!',
				title: 'Reserva',

			});
		}else{
			$('#modal-loading').modal('show');
			$.ajax({
				url: __SITEURL+'turnos/confirmar_turno_1/'+$('#servicio_id').val()+'/'+$('#coiffeur_id').val()+'/'+$('#fecha_turno').val()+'/'+$('#turno_id').val(),
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
	       			$('.panel_confirmacion').addClass('hidden');
	       			$('.panel_no_reserva').addClass('hidden');
	       			$('.panel_no_edicion').addClass('hidden');
	       			$('.panel_no_sobreturno').addClass('hidden');
	       			$('.panel_bloqueado').addClass('hidden');
	       			//alert(jsonData.status);
	       			if(jsonData.coiffeurs['status']){

	       				$('.panel_confirmacion').removeClass('hidden');
	       				//alert('ss');
						$( "#confirmacion_turno" ).html(
							$( "#template_confirmacion_turno" ).render( jsonData.coiffeurs )
						);

						$('#puntos_servicio_canjear_4').html($('#puntos_servicio').val());
						//alert(jsonData.coiffeurs['espera']);
						if (jsonData.coiffeurs['espera']) {
								lista_de_espera=true;
								$('.lista').show();
						}else{
							lista_de_espera=false;
							$('.lista').hide();
						}

						$('#step-3').animateCss('fadeOutLeft');
						$('#step-3').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
							$('.step').removeClass('active');
							$('#step-4, .count-4').addClass('active');
						});
						$('#step-4').animateCss('fadeInRight');
					}else{

						if(jsonData.coiffeurs['bloqueado']){
							$('.panel_bloqueado').removeClass('hidden');
							$('.panel_bloqueado .error-text').html(jsonData.coiffeurs['message'])
								$('#step-3').animateCss('fadeOutLeft');
								$('#step-3').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
									$('.step').removeClass('active');
									$('#step-4, .panel_bloqueado').addClass('active');
								});
								$('#step-4').animateCss('fadeInRight');
						}else{
							if(jsonData.coiffeurs['statusEdicion']){
								$('.panel_no_edicion').removeClass('hidden');
								$('#step-3').animateCss('fadeOutLeft');
								$('#step-3').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
									$('.step').removeClass('active');
									$('#step-4, .panel_no_edicion').addClass('active');
								});
								$('#step-4').animateCss('fadeInRight');
								//$('.panel_no_edicion').addClass('active');
							}else{
								if (jsonData.coiffeurs['espera']) {
									$('.panel_no_sobreturno').removeClass('hidden');
									$('#step-3').animateCss('fadeOutLeft');
									$('#step-3').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
										$('.step').removeClass('active');
										$('#step-4, .panel_no_sobreturno').addClass('active');
									});
									$('#step-4').animateCss('fadeInRight');
								}else{
									$('.panel_no_reserva').removeClass('hidden');
									$('#step-3').animateCss('fadeOutLeft');
									$('#step-3').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
										$('.step').removeClass('active');
										$('#step-4, .panel_no_reserva').addClass('active');
									});
									$('#step-4').animateCss('fadeInRight');
								}
								
							}
						}
						//$('.panel_no_reserva').addClass('active');
					}

					$('#modal-loading').modal('hide');

				}
			});
		}

	});




	//$('#step-3 .prever').click(function(){
	$('#step-3').on('click','.prever',function(){
		$('#step-3').animateCss('fadeOutRight');
		$('#step-3').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$('.step, .count-3').removeClass('active');
			$('#step-2, .count-2').addClass('active');
		});
		$('#step-2').animateCss('fadeInLeft');
	});


	//$('#step-4 .nexter').click(function(){
	$('#step-4').on('click','.nexter',function(){
		$('#modal-loading').modal('show');
		$.ajax({
			url: __SITEURL+'turnos/confirmar_turno_2',
			type: 'POST',
			data:{
				servicio_id: $('#servicio_id').val(),
				coiffeur_id: $('#coiffeur_id').val(),
				fecha_turno: $('#fecha_turno').val(),
				turno_id: $('#turno_id').val(),
				puntos_servicio: $('#puntos_servicio').val()
			},
			dataType: 'json',
			success: function (jsonData){
       			$('#modal-loading').modal('hide');
       			$('.panel_confirmacion').addClass('hidden');
	       		$('.panel_no_reserva').addClass('hidden');
	       		$('.panel_no_edicion').addClass('hidden');

	       		/*$('.panel_confirmacion').removeClass('active');
       			$('.panel_no_reserva').removeClass('active');
       			$('.panel_no_edicion').removeClass('active');
       			$('#ok-panel').removeClass('active');
       			$('#ok-panel').unbind('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
       			$('#step-3').unbind('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
       			$('#confirmacion').unbind('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');*/
				if (jsonData.status){
					$('.panel_confirmacion').removeClass('hidden');
					$('#step-4 #confirmacion').animateCss('zoomOut');
					$('#step-4 .nexter').animateCss('zoomOut');
					$('#step-4 #confirmacion').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						$(this).hide();
						$('#step-4 .nexter').hide();
						$('#step-4 #ok-panel').addClass('active');
					});
					$('#step-4 #ok-panel').animateCss('zoomIn');
					$('#step-4 #ok-panel').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						setTimeout (redireccionar(), 5000);
					});

				}else{

					/*$('#step-4 #confirmacion').animateCss('zoomOut');
					$('#step-4 .nexter').animateCss('zoomOut');
					$('#step-4 #confirmacion').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						$(this).hide();
						$('#step-4 .nexter').hide();
						$('#step-4 #nok-panel').addClass('active');
					});
					$('#step-4 #nok-panel').animateCss('zoomIn');
					$('#step-4 #nok-panel').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						setTimeout (redireccionar(), 5000);
					});*/
					if(jsonData.statusEdicion){
						$('.panel_no_edicion').removeClass('hidden');
						$('#step-4 .nexter').hide();
						$('#step-4 .panel_no_edicion').addClass('active');
						//$('.panel_no_edicion').addClass('active');
					}else{
						$('.panel_no_reserva').removeClass('hidden');
						$('#step-4 .nexter').hide();
						$('#step-4 .panel_no_reserva').addClass('active');
						//$('.panel_no_reserva').addClass('active');
					}

				}

			}
		});


	});

	//$('#step-4 .prever').click(function(){
	$('#step-4').on('click','.prever',function(){
		$('#step-4').animateCss('fadeOutRight');
		$('#step-4').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$('.step, .count-4').removeClass('active');
			$('#step-3, .count-3').addClass('active');
		});
		$('#step-2').animateCss('fadeInLeft');
	});

	function redireccionar(){
	  location.href=__SITEURL;
	}


	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
        //alert(target);
        $('#modal-loading').modal('show');
        if(target=='#now'){

			var d = new Date();
			//var n = d.getDay();
			var datestring = d.getFullYear()  + "-" + (d.getMonth()+1) + "-" + d.getDate();
			$.ajax({
				url: __SITEURL+'turnos/cargarHorarios/'+$('#servicio_id').val()+'/'+$('#coiffeur_id').val()+'/'+datestring,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
	       			$('#modal-loading').modal('hide');
					if(jsonData.length>0)
						$( "#listado_horario_hoy" ).html(
							$( "#template_horario" ).render( jsonData )
						);
					else{
						$( "#listado_horario_hoy" ).html('<p align="center p-y-2">No hay turnos disponibles este día</p>');
					}

				}
			});
        }
        if(target=='#tomorrow'){
            var d = new Date();
			d.setDate(d.getDate() + 1);

			if (d.getDay() == 0)
				d.setDate(d.getDate() + 1);

			var datestring = d.getFullYear()  + "-" + (d.getMonth()+1) + "-" + d.getDate();
			$.ajax({
				url: __SITEURL+'turnos/cargarHorarios/'+$('#servicio_id').val()+'/'+$('#coiffeur_id').val()+'/'+datestring,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
	       			$('#modal-loading').modal('hide');
	       			if(jsonData.length>0)
						$( "#listado_horario_manana" ).html(
							$( "#template_horario" ).render( jsonData )
						);
					else{
						$( "#listado_horario_manana" ).html('<p align="center p-y-2">No hay turnos disponibles este día</p>');
					}

				}
			});
        }
        if(target=='#other'){

            var d = new Date();
			//var n = d.getDay();
			var datestring = d.getFullYear()  + "-" + (d.getMonth()+1) + "-" + d.getDate();
			$.ajax({
				url: __SITEURL+'turnos/cargarHorarios/'+$('#servicio_id').val()+'/'+$('#coiffeur_id').val()+'/'+datestring,
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
	       			$('#modal-loading').modal('hide');
	       			//alert(jsonData.length);
	       			if(jsonData.length>0)
						$( "#listado_horario_otro" ).html(
							$( "#template_horario" ).render( jsonData )
						);
					else{
						$( "#listado_horario_otro" ).html('<p align="center p-y-2">No hay turnos disponibles este día</p>');
					}

				}
			});

        }

    });

	$("#dsel1").on('click',function(){
		$('#modal-loading').modal('show');
	});

	var calendarPicker1 = $("#dsel1").calendarPicker({
	    monthNames:["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
	    dayNames: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
	    useWheel:false,
	    //callbackDelay:500,
	    //years:1,
	    //months:3,
	    //days:4,
	    //showDayArrows:false,
	    callback:function(cal) {
	      //$("#wtf").html("Selected date: " + cal.currentDate);
	      	if($('#servicio_id').val()!=''){

		      	var d = new Date(cal.currentDate);

				//var n = d.getDay();
				var datestring = d.getFullYear()  + "-" + (d.getMonth()+1) + "-" + d.getDate();
				$.ajax({
					url: __SITEURL+'turnos/cargarHorarios/'+$('#servicio_id').val()+'/'+$('#coiffeur_id').val()+'/'+datestring,
					type: 'POST',
					dataType: 'json',
					success: function (jsonData){
		       			//alert(jsonData.length);
		       			if(jsonData.length>0)
							$( "#listado_horario_otro" ).html(
								$( "#template_horario" ).render( jsonData )
							);
						else{
							$( "#listado_horario_otro" ).html('<p align="center p-y-2">No hay turnos disponibles este día</p>');
						}
						$('#modal-loading').modal('hide');
					}
				});
			}
    }});

});
