(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: SK (Slovak; slovenÄina, slovenskÃ½ jazyk)
 */
$.extend($.validator.messages, {
	required: "PovinnÃ© zadaÅ¥.",
	maxlength: $.validator.format("MaximÃ¡lne {0} znakov."),
	minlength: $.validator.format("MinimÃ¡lne {0} znakov."),
	rangelength: $.validator.format("MinimÃ¡lne {0} a MaximÃ¡lne {1} znakov."),
	email: "E-mailovÃ¡ adresa musÃ­ byÅ¥ platnÃ¡.",
	url: "URL musÃ­ byÅ¥ platnÃ½.",
	date: "MusÃ­ byÅ¥ dÃ¡tum.",
	number: "MusÃ­ byÅ¥ ÄÃ­slo.",
	digits: "MÃ´Å¾e obsahovaÅ¥ iba ÄÃ­slice.",
	equalTo: "Dva hodnoty sa musia rovnaÅ¥.",
	range: $.validator.format("MusÃ­ byÅ¥ medzi {0} a {1}."),
	max: $.validator.format("NemÃ´Å¾e byÅ¥ viac ako{0}."),
	min: $.validator.format("NemÃ´Å¾e byÅ¥ menej ako{0}."),
	creditcard: "ÄŒÃ­slo platobnej karty musÃ­ byÅ¥ platnÃ©."
});

}));