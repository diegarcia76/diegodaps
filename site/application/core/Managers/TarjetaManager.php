<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class TarjetaManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\TarjetaDs::getInstance();
    }

			
	

	
	
	
	
	public function getAll(){
		return \Dataservices\ProductoDs::getInstance()->getAll();
	}

	

}