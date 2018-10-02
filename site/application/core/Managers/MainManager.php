<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of ObrasDS
 *
 * @author aolideas
 */
class MainManager extends BaseManager{

    protected $em;

    protected function __construct() {
        $ci = & get_instance();
        $this->em = $ci->doctrine->em;
        parent::__construct();
    }
	

	final public function beginTransaction(){
		$this->em->getConnection()->beginTransaction();
	}

	final public function rollbackTransaction(){
		$this->em->getConnection()->rollback();
		$this->em->close();
	}

	final public function commitTransaction(){
		$this->em->getConnection()->commit();
	}


	public function isEmail($correo){
		$this->CI->load->helper('email');
		return (valid_email($correo))?true:false;
	}
	
	
	public function fechaFormateada($date = null){
		// cuando la funciÃ³n no implica base de datos, no es necesario ir al DS.
		// podemos trabajar directamente aca en el Manager.
		
		if (empty($date)){
			$date = new \DateTime();
		}
		
		$fdia = $date->format('N'); 
		$fmes = $date->format('m'); 
		$anio = $date->format('Y'); 
		
		switch ($fdia){
			case  1: $dia = 'Lunes'; break;
			case  2: $dia = 'Martes'; break;
			case  3: $dia = 'MiÃ©rcoles'; break;
			case  4: $dia = 'Jueves'; break;
			case  5: $dia = 'Viernes'; break;
			case  6: $dia = 'SÃ¡bado'; break;
			case  7: $dia = 'Domingo'; break;
		}
			


		switch ($fmes){
			case  1: $mes = 'Enero'; break;
			case  2: $mes = 'Febrero'; break;
			case  3: $mes = 'Marzo'; break;
			case  4: $mes = 'Abril'; break;
			case  5: $mes = 'Mayo'; break;
			case  6: $mes = 'Junio'; break;
			case  7: $mes = 'Julio'; break;
			case  8: $mes = 'Agosto'; break;
			case  9: $mes = 'Septiembre'; break;
			case 10: $mes = 'Octubre'; break;
			case 11: $mes = 'Noviembre'; break;
			case 12: $mes = 'Diciembre'; break;

		}
	
		$fechafinal = $date->format('d')." de ".$mes.", ".$anio;
		return $fechafinal;			
	}
	
	function horaString($date = null){
		if (empty($date)){
			$date = new DateTime();
		}
		
		return $date->format('H:i').' hs'; 
	}


	public function getPager($base_url, $perpage, $totalcount, $urisegment = 4){
		/* arma el paginador como pero los links funcionan con nro de pagina, por
		lo que las consultas basadas en offset hay que recalcularlo a partir de la pagina y la
		catidad de items por pagina (constante seteada en config/constnat.php
		*/
		
		$this->CI->load->library('pagination');
		
		$config['base_url'] = $base_url;
		$config['total_rows'] = $totalcount;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = $urisegment; 
		
		$config['num_links'] = 3;		
		$config['use_page_numbers'] = TRUE;
		$config['num_tag_open'] = "<li class='pag'>";		
		$config['num_tag_close'] = '</li>';
		
		$config['full_tag_open'] = " <div class='pagination pagination-right'><ul>";
		$config['full_tag_close'] = "</ul></div>";
		
		$config['next_tag_open'] = '<li>'; 		
		$config['next_link'] = '&gt;';
		$config['next_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li>'; 		
		$config['prev_link'] = '&lt;';
		$config['prev_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>'; 		
		$config['first_link'] = '&laquo;';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>'; 		
		$config['last_link'] = '&raquo;';
		$config['last_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="javascript: void();">';
		$config['cur_tag_close'] = '</a></li>';
		$this->CI->pagination->initialize($config);
		
		return $this->CI->pagination->create_links();
	}
		
	

	public function getPagerFront($base_url, $perpage, $totalcount, $urisegment = 4){
		/* arma el paginador como pero los links funcionan con nro de pagina, por
		lo que las consultas basadas en offset hay que recalcularlo a partir de la pagina y la
		catidad de items por pagina (constante seteada en config/constnat.php
		*/
		
		$this->CI->load->library('pagination');
		
		$config['base_url'] = $base_url;
		$config['total_rows'] = $totalcount;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = $urisegment; 
		
		$config['num_links'] = 3;		
		$config['use_page_numbers'] = TRUE;
		$config['num_tag_open'] = "<li class='pag'>";		
		$config['num_tag_close'] = '</li>';
		
		$config['full_tag_open'] = "<div class='row no-margin-bottom'> <div id='blog-pagination' class='large-12 columns pagination-centered'><ul class='pagination'>";
		$config['full_tag_close'] = "</ul></div></div>";
		
		$config['next_tag_open'] = '<li>'; 		
		$config['next_link'] = '<i class="icon-angle-right"></i>';
		$config['next_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li>'; 		
		$config['prev_link'] = '<i class="icon-angle-left"></i>';
		$config['prev_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>'; 		
		$config['first_link'] = '&laquo;';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>'; 		
		$config['last_link'] = '&raquo;';
		$config['last_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="current"><a href="javascript: void();">';
		$config['cur_tag_close'] = '</a></li>';
		$this->CI->pagination->initialize($config);
		
		return $this->CI->pagination->create_links();
	}
	
	public function getParse($view, $data){
		return $this->CI->parser->parse($view,$data, true);
	}
	
	public function enMantenimiento(){
		$mantenimiento = false;
		$i = 0;
		$admins = AdministracionManager::getInstance()->getAll();
		while (($i < count($admins)) && (!$mantenimiento)){
			$mantenimiento = ($admins[$i]->estado == 'M')?true:false;
			$i++;
		}
		return $mantenimiento;
	}
	

	public function getMinMaxByDia($startDate){

		$diaDeSemanaActual = $startDate->format('N');

		$aHorarioEspecial = \Managers\HorarioEspecialManager::getInstance()->getByFecha($startDate);
		/*echo "<pre>";
		print_r($aHorarioEspecial->id);
		echo "</pre>";
		die();*/
		if($aHorarioEspecial = \Managers\HorarioEspecialManager::getInstance()->getByFecha($startDate)){
			
			$horaMinMax = \Managers\HorarioDeAtencionEspecialXCoiffeurManager::getInstance()->getMinMaxByDia($aHorarioEspecial, $diaDeSemanaActual);

		}else{

			$horaMinMax = \Managers\HorarioDeAtencionXCoiffeurManager::getInstance()->getMinMaxByDia($diaDeSemanaActual);

		}

		return $horaMinMax;

	}


	public function getByDia($startDate, $aDay, $aCoiffeur = null){

		$aHorarioEspecial = \Managers\HorarioEspecialManager::getInstance()->getByFecha($startDate);

		if($aHorarioEspecial = \Managers\HorarioEspecialManager::getInstance()->getByFecha($startDate)){
			$getByDia = \Managers\HorarioDeAtencionEspecialXCoiffeurManager::getInstance()->getByDia($aHorarioEspecial, $aDay, $aCoiffeur);
		}else{
			$getByDia = \Managers\HorarioDeAtencionXCoiffeurManager::getInstance()->getByDia($aDay, $aCoiffeur);
		}
		
		return $getByDia;

	}


}
?>