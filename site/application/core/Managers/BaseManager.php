<?php
namespace Managers;
/**
 * Description of BaseManager
 *
 * @author NASoft
 */
abstract class BaseManager{

    protected static $classInstance;
	protected $CI;
	protected $dataservice;

    protected function __construct() {
        $this->CI = &  get_instance();
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
	
	public function get($id){
		return $this->dataservice->get($id);
	}

    	public function getAll(){
        	return $this->dataservice->getAll();
    	}

    	public function getActiveAll(){
        	return $this->dataservice->getActiveAll();
    	}
	
	public function create(){
		$newCategoria = $this->dataservice->create();
		return $newCategoria;
	}

	public function save($data){
		try{
			$result = $this->dataservice->save($data);
		} catch (\Exception $e){
			print_r($e->getMessage());
			$result = false;
		}
		
		return $result;
	}

	
	public function delete($data){
		// removemos las notas a las cuales se le asociÃ³ el tÃ©rmino		$data->notas->clear();
		return $this->dataservice->delete($data);
	}
	
    
/*
    public function getBoundaries($lat, $lng, $distance = 1, $earthRadius = 6371)
    {
        $return = array();
         
        // Los angulos para cada direcciÃ³n
        $cardinalCoords = array('north' => '0',
                                'south' => '180',
                                'east' => '90',
                                'west' => '270');
        $rLat = deg2rad($lat);
        $rLng = deg2rad($lng);
        $rAngDist = $distance/$earthRadius;
        foreach ($cardinalCoords as $name => $angle)
        {
            $rAngle = deg2rad($angle);
            $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
            $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
             $return[$name] = array('lat' => (float) rad2deg($rLatB), 
                                    'lng' => (float) rad2deg($rLonB));
        }
        return array('min_lat'  => str_replace(',','.',$return['south']['lat']),
                     'max_lat' => str_replace(',','.',$return['north']['lat']),
                     'min_lng' => str_replace(',','.',$return['west']['lng']),
                     'max_lng' => str_replace(',','.',$return['east']['lng']));

    }
*/
}

?>
