(function(e){"function"==typeof define&&define.amd?define(["jquery","moment"],e):e(jQuery,moment)})(function(e,t){(t.defineLocale||t.lang).call(t,"zh-tw",{months:"ä¸€æœˆ_äºŒæœˆ_ä¸‰æœˆ_å››æœˆ_äº”æœˆ_å…­æœˆ_ä¸ƒæœˆ_å…«æœˆ_ä¹æœˆ_åæœˆ_åä¸€æœˆ_åäºŒæœˆ".split("_"),monthsShort:"1æœˆ_2æœˆ_3æœˆ_4æœˆ_5æœˆ_6æœˆ_7æœˆ_8æœˆ_9æœˆ_10æœˆ_11æœˆ_12æœˆ".split("_"),weekdays:"æ˜ŸæœŸæ—¥_æ˜ŸæœŸä¸€_æ˜ŸæœŸäºŒ_æ˜ŸæœŸä¸‰_æ˜ŸæœŸå››_æ˜ŸæœŸäº”_æ˜ŸæœŸå…­".split("_"),weekdaysShort:"é€±æ—¥_é€±ä¸€_é€±äºŒ_é€±ä¸‰_é€±å››_é€±äº”_é€±å…­".split("_"),weekdaysMin:"æ—¥_ä¸€_äºŒ_ä¸‰_å››_äº”_å…­".split("_"),longDateFormat:{LT:"Ahé»žmm",L:"YYYYå¹´MMMDæ—¥",LL:"YYYYå¹´MMMDæ—¥",LLL:"YYYYå¹´MMMDæ—¥LT",LLLL:"YYYYå¹´MMMDæ—¥ddddLT",l:"YYYYå¹´MMMDæ—¥",ll:"YYYYå¹´MMMDæ—¥",lll:"YYYYå¹´MMMDæ—¥LT",llll:"YYYYå¹´MMMDæ—¥ddddLT"},meridiem:function(e,t){var n=100*e+t;return 900>n?"æ—©ä¸Š":1130>n?"ä¸Šåˆ":1230>n?"ä¸­åˆ":1800>n?"ä¸‹åˆ":"æ™šä¸Š"},calendar:{sameDay:"[ä»Šå¤©]LT",nextDay:"[æ˜Žå¤©]LT",nextWeek:"[ä¸‹]ddddLT",lastDay:"[æ˜¨å¤©]LT",lastWeek:"[ä¸Š]ddddLT",sameElse:"L"},ordinal:function(e,t){switch(t){case"d":case"D":case"DDD":return e+"æ—¥";case"M":return e+"æœˆ";case"w":case"W":return e+"é€±";default:return e}},relativeTime:{future:"%så…§",past:"%så‰",s:"å¹¾ç§’",m:"ä¸€åˆ†é˜",mm:"%dåˆ†é˜",h:"ä¸€å°æ™‚",hh:"%då°æ™‚",d:"ä¸€å¤©",dd:"%då¤©",M:"ä¸€å€‹æœˆ",MM:"%då€‹æœˆ",y:"ä¸€å¹´",yy:"%då¹´"}}),e.fullCalendar.datepickerLang("zh-tw","zh-TW",{closeText:"é—œé–‰",prevText:"&#x3C;ä¸Šæœˆ",nextText:"ä¸‹æœˆ&#x3E;",currentText:"ä»Šå¤©",monthNames:["ä¸€æœˆ","äºŒæœˆ","ä¸‰æœˆ","å››æœˆ","äº”æœˆ","å…­æœˆ","ä¸ƒæœˆ","å…«æœˆ","ä¹æœˆ","åæœˆ","åä¸€æœˆ","åäºŒæœˆ"],monthNamesShort:["ä¸€æœˆ","äºŒæœˆ","ä¸‰æœˆ","å››æœˆ","äº”æœˆ","å…­æœˆ","ä¸ƒæœˆ","å…«æœˆ","ä¹æœˆ","åæœˆ","åä¸€æœˆ","åäºŒæœˆ"],dayNames:["æ˜ŸæœŸæ—¥","æ˜ŸæœŸä¸€","æ˜ŸæœŸäºŒ","æ˜ŸæœŸä¸‰","æ˜ŸæœŸå››","æ˜ŸæœŸäº”","æ˜ŸæœŸå…­"],dayNamesShort:["å‘¨æ—¥","å‘¨ä¸€","å‘¨äºŒ","å‘¨ä¸‰","å‘¨å››","å‘¨äº”","å‘¨å…­"],dayNamesMin:["æ—¥","ä¸€","äºŒ","ä¸‰","å››","äº”","å…­"],weekHeader:"å‘¨",dateFormat:"yy/mm/dd",firstDay:1,isRTL:!1,showMonthAfterYear:!0,yearSuffix:"å¹´"}),e.fullCalendar.lang("zh-tw",{defaultButtonText:{month:"æœˆ",week:"é€±",day:"å¤©",list:"å¾…è¾¦äº‹é …"},allDayText:"å…¨å¤©",eventLimitText:"æ›´å¤š"})});