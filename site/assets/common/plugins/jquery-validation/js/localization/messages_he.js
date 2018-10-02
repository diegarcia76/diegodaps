(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: HE (Hebrew; ×¢×‘×¨×™×ª)
 */
$.extend($.validator.messages, {
	required: "×”×©×“×” ×”×–×” ×”×™× ×• ×©×“×” ×—×•×‘×”",
	remote: "× × ×œ×ª×§×Ÿ ×©×“×” ×–×”",
	email: "× × ×œ×ž×œ× ×›×ª×•×‘×ª ×“×•×\"×œ ×—×•×§×™×ª",
	url: "× × ×œ×ž×œ× ×›×ª×•×‘×ª ××™× ×˜×¨× ×˜ ×—×•×§×™×ª",
	date: "× × ×œ×ž×œ× ×ª××¨×™×š ×—×•×§×™",
	dateISO: "× × ×œ×ž×œ× ×ª××¨×™×š ×—×•×§×™ (ISO)",
	number: "× × ×œ×ž×œ× ×ž×¡×¤×¨",
	digits: "× × ×œ×ž×œ× ×¨×§ ×ž×¡×¤×¨×™×",
	creditcard: "× × ×œ×ž×œ× ×ž×¡×¤×¨ ×›×¨×˜×™×¡ ××©×¨××™ ×—×•×§×™",
	equalTo: "× × ×œ×ž×œ× ××ª ××•×ª×• ×¢×¨×š ×©×•×‘",
	extension: "× × ×œ×ž×œ× ×¢×¨×š ×¢× ×¡×™×•×ž×ª ×—×•×§×™×ª",
	maxlength: $.validator.format(".× × ×œ× ×œ×ž×œ× ×™×•×ª×¨ ×ž- {0} ×ª×•×•×™×"),
	minlength: $.validator.format("× × ×œ×ž×œ× ×œ×¤×—×•×ª {0} ×ª×•×•×™×"),
	rangelength: $.validator.format("× × ×œ×ž×œ× ×¢×¨×š ×‘×™×Ÿ {0} ×œ- {1} ×ª×•×•×™×"),
	range: $.validator.format("× × ×œ×ž×œ× ×¢×¨×š ×‘×™×Ÿ {0} ×œ- {1}"),
	max: $.validator.format("× × ×œ×ž×œ× ×¢×¨×š ×§×˜×Ÿ ××• ×©×•×•×” ×œ- {0}"),
	min: $.validator.format("× × ×œ×ž×œ× ×¢×¨×š ×’×“×•×œ ××• ×©×•×•×” ×œ- {0}")
});

}));