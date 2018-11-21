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
	
	
	
	public function getPendientesByFechaToday(){
	
		$fecha = new \DateTime('now');

          
                //$fecha = Datetime::createFromFormat('Y-m-d h:i:s', $fecha);
          
	
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('c') 
 			     ->from($this->tbl_name, 'c')
			 	 ->where(
					$this->qb->expr()->eq('c.cobrado', ':estado'),
					$this->qb->expr()->gt('c.fecha', ':fechaInicio')
					//$this->qb->expr()->lt('c.fecha', ':fechaInicio2')
					
				 )
				 ->OrderBy('c.fecha','ASC')
				 ->setParameter('estado',0)
				 ->setParameter('fechaInicio',$fecha->format('Y-m-d 00:00:00'));
				// ->setParameter('fechaInicio2',$fecha->format('Y-m-d h:59:59'));
				
		

		   $query = $this->qb->getQuery();		
        //var_dump($query->getSql()); die();
		$obj = $query->getResult();

        if (!empty($obj))
            return $obj;

        return false;
	
		
	} 
	
	public function getPendientesByFecha(){
	
		$fecha = new \DateTime('now');

          
                //$fecha = Datetime::createFromFormat('Y-m-d h:i:s', $fecha);
          
	
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('c') 
 			     ->from($this->tbl_name, 'c')
			 	 ->where(
					$this->qb->expr()->eq('c.cobrado', ':estado'),
					//$this->qb->expr()->gte('c.fecha', ':fechaInicio'),
					$this->qb->expr()->lt('c.fecha', ':fechaInicio2')
					
				 )
				 ->OrderBy('c.fecha','ASC')
				 ->setParameter('estado',0)
				 ->setParameter('fechaInicio2',$fecha->format('Y-m-d 00:00:00'));
				// ->setParameter('fechaInicio2',$fecha->format('Y-m-d H:59:59'));
				
		

		   $query = $this->qb->getQuery();		
        //var_dump($query->getSql()); die();
		$obj = $query->getResult();

        if (!empty($obj))
            return $obj;

        return false;
	
		
	} 
	
	

}

?>
