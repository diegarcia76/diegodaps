<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of NotificacionManager
 *
 * @author NASoft
 */
class NotificacionManager extends BaseManager{

	protected $onesignal_disabled = false;

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\NotificacionDs::getInstance();

		$this->CI->load->config('onesignal');

		$this->onesignal_disabled = config_item('onesignal_disabled');
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["titulo"] = $data->titulo;
		$arrayData["descripcion"] = $data->descripcion;
		$arrayData["fecha"] = $this->relative_date($data->fecha->format('Y-m-d H:i:s'));
		
		return $arrayData;
	}

	public function relative_date($timestamp, $days = false, $format = "M j, Y") {  

	  if (!is_numeric($timestamp)) {
	    // It's not a time stamp, so try to convert it...
	    $timestamp = strtotime($timestamp);
	  }
	  
	  if (!is_numeric($timestamp)) {
	    // If its still not numeric, the format is not valid
	    return false;
	  }
	  
	  // Calculate the difference in seconds
	  $difference = time() - $timestamp;
	  
	  // Check if we only want to calculate based on the day
	  if ($days && $difference < (60*60*24)) { 
	    return "Hoy"; 
	  }
	  if ($difference < 3) { 
	    return "ReciÃ©n ahora"; 
	  }
	  if ($difference < 60) {    
	    return 'Hace '. $difference . " segundos"; 
	  }
	  if ($difference < (60*2)) {    
	    return "Hace 1 minuto"; 
	  }
	  if ($difference < (60*60)) { 
	    return 'Hace '. intval($difference / 60) . " minutos"; 
	  }
	  if ($difference < (60*60*2)) { 
	    return "Hace 1 hora"; 
	  }
	  if ($difference < (60*60*24)) {    
	    return 'Hace '.intval($difference / (60*60)) . " horas"; 
	  }
	  if ($difference < (60*60*24*2)) { 
	    return "Hace 1 dÃ­a"; 
	  }
	  if ($difference < (60*60*24*7)) { 
	    return 'Hace '.intval($difference / (60*60*24)) . " dÃ­as"; 
	  }
	  if ($difference < (60*60*24*7*2)) { 
	    return "Hace 1 semana"; 
	  }
	  if ($difference < (60*60*24*7*(52/12))) { 
	    return 'Hace '.intval($difference / (60*60*24*7)) . " semanas"; 
	  }
	  if ($difference < (60*60*24*7*(52/12)*2)) { 
	    return "Hace 1 mes"; 
	  }
	  if ($difference < (60*60*24*364)) { 
	    return 'Hace '.intval($difference / (60*60*24*7*(52/12))) . " meses"; 
	  }
	  
	  // More than a year ago, just return the formatted date
	  return @date($format, $timestamp);
	}
	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return $this->dataservice->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\NotificacionDs::getInstance()->searchCount($searchText, $seccion);
	}	

	public function getByUser($aCliente, $todos = null){
		return \Dataservices\NotificacionDs::getInstance()->getByUser($aCliente, $todos);
	}

	public function setVistasByUser($aCliente = null, $front = null){
		return \Dataservices\NotificacionDs::getInstance()->setVistasByUser($aCliente, $front);
	}

	public function getAllNoti($todos = null){
		return \Dataservices\NotificacionDs::getInstance()->getAllNoti($todos);
	}

	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(			
			'acciones' => function($aCiudad){
				return MainManager::getInstance()->getParse('admin/notificaciones/acciones.tpl',array('edit_ciudad' => $aCiudad));
			}/*,
			'imagen' => function($aFederacion){
				if($aFederacion->avatar){
					$image = ImagenManager::getInstance()->getUrl($aFederacion->avatar,'55x55');
				}else{
					$image = site_url().'uploads/sin-imagen55.jpg';
				}
				return '<img src="'.$image.'">';
			},			
			'fecha_alta' => function($aPrestador){
				if($aPrestador->fecha_alta){
					return $aPrestador->fecha_alta->format('d/m/Y');
				}
				return 'no definido';
			}*/
			
		);	
			
		$datasource = \Dataservices\NotificacionDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\NotificacionDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}

	public function save($data, $link=null){
		$result = parent::save($data);

		if($data->tipo){
			if($data->cliente){
				$aCliente = $data->cliente;
		        $titulo = $data->titulo;
		        $descripcion = $data->descripcion;

		        $dispositivosEnviados = '';
		        foreach ($aCliente->dispositivos as $aDispositivo) {
		            if ($aDispositivo->playerId) {
		                $response = $this->sendMessage($titulo, $descripcion, $aDispositivo->playerId, $link);
		                // $dispositivosEnviados .= $aDispositivo->playerId."<br/>\n";
		            }
		        }
		    }

	        // $dispositivosEnviados = 'Notificacion: '.$data->id."<br/>\n".$dispositivosEnviados;
	    }

        // \Managers\MailManager::getInstance()->sendMail('nachoalbano@gmail.com', 'Prueba de envios de celulares', $dispositivosEnviados);

        return $result;
	}


    public function sendMessage($titulo, $descripcion, $playerId = 'all', $link = null)
    {

    	$titulo = strip_tags($titulo);
    	$descripcion = strip_tags($descripcion);

        $content = array(
            "en" => $descripcion,
            "es" => $descripcion
            );

        $headings = array(
            "en" => $titulo,
            "es" => $titulo
            );

        if ($playerId == 'all'){
        	$fields = array(
	            'app_id' => "b66208c3-187a-44a8-8be2-7a6b7eb15aed",
	            'included_segments' => array('All'),
	              'data' => array("foo" => "bar"),
	            'contents' => $content,
	            'headings' => $headings
	        );
        }else{
        	if($link){
        		$fields = array(
		            'app_id' => "b66208c3-187a-44a8-8be2-7a6b7eb15aed",
		            'include_player_ids' => array($playerId),
		              'data' => array("foo" => "bar"),
		            'contents' => $content,
		            'headings' => $headings,
		            'url' => $link
		        );

        	}else{
		        $fields = array(
		            'app_id' => "b66208c3-187a-44a8-8be2-7a6b7eb15aed",
		            'include_player_ids' => array($playerId),
		              'data' => array("foo" => "bar"),
		            'contents' => $content,
		            'headings' => $headings
		        );
		    }

	    }

        $fields = json_encode($fields);

        if (!$this->onesignal_disabled){
	        /*print("\nJSON sent:\n");
	        print($fields);
	        */
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
	                                                   'Authorization: Basic ZGRlNWE3MDItMjA5MC00ZTI3LTkwZTAtYmVlMjg1NjU5NTJi'));
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_HEADER, false);
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	        $response = curl_exec($ch);
	        curl_close($ch);

	        return $response;
	    }

	    return true;
    }

	
}
?>