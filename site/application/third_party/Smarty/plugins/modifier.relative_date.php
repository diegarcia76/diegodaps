<?php
/*
* Smarty plugin
* -------------------------------------------------------------
* Type:     modifier
* Name:     relative_date
* Version:  1.1
* Date:     November 28, 2008
* Author:   Chris Wheeler <chris@haydendigital.com>
* Purpose:  Output dates relative to the current time
* Input:    timestamp = UNIX timestamp or a date which can be converted by strtotime()
*           days = use date only and ignore the time
*           format = (optional) a php date format (for dates over 1 year)
* -------------------------------------------------------------
*/
function smarty_modifier_relative_date($timestamp, $days = false, $format = "M j, Y") {  

  if (!is_numeric($timestamp)) {
    // It's not a time stamp, so try to convert it...
    $timestamp = strtotime($timestamp);
  }
  
  if (!is_numeric($timestamp)) {
    // If its still not numeric, the format is not valid
    return false;
  }
  
  // Calculate the difference in seconds
  $difference = time() - $timestamp;
  
  // Check if we only want to calculate based on the day
  if ($days && $difference < (60*60*24)) { 
    return "Hoy"; 
  }
  if ($difference < 3) { 
    return "ReciÃ©n ahora"; 
  }
  if ($difference < 60) {    
    return 'Hace '. $difference . " segundos"; 
  }
  if ($difference < (60*2)) {    
    return "Hace 1 minuto"; 
  }
  if ($difference < (60*60)) { 
    return 'Hace '. intval($difference / 60) . " minutos"; 
  }
  if ($difference < (60*60*2)) { 
    return "Hace 1 hora"; 
  }
  if ($difference < (60*60*24)) {    
    return 'Hace '.intval($difference / (60*60)) . " horas"; 
  }
  if ($difference < (60*60*24*2)) { 
    return "Hace 1 dÃ­a"; 
  }
  if ($difference < (60*60*24*7)) { 
    return 'Hace '.intval($difference / (60*60*24)) . " dÃ­as"; 
  }
  if ($difference < (60*60*24*7*2)) { 
    return "Hace 1 semana"; 
  }
  if ($difference < (60*60*24*7*(52/12))) { 
    return 'Hace '.intval($difference / (60*60*24*7)) . " semanas"; 
  }
  if ($difference < (60*60*24*7*(52/12)*2)) { 
    return "Hace 1 mes"; 
  }
  if ($difference < (60*60*24*364)) { 
    return 'Hace '.intval($difference / (60*60*24*7*(52/12))) . " meses"; 
  }
  
  // More than a year ago, just return the formatted date
  return @date($format, $timestamp);
}
?>