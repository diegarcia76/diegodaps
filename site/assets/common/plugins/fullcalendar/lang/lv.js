(function(e){"function"==typeof define&&define.amd?define(["jquery","moment"],e):e(jQuery,moment)})(function(e,t){function n(e,t,n){var i=e.split("_");return n?1===t%10&&11!==t?i[2]:i[3]:1===t%10&&11!==t?i[0]:i[1]}function i(e,t,i){return e+" "+n(r[i],e,t)}var r={mm:"minÅ«ti_minÅ«tes_minÅ«te_minÅ«tes",hh:"stundu_stundas_stunda_stundas",dd:"dienu_dienas_diena_dienas",MM:"mÄ“nesi_mÄ“neÅ¡us_mÄ“nesis_mÄ“neÅ¡i",yy:"gadu_gadus_gads_gadi"};(t.defineLocale||t.lang).call(t,"lv",{months:"janvÄris_februÄris_marts_aprÄ«lis_maijs_jÅ«nijs_jÅ«lijs_augusts_septembris_oktobris_novembris_decembris".split("_"),monthsShort:"jan_feb_mar_apr_mai_jÅ«n_jÅ«l_aug_sep_okt_nov_dec".split("_"),weekdays:"svÄ“tdiena_pirmdiena_otrdiena_treÅ¡diena_ceturtdiena_piektdiena_sestdiena".split("_"),weekdaysShort:"Sv_P_O_T_C_Pk_S".split("_"),weekdaysMin:"Sv_P_O_T_C_Pk_S".split("_"),longDateFormat:{LT:"HH:mm",L:"DD.MM.YYYY",LL:"YYYY. [gada] D. MMMM",LLL:"YYYY. [gada] D. MMMM, LT",LLLL:"YYYY. [gada] D. MMMM, dddd, LT"},calendar:{sameDay:"[Å odien pulksten] LT",nextDay:"[RÄ«t pulksten] LT",nextWeek:"dddd [pulksten] LT",lastDay:"[Vakar pulksten] LT",lastWeek:"[PagÄjuÅ¡Ä] dddd [pulksten] LT",sameElse:"L"},relativeTime:{future:"%s vÄ“lÄk",past:"%s agrÄk",s:"daÅ¾as sekundes",m:"minÅ«ti",mm:i,h:"stundu",hh:i,d:"dienu",dd:i,M:"mÄ“nesi",MM:i,y:"gadu",yy:i},ordinal:"%d.",week:{dow:1,doy:4}}),e.fullCalendar.datepickerLang("lv","lv",{closeText:"AizvÄ“rt",prevText:"Iepr.",nextText:"NÄk.",currentText:"Å odien",monthNames:["JanvÄris","FebruÄris","Marts","AprÄ«lis","Maijs","JÅ«nijs","JÅ«lijs","Augusts","Septembris","Oktobris","Novembris","Decembris"],monthNamesShort:["Jan","Feb","Mar","Apr","Mai","JÅ«n","JÅ«l","Aug","Sep","Okt","Nov","Dec"],dayNames:["svÄ“tdiena","pirmdiena","otrdiena","treÅ¡diena","ceturtdiena","piektdiena","sestdiena"],dayNamesShort:["svt","prm","otr","tre","ctr","pkt","sst"],dayNamesMin:["Sv","Pr","Ot","Tr","Ct","Pk","Ss"],weekHeader:"Ned.",dateFormat:"dd.mm.yy",firstDay:1,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""}),e.fullCalendar.lang("lv",{defaultButtonText:{month:"MÄ“nesis",week:"NedÄ“Ä¼a",day:"Diena",list:"Dienas kÄrtÄ«ba"},allDayText:"Visu dienu",eventLimitText:function(e){return"+vÄ“l "+e}})});