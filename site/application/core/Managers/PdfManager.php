<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Mail
 *
 * @author NASoft
 */
	define ('TCPDF_NOBORDER', '0');

	define ('TCPDF_LN_RIGHT','0');
	define ('TCPDF_LN_NEXTLINE','1');

	define ('TCPDF_ALIGN_RIGHT','R');
	define ('TCPDF_ALIGN_NEXTLINE','1');

class PdfManager extends BaseManager{

    protected function __construct() {
        parent::__construct();

/*		
        $this->CI->load->library('Pdf');        
        $this->CI->load->library('TicketsPdf');        
        $this->pdf = new \Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('Memberplay.org');
        $this->pdf->SetTitle('Evento - Memberplay.org');
		$this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $this->pdf->SetMargins(PDF_MARGIN_LEFT+15, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT+15);
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);        
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $this->pdf->setFontSubsetting(false);
        $this->pdf->SetFont('helvetica', '', 14, '', true);
        $this->pdf->AddPage();
        */
    }

    public function createTicketPdf($aPago){

        $this->CI->load->library('TicketsPdf');        
        $this->pdf = new \TicketsPdf('P', 'mm', array(75, 230), true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->setPago($aPago);
        $this->pdf->SetAuthor('DiegoDaps');
        $this->pdf->SetTitle(site_url());
		$this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $this->pdf->SetMargins(5, 5, 5);
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);        
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $this->pdf->setFontSubsetting(false);
        $this->pdf->SetFont('helvetica', '', 14, '', true);
        $this->pdf->setJPEGQuality(100);
        $this->pdf->AddPage();

    }
	

    public function createPreciosPdf($arrMarca){

        $this->CI->load->library('PreciosPdf');        
        $this->pdf = new \PreciosPdf('P', 'mm', 'A4', true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->setMarca($arrMarca);
        $this->pdf->SetAuthor('DiegoDaps');
        $this->pdf->SetTitle(site_url());
		// $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $this->pdf->SetMargins(15, 20, 15);
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);        
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // $this->pdf->setFontSubsetting(false);
        // $this->pdf->SetFont('helvetica', '', 14, '', true);
		$this->pdf->setFontSubsetting(false);
		$this->pdf->SetFont('helvetica', '', 14);        
        $this->pdf->setJPEGQuality(100);
        $this->pdf->AddPage();

    }

    public function createPreciosServiciosPdf(){

        $this->CI->load->library('PreciosPdf');        
        $this->pdf = new \PreciosPdf('P', 'mm', 'A4', true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        // $this->pdf->setMarca($aMarca);
        $this->pdf->SetAuthor('DiegoDaps');
        $this->pdf->SetTitle(site_url());
		// $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $this->pdf->SetMargins(15, 20, 15);
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);        
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // $this->pdf->setFontSubsetting(false);
        // $this->pdf->SetFont('helvetica', '', 14, '', true);
		$this->pdf->setFontSubsetting(false);
		$this->pdf->SetFont('helvetica', '', 14);        
        $this->pdf->setJPEGQuality(100);
        $this->pdf->AddPage();

    }


	public function hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}
	


	public function destroy(){
		static::$classInstance = null;
		return true;
	}
	
	
	public function generarTickect($aPago, $salida = 'I'){
			
		$this -> createTicketPdf($aPago);
        $this->pdf->generarEncabezado();
        $this->pdf->generarDetalle();
    
		$nombre_archivo = utf8_decode("TKT_".substr('00000'.$aPago->id, -5)."_".$aPago->fecha->format('Ymd').".pdf");
        return $this->pdf->Output($nombre_archivo, $salida);
	}

	public function generarListadoPrecios($arrMarca, $salida = 'D'){
			
		$this -> createPreciosPdf($arrMarca);
        // $this->pdf->generarEncabezado();
        $this->pdf->generarDetalle();

        $NombreArchivo = 'Precios_'.date('Ymd').($this->pdf->get_titulo_marca()).'.pdf';

		$nombre_archivo = utf8_decode($NombreArchivo);
        return $this->pdf->Output($nombre_archivo, $salida);
	}

	public function generarListadoPreciosServicios($salida = 'D'){
			
		$this -> createPreciosServiciosPdf();
        // $this->pdf->generarEncabezado();
        $this->pdf->generarDetalleServicios();
    
    	$NombreArchivo = 'Servicios_'.date('Ymd').'.pdf';

		$nombre_archivo = utf8_decode($NombreArchivo);
        return $this->pdf->Output($nombre_archivo, $salida);
	}
	

	public function generarEtiquetas($fechaActual, $pedidosParticulares, $pedidosEmpresas, $salida = 'I'){
		
		ob_start();	
		$this->createEtiquetasPdf($fechaActual, $pedidosParticulares, $pedidosEmpresas);
		ob_end_clean();
		$nombre_archivo = utf8_decode("eitquetas_".$fechaActual->format('dmY').".pdf");
        return $this->pdf->Output($nombre_archivo, $salida);
	}

	public function generarPlanillaPedidos($fechaActual, $sucursal, $empleados, $menues, $salida = 'I'){
			
		$this->createPlanillaPedidosPdf($fechaActual, $sucursal, $empleados, $menues);
		
		$nombre_archivo = utf8_decode("planilla_".$fechaActual->format('dmY').".pdf");
        return $this->pdf->Output($nombre_archivo, $salida);
	}
}