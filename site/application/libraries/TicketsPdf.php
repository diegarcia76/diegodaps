<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
	require_once dirname(__FILE__) . '/tcpdf/pdf_images.php';
	/*** CLASS PDF ***/
	// extend TCPF with custom functions
	class TicketsPdf extends TCPDF {
		
	 	protected $aPago;
	 	protected $borderStyle;




	 	public function setPago($aPago){
	 		$this -> aPago = $aPago;
	 	}

	 	public function setListadoComandas($listadoComandas){
	 		$this -> listadoComandas = $listadoComandas;
	 	}

	 	public function setListadoNotas($listadoNotas){
	 		$this -> listadoNotas = $listadoNotas;
	 	}

	 	public function header(){
	        // Title
			$this->SetY(10);
			$this->setImageScale(1.53);
			$imgdata = base64_decode(IMAGEN_LOGO_DAPS);
			// $this->Image('@'.$imgdata,'','',65);
			$this->SetY($this->GetY() + 10);
			$this->Cell(0, 0, '' , 'T', 1, 'R');

			/*
			$this->SetY(20);
			$this->SetFontSize(9);
			$this->Cell( 0, 0, ' PÃ¡g. '.$this->PageNo().' de '.$this->getAliasNbPages(), 0, false, 'R');
			$this->SetFontSize(12);
			*/
	 	}

	 	public function generarEncabezado(){

	 			// borde de celda de general de comanda

				$this->SetFontSize(8);
				$this->SetY($this->GetY() + 15);
	 			$actualPosY = $this->GetY();
	 			$actualPosX = $this->GetX();

	 			if($this->aPago->cliente){
	 				$usuario = $this->aPago->cliente->nombre;
	 				$telefono = $this->aPago->cliente->telefono;
	 			}
	 			else{
	 				$usuario = $this->aPago->nombre;
	 				$telefono = '';
	 			}
	 			
	 			$nro = substr('00000'.$this->aPago->id, -5);

		        $this->SetFont('opensans', 'B', 8, '', true);
				$this->SetY($actualPosY + 2);
				$this->SetX($actualPosX);


				$this->Cell(100, 0, $usuario, 0, 0, 'L');
				$this->Cell(0, 0, 'NÂº '.$nro.' ', 0, 1, 'R');

				$this->SetY($actualPosY + 6);
				$this->SetX($actualPosX);
		        $this->SetFont('opensanslight', '', 8, '', true);
				$this->Cell(50, 0, 'tel. '.$telefono, 0, 0, 'L');
				$this->Cell(0, 0, 'Fecha: '. $this->aPago->fecha->format('Y-m-d'), 0, 1, 'R');
				$this->ln();
				

	 	}

	 	public function generarDetalle(){

 			// borde de celda de general de comanda
 			$actualPosY = $this->GetY();
 			$actualPosX = $this->GetX();



			$this->Cell(35, 5, 'Detalle', 'B', 0, 'L');
			// $this->Cell(20, 12, 'Sub.', 'B', 0, 'R');
//			$this->Cell(20, 12, 'Desc.', 'B', 0, 'R');
			$this->Cell(0, 5, 'Sub.', 'B', 1, 'R');

			$this->Cell(0, 0.5, '', '', 1, 'R');

	 		foreach($this->aPago->detallePago as $aDetalle){
		        $this->SetFont('opensans', 'R', 6, '', true);

		        $descuento = empty($aDetalle->descuento)?0:$aDetalle->descuento;
		        $precioUnitatrio = $aDetalle->precio;
		        $subtotal_item = ($precioUnitatrio * $aDetalle->cantidad);
		        $total_item = $subtotal_item - $descuento;

				$this->Cell(35, 3, $aDetalle->cantidad.' '.$aDetalle->descripcion.' x '.'$'.number_format($precioUnitatrio, 2,',','.'), 0, 0, 'L');
//				$this->Cell(20, 0, , 0, 0, 'C');
//				$this->Cell(20, 0, '$'.number_format($precioUnitatrio, 2,',','.'), 0, 0, 'R');
				$this->Cell(0, 3, '$'.number_format($subtotal_item,2,',','.') , 0, 1, 'R');
//				$this->Cell(20, 0, '$'.number_format($descuento,2,',','.') , 0, 0, 'R');
//				$this->Cell(0, 0, '$'.number_format($total_item,2,',','.') , 0, 1, 'R');
	 		}

	        $this->SetFont('opensans', 'B', 8, '', true);
	 		$this->ln();
			$this->Cell(0, 8, 'TOTAL: $ '.number_format($this->aPago->total,2,',','.') , 'T', 1, 'R');

	 	}

	 	public function generarItems(){


			$this->borderStyle = array(
				'all' => array('width' => 0.2, 'cap' => 'square') 
			);


	        $this->SetFont('opensans', 'B', 8, '', true);
			$this->Cell(0, 0, 'Comandas '. \Managers\MainManager::getInstance()->fechaFormateada($this->fechaActual), 0, 1, 'L' );
			$this->ln();

	 		foreach($this->aPago->detallers as $aDetalle){

	 			$cantidadPlatos = $aComanda['cantidad'];
	 			$nombreMenu = $aComanda['menu'];
	 			$nombrePlato = $aComanda['plato'];

	 			// borde de celda de general de comanda
	 			$actualPosY = $this->GetY();
	 			$actualPosX = $this->GetX();

				$this->MultiCell(0, 15, ' ', 'LTRB' );


		        $this->SetFont('opensans', 'B', 8, '', true);
				$this->SetY($actualPosY);
				$this->Cell(15, 15, $cantidadPlatos, 'R', 0, 'C' );

		        $this->SetFont('opensans', 'B', 8, '', true);
				$this->SetY($actualPosY + 2);
				$this->SetX($actualPosX + 17);
				$this->Cell(0, 0, $nombreMenu, 0, 1, 'L');
				
				$this->SetX( $actualPosX + 17);
		        $this->SetFont('opensanslight', '', 8, '', true);
				$this->Cell( 0, 0, $nombrePlato, 0, 1, 'L');

				$this->SetY($actualPosY + 15);
				$this->ln();

	 		}
			$this->ln();
			$this->ln();
	 	}


	 	public function generarListadoNotas($listadoNotas){
	        $this->SetFont('opensans', 'B', 8, '', true);
			$this->Cell(0, 0, 'NOTAS DE PEDIDOS', 0, 1, 'L' );
	        $this->SetFont('opensanslight', '', 8, '', true);
			$this->Cell(0, 0, 'Observaciones de los usuarios sobre los pedidos', 0, 1, 'L' );
			$this->ln();


			$logoParticular = base64_decode(IMAGEN_LOGO_PARTICULAR);
			$logoEmpresa = base64_decode(IMAGEN_LOGO_EMPRESA);

			$this->listadoNotas = $listadoNotas;
			foreach ($this->listadoNotas as $aNota){
				$nro = $aNota['nro'];	
				$usuario = $aNota['usuario'];	
				$direccion = $aNota['direccion'];	
				$telefono = $aNota['telefono'];	
				$menu = $aNota['menu'];	
				$nota = $aNota['nota'];	
				$esEmpresa = $aNota['empresa'];	

	 			// borde de celda de general de comanda
	 			$actualPosY = $this->GetY();
	 			$actualPosX = $this->GetX();

				// Example of Image from data stream ('PHP rules')
				$this->SetY($actualPosY - 0.5);
				$this->SetX($actualPosX + 2.2);

				if ($esEmpresa){
					$this->Image('@'.$logoEmpresa);
				} else {
					$this->Image('@'.$logoParticular);					
				}

		        $this->SetFont('opensans', 'B', 8, '', true);
				$this->SetY($actualPosY + 2);
				$this->SetX($actualPosX + 2);




				$this->Cell(8, 0, '', 0, 0, 'L');
				$this->Cell(100, 0, $usuario, 0, 0, 'L');
				$this->Cell(0, 0, 'NÂº '.$nro.' ', 0, 1, 'R');

				$this->SetY($actualPosY + 8);
				$this->SetX($actualPosX + 2);
		        $this->SetFont('opensanslight', '', 8, '', true);
				$this->Cell(50, 0, $direccion, 0, 0, 'L');
				$this->Cell(50, 0, 'tel. '.$telefono, 0, 0, 'L');
				$this->MultiCell(47, 0, $menu, 0, 'R');

				$this->SetX($actualPosX + 2);
				$this->MultiCell(0, 0, 'Nota: '.$nota, 0, 'L');

				$finalPosY = $this->GetY() + 4;
				$actualHeight = $finalPosY - $actualPosY;				
				$this->SetY($actualPosY);
				$this->Rect($actualPosX, $actualPosY, 150, $actualHeight, 'D', $this->borderStyle, array(128,255,255));

				$this->SetY($finalPosY + 4);

			}
	 	}
	 }
