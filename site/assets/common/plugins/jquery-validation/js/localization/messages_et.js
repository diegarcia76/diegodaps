(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: ET (Estonian; eesti, eesti keel)
 */
$.extend($.validator.messages, {
	required: "See vÃ¤li peab olema tÃ¤idetud.",
	maxlength: $.validator.format("Palun sisestage vÃ¤hem kui {0} tÃ¤hemÃ¤rki."),
	minlength: $.validator.format("Palun sisestage vÃ¤hemalt {0} tÃ¤hemÃ¤rki."),
	rangelength: $.validator.format("Palun sisestage vÃ¤Ã¤rtus vahemikus {0} kuni {1} tÃ¤hemÃ¤rki."),
	email: "Palun sisestage korrektne e-maili aadress.",
	url: "Palun sisestage korrektne URL.",
	date: "Palun sisestage korrektne kuupÃ¤ev.",
	dateISO: "Palun sisestage korrektne kuupÃ¤ev (YYYY-MM-DD).",
	number: "Palun sisestage korrektne number.",
	digits: "Palun sisestage ainult numbreid.",
	equalTo: "Palun sisestage sama vÃ¤Ã¤rtus uuesti.",
	range: $.validator.format("Palun sisestage vÃ¤Ã¤rtus vahemikus {0} kuni {1}."),
	max: $.validator.format("Palun sisestage vÃ¤Ã¤rtus, mis on vÃ¤iksem vÃµi vÃµrdne arvuga {0}."),
	min: $.validator.format("Palun sisestage vÃ¤Ã¤rtus, mis on suurem vÃµi vÃµrdne arvuga {0}."),
	creditcard: "Palun sisestage korrektne krediitkaardi number."
});

}));