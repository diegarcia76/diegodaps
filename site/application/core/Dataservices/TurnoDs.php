<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class TurnoDs extends BaseDataService {
   
   
    protected $qb;   
    protected $aCliente = null;
    protected $aEstado = null;

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Turno";
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
	

	public function getByClienteProximos($aCliente, $fecha, $cantidad){
		//H:m:s
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
			 	 	$this->qb->expr()->eq('d.estadoTurno', 1),
					$this->qb->expr()->eq('d.cliente', ':cliente'),
					$this->qb->expr()->gte('d.fecha_hora', ':fechaInicio')
				 )
				 ->OrderBy('d.fecha_hora','ASC')
				 ->setParameter('fechaInicio',$fecha->format('Y-m-d H:m:s'))
				 ->setParameter('cliente',$aCliente);

		if($cantidad)
			$this->qb->setMaxResults($cantidad);
			
		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();
		
		if(!empty($obj))
			return $obj;
		
		return array();

	}

	public function getByClienteVencidos($aCliente, $fecha, $cantidad){
		//H:m:s
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
 			     ->where(
			 	 		$this->qb->expr()->eq('d.cliente', ':cliente'),
						$this->qb->expr()->lt('d.fecha_hora', ':fechaInicio'),	
						$this->qb->expr()->eq('d.estadoTurno', ':estadoTurno')			
				 )
			 	 /*->where(
			 	 	$this->qb->expr()->orX(
			 	 		$this->qb->expr()->andX(
							$this->qb->expr()->eq('d.cliente', ':cliente'),
							$this->qb->expr()->eq('d.estadoTurno', 2)
						),				
						$this->qb->expr()->andX(
							$this->qb->expr()->eq('d.cliente', ':cliente'),
							$this->qb->expr()->lt('d.fecha_hora', ':fechaInicio')
						)
					)					
				 )*/
				 ->OrderBy('d.fecha_hora','DESC')
				 ->setParameter('fechaInicio',$fecha->format('Y-m-d H:m:s'))
				 ->setParameter('cliente',$aCliente)
				 ->setParameter('estadoTurno',\Managers\EstadoTurnoManager::getInstance()->getEstadoCobrado());	
		
		if($cantidad)
			$this->qb->setMaxResults($cantidad);

		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();
		
		if(!empty($obj))
			return $obj;
		
		return array();

	}
	

	public function getByFecha($aServicio, $aCoiffeur, $fechaInicio){
		$filters = array();		

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->eq('d.servicio', ':servicio'),
					$this->qb->expr()->eq('d.coiffeur', ':coiffeur'),
					$this->qb->expr()->eq('d.fecha_hora', ':fechaInicio'),
					//$this->qb->expr()->eq('d.horaInicio', ':horaInicio'),
					$this->qb->expr()->neq('d.estadoTurno', ':estadoTurno')
				 )
				 ->OrderBy('d.prioridad','ASC')
				 ->setParameter('servicio',$aServicio)
				 ->setParameter('coiffeur',$aCoiffeur)
				 ->setParameter('fechaInicio',$fechaInicio->format('Y-m-d H:i:s'))
				 //->setParameter('horaInicio',$fechaInicio->format('H:i:s'))
				 ->setParameter('estadoTurno',\Managers\EstadoTurnoManager::getInstance()->getEstadoAnulado());	
			
			$query = $this->qb->getQuery();
			//var_dump($query->getSql());
			$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}

	public function getByFechaSinServicio($aCoiffeur, $fechaInicio){
		$filters = array();		

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					//$this->qb->expr()->eq('d.servicio', ':servicio'),
					$this->qb->expr()->eq('d.coiffeur', ':coiffeur'),
					$this->qb->expr()->eq('d.fecha_hora', ':fechaInicio'),
					//$this->qb->expr()->eq('d.horaInicio', ':horaInicio'),
					$this->qb->expr()->neq('d.estadoTurno', ':estadoTurno')
				 )
				 ->OrderBy('d.prioridad','ASC')
				 //->setParameter('servicio',$aServicio)
				 ->setParameter('coiffeur',$aCoiffeur)
				 ->setParameter('fechaInicio',$fechaInicio->format('Y-m-d H:i:s'))
				 //->setParameter('horaInicio',$fechaInicio->format('H:i:s'))
				 ->setParameter('estadoTurno',\Managers\EstadoTurnoManager::getInstance()->getEstadoAnulado());	
			
			$query = $this->qb->getQuery();
			//var_dump($query->getSql());
			$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}

	public function getByFechaByCoiffeur($aCoiffeur, $fechaInicio){
		$filters = array();		


		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.coiffeur','c')
			 	 ->where(
					$this->qb->expr()->eq('c.id', ':coiffeur'),
					$this->qb->expr()->gte('d.fecha_hora', ':fechaInicio'),
					$this->qb->expr()->lte('d.fecha_hora', ':fechaInicio2')
					//$this->qb->expr()->eq('d.horaInicio', ':horaInicio'),
					//$this->qb->expr()->neq('d.estadoTurno', ':estadoTurno')
				 )
				 ->OrderBy('d.prioridad','ASC')
				 ->setParameter('coiffeur',$aCoiffeur->id)
				 ->setParameter('fechaInicio',$fechaInicio->format('Y-m-d H:00:00'))
				 ->setParameter('fechaInicio2',$fechaInicio->format('Y-m-d H:59:59'));
				 //->setParameter('horaInicio',$fechaInicio->format('H:i:s'))
				 //->setParameter('estadoTurno',\Managers\EstadoTurnoManager::getInstance()->getEstadoAnulado());	
			
			$query = $this->qb->getQuery();
			$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}

	public function getByDiaByCoiffeur($aCoiffeur, $fechaInicio){
		$filters = array();		


		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.coiffeur','c')
			 	 ->where(
					$this->qb->expr()->eq('c.id', ':coiffeur'),
					$this->qb->expr()->gte('d.fecha_hora', ':fechaInicio'),
					$this->qb->expr()->lte('d.fecha_hora', ':fechaInicio2')
					//$this->qb->expr()->eq('d.horaInicio', ':horaInicio'),
					//$this->qb->expr()->neq('d.estadoTurno', ':estadoTurno')
				 )
				 ->OrderBy('d.prioridad','ASC')
				 ->setParameter('coiffeur',$aCoiffeur->id)
				 ->setParameter('fechaInicio',$fechaInicio->format('Y-m-d 00:00:00'))
				 ->setParameter('fechaInicio2',$fechaInicio->format('Y-m-d 23:59:59'));
				 //->setParameter('horaInicio',$fechaInicio->format('H:i:s'))
				 //->setParameter('estadoTurno',\Managers\EstadoTurnoManager::getInstance()->getEstadoAnulado());	
			
			$query = $this->qb->getQuery();
			$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}
    

	public function getByDia($fechaInicio, $estado = null){
		$filters = array();		

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d, s') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.servicio','s')
			 	 ->where(					
					$this->qb->expr()->gte('d.fecha_hora', ':fechaInicio'),
					$this->qb->expr()->lte('d.fecha_hora', ':fechaInicio2')
				 )
				 ->OrderBy('d.fecha_hora','ASC')
				 ->setParameter('fechaInicio',$fechaInicio->format('Y-m-d 00:00:00'))
				 ->setParameter('fechaInicio2',$fechaInicio->format('Y-m-d 23:59:59'));	
		
		if($estado){
			$this->qb->andWhere($this->qb->expr()->eq('d.estadoTurno', $estado->id));
		}

		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}

	public function getTurnosDashboard($fechaInicio, $aCliente = null, $enEstado = null){
		$filters = array();		

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d, s') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.servicio','s')
			 	 ->where(
				 	$this->qb->expr()->gte('d.mostrar', 0),					
					$this->qb->expr()->gte('d.fecha_hora', ':fechaInicio'),
					$this->qb->expr()->lte('d.fecha_hora', ':fechaInicio2'),
					$this->qb->expr()->notIn('d.estadoTurno', '2,5,7,8')
				 )
				 ->OrderBy('d.fecha_hora','ASC')
				 ->setParameter('fechaInicio',$fechaInicio->format('Y-m-d 00:00:00'))
				 ->setParameter('fechaInicio2',$fechaInicio->format('Y-m-d 23:59:59'));	

		if($aCliente){
			$this->qb->andWhere($this->qb->expr()->eq('d.cliente', $aCliente->id));
		}

		if($enEstado){
			$this->qb->andWhere($this->qb->expr()->eq('d.estadoTurno', $enEstado));
		}

		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}
	
	public function getByClienteAndEstado($aCliente, $aEstado){
		$filters = array();		

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('t') 
 			     ->from($this->tbl_name, 't')
 			     ->innerjoin('t.estadoTurno','et')
 			     ->innerjoin('t.cliente','c')
			 	 ->where(					
					$this->qb->expr()->eq('c.id', ':cliente_id'),
					$this->qb->expr()->eq('et.id', ':estado_id')
				 )
				 ->OrderBy('t.fecha_hora','ASC')
				 ->setParameter('cliente_id',$aCliente->id)
				 ->setParameter('estado_id',$aEstado->id);	
		

		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();

	}

	public function tieneTurno($aServicio, $fechaInicio, $aCliente){
		$filters = array();		

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->eq('d.servicio', ':servicio'),
					$this->qb->expr()->gte('d.fecha_hora', ':fecha1'),
					$this->qb->expr()->lte('d.fecha_hora', ':fecha2'),
					$this->qb->expr()->eq('d.cliente', ':cliente')
				 )
				 ->setParameter('servicio',$aServicio)
				 ->setParameter('fecha1', $fechaInicio->format('Y-m-d 00:00:00'))
            	 ->setParameter('fecha2', $fechaInicio->format('Y-m-d 23:59:59'))
				 ->setParameter('cliente',$aCliente);	
			
			$query = $this->qb->getQuery();
			//var_dump($query->getSql());
			$obj = $query->getResult();
		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}


	public function setJoinDeCliente($aCliente = null){
        $this->aCliente = $aCliente;
        $this->miFuncion[] = 'setDatasourceJoinsCliente';
    }

    protected function setDatasourceJoinsCliente(){        
        $this->qb->leftjoin('d.cliente','c');
        if($this->aCliente){ 
            $this->qb->andWhere($this->qb->expr()->eq('c.id', $this->aCliente->id));
        }
    }

    public function setJoinDeEstados($aEstado = null){
        $this->aEstado = $aEstado;
        $this->miFuncion[] = 'setDatasourceJoinsEstados';
    }

    protected function setDatasourceJoinsEstados(){        
        $this->qb->leftjoin('d.estadoTurno','e');
        if($this->aEstado){ 
            $this->qb->andWhere($this->qb->expr()->eq('e.id', $this->aEstado->id));
        }
    }

    public function setJoinDeFecha($fecha_desde, $fecha_hasta){
        $this->fecha_desde = $fecha_desde;
        $this->fecha_hasta = $fecha_hasta;
        $this->miFuncion[] = 'setDatasourceJoinsFecha';
    }

    
    protected function setDatasourceJoinsFecha(){        
        if($this->fecha_hasta){
            $this->qb->andWhere('d.fecha_hora BETWEEN :fecha1 AND :fecha2');
            $this->qb->setParameter('fecha1', $this->fecha_desde->format('Y-m-d 00:00:00'));
            $this->qb->setParameter('fecha2', $this->fecha_hasta->format('Y-m-d 23:59:59'));
            
            //$this->qb->andWhere($this->qb->expr()->gt('fecha_vencimiento', $this->fecha_vencimiento));
        }
    }


    public function getTurnosManiana(){
		
    	$maniana = new \Datetime('now');
    	$maniana->modify('+ 1 days');

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d, s') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.servicio','s')
			 	 ->where(					
					$this->qb->expr()->gte('d.fecha_hora', ':fechaInicio'),
					$this->qb->expr()->lte('d.fecha_hora', ':fechaInicio2'),
					$this->qb->expr()->eq('d.estadoTurno', ':estadoTurno')
				 )
				 ->OrderBy('d.fecha_hora','ASC')
				 ->setParameter('fechaInicio',$maniana->format('Y-m-d 00:00:00'))
				 ->setParameter('fechaInicio2',$maniana->format('Y-m-d 23:59:59'))
				 ->setParameter('estadoTurno',\Managers\EstadoTurnoManager::getInstance()->getEstadoReservado());	

		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}


	public function getTurnosHoraAntes($inicio){
		$filters = array();		

		$estadoTurno = \Managers\EstadoTurnoManager::getInstance()->getEstadoReservado();

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.estadoTurno','t')
			 	 ->where(
					 $this->qb->expr()->gte('d.fecha_hora', ':fechaInicio'),
					 $this->qb->expr()->lte('d.fecha_hora', ':fechaInicio2'),
					 $this->qb->expr()->eq('t.id', ':estadoTurno')
				 )
				 ->OrderBy('d.prioridad','DESC')
				 ->setParameter('fechaInicio',$inicio->format('Y-m-d H:00:00'))
				 ->setParameter('fechaInicio2',$inicio->format('Y-m-d H:59:59'))
				 ->setParameter('estadoTurno', $estadoTurno->id);	
			
			$query = $this->qb->getQuery();
			$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();
	
	}

}

