<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class ServicioManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\ServicioDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["nombre"] = $data->nombre;
		$arrayData["duracion"] = $data->duracion;
		$arrayData["puntos"] = $data->precio_puntos;
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
	}
	
	public function toArray2($data){
		$arrayData = array();
		$arrayData["id"] = 8;
		$arrayData["servicioXCoiffeur_id"] = $data->id;
		$arrayData["nombre"] = "Diego Dap's";
		$arrayData["servicio"] = $data->id;
		$arrayData["nombre_servicio"] = $data->nombre;
		$arrayData["precio"] = $data->precio_default;
		//$arrayData["foto"] = ImagenManager::getInstance()->getUrl($data->coiffeur->foto,"55x55");
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
		
		return $arrayData;
	}

	public function doHash($data){
		return md5($data->id.'|'.$data->nombre);
	}

	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return \Dataservices\ServicioDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\ServicioDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/servicios/acciones.tpl',array('edit_user' => $aUsuario));
			},
			'servicio' => function($aServicio){
				if($aServicio->servicioEnApp)
					return 'SI';
				else
					return 'NO';
			},
			'duracion' => function($aServicio){
				return $aServicio->duracion.'/'.$aServicio->duracion_espera.'/'.$aServicio->intervalo.'/'.$aServicio->duracion_total;
			},
			'precio' => function($aServicio){
				$aDiegoDaps = \Managers\CoiffeurManager::getInstance()->get(8);
				$precioDiego = ' -- ';
				if ($aServicioDiego = \Managers\ServicioXCoiffeurManager::getInstance()->getServicioXCoiffeur($aServicio, $aDiegoDaps)){
					$precioDiego = '<span class="text-info">$'.number_format($aServicioDiego->precio_efectivo, 2,',','.').' / '.'$'.number_format($aServicioDiego->precio, 2,',','.').'</span>';
				} 
				return '$'.number_format($aServicio->precio_default, 2,',','.').' / '.'$'.number_format($aServicio->precio_efectivo_default, 2,',','.').' / '.$precioDiego;
			}
			
			
		);		
		
		$datasource = \Dataservices\ServicioDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\ServicioDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}

	public function getAllEnApp(){
		return \Dataservices\ServicioDs::getInstance()->getAllEnApp();
	}
	
	public function getAllDiego(){
		return \Dataservices\ServicioDs::getInstance()->getAllDiego();
	}
	


}
?>