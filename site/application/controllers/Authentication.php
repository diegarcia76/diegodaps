<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base.php";

class Authentication extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->data['menuitem'] = 'home';
		$this->load->library('encrypt');
		
	}

	public function index(){
		// Google Callback... no se utiliza para otros casos.
		if (!$code = $this->input->get('code')) {
		  $auth_url = \Managers\AuthManager::getInstance()->google_createAuthUrl();
		  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
		} else {

			$state = $this->input->get('state');
			$instance = intval($this->input->get('instance'));
	
			$sha1_state_decode = json_decode($this->encrypt->decode($state));
			
			if ($instance > 1){
				echo "Instance Error";
				die();
			}
			
			if (trim(strtolower($sha1_state_decode->site_url)) == (site_url().uri_string())){
				\Managers\AuthManager::getInstance()->googleCheckRedirectCode($code);
				header('Location: '.$sha1_state_decode->referer);
			} else {
				$instance++;
				$redirect_url = $sha1_state_decode->site_url.'?state='.urlencode($state).'&code='.$code.'&instance='.$instance;
				header('Location: '.$redirect_url);
				die();
			}
		}
	}
	
	public function google_login($redirect_url = null){
		
		if (is_null($redirect_url)){
			$redirect_url = site_url();
		}

		if ($this->session->userdata('access_token')) {
			\Managers\AuthManager::getInstance()->setGoogleToken($this->session->userdata('access_token'));
		} else {
			$redirect_uri = site_url().'authentication';
			header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}		
	}
	
	/*
	 * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
	 */
	 
	
	public function facebook($site_url = null){
		
		if (!$code = $this->input->get('code')) {

			//$referer = $_SERVER['HTTP_REFERER'];
			$referer = site_url();
			$site_facebook_login = base64_decode($site_url);
			//print_r(base64_decode($site_url)); die();
			$this->session->set_userdata('facebook_redirect_before_login', htmlspecialchars($referer));
			$this->session->set_userdata('facebook_redirect_site_url_login', $site_facebook_login);
			//$this->session->set_userdata('facebook_federacion_id', intval($federacion_id));
			//$redirect_uri = site_url().'authentication';
			$redirect_uri = \Managers\AuthManager::getInstance()->facebook_getLoginUrl();
			//print_r($this->session->userdata('facebook_redirect_site_url_login')); die();
			header('Location: ' . $redirect_uri);

		} else {
			
			try {
			  $accessToken =  \Managers\AuthManager::getInstance()->facebook_getAccessToken();// $helper->getAccessToken();
			} catch(\Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(\Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
			
			$helper = \Managers\AuthManager::getInstance()->facebook_getHelper();
			
			if (! isset($accessToken)) {
			  if ($helper->getError()) {
				header('HTTP/1.0 401 Unauthorized');
				echo "Error: " . $helper->getError() . "\n";
				echo "Error Code: " . $helper->getErrorCode() . "\n";
				echo "Error Reason: " . $helper->getErrorReason() . "\n";
				echo "Error Description: " . $helper->getErrorDescription() . "\n";
			  } else {
				header('HTTP/1.0 400 Bad Request');
				echo 'Bad request';
			  }
			  exit;
			}
			
			//$federacion_id = $this->session->set_userdata('facebook_redirect_before_login', htmlspecialchars($referer));
			//$this->session->set_userdata('facebook_federacion_id', intval($federacion_id));

			Managers\AuthManager::getInstance()->facebook_authenticate($accessToken);

			$redirect = $this->session->userdata('facebook_redirect_site_url_login');
			$userData = $this->session->userdata('facebook_hash');

			//print_r($redirect.'/'.$userData); die();
			header('Location: ' . $redirect.'/'.$userData);
			
		}
	}
	
	public function facebook_login($userData){
		$userData = json_decode( $this->encrypt->decode(base64_decode($userData) ));

		$user_id = $userData->user_id;
		$facebook_id = $userData->facebook_id;
		$facebook_token = $userData->facebook_access_token;

		//print_r('user_id: '.$user_id. ' / facebook_id: '.$facebook_id); die();
		$avatar = 'https://graph.facebook.com/'.$facebook_id.'/picture?type=large';
		
		if ($aUser = \Managers\ClienteManager::getInstance()->get($user_id)){
			if($aUser->facebook == $facebook_id){
				\Managers\AuthManager::getInstance()->setUserInSession($aUser);

				if(!$aUser->foto){
					//actualizar imagen de perfil
					$image = file_get_contents($avatar);
					$dir = realpath("").'/uploads/'.$facebook_id.'.jpg';
					file_put_contents($dir, $image);

					$newImagen = Managers\ImagenManager::getInstance()->create($dir,'jpg', null, null, null, false);
					$newImagen->temporal = false;
					$aUser->foto = $newImagen;
					$newImagen->cliente = $aUser;
					$aUser = Managers\ClienteManager::getInstance()->save($aUser);

					unlink($dir);
				}

				$this->session->set_userdata('facebook_access_token', $facebook_token);

				$redirect = $this->session->userdata('facebook_redirect_before_login');
				//header('Location: ' . $redirect);		
				redirect($redirect);
			}
		}
		

	}
	
	public function twitter_login(){
		//Fresh authentication
		
		\Managers\AuthManager::getInstance()->twitter_authorization();
		

	}
	
}
