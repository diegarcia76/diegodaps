<?php
namespace Managers;

require_once(APPPATH.'third_party/Sendgrid/sendgrid-php.php');

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Mail
 *
 * @author NASoft
 */
class MailManager extends BaseManager{

	private $sendgrid_api_key;
	private $email_envio;
	private $email_sitio;
	private $email_name;
	private $isSMTP;
	private $HOST;
	private $PORT;
	private $USER;
	private $PASS;
	private $SMTPSecure;
	private $simular = false;

    protected function __construct() {
        parent::__construct();

		$this->CI->load->config('email');
		$this->CI->load->config('sendgrid');
		$this->CI->load->library('mail/My_PHPMailer');
		$this->sendgrid_api_key = config_item("sedngrid_api_key_secret");

		//$federacionActual = $this->CI->getFederacion();

		$this->email_sitio = 'info@diegodaps.com.ar';
		$this->email_envio = config_item("email_envio");
		$this->email_sitio = config_item("email_sitio");
		$this->email_name = "Diego Dap's";

		$this->simular = config_item("email_simulate");

    }

	public function sendmail($mailto, $asunto, $content, $filesArray = array()){

		if ($this->simular == true) return true;

		$sendgrid = new \SendGrid($this->sendgrid_api_key);
		$email = new \SendGrid\Email();
		$email
				->addTo($mailto)
				->setFrom($this->email_sitio)
				->setFromName($this->email_name)
				->setSubject($asunto)
				->setText($content)
	 		    ->setHtml($content)

		;


	 	foreach ($filesArray as $aFile){
			$fileTmp = tempnam(sys_get_temp_dir(), 'mem');
			file_put_contents($fileTmp, $aFile['archivoStr']);
	 		$email->setAttachment($fileTmp,$aFile['filename']);
			//unlink($fileTmp);

	 	}

	 	return $sendgrid->send($email);
	}


	public function getSitioEmail(){
		return $this->email_sitio;
	}
}
