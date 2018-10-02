/**
 * Select2 Polish translation.
 * 
 * @author  Jan Kondratowicz <jan@kondratowicz.pl>
 * @author  Uriy Efremochkin <efremochkin@uriy.me>
 * @author  MichaÅ‚ PoÅ‚tyn <mike@poltyn.com>
 */
(function ($) {
    "use strict";

    $.fn.select2.locales['pl'] = {
        formatNoMatches: function () { return "Brak wynikÃ³w"; },
        formatInputTooShort: function (input, min) { return "Wpisz co najmniej" + character(min - input.length, "znak", "i"); },
        formatInputTooLong: function (input, max) { return "Wpisana fraza jest za dÅ‚uga o" + character(input.length - max, "znak", "i"); },
        formatSelectionTooBig: function (limit) { return "MoÅ¼esz zaznaczyÄ‡ najwyÅ¼ej" + character(limit, "element", "y"); },
        formatLoadMore: function (pageNumber) { return "Åadowanie wynikÃ³wâ€¦"; },
        formatSearching: function () { return "Szukanieâ€¦"; }
    };

    $.extend($.fn.select2.defaults, $.fn.select2.locales['pl']);

    function character (n, word, pluralSuffix) {
        return " " + n + " " + word + (n == 1 ? "" : n%10 < 5 && n%10 > 1 && (n%100 < 5 || n%100 > 20) ? pluralSuffix : "Ã³w");
    }
})(jQuery);
