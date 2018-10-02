<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class ClienteDs extends BaseDataService {
   
   
    protected $qb;    

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Cliente";
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
/*
	public function getAll(){
		$todos = $this->em->getRepository($this->tbl_name)->findBy(array('borrado' => false));
		return $todos;
	}    	
	*/
	public function getLogin($username, $pass){
		/* La informaciÃ³n de logueo esta en la variable federacionAcutal que esta en los controladores
		   Se obtiene de $this->ci (instancia de CI);
		*/  
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u') 
			   ->from($this->tbl_name, 'u')
			//  ->join('u.federacion','f')
			   ->where(
				   $this->qb->expr()->eq('u.email', '?1')
				   ,$this->qb->expr()->eq('u.pass', '?2')
				   ,$this->qb->expr()->eq('u.activo', '?3')
				   /*,$this->qb->expr()->eq('u.borrado', '?4')*/
				   // $this->qb->expr()->eq('f.id', $federacionActual->id)
			   )
			   ->setParameter(1,$username)
			   ->setParameter(2,$pass)
			   ->setParameter(3,'1');
			   /*->setParameter(4,'0');*/
			   
				   
        $query = $this->qb->getQuery();

		$obj = $query->getResult();		

        if (count($obj) > 0){
            return $query->getSingleResult();
        }

        return false;
	}
	

/*
	public function delete($data){		
		if (isset($data)) {
            //$this->em->remove($data);
			$data->borrado = 1;
            $this->em->persist($data);
            $this->em->flush();
            return(true);
        } else {
            return(false);
        }
   
    }

*/

	public function getByUsername($username){
		$todos = $this->em->getRepository($this->tbl_name)->findOneBy(array('email' => $username));
		return $todos;
	} 
	
	
	
	public function getByEmail($email){

	    $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u') 
			   ->from('models\Cliente', 'u')
			   ->where(
				   $this->qb->expr()->eq('u.email', '?1')
				  )
			   ->OrderBy('u.id','DESC')	 	 
			   ->setParameter(1,$email);			   
				   
        $query = $this->qb->getQuery();		
		$obj = $query->getResult();

        if (!empty($obj))
            return $obj[0];

        return false;
	}
	

	public function getDeudoresByDia($fecha, $estado){


	    $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('c') 
			   ->from('models\Cliente', 'c')
			   ->join('c.turnos','t')
			   ->join('t.estadoTurno','et')
/*			   ->join('t.pago','p')
			   ->where(					
					$this->qb->expr()->gte('t.fecha_hora', ':fechaInicio'),
					$this->qb->expr()->lte('t.fecha_hora', ':fechaInicio2')
				)
			   ->setParameter('fechaInicio',$fecha->format('Y-m-d 00:00:00'))
			   ->setParameter('fechaInicio2',$fecha->format('Y-m-d 23:59:59'))
*/			   ;	

/*		if($estado){
			$this->qb->andWhere($this->qb->expr()->eq('et.id', $estado->id));
		}
*/				   
        $query = $this->qb->getQuery();		
		$obj = $query->getResult();

        if (!empty($obj))
            return $obj;

        return array();
	}
	

	
    public function estaDisponible($fechaInicio, $fecha_fin, $aCliente = null, $aTurnoEdit = false){
		$filters = array();	

		$fechaInicioAux = clone $fechaInicio;
		$fechaFinAux = clone $fecha_fin;	

		$fechaInicioAux->modify('+1 second');
		$fechaFinAux->modify('-1 second');	

		if($aCliente){

			$this->qb = $this->em->createQueryBuilder();
			$this->qb->select('d') 
	 			     ->from($this->tbl_name_turnos, 'd')
	 			     ->innerjoin('d.servicio','s')
	 			     ->innerjoin('d.cliente','c')
				 	 ->where(
				 	 	$this->qb->expr()->orX(

				 	 		$this->qb->expr()->between(':fechaInicio', 'd.fecha_hora', "DATE_ADD(d.fecha_hora, ((s.duracion-1)*60), 'second')" ),
				 	 		$this->qb->expr()->between(':fechaFin', 'd.fecha_hora', "DATE_ADD(d.fecha_hora, ((s.duracion-1)*60), 'second')" )

				 	 		/*
				 	 		$this->qb->expr()->andX(					
								$this->qb->expr()->lte('d.fecha_hora', ':fechaInicio'),
								$this->qb->expr()->gt("DATE_ADD(d.fecha_hora, ((s.duracion+s.duracion_espera)*60), 'second')", ":fechaInicio")
							),				
							$this->qb->expr()->andX(
								$this->qb->expr()->lt('d.fecha_hora', ':fechaFin'),
								$this->qb->expr()->gte("DATE_ADD(d.fecha_hora, ((s.duracion+s.duracion_espera)*60), 'second')", ":fechaFin")
							)
							*/
						),
						$this->qb->expr()->notIn('d.estadoTurno', '2,5,7')
					 )
					 ->OrderBy('d.fecha_hora','ASC')
					 ->setParameter('fechaInicio',$fechaInicioAux->format('Y-m-d H:i:s'))
					 ->setParameter('fechaFin',$fechaFinAux->format('Y-m-d H:i:s'));	
			
				$this->qb->andWhere($this->qb->expr()->eq('d.cliente', $aCliente->id));

				if($aTurnoEdit){
					$this->qb->andWhere($this->qb->expr()->neq('d.id', $aTurnoEdit->id));
				}

				$query = $this->qb->getQuery();
				//var_dump($query->getSql());
				$obj = $query->getResult();

				
				if(!empty($obj)){
					return false;
				}
				return true;

		} else {
			return true;			
		}

		//return array();
	
	}


	public function getByFacebookId($facebookId){
		//$federacionActual = $this->ci->getFederacion();
        $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u')
				 ->from($this->tbl_name,'u')
				 // ->join('u.federacion','f')
				 ->where(
						 $this->qb->expr()->eq('u.facebookId', '?1'),
						 $this->qb->expr()->eq('u.activo', 1)
					)
				 ->setParameter(1, $facebookId);
				 
		$query = $this->qb->getQuery();
		
		$obj = $query->getResult();
		
		if(count($obj) > 0)
			return $obj[0];
		
		return false;
	}	


	public function getCumpleanos($fechaCumple = null){
		if (empty($fechaCumple)){
			$fechaCumple = new \DateTime('now');
		}
		
		//$federacionActual = $this->ci->getFederacion();
        $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u')
				 ->from($this->tbl_name,'u')
				 // ->join('u.federacion','f')
				 ->where(
						 $this->qb->expr()->eq('u.activo', 1)
					)
				 ->andWhere( "DATE_FORMAT(u.fecha_nacimiento, '%m-%d') = '".$fechaCumple->format('m-d')."'" );
				 
		$query = $this->qb->getQuery();
		
		$obj = $query->getResult();
		
		if(count($obj) > 0)
			return $obj;
		
		return array();
	}	


	public function getClientesaDesbloquear($fecha = null){

		if (empty($fecha)){
			$fecha = new \DateTime('now');
		}
		
        $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u')
				 ->from($this->tbl_name,'u')
				 ->where(
						 $this->qb->expr()->eq('u.activo', 1)
						 ,$this->qb->expr()->eq('u.bloqueado', 1)
						 ,$this->qb->expr()->eq("DATE_FORMAT(u.fecha_desbloqueo, '%Y-%m-%d')", '?1')
					)
				 ->setParameter(1, $fecha->format('Y-m-d'));
				 
		$query = $this->qb->getQuery();
		
		$obj = $query->getResult();
		
		if(count($obj) > 0)
			return $obj;
		
		return array();
	}


}

?>