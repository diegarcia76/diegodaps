<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of export_to_xls_pdf Helper
 *
 * @author NAsoft
 *
 */

// -----------------------------------------------------------------------------------------------------------

/**
 * export to xls or pdf
 *
 * a partir de elementos de la base de datos, arma una función para la ubicación
 * de dichos elementos en tablas para el armado de listados en xls o pdf
 *
 * @access	public
 * @param 	q cantidad de elementos para la tabla
 * 
 */

if ( ! function_exists('exportToXls'))
{	
    function exportToXls($q, $title, $email, $top, $tableHeader,$content,$start, $total, $result,$reportTitle,$pdf){
		
		if ($q !== 0){
			$CI =& get_instance();
			$CI->load->library('excel'); //cargar la librería
			$CI->excel->setActiveSheetIndex(0); //activar la primer worksheet
			$CI->excel->getActiveSheet()->setTitle('Inscripciones'); //nombrar la worksheet
			//header de la plantilla
			$rDate = date_format(new \Datetime('now'), 'd-m-Y');
			$CI->excel->getActiveSheet()->setCellValue('A1',$title);		
			$CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
			$CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);		
			$CI->excel->getActiveSheet()->mergeCells('A1:B1');
			$CI->excel->getActiveSheet()->getStyle('A1:B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			//para que las celdas se ajusten automáticamente segun su contenido
			foreach(range('A', $top) as $columnID) {
				$CI->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}

			
			foreach ($tableHeader as $key => $value){
				$CI->excel->getActiveSheet()->getStyle($key)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$CI->excel->getActiveSheet()->getStyle($key)->getFont()->setBold(true);
				$CI->excel->getActiveSheet()->getStyle($key)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
				$CI->excel->getActiveSheet()->getStyle($key)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
				$CI->excel->getActiveSheet()->getStyle($key)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
				$CI->excel->getActiveSheet()->setCellValue($key, $value);				
			}



			foreach ($content as $key => $value){
				$CI->excel->getActiveSheet()->getStyle($key)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$CI->excel->getActiveSheet()->getStyle($key)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
				$CI->excel->getActiveSheet()->setCellValue($key, $value);				
				if($key=='A41' || $key=='B41' ):
					$CI->excel->getActiveSheet()->getStyle($key)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('BEBEBE');
				endif;
			}



			
			//pie de pagina
			if ($q !== 1) {
				//si $q es distinto de 1 es porque hay mas de un registro entonces se cuenta la cantidad de estos (total)
				$CI->excel->getActiveSheet()->setCellValue($total, 'Total de Registros:');	
				$CI->excel->getActiveSheet()->getStyle($total)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('11111111');
				$CI->excel->getActiveSheet()->getStyle($total)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				if ($totalIncomes !== '') {
					$CI->excel->getActiveSheet()->setCellValue($result, $totalIncomes);
				}else{
					$CI->excel->getActiveSheet()->setCellValue($result, $q);
				}
				$CI->excel->getActiveSheet()->getStyle($total.':'.$result)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$CI->excel->getActiveSheet()->getStyle($total)->getFont()->setBold(true);			
			}			

			//orientación apaisada
			$CI->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			
			//descarga el archivo en .xls o .pdf segun lo que se haya seleccionado
				$filename=$rDate."-".$reportTitle; 
				$filename=$filename.'.xls';
				header('Content-Type: application/vnd.ms-excel'); //mime type
				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
				header('Cache-Control: max-age=0'); //no cache
				$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5'); 
				$objWriter->save('php://output');
		}else{
			echo("No existen elementos en la base de datos");
		}
	}
}	


// -----------------------------------------------------------------------------------------------------------------