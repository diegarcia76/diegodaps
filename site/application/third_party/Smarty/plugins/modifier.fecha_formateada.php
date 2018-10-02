<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty truncate modifier plugin
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *               optionally splitting in the middle of a word, and
 *               appending the $etc string or inserting $etc into the middle.
 *
 * @link   http://smarty.php.net/manual/en/language.modifier.truncate.php truncate (Smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 *
 * @param string  $string      input string
 * @param integer $length      length of truncated text
 * @param string  $etc         end string
 * @param boolean $break_words truncate at word boundary
 * @param boolean $middle      truncate in the middle of text
 *
 * @return string truncated string
 */
function smarty_modifier_fecha_formateada($date)
{
		// cuando la funciÃ³n no implica base de datos, no es necesario ir al DS.
		// podemos trabajar directamente aca en el Manager.
		
		if (empty($date)){
			$date = new \DateTime();
		}
		
		$fdia = $date->format('N'); 
		$fmes = $date->format('m'); 
		$anio = $date->format('Y'); 
		
		switch ($fdia){
			case  1: $dia = 'Lunes'; break;
			case  2: $dia = 'Martes'; break;
			case  3: $dia = 'MiÃ©rcoles'; break;
			case  4: $dia = 'Jueves'; break;
			case  5: $dia = 'Viernes'; break;
			case  6: $dia = 'SÃ¡bado'; break;
			case  7: $dia = 'Domingo'; break;
		}
			


		switch ($fmes){
			case  1: $mes = 'Enero'; break;
			case  2: $mes = 'Febrero'; break;
			case  3: $mes = 'Marzo'; break;
			case  4: $mes = 'Abril'; break;
			case  5: $mes = 'Mayo'; break;
			case  6: $mes = 'Junio'; break;
			case  7: $mes = 'Julio'; break;
			case  8: $mes = 'Agosto'; break;
			case  9: $mes = 'Septiembre'; break;
			case 10: $mes = 'Octubre'; break;
			case 11: $mes = 'Noviembre'; break;
			case 12: $mes = 'Diciembre'; break;

		}
	
		$fechafinal = $dia." ".$date->format('d')." de ".$mes." del ".$anio;
		return $fechafinal;			
}
