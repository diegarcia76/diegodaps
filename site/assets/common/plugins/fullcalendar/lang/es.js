(function(e){"function"==typeof define&&define.amd?define(["jquery","moment"],e):e(jQuery,moment)})(function(e,t){var n="ene._feb._mar._abr._may._jun._jul._ago._sep._oct._nov._dic.".split("_"),i="ene_feb_mar_abr_may_jun_jul_ago_sep_oct_nov_dic".split("_");(t.defineLocale||t.lang).call(t,"es",{months:"enero_febrero_marzo_abril_mayo_junio_julio_agosto_septiembre_octubre_noviembre_diciembre".split("_"),monthsShort:function(e,t){return/-MMM-/.test(t)?i[e.month()]:n[e.month()]},weekdays:"domingo_lunes_martes_miÃ©rcoles_jueves_viernes_sÃ¡bado".split("_"),weekdaysShort:"dom._lun._mar._miÃ©._jue._vie._sÃ¡b.".split("_"),weekdaysMin:"Do_Lu_Ma_Mi_Ju_Vi_SÃ¡".split("_"),longDateFormat:{LT:"H:mm",L:"DD/MM/YYYY",LL:"D [de] MMMM [del] YYYY",LLL:"D [de] MMMM [del] YYYY LT",LLLL:"dddd, D [de] MMMM [del] YYYY LT"},calendar:{sameDay:function(){return"[hoy a la"+(1!==this.hours()?"s":"")+"] LT"},nextDay:function(){return"[maÃ±ana a la"+(1!==this.hours()?"s":"")+"] LT"},nextWeek:function(){return"dddd [a la"+(1!==this.hours()?"s":"")+"] LT"},lastDay:function(){return"[ayer a la"+(1!==this.hours()?"s":"")+"] LT"},lastWeek:function(){return"[el] dddd [pasado a la"+(1!==this.hours()?"s":"")+"] LT"},sameElse:"L"},relativeTime:{future:"en %s",past:"hace %s",s:"unos segundos",m:"un minuto",mm:"%d minutos",h:"una hora",hh:"%d horas",d:"un dÃ­a",dd:"%d dÃ­as",M:"un mes",MM:"%d meses",y:"un aÃ±o",yy:"%d aÃ±os"},ordinal:"%dÂº",week:{dow:1,doy:4}}),e.fullCalendar.datepickerLang("es","es",{closeText:"Cerrar",prevText:"&#x3C;Ant",nextText:"Sig&#x3E;",currentText:"Hoy",monthNames:["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"],monthNamesShort:["ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic"],dayNames:["domingo","lunes","martes","miÃ©rcoles","jueves","viernes","sÃ¡bado"],dayNamesShort:["dom","lun","mar","miÃ©","jue","vie","sÃ¡b"],dayNamesMin:["D","L","M","X","J","V","S"],weekHeader:"Sm",dateFormat:"dd/mm/yy",firstDay:1,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""}),e.fullCalendar.lang("es",{defaultButtonText:{month:"Mes",week:"Semana",day:"DÃ­a",list:"Agenda"},allDayHtml:"Todo<br/>el dÃ­a",eventLimitText:"mÃ¡s"})});