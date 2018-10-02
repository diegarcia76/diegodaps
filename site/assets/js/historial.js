// JavaScript Document
var Historial = function () {

	var handleVerMas = function(){
		$ShowHideMore = $('.historial');
		$ShowHideMore.each(function() {
			var $times = $(this).children('.pst');
			if ($times.length > 8) {
			    $ShowHideMore.children(':nth-of-type(n+8)').addClass('moreShown').hide();
			    $('.message').addClass('more-times').html('Ver más <i class="fa fa-chevron-down" aria-hidden="true"></i>');
			}
		});

		$(document).on('click', '.message', function() {
			var that = $(this);
			var thisParent = $('.historial');
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
		
	
	return{
		init: function(){
			handleVerMas();
		},
		initNoti: function(){
			handleVerMasNotifi();
		}
	}
}();
