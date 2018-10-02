<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class PagoDs extends BaseDataService {
   
   
    protected $qb;    

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Pago";
        $this->qb = $this->em->createQueryBuilder(); 
        //$this->borradoLogico = true;       
        //$this->miFuncion[] = 'setJoins'; 
    }
	
	public function getPagoCliente($aCliente){
		
		if ($aCliente && intval($aCliente->id)){
			return $this->em->getRepository($this->tbl_name)->findOneBy(array('cliente' => $aCliente, 'cobrado' => false));
		}
		return false;
		
	}
	
	
	public function getPendientes(){
		return $this->em->getRepository($this->tbl_name)->findBy(array('cobrado' => false), array('fecha' =>'ASC'));
	}    

}

?>
