<?php
namespace Dataservices;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Description of BaseDataService
 *
 * @author NASoft
 */
abstract class BaseDataService {

    protected static $classInstance;
    protected $em;
    protected $tbl_name;
    protected $borradoLogico = false;    
	protected $ci;
	protected $order_field = 'nombre';

    protected $miFuncion = array();

    protected function __construct() {
        $this->ci = & get_instance();
        $this->em = $this->ci->doctrine->em;
    }

    final public static function getInstance() {

        $class = static::getClass();

        if (!isset(static::$classInstance[$class])) {
            static::$classInstance[$class] = new $class();
        }

        return static::$classInstance[$class];
    }

    final public static function getClass() {
        return get_called_class();
    }

    final public function save($data) {
        if (isset($data)) {
			
            $this->em->persist($data);
            $this->em->flush();
            return($data);
        } else {
            return(false);
        }
    }

    final public function get($id) {
        if (isset($id)) {
            return $this->em->find($this->tbl_name, $id);
        } else return false;
    }

    
    public function delete($data){
	
	
		if (isset($data)) {

			if (property_exists($this->tbl_name, 'borrado')){
				//$this->em->remove($data);
				$data->borrado = 1;
				$this->em->persist($data);
				$this->em->flush();
				return(true);
			} else {
	
				$this->em->remove($data);
				//$data->borrado = 1;
				//$this->em->persist($data);
				$this->em->flush();
				return(true);
			}
        } else {
            return(false);
        }
   
    }
	
	
	
	
	
	final public function create(){
		return new $this->tbl_name;
	}
	
	public function getAll(){

		$orderArr = array();
		if (property_exists($this->tbl_name, $this->order_field)){
			$orderArr = array($this->order_field => 'ASC');
		}

		if (property_exists($this->tbl_name, 'borrado')){
			return $this->em->getRepository($this->tbl_name)->findBy(array('borrado' => false), $orderArr);
		} else {
			if (property_exists($this->tbl_name, 'parent')){
				return $this->em->getRepository($this->tbl_name)->findBy(array('parent' => NULL), $orderArr);
			}else{
				return $this->em->getRepository($this->tbl_name)->findBy(array(), $orderArr);
			}
		}
	}
	
	public function getActiveAll(){
		if (property_exists($this->tbl_name, 'borrado')){
			return $this->em->getRepository($this->tbl_name)->findBy(array('borrado' => false,'activo'=> 1));
		} else {
			return $this->em->getRepository($this->tbl_name)->findBy(array('activo'=> 1));
		}
	}
	
	protected function presetQB($data){
		$this->borradoLogico = (property_exists($this->tbl_name, 'borrado'))?true:false;

		$columns = $data['columns'];
		$order = $data['order'][0]['dir'];
		$orderColumnIndex = $data['order'][0]['column'];
		$start = intval($data['start']);
		$length = intval($data['length']);
		$searchTxt = utf8_decode($data['search']['value']);

		// 1) Filtros
		$myOrxExpr = $this->qb->expr()->orX();
		foreach ($columns as $aColum){
			if ($aColum['searchable'] == 'true'){
				$myOrxExpr->add(
					$this->qb->expr()->like($aColum['name'], $this->qb->expr()->literal('%'.$searchTxt.'%'))
				);
			}
		}
		$this->qb->where($myOrxExpr);

		if($this->borradoLogico){
			$this->qb->andWhere($this->qb->expr()->eq('d.borrado', '0'));
		}

		// 2) Order By
		$this->qb->orderby($columns[$orderColumnIndex]['name'], $order);

		// 3) filtros de columna 
		foreach ($columns as $aColum){
			if ($aColum['searchable'] == 'true'){
				$searchAux = $aColum['search']['value'];
				if (!empty($searchAux)){
					$this->qb->andWhere(
						$this->qb->expr()->eq($aColum['name'], $this->qb->expr()->literal($searchAux))
					);
				}
			}
		}
		
		$this->setDatasourceJoins();
				
	}
	
	
	private function setDatasourceJoins(){
		if ($this->miFuncion)
		 	foreach ($this->miFuncion as $funcion) {			
				$this->$funcion();
				//var_dump($this->$funcion());
		}
	
	}
	
	public function getDatatableSource($data){
	
	
		
		$start = intval($data['start']);
		$length = intval($data['length']);

		// Create QueryBuilder
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd');
		
		$this->presetQB($data);
		$this->qb->setFirstResult($start);
		
		if($length > 0){
			$this->qb->setMaxResults($length);
		}

		$query = $this->qb->getQuery();
		$obj = new Paginator($query, $fetchJoinCollection = true);

		
		if(!empty($obj))
			return $obj;
		
		return array();;

	}
	

	public function getDatatableSourceCount($data){
		

		// Create QueryBuilder
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('count(d) as cantidad') 
 			     ->from($this->tbl_name, 'd');
		
		$this->presetQB($data);

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();

	}

	public function getDatosConJoins(){
		
		// Create QueryBuilder
        $this->qb = $this->em->createQueryBuilder();
        $this->qb->select('d') 
                 ->from($this->tbl_name, 'd');

		$this->setDatasourceJoins();                
        
        $query = $this->qb->getQuery();
        $obj = $query->getResult();
		
        return $obj;

	}




}

?>
