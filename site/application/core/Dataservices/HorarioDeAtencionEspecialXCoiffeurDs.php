<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of HorarioDeAtencionEspecialXCoiffeurDs
 *
 * @author 
 */
class HorarioDeAtencionEspecialXCoiffeurDs extends BaseDataService {
   
   

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\HorarioDeAtencionEspecialXCoiffeur";
    }

	public function getByUsername($id){
		$todos = $this->em->getRepository($this->tbl_name)->findOneBy(array('id' => $id));
		return $todos;
	}    	


	public function getByDia($aHorarioEspecial, $aDay, $aCoiffeur){
		
		$filters = array();
		//$filters['servicio'] = $aServicio;
		
		if (!empty($aDay)){
			$filters['diaSemana'] = $aDay;
			$filters['coiffeur'] = $aCoiffeur;
			$filters['horarioEspecial'] = $aHorarioEspecial;
		}

		$todos = $this->em->getRepository($this->tbl_name)->findBy($filters);
		return $todos;
	}    	


	public function getMinByDia($aHorarioEspecial, $aDay){


		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('MIN(d.horaDesde) as minimo') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->eq('d.diaSemana', ':diaSemana'),
					$this->qb->expr()->eq('d.horarioEspecial', ':horarioEspecial')
				 )
				 ->setParameter('diaSemana', $aDay)
				 ->setParameter('horarioEspecial', $aHorarioEspecial);
		

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();		

	}    	
	 	

	public function getMaxByDia($aHorarioEspecial, $aDay){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('MAX(d.horaHasta) as maximo') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->eq('d.diaSemana', ':diaSemana'),
					$this->qb->expr()->eq('d.horarioEspecial', ':horarioEspecial')
				 )
				 ->setParameter('diaSemana', $aDay)
				 ->setParameter('horarioEspecial', $aHorarioEspecial);
		

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();		

	}    	
		 	

}
