(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: SR (Serbian - Latin alphabet; srpski jezik - latinica)
 */
$.extend($.validator.messages, {
	required: "Polje je obavezno.",
	remote: "Sredite ovo polje.",
	email: "Unesite ispravnu i-mejl adresu",
	url: "Unesite ispravan URL.",
	date: "Unesite ispravan datum.",
	dateISO: "Unesite ispravan datum (ISO).",
	number: "Unesite ispravan broj.",
	digits: "Unesite samo cife.",
	creditcard: "Unesite ispravan broj kreditne kartice.",
	equalTo: "Unesite istu vrednost ponovo.",
	extension: "Unesite vrednost sa odgovarajuÄ‡om ekstenzijom.",
	maxlength: $.validator.format("Unesite manje od {0} karaktera."),
	minlength: $.validator.format("Unesite barem {0} karaktera."),
	rangelength: $.validator.format("Unesite vrednost dugaÄku izmeÄ‘u {0} i {1} karaktera."),
	range: $.validator.format("Unesite vrednost izmeÄ‘u {0} i {1}."),
	max: $.validator.format("Unesite vrednost manju ili jednaku {0}."),
	min: $.validator.format("Unesite vrednost veÄ‡u ili jednaku {0}.")
});

}));