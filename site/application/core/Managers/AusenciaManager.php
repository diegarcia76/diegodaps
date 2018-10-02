<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of HorarioDeAtencionXCoiffeurManager
 *
 * @author NASoft
 */
class AusenciaManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\AusenciaDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		
		return $arrayData;
	}
	
	
}