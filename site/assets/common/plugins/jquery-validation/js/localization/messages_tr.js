(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: TR (Turkish; TÃ¼rkÃ§e)
 */
$.extend($.validator.messages, {
	required: "Bu alanÄ±n doldurulmasÄ± zorunludur.",
	remote: "LÃ¼tfen bu alanÄ± dÃ¼zeltin.",
	email: "LÃ¼tfen geÃ§erli bir e-posta adresi giriniz.",
	url: "LÃ¼tfen geÃ§erli bir web adresi (URL) giriniz.",
	date: "LÃ¼tfen geÃ§erli bir tarih giriniz.",
	dateISO: "LÃ¼tfen geÃ§erli bir tarih giriniz(ISO formatÄ±nda)",
	number: "LÃ¼tfen geÃ§erli bir sayÄ± giriniz.",
	digits: "LÃ¼tfen sadece sayÄ±sal karakterler giriniz.",
	creditcard: "LÃ¼tfen geÃ§erli bir kredi kartÄ± giriniz.",
	equalTo: "LÃ¼tfen aynÄ± deÄŸeri tekrar giriniz.",
	extension: "LÃ¼tfen geÃ§erli uzantÄ±ya sahip bir deÄŸer giriniz.",
	maxlength: $.validator.format("LÃ¼tfen en fazla {0} karakter uzunluÄŸunda bir deÄŸer giriniz."),
	minlength: $.validator.format("LÃ¼tfen en az {0} karakter uzunluÄŸunda bir deÄŸer giriniz."),
	rangelength: $.validator.format("LÃ¼tfen en az {0} ve en fazla {1} uzunluÄŸunda bir deÄŸer giriniz."),
	range: $.validator.format("LÃ¼tfen {0} ile {1} arasÄ±nda bir deÄŸer giriniz."),
	max: $.validator.format("LÃ¼tfen {0} deÄŸerine eÅŸit ya da daha kÃ¼Ã§Ã¼k bir deÄŸer giriniz."),
	min: $.validator.format("LÃ¼tfen {0} deÄŸerine eÅŸit ya da daha bÃ¼yÃ¼k bir deÄŸer giriniz.")
});

}));