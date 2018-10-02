<?php

function site_url(){
	return  '/';
}

abstract class BaseCLI_Controller extends CI_Controller {
	
	protected $data;
   	
	public function __construct()
   	{
		parent::__construct();

		$this->data['TOKEN_CSRF_VALUE'] = $this->security->get_csrf_hash();
		$this->data['TOKEN_CSRF_NAME'] = $this->security->get_csrf_token_name();
		
		if(!$this->input->is_cli_request() && (ALLOW_CLI_CONTROL == true)){ 
			die('Error en la llamada');
		}		
	}
	
	public function response(){
		return json_encode($this->data);
	}	

	/** Actual month first day **/
	public function primerDiaMes() {
	  $month = date('m');
	  $year = date('Y');
	  return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
	}

	public function ultimoDiaMes() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('Y-m-d 23:59:59', mktime(0,0,0, $month, $day, $year));
  	}
  	
}
?>