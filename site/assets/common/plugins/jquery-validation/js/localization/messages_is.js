(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: IS (Icelandic; Ã­slenska)
 */
$.extend($.validator.messages, {
	required: "Ãžessi reitur er nauÃ°synlegur.",
	remote: "LagaÃ°u Ã¾ennan reit.",
	maxlength: $.validator.format("SlÃ¡Ã°u inn mest {0} stafi."),
	minlength: $.validator.format("SlÃ¡Ã°u inn minnst {0} stafi."),
	rangelength: $.validator.format("SlÃ¡Ã°u inn minnst {0} og mest {1} stafi."),
	email: "SlÃ¡Ã°u inn gilt netfang.",
	url: "SlÃ¡Ã°u inn gilda vefslÃ³Ã°.",
	date: "SlÃ¡Ã°u inn gilda dagsetningu.",
	number: "SlÃ¡Ã°u inn tÃ¶lu.",
	digits: "SlÃ¡Ã°u inn tÃ¶lustafi eingÃ¶ngu.",
	equalTo: "SlÃ¡Ã°u sama gildi inn aftur.",
	range: $.validator.format("SlÃ¡Ã°u inn gildi milli {0} og {1}."),
	max: $.validator.format("SlÃ¡Ã°u inn gildi sem er minna en eÃ°a jafnt og {0}."),
	min: $.validator.format("SlÃ¡Ã°u inn gildi sem er stÃ¦rra en eÃ°a jafnt og {0}."),
	creditcard: "SlÃ¡Ã°u inn gilt greiÃ°slukortanÃºmer."
});

}));