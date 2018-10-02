<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of DiaSemanaDs
 *
 * @author 
 */
class DiaSemanaDs extends BaseDataService {
   
   

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\DiaSemana";
    }


	public function getByUsername($id){
		$todos = $this->em->getRepository($this->tbl_name)->findOneBy(array('id' => $id));
		return $todos;
	}    	
	 	

}

