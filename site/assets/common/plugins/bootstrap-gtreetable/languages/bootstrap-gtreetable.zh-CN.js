/* ========================================================= 
 * bootstrap-gtreetable v2.2.1-alpha
 * https://github.com/gilek/bootstrap-gtreetable
 * ========================================================= 
 * Copyright 2014 Maciej KÅ‚ak
 * Licensed under MIT (https://github.com/gilek/bootstrap-gtreetable/blob/master/LICENSE)
 * ========================================================= */

// Chinese Translation by Thinking Song

(function( $ ) {
    $.fn.gtreetable.defaults.languages['zh-CN'] = {
        save: 'ä¿å­˜',
        cancel: 'å–æ¶ˆ',
        action: 'æ“ä½œ',
        actions: {
            createBefore: 'ä¹‹å‰åˆ›å»º',
            createAfter: 'ä¹‹åŽåˆ›å»º',
            createFirstChild: 'åˆ›å»ºç¬¬ä¸€ä¸ªå­èŠ‚ç‚¹',
            createLastChild: 'åˆ›å»ºæœ€åŽä¸€ä¸ªå­èŠ‚ç‚¹',
            update: 'æ›´æ–°',
            'delete': 'ä¸Šä¼ '
        },
        messages: {
            onDelete: 'ä½ ç¡®å®šåˆ é™¤?',
            onNewRootNotAllowed: 'ä¸å…è®¸æ·»åŠ æ–°çš„æ ¹èŠ‚ç‚¹.',
            onMoveInDescendant: 'ç›®æ ‡èŠ‚ç‚¹ä¸èƒ½æ˜¯åŽè£”èŠ‚ç‚¹T.',
            onMoveAsRoot: 'ç›®æ ‡èŠ‚ç‚¹ä¸èƒ½æ˜¯æ ¹èŠ‚ç‚¹.'
        }
    };
}( jQuery ));
