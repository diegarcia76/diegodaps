/* ========================================================= 
 * bootstrap-gtreetable v2.2.1-alpha
 * https://github.com/gilek/bootstrap-gtreetable
 * ========================================================= 
 * Copyright 2014 Maciej KÅ‚ak
 * Licensed under MIT (https://github.com/gilek/bootstrap-gtreetable/blob/master/LICENSE)
 * ========================================================= */

(function( $ ) {
    $.fn.gtreetable.defaults.languages.tr = {
        save: 'Kaydet',
        cancel: 'VazgeÃ§',
        action: 'Ä°ÅŸlem',
        actions: {
            createBefore: 'Ã–ncesine ekle',
            createAfter: 'SonrasÄ±na ekle',
            createFirstChild: 'Ä°lk alt Ã¶ÄŸeyi oluÅŸtur',
            createLastChild: 'Son alt Ã¶ÄŸeyi oluÅŸtur',
            update: 'GÃ¼ncelle',
            'delete': 'Sil'
        },
        messages: {
            onDelete: 'Silmek istediÄŸinize emin misiniz?',
            onNewRootNotAllowed: 'Yeni ana Ã¶ÄŸe eklenemez.',
            onMoveInDescendant: 'TaÅŸÄ±nacak Ã¶ÄŸe alt Ã¶ÄŸe olmamalÄ±dÄ±r.',
            onMoveAsRoot: 'Hedef ana Ã¶ÄŸe olmamalÄ±dÄ±r.'          
        }
    };
}( jQuery ));
