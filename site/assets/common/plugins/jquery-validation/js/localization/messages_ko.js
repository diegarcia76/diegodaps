(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: KO (Korean; í•œêµ­ì–´)
 */
$.extend($.validator.messages, {
	required: "í•„ìˆ˜ í•­ëª©ìž…ë‹ˆë‹¤.",
	remote: "í•­ëª©ì„ ìˆ˜ì •í•˜ì„¸ìš”.",
	email: "ìœ íš¨í•˜ì§€ ì•Šì€ E-Mailì£¼ì†Œìž…ë‹ˆë‹¤.",
	url: "ìœ íš¨í•˜ì§€ ì•Šì€ URLìž…ë‹ˆë‹¤.",
	date: "ì˜¬ë°”ë¥¸ ë‚ ì§œë¥¼ ìž…ë ¥í•˜ì„¸ìš”.",
	dateISO: "ì˜¬ë°”ë¥¸ ë‚ ì§œ(ISO)ë¥¼ ìž…ë ¥í•˜ì„¸ìš”.",
	number: "ìœ íš¨í•œ ìˆ«ìžê°€ ì•„ë‹™ë‹ˆë‹¤.",
	digits: "ìˆ«ìžë§Œ ìž…ë ¥ ê°€ëŠ¥í•©ë‹ˆë‹¤.",
	creditcard: "ì‹ ìš©ì¹´ë“œ ë²ˆí˜¸ê°€ ë°”ë¥´ì§€ ì•ŠìŠµë‹ˆë‹¤.",
	equalTo: "ê°™ì€ ê°’ì„ ë‹¤ì‹œ ìž…ë ¥í•˜ì„¸ìš”.",
	extension: "ì˜¬ë°”ë¥¸ í™•ìž¥ìžê°€ ì•„ë‹™ë‹ˆë‹¤.",
	maxlength: $.validator.format("{0}ìžë¥¼ ë„˜ì„ ìˆ˜ ì—†ìŠµë‹ˆë‹¤. "),
	minlength: $.validator.format("{0}ìž ì´ìƒ ìž…ë ¥í•˜ì„¸ìš”."),
	rangelength: $.validator.format("ë¬¸ìž ê¸¸ì´ê°€ {0} ì—ì„œ {1} ì‚¬ì´ì˜ ê°’ì„ ìž…ë ¥í•˜ì„¸ìš”."),
	range: $.validator.format("{0} ì—ì„œ {1} ì‚¬ì´ì˜ ê°’ì„ ìž…ë ¥í•˜ì„¸ìš”."),
	max: $.validator.format("{0} ì´í•˜ì˜ ê°’ì„ ìž…ë ¥í•˜ì„¸ìš”."),
	min: $.validator.format("{0} ì´ìƒì˜ ê°’ì„ ìž…ë ¥í•˜ì„¸ìš”.")
});

}));