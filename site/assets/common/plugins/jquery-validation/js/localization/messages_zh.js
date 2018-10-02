(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "../jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: ZH (Chinese, ä¸­æ–‡ (ZhÅngwÃ©n), æ±‰è¯­, æ¼¢èªž)
 */
$.extend($.validator.messages, {
	required: "å¿…é¡»å¡«å†™",
	remote: "è¯·ä¿®æ­£æ­¤æ ä½",
	email: "è¯·è¾“å…¥æœ‰æ•ˆçš„ç”µå­é‚®ä»¶",
	url: "è¯·è¾“å…¥æœ‰æ•ˆçš„ç½‘å€",
	date: "è¯·è¾“å…¥æœ‰æ•ˆçš„æ—¥æœŸ",
	dateISO: "è¯·è¾“å…¥æœ‰æ•ˆçš„æ—¥æœŸ (YYYY-MM-DD)",
	number: "è¯·è¾“å…¥æ­£ç¡®çš„æ•°å­—",
	digits: "åªå¯è¾“å…¥æ•°å­—",
	creditcard: "è¯·è¾“å…¥æœ‰æ•ˆçš„ä¿¡ç”¨å¡å·ç ",
	equalTo: "ä½ çš„è¾“å…¥ä¸ç›¸åŒ",
	extension: "è¯·è¾“å…¥æœ‰æ•ˆçš„åŽç¼€",
	maxlength: $.validator.format("æœ€å¤š {0} ä¸ªå­—"),
	minlength: $.validator.format("æœ€å°‘ {0} ä¸ªå­—"),
	rangelength: $.validator.format("è¯·è¾“å…¥é•¿åº¦ä¸º {0} è‡³ {1} ä¹‹é–“çš„å­—ä¸²"),
	range: $.validator.format("è¯·è¾“å…¥ {0} è‡³ {1} ä¹‹é—´çš„æ•°å€¼"),
	max: $.validator.format("è¯·è¾“å…¥ä¸å¤§äºŽ {0} çš„æ•°å€¼"),
	min: $.validator.format("è¯·è¾“å…¥ä¸å°äºŽ {0} çš„æ•°å€¼")
});

}));