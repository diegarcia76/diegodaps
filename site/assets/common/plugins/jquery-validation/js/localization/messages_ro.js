(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: RO (Romanian, limba romÃ¢nÄƒ)
 */
$.extend($.validator.messages, {
	required: "Acest cÃ¢mp este obligatoriu.",
	remote: "Te rugÄƒm sÄƒ completezi acest cÃ¢mp.",
	email: "Te rugÄƒm sÄƒ introduci o adresÄƒ de email validÄƒ",
	url: "Te rugÄƒm sa introduci o adresÄƒ URL validÄƒ.",
	date: "Te rugÄƒm sÄƒ introduci o datÄƒ corectÄƒ.",
	dateISO: "Te rugÄƒm sÄƒ introduci o datÄƒ (ISO) corectÄƒ.",
	number: "Te rugÄƒm sÄƒ introduci un numÄƒr Ã®ntreg valid.",
	digits: "Te rugÄƒm sÄƒ introduci doar cifre.",
	creditcard: "Te rugÄƒm sÄƒ introduci un numar de carte de credit valid.",
	equalTo: "Te rugÄƒm sÄƒ reintroduci valoarea.",
	extension: "Te rugÄƒm sÄƒ introduci o valoare cu o extensie validÄƒ.",
	maxlength: $.validator.format("Te rugÄƒm sÄƒ nu introduci mai mult de {0} caractere."),
	minlength: $.validator.format("Te rugÄƒm sÄƒ introduci cel puÈ›in {0} caractere."),
	rangelength: $.validator.format("Te rugÄƒm sÄƒ introduci o valoare Ã®ntre {0} È™i {1} caractere."),
	range: $.validator.format("Te rugÄƒm sÄƒ introduci o valoare Ã®ntre {0} È™i {1}."),
	max: $.validator.format("Te rugÄƒm sÄƒ introduci o valoare egal sau mai micÄƒ decÃ¢t {0}."),
	min: $.validator.format("Te rugÄƒm sÄƒ introduci o valoare egal sau mai mare decÃ¢t {0}.")
});

}));