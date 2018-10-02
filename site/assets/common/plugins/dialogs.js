var WebDialogs = function () {
	var alert_options = {
	};
	
	var alertModal = $('#WebDialogs_alert');
	var alertModalTest = $('#WebDialogsTest_alert');
	var alertModalCli = $('#WebDialogsCli_alert');
	var alertModalError = $('#WebDialogs_alertError');
	var alertConfirm = $('#WebDialogs_confirm');
	var alertConfirmSecond = $('#WebDialogs_confirmSecond');
	var alertLoading = $('#WebDialogs_loading');

	
	return{
		close: function(){
			alertModal.modal('hide');
			
		},
		doAlert: function(data){			

		
			alertModal.find('.btn-aceptar')
				.unbind('click')
				.click(function(e){
					if (data.onConfirm){ 
						data.onConfirm(e);
					}
					alertModal.modal('hide');
				});
			alertModal.find('.modal-body').html(data.message);
			alertModal.find('.modal-header h4').html(data.title);
			alertModal.modal(alert_options);
		},
		doAlertTest: function(data){			

		
			alertModal.find('.btn-aceptar')
				.unbind('click')
				.click(function(e){
					if (data.onConfirm){ 
						data.onConfirm(e);
					}
					alertModal.modal('hide');
				});
			alertModal.find('.modal-body').html(data.message);
			alertModal.find('.modal-header h4').html(data.title);
			alertModal.modal(alert_options);
		},

		
		doAlertCli: function(data){
			alertModalCli.find('.btn-aceptar')
				.unbind('click')
				.click(function(e){
					data.onConfirm(e);
					alertConfirm.modal('hide');
				});
			alertModalCli.find('.modal-body').html(data.message);
			alertModalCli.find('.modal-header h4').html(data.title);
			alertModalCli.modal(alert_options);
		},
		

		doAlertError: function(data){
			alertModalError.find('.modal-body').html(data.message);
			alertModalError.find('.modal-header h4 span').html(data.title);
			alertModalError.modal(alert_options);
		},
		
		doConfirm: function(data){
			
			var clickCancelar = function(e){
				data.onCancelar(e);
			}

			if (data.onCancelar){
				alertConfirm.find('.btn-cancelar')
					.unbind('click', clickCancelar)
					.bind('click', clickCancelar);
			}
			
			alertConfirm.find('.btn-confirm')
				.unbind('click')
				.click(function(e){
					data.onConfirm(e);
					alertConfirm.modal('hide');
				});
				
			alertConfirm.find('.modal-body').html(data.message);
			alertConfirm.find('.modal-header h4').html(data.title);
			alertConfirm.modal(alert_options);
		},
		
		doConfirmSecond: function(data){
			
			var clickCancelar = function(e){
				data.onCancelar(e);
			}

			if (data.onCancelar){
				alertConfirmSecond.find('.btn-cancelar')
					.unbind('click', clickCancelar)
					.bind('click', clickCancelar);
			}
			
			alertConfirmSecond.find('.btn-confirm')
				.unbind('click')
				.click(function(e){
					data.onConfirm(e);
					alertConfirmSecond.modal('hide');
				});
				
			alertConfirmSecond.find('.modal-body').html(data.message);
			alertConfirmSecond.find('.modal-header h4').html(data.title);
			alertConfirmSecond.modal(alert_options);
		},

		doLoading: function(data){
			alertLoading.find('.modal-body').html(data.message);
			alertLoading.find('.modal-header h4').html(data.title);
			alertLoading.modal(alert_options);
		},

		doCloseLoading: function(data){
			alertLoading.modal('hide');
		}

		
		
	}
}();