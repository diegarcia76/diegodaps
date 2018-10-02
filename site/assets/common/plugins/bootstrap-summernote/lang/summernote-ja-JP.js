(function ($) {
  $.extend($.summernote.lang, {
    'ja-JP': {
      font: {
        bold: 'å¤ªå­—',
        italic: 'æ–œä½“',
        underline: 'ä¸‹ç·š',
        strikethrough: 'å–ã‚Šæ¶ˆã—ç·š',
        clear: 'ã‚¯ãƒªã‚¢',
        height: 'æ–‡å­—é«˜',
        name: 'ãƒ•ã‚©ãƒ³ãƒˆ',
        size: 'å¤§ãã•'
      },
      image: {
        image: 'ç”»åƒ',
        insert: 'ç”»åƒæŒ¿å…¥',
        resizeFull: 'æœ€å¤§åŒ–',
        resizeHalf: '1/2',
        resizeQuarter: '1/4',
        floatLeft: 'å·¦å¯„ã›',
        floatRight: 'å³å¯„ã›',
        floatNone: 'å¯„ã›è§£é™¤',
        dragImageHere: 'ã“ã“ã«ç”»åƒã‚’ãƒ‰ãƒ©ãƒƒã‚°ã—ã¦ãã ã•ã„',
        selectFromFiles: 'ç”»åƒãƒ•ã‚¡ã‚¤ãƒ«ã‚’é¸ã¶',
        url: 'URLã‹ã‚‰ç”»åƒã‚’æŒ¿å…¥ã™ã‚‹',
        remove: 'ç”»åƒã‚’å‰Šé™¤ã™ã‚‹'
      },
      link: {
        link: 'ãƒªãƒ³ã‚¯',
        insert: 'ãƒªãƒ³ã‚¯æŒ¿å…¥',
        unlink: 'ãƒªãƒ³ã‚¯è§£é™¤',
        edit: 'ç·¨é›†',
        textToDisplay: 'ãƒªãƒ³ã‚¯æ–‡å­—åˆ—',
        url: 'URLã‚’å…¥åŠ›ã—ã¦ãã ã•ã„',
        openInNewWindow: 'æ–°ã—ã„ã‚¦ã‚£ãƒ³ãƒ‰ã‚¦ã§é–‹ã'
      },
      video: {
        video: 'å‹•ç”»',
        videoLink: 'å‹•ç”»ãƒªãƒ³ã‚¯',
        insert: 'å‹•ç”»æŒ¿å…¥',
        url: 'å‹•ç”»ã®URL',
        providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion, Youku)'
      },
      table: {
        table: 'ãƒ†ãƒ¼ãƒ–ãƒ«'
      },
      hr: {
        insert: 'æ°´å¹³ç·šã®æŒ¿å…¥'
      },
      style: {
        style: 'ã‚¹ã‚¿ã‚¤ãƒ«',
        normal: 'æ¨™æº–',
        blockquote: 'å¼•ç”¨',
        pre: 'ã‚³ãƒ¼ãƒ‰',
        h1: 'è¦‹å‡ºã—1',
        h2: 'è¦‹å‡ºã—2',
        h3: 'è¦‹å‡ºã—3',
        h4: 'è¦‹å‡ºã—4',
        h5: 'è¦‹å‡ºã—5',
        h6: 'è¦‹å‡ºã—6'
      },
      lists: {
        unordered: 'é€šå¸¸ãƒªã‚¹ãƒˆ',
        ordered: 'ç•ªå·ãƒªã‚¹ãƒˆ'
      },
      options: {
        help: 'ãƒ˜ãƒ«ãƒ—',
        fullscreen: 'ãƒ•ãƒ«ã‚¹ã‚¯ãƒªãƒ¼ãƒ³',
        codeview: 'ã‚³ãƒ¼ãƒ‰è¡¨ç¤º'
      },
      paragraph: {
        paragraph: 'æ–‡ç« ',
        outdent: 'å­—ä¸Šã’',
        indent: 'å­—ä¸‹ã’',
        left: 'å·¦å¯„ã›',
        center: 'ä¸­å¤®å¯„ã›',
        right: 'å³å¯„ã›',
        justify: 'å‡ç­‰å‰²ä»˜'
      },
      color: {
        recent: 'ç¾åœ¨ã®è‰²',
        more: 'ã‚‚ã£ã¨è¦‹ã‚‹',
        background: 'èƒŒæ™¯è‰²',
        foreground: 'æ–‡å­—è‰²',
        transparent: 'é€éŽçŽ‡',
        setTransparent: 'é€éŽçŽ‡ã‚’è¨­å®š',
        reset: 'æ¨™æº–',
        resetToDefault: 'æ¨™æº–ã«æˆ»ã™'
      },
      shortcut: {
        shortcuts: 'ã‚·ãƒ§ãƒ¼ãƒˆã‚«ãƒƒãƒˆ',
        close: 'é–‰ã˜ã‚‹',
        textFormatting: 'æ–‡å­—ãƒ•ã‚©ãƒ¼ãƒžãƒƒãƒˆ',
        action: 'ã‚¢ã‚¯ã‚·ãƒ§ãƒ³',
        paragraphFormatting: 'æ–‡ç« ãƒ•ã‚©ãƒ¼ãƒžãƒƒãƒˆ',
        documentStyle: 'ãƒ‰ã‚­ãƒ¥ãƒ¡ãƒ³ãƒˆå½¢å¼'
      },
      history: {
        undo: 'å…ƒã«æˆ»ã™',
        redo: 'ã‚„ã‚Šç›´ã™'
      }
    }
  });
})(jQuery);
