<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of HorarioDeAtencionXCoiffeurDs
 *
 * @author 
 */
class HorarioDeAtencionXCoiffeurDs extends BaseDataService {
   
   

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\HorarioDeAtencionXCoiffeur";
    }

	public function getByUsername($id){
		$todos = $this->em->getRepository($this->tbl_name)->findOneBy(array('id' => $id));
		return $todos;
	}    	


	public function getByDia($aDay, $aCoiffeur){
		
		$filters = array();
		//$filters['servicio'] = $aServicio;
		
		if (!empty($aDay)){
			$filters['diaSemana'] = $aDay;
			$filters['coiffeur'] = $aCoiffeur;
		}

		$todos = $this->em->getRepository($this->tbl_name)->findBy($filters);
		return $todos;
	}    	


	public function getMinByDia($aDay){


		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('MIN(d.horaDesde) as minimo') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->eq('d.diaSemana', ':diaSemana')
				 )
				 ->setParameter('diaSemana', $aDay);
		

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();		

	}    	
	 	

	public function getMaxByDia($aDay){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('MAX(d.horaHasta) as maximo') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->eq('d.diaSemana', ':diaSemana')
				 )
				 ->setParameter('diaSemana', $aDay);
		

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();		

	}    	
		 	

}
