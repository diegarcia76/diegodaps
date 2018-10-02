(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: ZH (Chinese; ä¸­æ–‡ (ZhÅngwÃ©n), æ±‰è¯­, æ¼¢èªž)
 * Region: TW (Taiwan)
 */
$.extend($.validator.messages, {
	required: "å¿…é ˆå¡«å¯«",
	remote: "è«‹ä¿®æ­£æ­¤æ¬„ä½",
	email: "è«‹è¼¸å…¥æœ‰æ•ˆçš„é›»å­éƒµä»¶",
	url: "è«‹è¼¸å…¥æœ‰æ•ˆçš„ç¶²å€",
	date: "è«‹è¼¸å…¥æœ‰æ•ˆçš„æ—¥æœŸ",
	dateISO: "è«‹è¼¸å…¥æœ‰æ•ˆçš„æ—¥æœŸ (YYYY-MM-DD)",
	number: "è«‹è¼¸å…¥æ­£ç¢ºçš„æ•¸å€¼",
	digits: "åªå¯è¼¸å…¥æ•¸å­—",
	creditcard: "è«‹è¼¸å…¥æœ‰æ•ˆçš„ä¿¡ç”¨å¡è™Ÿç¢¼",
	equalTo: "è«‹é‡è¤‡è¼¸å…¥ä¸€æ¬¡",
	extension: "è«‹è¼¸å…¥æœ‰æ•ˆçš„å¾Œç¶´",
	maxlength: $.validator.format("æœ€å¤š {0} å€‹å­—"),
	minlength: $.validator.format("æœ€å°‘ {0} å€‹å­—"),
	rangelength: $.validator.format("è«‹è¼¸å…¥é•·åº¦ç‚º {0} è‡³ {1} ä¹‹é–“çš„å­—ä¸²"),
	range: $.validator.format("è«‹è¼¸å…¥ {0} è‡³ {1} ä¹‹é–“çš„æ•¸å€¼"),
	max: $.validator.format("è«‹è¼¸å…¥ä¸å¤§æ–¼ {0} çš„æ•¸å€¼"),
	min: $.validator.format("è«‹è¼¸å…¥ä¸å°æ–¼ {0} çš„æ•¸å€¼")
});

}));