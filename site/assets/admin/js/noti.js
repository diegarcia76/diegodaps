// JavaScript Document
var Notificaciones = function() {	

	var checkNotificaciones = function(){	

		$(document).on('click','#bt_notificacion', function(){	
			var theSelect = $('#dropdownMenu');	
			var html = "";
			theSelect.empty();
			theSelect.append('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');
			$.ajax({
				url: __SITEURL+'admin/admin/cambiarAVistaNotificaciones/',
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
					theSelect.empty();

					html = '<li class="external"><h3><span class="bold">'+jsonData.cantidad+' </span> notificaciones pendientes</h3><a href="'+__SITEURL+'admin/admin/notificaciones">ver todas</a> </li><li><ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">';

					if(jsonData.status){
						
						if(jsonData.notificaciones){
							$.each(jsonData.notificaciones, function(i, item){
								//theSelect.append('<li class="unread"><a href="#"><p>'+item.titulo+': '+item.descripcion+'</p><p><small><i class="fa fa-clock-o" aria-hidden="true"></i> '+item.fecha+'</small></p></a></li>');
								html += '<li><a href="javascript:;"><span class="time">'+item.fecha+'</span><span class="details"><span class="label label-sm label-icon label-success"><i class="fa fa-plus"></i></span> '+item.titulo+': '+item.descripcion+'</span></a></li>';
								//theSelect.append('');
							});							
						}
	                }
					html += '</ul></li>';
					theSelect.append(html);
                	$('.badge-default').addClass('hidden');

				}
			});
		});	

		setInterval('checkNotific()',5000);

	}


    return {		
		init: function(){			
			checkNotificaciones();
		}
		
	}
}();

function checkNotific(){
	//alert('asd');
	$.ajax({
		url: __SITEURL+'admin/admin/checkNotificaciones/',
		type: 'POST',
		dataType: 'json',
		success: function (jsonData){
           
            if(jsonData.status){

           		$('.badge-default').removeClass('hidden');
           		$('.badge-default').html(jsonData.cantidad);

            }else{
           		$('.badge-default').addClass('hidden');
            }	                

		}
	});
}
