<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of ObrasDS
 *
 * @author Nacho Albano
 */
class DatatableManager extends BaseManager{

    protected $em;

    protected function __construct() {
        $ci = & get_instance();
        $this->em = $ci->doctrine->em;
        parent::__construct();
    }
	
	public function getDatasource($datasource, $data, $datacount, $formats = array()){

		$columns = $data['columns'];		

		$result = array();
		$result['draw'] = $data['draw'];
		$result['recordsTotal'] = $datacount;
		$result['recordsFiltered'] = count($datasource);
		$result['data'] = array();

		

		foreach ($datasource as $aDatasource){
			foreach ($columns as $aColumn){
				
				$columnIndex = empty($aColumn['name'])?$aColumn['data']:$aColumn['name'];
				
								
				if (strpos($columnIndex,'.')){
					$aColumName = substr($columnIndex, strpos($columnIndex,'.') + 1,strlen($columnIndex) - strpos($columnIndex,'.') - 1);
				} else {
					$aColumName = $columnIndex;
				}
				
				$formatIndex = empty($aColumn['data'])?$aColumName:$aColumn['data'];
				
				if (!array_key_exists($formatIndex, $formats)){
					$aData[$aColumn['data']] = $aDatasource->$aColumName;
				} else { 
					$aData[$aColumn['data']] = $formats[$formatIndex]($aDatasource);
				}
			}
			$result['data'][] = $aData;
		}
		
		return json_encode($result);
	}	
}
?>