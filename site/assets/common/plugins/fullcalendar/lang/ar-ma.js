(function(t){"function"==typeof define&&define.amd?define(["jquery","moment"],t):t(jQuery,moment)})(function(t,e){(e.defineLocale||e.lang).call(e,"ar-ma",{months:"ÙŠÙ†Ø§ÙŠØ±_ÙØ¨Ø±Ø§ÙŠØ±_Ù…Ø§Ø±Ø³_Ø£Ø¨Ø±ÙŠÙ„_Ù…Ø§ÙŠ_ÙŠÙˆÙ†ÙŠÙˆ_ÙŠÙˆÙ„ÙŠÙˆØ²_ØºØ´Øª_Ø´ØªÙ†Ø¨Ø±_Ø£ÙƒØªÙˆØ¨Ø±_Ù†ÙˆÙ†Ø¨Ø±_Ø¯Ø¬Ù†Ø¨Ø±".split("_"),monthsShort:"ÙŠÙ†Ø§ÙŠØ±_ÙØ¨Ø±Ø§ÙŠØ±_Ù…Ø§Ø±Ø³_Ø£Ø¨Ø±ÙŠÙ„_Ù…Ø§ÙŠ_ÙŠÙˆÙ†ÙŠÙˆ_ÙŠÙˆÙ„ÙŠÙˆØ²_ØºØ´Øª_Ø´ØªÙ†Ø¨Ø±_Ø£ÙƒØªÙˆØ¨Ø±_Ù†ÙˆÙ†Ø¨Ø±_Ø¯Ø¬Ù†Ø¨Ø±".split("_"),weekdays:"Ø§Ù„Ø£Ø­Ø¯_Ø§Ù„Ø¥ØªÙ†ÙŠÙ†_Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡_Ø§Ù„Ø£Ø±Ø¨Ø¹Ø§Ø¡_Ø§Ù„Ø®Ù…ÙŠØ³_Ø§Ù„Ø¬Ù…Ø¹Ø©_Ø§Ù„Ø³Ø¨Øª".split("_"),weekdaysShort:"Ø§Ø­Ø¯_Ø§ØªÙ†ÙŠÙ†_Ø«Ù„Ø§Ø«Ø§Ø¡_Ø§Ø±Ø¨Ø¹Ø§Ø¡_Ø®Ù…ÙŠØ³_Ø¬Ù…Ø¹Ø©_Ø³Ø¨Øª".split("_"),weekdaysMin:"Ø­_Ù†_Ø«_Ø±_Ø®_Ø¬_Ø³".split("_"),longDateFormat:{LT:"HH:mm",L:"DD/MM/YYYY",LL:"D MMMM YYYY",LLL:"D MMMM YYYY LT",LLLL:"dddd D MMMM YYYY LT"},calendar:{sameDay:"[Ø§Ù„ÙŠÙˆÙ… Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",nextDay:"[ØºØ¯Ø§ Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",nextWeek:"dddd [Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",lastDay:"[Ø£Ù…Ø³ Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",lastWeek:"dddd [Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",sameElse:"L"},relativeTime:{future:"ÙÙŠ %s",past:"Ù…Ù†Ø° %s",s:"Ø«ÙˆØ§Ù†",m:"Ø¯Ù‚ÙŠÙ‚Ø©",mm:"%d Ø¯Ù‚Ø§Ø¦Ù‚",h:"Ø³Ø§Ø¹Ø©",hh:"%d Ø³Ø§Ø¹Ø§Øª",d:"ÙŠÙˆÙ…",dd:"%d Ø£ÙŠØ§Ù…",M:"Ø´Ù‡Ø±",MM:"%d Ø£Ø´Ù‡Ø±",y:"Ø³Ù†Ø©",yy:"%d Ø³Ù†ÙˆØ§Øª"},week:{dow:6,doy:12}}),t.fullCalendar.datepickerLang("ar-ma","ar",{closeText:"Ø¥ØºÙ„Ø§Ù‚",prevText:"&#x3C;Ø§Ù„Ø³Ø§Ø¨Ù‚",nextText:"Ø§Ù„ØªØ§Ù„ÙŠ&#x3E;",currentText:"Ø§Ù„ÙŠÙˆÙ…",monthNames:["ÙƒØ§Ù†ÙˆÙ† Ø§Ù„Ø«Ø§Ù†ÙŠ","Ø´Ø¨Ø§Ø·","Ø¢Ø°Ø§Ø±","Ù†ÙŠØ³Ø§Ù†","Ù…Ø§ÙŠÙˆ","Ø­Ø²ÙŠØ±Ø§Ù†","ØªÙ…ÙˆØ²","Ø¢Ø¨","Ø£ÙŠÙ„ÙˆÙ„","ØªØ´Ø±ÙŠÙ† Ø§Ù„Ø£ÙˆÙ„","ØªØ´Ø±ÙŠÙ† Ø§Ù„Ø«Ø§Ù†ÙŠ","ÙƒØ§Ù†ÙˆÙ† Ø§Ù„Ø£ÙˆÙ„"],monthNamesShort:["1","2","3","4","5","6","7","8","9","10","11","12"],dayNames:["Ø§Ù„Ø£Ø­Ø¯","Ø§Ù„Ø§Ø«Ù†ÙŠÙ†","Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡","Ø§Ù„Ø£Ø±Ø¨Ø¹Ø§Ø¡","Ø§Ù„Ø®Ù…ÙŠØ³","Ø§Ù„Ø¬Ù…Ø¹Ø©","Ø§Ù„Ø³Ø¨Øª"],dayNamesShort:["Ø§Ù„Ø£Ø­Ø¯","Ø§Ù„Ø§Ø«Ù†ÙŠÙ†","Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡","Ø§Ù„Ø£Ø±Ø¨Ø¹Ø§Ø¡","Ø§Ù„Ø®Ù…ÙŠØ³","Ø§Ù„Ø¬Ù…Ø¹Ø©","Ø§Ù„Ø³Ø¨Øª"],dayNamesMin:["Ø­","Ù†","Ø«","Ø±","Ø®","Ø¬","Ø³"],weekHeader:"Ø£Ø³Ø¨ÙˆØ¹",dateFormat:"dd/mm/yy",firstDay:6,isRTL:!0,showMonthAfterYear:!1,yearSuffix:""}),t.fullCalendar.lang("ar-ma",{defaultButtonText:{month:"Ø´Ù‡Ø±",week:"Ø£Ø³Ø¨ÙˆØ¹",day:"ÙŠÙˆÙ…",list:"Ø£Ø¬Ù†Ø¯Ø©"},allDayText:"Ø§Ù„ÙŠÙˆÙ… ÙƒÙ„Ù‡",eventLimitText:"Ø£Ø®Ø±Ù‰"})});