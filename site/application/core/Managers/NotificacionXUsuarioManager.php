<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of NotificacionXUsuarioManager
 *
 * @author NASoft
 */
class NotificacionXUsuarioManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\NotificacionXUsuarioDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		
		return $arrayData;
	}
	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return $this->dataservice->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\NotificacionXUsuarioDs::getInstance()->searchCount($searchText, $seccion);
	}	

	public function getByUser($aUsuario, $vistas = null){
		return \Dataservices\NotificacionXUsuarioDs::getInstance()->getByUser($aUsuario, $vistas);
	}

	public function setVistasByUser($aUsuario = null){
		return \Dataservices\NotificacionXUsuarioDs::getInstance()->setVistasByUser($aUsuario);
	}

	public function getAllNoti($aUsuario = null, $limit = null){
		return \Dataservices\NotificacionXUsuarioDs::getInstance()->getAllNoti($aUsuario, $limit);
	}

	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(			
			'acciones' => function($aCiudad){
				return MainManager::getInstance()->getParse('admin/notificaciones/acciones.tpl',array('edit_ciudad' => $aCiudad));
			}/*,
			'imagen' => function($aFederacion){
				if($aFederacion->avatar){
					$image = ImagenManager::getInstance()->getUrl($aFederacion->avatar,'55x55');
				}else{
					$image = site_url().'uploads/sin-imagen55.jpg';
				}
				return '<img src="'.$image.'">';
			},			
			'fecha_alta' => function($aPrestador){
				if($aPrestador->fecha_alta){
					return $aPrestador->fecha_alta->format('d/m/Y');
				}
				return 'no definido';
			}*/
			
		);	
			
		$datasource = \Dataservices\NotificacionXUsuarioDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\NotificacionXUsuarioDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}

	
}
?>