<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */


 
class ComentarioManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\ComentarioDs::getInstance();
    }
	
	
	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return \Dataservices\ComentarioDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\ComentarioDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'fecha' => function($aTurno){
				if($aTurno->fecha){
					return $aTurno->fecha->format('d/m/Y H:m');
				}
				return 'no definido';
			},
			'cliente' => function($aTurno){
				if($aTurno->usuario){
					return $aTurno->usuario->nombre;
				}
				return '--';
			},
			'comentario' => function($aTurno){
				
					return $aTurno->comentario;
				
				
			}
			
			
		);		
		
		$datasource = \Dataservices\ComentarioDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\ComentarioDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	

	public function setJoinDeCliente($aCliente = null){
		return \Dataservices\ComentarioDs::getInstance()->setJoinDeCliente($aCliente);	
	}

}
?>