<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class CoiffeurDs extends BaseDataService {
   
   
    protected $qb;    

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Coiffeur";
        $this->tbl_name_turnos = "models\Turno";
        $this->qb = $this->em->createQueryBuilder(); 
        //$this->borradoLogico = true;       
        //$this->miFuncion[] = 'setJoins'; 
    }
	
	
	public function search($searchText, $itemsperpage = 20, $page = 1, $seccion = ''){

		$searchText = str_replace('%20', ' ', $searchText);
		//var_dump($searchText);
		$page = intval($page);
		$page = ($page <= 0)?1:$page;
		
		$offset = ($itemsperpage * ($page - 1));
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->andX(
						$this->qb->expr()->like('d.nombre', $this->qb->expr()->literal('%'.$searchText.'%'))
						//,$this->qb->expr()->like('d.usuario', $this->qb->expr()->literal('%'.$searchText.'%'))
				 	)
				 )
				 ->OrderBy('d.nombre','DESC');	   

			
			$this->qb->setFirstResult($offset)
			 		 ->setMaxResults($itemsperpage);

			$query = $this->qb->getQuery();
			$obj = new Paginator($query, $fetchJoinCollection = true);

		
		if(!empty($obj))
			return $obj;
		
		return array();
	}

	public function searchCount($searchText, $seccion = ''){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('count(d) as cantidad') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->orX(
						$this->qb->expr()->like('d.nombre', $this->qb->expr()->literal('%'.$searchText.'%')),
						$this->qb->expr()->like('d.usuario', $this->qb->expr()->literal('%'.$searchText.'%'))
					)
				 )
				 ->OrderBy('d.sistema','DESC')
				 ->addOrderBy('d.nombre','ASC');	   
		

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();
		
	}
	
	
	public function estaDisponible($fechaInicio, $fecha_fin, $aCoiffeur = null){
		$filters = array();		

		$fechaInicioAux = clone $fechaInicio;
		$fechaFinAux = clone $fecha_fin;	

		$fechaInicioAux->modify('+1 second');
		$fechaFinAux->modify('-1 second');

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name_turnos, 'd')
 			     ->innerjoin('d.servicio','s')
 			     ->innerjoin('d.coiffeur','c')
			 	 ->where(
			 	 	$this->qb->expr()->orX(
				 	 	$this->qb->expr()->between(':fechaInicio', 'd.fecha_hora', "DATE_ADD(d.fecha_hora, ((s.duracion)*60), 'second')" ),
				 	 	$this->qb->expr()->between(':fechaFin', 'd.fecha_hora', "DATE_ADD(d.fecha_hora, ((s.duracion)*60), 'second')" )
			 	 		/*
			 	 		$this->qb->expr()->andX(					
							$this->qb->expr()->lte('d.fecha_hora', ':fechaInicio'),
							$this->qb->expr()->gt("DATE_ADD(d.fecha_hora, (s.duracion*60), 'second')", ":fechaInicio")
						),				
						$this->qb->expr()->andX(
							$this->qb->expr()->lt('d.fecha_hora', ':fechaFin'),
							$this->qb->expr()->gte("DATE_ADD(d.fecha_hora, (s.duracion*60), 'second')", ":fechaFin")
						)
						*/
					),
					$this->qb->expr()->notIn('d.estadoTurno', '2,5,7') //Cancelado, Terminado y Cobrado
				 )
				 ->OrderBy('d.fecha_hora','ASC')
				 ->setParameter('fechaInicio',$fechaInicioAux->format('Y-m-d H:i:s'))
				 ->setParameter('fechaFin',$fechaFinAux->format('Y-m-d H:i:s'));	
		
		if($aCoiffeur){
			$this->qb->andWhere($this->qb->expr()->eq('d.coiffeur', $aCoiffeur->id));
		}

		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();

		
		if(!empty($obj)){
			return false;
		}
		return true;
		//return array();
	
	}


}

?>
