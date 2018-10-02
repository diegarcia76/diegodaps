<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class ServicioXCoiffeurDs extends BaseDataService {
   
   
    protected $qb;    

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\ServicioXCoiffeur";
        $this->qb = $this->em->createQueryBuilder(); 
        //$this->borradoLogico = true;
        //$this->miFuncion[] = 'setJoins';
    }
	
	
	public function getServicioXCoiffeur($aServicio, $aCoiffeur){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->andX(
						$this->qb->expr()->eq('d.servicio', $aServicio->id),
						$this->qb->expr()->eq('d.coiffeur', $aCoiffeur->id)
					)
				 );

		$query = $this->qb->getQuery();
		$obj = $query->getResult();

		
		if(!empty($obj))
			return $obj[0];
			// return $obj;
		
		//return false;
		return array();

	}
    

}

?>
