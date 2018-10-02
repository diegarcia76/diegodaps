<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
	require_once dirname(__FILE__) . '/tcpdf/pdf_images.php';
	/*** CLASS PDF ***/
	// extend TCPF with custom functions
	class PreciosPdf extends TCPDF {
		
	 	protected $arrMarca;
	 	protected $allMarcas = false;
	 	protected $borderStyle;


	 	public function setMarca($arrMarca){
	 		$this -> arrMarca = $arrMarca;
	 	}	

	 	public function header(){
	        // Title
			$this->SetY(0);
			$this->setImageScale(1.53);
			$imgdata = base64_decode(IMAGEN_LOGO_DAPS);
	 	}

	 	public function generarEncabezado(){

	 			// borde de celda de general de comanda

				$this->SetFontSize(8);
				$this->SetY($this->GetY() + 15);
	 			$actualPosY = $this->GetY();
	 			$actualPosX = $this->GetX();


		        $this->SetFont('helvetica', 'B', 8, '', true);
				$this->SetY($actualPosY + 2);
				$this->SetX($actualPosX);


				$this->SetY($actualPosY + 6);
				$this->SetX($actualPosX);
		        $this->SetFont('helvetica', '', 8, '', true);

				$this->ln();
				

	 	}

	 	private function getMarcasAsArray(){
			$arrMarcas = array();

			if($this->arrMarca){
				foreach($this->arrMarca as $marca_id){
					if ($aMarca = \Managers\MarcaManager::getInstance()->get($marca_id)){
						$arrMarcas[] = $aMarca;
					}
				}

			}  

			$this->allMarcas = false;

			if (empty($arrMarcas)){
				$arrMarcas = \Managers\MarcaManager::getInstance()->getAll();
				$this->allMarcas = true;
			}

			return $arrMarcas;	 		
	 	}

	 	public function get_titulo_marca(){
	 		$allMarcasArr = $this->getMarcasAsArray();

	 		if (!$this->allMarcas){
	 			$titulosArr = array();
	 			foreach($allMarcasArr as $aMarca){
	 				$titulosArr[] = url_title($aMarca->nombre);
	 			}

	 			return '_'.implode('_', $titulosArr);
	 		} else {
	 			return '';
	 		}
	 	}

	 	public function generarDetalle(){

 			// borde de celda de general de comanda
 			$actualPosY = $this->GetY();
 			$actualPosX = $this->GetX();


			$arrMarcas = array();

			if($this->arrMarca){
				foreach($this->arrMarca as $marca_id){
					if ($aMarca = \Managers\MarcaManager::getInstance()->get($marca_id)){
						$arrMarcas[] = $aMarca;
					}
				}

			}  

			if (empty($arrMarcas)){
				$arrMarcas = \Managers\MarcaManager::getInstance()->getAll();
			}

			//listado de todas las marca
			// $arrMarcas = \Managers\MarcaManager::getInstance()->getAll();
			foreach($arrMarcas as $aMar){
				$this->SetY($actualPosY+5);
		        $this->SetFont('helvetica', 'R', 10, '', true);
		        $this->Cell(0, 8, $aMar->nombre, 'B', 1, 'C');
		        $this->Cell(140, 5, '', 'B', 0, 'L');
        		$this->Cell(20, 5, 'P.Lista', 'B', 0, 'R');
        		$this->Cell(20, 5, 'P.Efectivo', 'B', 1, 'R');			        
		        if($aMar->submarcas){
			        foreach ($aMar->submarcas as $aLinea) {
			        	# code...
			        	$this->SetFont('helvetica', 'R', 8, '', true);
			        	$this->Cell(0, 5, $aLinea->nombre, 'B', 1, 'C');
			        	$aProductos = \Managers\ProductoManager::getInstance()->getByMarcaByLinea($aMar,$aLinea);
			        	
			        	foreach ($aProductos as $aProd) {

			        		$this->Cell(140, 5, $aProd->nombre, 'B', 0, 'L');
			        		$this->Cell(20, 5, '$'.number_format($aProd->precio, 2,',','.'), 'B', 0, 'R');
			        		$this->Cell(20, 5, '$'.number_format($aProd->precio_efectivo, 2,',','.'), 'B', 1, 'R');

			        	}

			        }
			    }

			    $aProductos = \Managers\ProductoManager::getInstance()->getByMarcaByLinea($aMar,null);
			    if($aProductos){
				    $this->Cell(0, 5, 'Sin Línea', 'B', 1, 'C');
				    foreach ($aProductos as $aProd) {

		        		$this->Cell(140, 5, $aProd->nombre, 'B', 0, 'L');
			        		$this->Cell(20, 5, '$'.number_format($aProd->precio, 2,',','.'), 'B', 0, 'R');
			        		$this->Cell(20, 5, '$'.number_format($aProd->precio_efectivo, 2,',','.'), 'B', 1, 'R');

		        	}
		        }

		        $actualPosY = $this->GetY();
			}	 		

			if ($this->allMarcas){

		        

			    $aProductos = \Managers\ProductoManager::getInstance()->getByMarcaByLinea(null,null);
			    if(!empty($aProductos)){

					$this->SetY($actualPosY+5);
			        $this->SetFont('helvetica', 'R', 10, '', true);
			        $this->Cell(0, 8, 'PRODUCTOS SIN MARCA', 'B', 1, 'C');
			        $this->Cell(140, 5, '', 'B', 0, 'L');
	        		$this->Cell(20, 5, 'P.Lista', 'B', 0, 'R');
	        		$this->Cell(20, 5, 'P.Efectivo', 'B', 1, 'R');			        

				    $this->Cell(0, 5, 'Sin Línea', 'B', 1, 'C');
				    foreach ($aProductos as $aProd) {

		        		$this->Cell(140, 5, $aProd->nombre, 'B', 0, 'L');
			        		$this->Cell(20, 5, '$'.number_format($aProd->precio, 2,',','.'), 'B', 0, 'R');
			        		$this->Cell(20, 5, '$'.number_format($aProd->precio_efectivo, 2,',','.'), 'B', 1, 'R');

		        	}
		        }

		        $actualPosY = $this->GetY();


			}

	        //$this->SetFont('helvetica', 'B', 8, '', true);
	 		//$this->ln();
			//$this->Cell(0, 8, 'TOTAL: $ ' , 'T', 1, 'R');

	 	}


	 	public function generarDetalleServicios(){

 			// borde de celda de general de comanda
 			$actualPosY = $this->GetY();
 			$actualPosX = $this->GetX();

			$this->SetY($actualPosY+5);
	        $this->SetFont('helvetica', 'R', 10, '', true);

	        $this->Cell(0, 8, 'PRECIOS SERVICIOS', 'B', 1, 'C');


	        $this->Cell(100, 5, '', 'B', 0, 'L');
    		$this->Cell(40, 5, 'D.DAP\'S', 'B', 0, 'C');			        
    		$this->Cell(40, 5, 'COIFFEURS', 'B', 1, 'C');			        

	        $this->Cell(100, 5, '', 'B', 0, 'L');
    		$this->Cell(20, 5, 'P.Lista', 'B', 0, 'R');
    		$this->Cell(20, 5, 'P.Efectivo', 'B', 0, 'R');			        
    		$this->Cell(20, 5, 'P.Lista', 'B', 0, 'R');
    		$this->Cell(20, 5, 'P.Efectivo', 'B', 1, 'R');			        

    		$aDiegoDaps = \Managers\CoiffeurManager::getInstance()->get(8);

		    $aProductos = \Managers\ServicioManager::getInstance()->getAll();

		    if($aProductos){
			    $this->Cell(0, 5, '', 'B', 1, 'C');
			    foreach ($aProductos as $aProd) {

	        		$this->Cell(100, 5, $aProd->nombre, 'B', 0, 'L');

		        	if ($aServicioDap = \Managers\ServicioXCoiffeurManager::getInstance()->getServicioXCoiffeur($aProd, $aDiegoDaps)){
			        	$this->Cell(20, 5, '$'.number_format($aServicioDap->precio, 2,',','.'), 'B', 0, 'R');
			        	$this->Cell(20, 5, '$'.number_format($aServicioDap->precio_efectivo, 2,',','.'), 'B', 0, 'R');
			        } else {

			        	$this->Cell(20, 5, '--', 'B', 0, 'R');
			        	$this->Cell(20, 5, '--', 'B', 0, 'R');
			        }

		        	$this->Cell(20, 5, '$'.number_format($aProd->precio_default, 2,',','.'), 'B', 0, 'R');
		        	$this->Cell(20, 5, '$'.number_format($aProd->precio_efectivo_default, 2,',','.'), 'B', 1, 'R');



	        	}
	        }


	        //$this->SetFont('helvetica', 'B', 8, '', true);
	 		//$this->ln();
			//$this->Cell(0, 8, 'TOTAL: $ ' , 'T', 1, 'R');

	 	}

	 	
	 }
