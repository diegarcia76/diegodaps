/**
 * Select2 Spanish translation
 */
(function ($) {
    "use strict";

    $.fn.select2.locales['es'] = {
        formatNoMatches: function () { return "No se encontraron resultados"; },
        formatInputTooShort: function (input, min) { var n = min - input.length; return "Por favor, introduzca " + n + " car" + (n == 1? "Ã¡cter" : "acteres"); },
        formatInputTooLong: function (input, max) { var n = input.length - max; return "Por favor, elimine " + n + " car" + (n == 1? "Ã¡cter" : "acteres"); },
        formatSelectionTooBig: function (limit) { return "SÃ³lo puede seleccionar " + limit + " elemento" + (limit == 1 ? "" : "s"); },
        formatLoadMore: function (pageNumber) { return "Cargando mÃ¡s resultadosâ€¦"; },
        formatSearching: function () { return "Buscandoâ€¦"; }
    };

    $.extend($.fn.select2.defaults, $.fn.select2.locales['es']);
})(jQuery);
