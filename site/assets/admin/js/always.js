// JavaScript Document
var Always = function() {

	var handleNotificaciones = function(){

		$(document).on('hover','#header_notification_bar', function(){		
			//alert('asd');	
			$.ajax({
				url: __SITEURL+'admin/admin/cambiarAVistaNotificaciones/',
				type: 'POST',
				dataType: 'json',
				success: function (jsonData){
	               
	                $('.badge-default').addClass('hidden');	                

				}
			});
		});

	}

    return {		
		init: function(){			
			handleNotificaciones();
		}
		
	}
}();