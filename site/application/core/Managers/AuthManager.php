<?php
	namespace Managers;
	use Doctrine\ORM\Mapping as ORM;

	// Facebook
	require_once(APPPATH.'third_party/Facebook/vendor/autoload.php');



	class AuthManager extends BaseManager{
		
		protected $authType = '';
		
		protected $facebookClient;
		protected $facebookLoginUrl;
		protected $facebookRedirectUri;
		protected $facebookHelper;
		protected $facebookAppId;
		protected $facebookAppSecret;
		protected $facebookAccessToken;
		protected $facebookFederacionId;
		

		protected function __construct() {
			parent::__construct();
			
			$this->CI->load->library('encrypt');
		//	$this->CI->load->config('google');
			$this->CI->load->config('facebook');
		//	$this->CI->load->config('twitter');
	

			// user isnt logged in. store the referrer URL in a var.
			if(isset($_SERVER['HTTP_REFERER'])){
				$redirect_to = str_replace(base_url(),'',$_SERVER['HTTP_REFERER']);
			} else {
				$redirect_to = '/';
			} 			

			// dato a enviar extras con la identificaciÃ³n de google
			$state_data = array(
				'site_url' => site_url().'authentication',
				'datetime' => date('YmdHis'),
				'referer' => $redirect_to
			);
				
			$sha1_state_encode = $this->CI->encrypt->encode(json_encode($state_data));
			
			if ($this->CI->session->userdata('facebook_access_token')) {
				$this->facebookAccessToken = $this->CI->session->userdata('facebook_access_token');
			}
			
			
			// FACEBOOK INITIALIZATION
			
			$this->facebookAppId = config_item("facebook_app_id");
			$this->facebookAppSecret = config_item("facebook_app_secret");
			$this->facebookRedirectUri = config_item("facebook_app_redirect_uri");
			$this->default_graph_version = config_item("facebook_default_graph_version");
			
			$this->facebookClient = new \Facebook\Facebook([
			  'app_id' => $this->facebookAppId, // Replace {app-id} with your app id
			  'app_secret' => $this->facebookAppSecret,
			  'default_graph_version' => $this->default_graph_version,
			  ]);
			
			$this->facebookHelper = $this->facebookClient->getRedirectLoginHelper();
			
			$permissions = ['email','public_profile']; // Optional permissions
			$this->facebookLoginUrl = $this->facebookHelper->getLoginUrl($this->facebookRedirectUri, $permissions);			
			
		}
		
		public function setUserInSession($aUser = null){
			if ($aUser){
				$this->CI->session->set_userdata('login_id', $aUser->id);
			} else {
				$this->logout();
				redirect('/');
				die();
			}
		}
		
		public function logout(){
			$this->CI->session->unset_userdata('login_id');
			//$this->CI->session->unset_userdata('access_token');
			$this->CI->session->unset_userdata('facebook_access_token');
			//$this->CI->session->unset_userdata('twitter_acces_token');
			
		}		
		
		// FACEBOOK FUNCTIONS
		public function facebook_getAccessToken(){
			return $this->facebookHelper->getAccessToken();
		}
		
		public function facebook_getHelper(){
			return $this->facebookHelper;
		}
		
		public function facebook_getAppID(){
			return $this->facebookAppId;
		}
		
		public function facebook_getOAuth2Client(){
			return $this->facebookClient->getOAuth2Client();
		}
		
		public function facebook_getUser(){
			$response = $this->facebookClient->get('/me?fields=id,first_name,last_name,name,email', $this->facebookAccessToken);
			$user = $response->getGraphUser();
			return $user;
		}
		
		public function facebook_getLoginUrl(){
			return $this->facebookLoginUrl;
		}
		
		public function facebook_getPicture(){
			if ($this->facebookClient && !empty($this->facebookAccessToken)){
				$requestPicture = $this->facebookClient->get('/me/picture?redirect=false&height=300', $this->facebookAccessToken); //getting user picture
				$picture = $requestPicture->getGraphUser();
				return $picture->getProperty('url');
			} else {
				return false;
			}
		}
		
		
		
		public function facebook_authenticate($accessToken){
			$oAuth2Client = $this->facebook_getOAuth2Client();
			
			// Get the access token metadata from /debug_token
			$tokenMetadata = $oAuth2Client->debugToken($accessToken);
			
			// Validation (these will throw FacebookSDKException's when they fail)
			$tokenMetadata->validateAppId($this->facebook_getAppID()); // Replace {app-id} with your app id
			// If you know the user ID this access token belongs to, you can validate it here
			//$tokenMetadata->validateUserId('123');
			$tokenMetadata->validateExpiration();
			
			if (! $accessToken->isLongLived()) {
			  // Exchanges a short-lived access token for a long-lived one
			  try {
				$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
			  } catch (Facebook\Exceptions\FacebookSDKException $e) {
				echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
				exit;
			  }
			}
			
			$this->facebookAccessToken = $accessToken;
			//$this->facebookFederacionId = $federacion_id;

			$this->CI->session->set_userdata('facebook_access_token', $accessToken);
			
			$this->facebook_saveUserDB();
			
//			print_r($accessToken); die();
		}
		
		public function facebook_saveUserDB(){
			$facebookUserData = $this->facebook_getUser();

			$email = $facebookUserData->getProperty('email');
			$facebook_id = $facebookUserData->getProperty('id');
			$name = $facebookUserData->getProperty('first_name');
			$lastname = $facebookUserData->getProperty('last_name');;
			
			if (!$aUser = \Managers\ClienteManager::getInstance()->getByFacebookId($facebook_id)){

				if (!$aUser = \Managers\ClienteManager::getInstance()->getByEmail($email)){

					$aUser = \Managers\ClienteManager::getInstance()->create();
					$aUser->email = $email;
					$aUser->nombre = $name;
					$aUser->activo = true;
					$aUser->fecha_alta  = new \DateTime('now');

				}
			}

			$aUser->facebook = $facebook_id;
			$aUser = \Managers\ClienteManager::getInstance()->save($aUser);

			$data['facebook_id'] = $facebook_id;
			$data['user_id'] = $aUser->id;
			$data['facebook_access_token'] = (string) $this->facebookAccessToken;
			$userData = base64_encode($this->CI->encrypt->encode(json_encode($data)));
			
			$this->CI->session->set_userdata('facebook_access_token', (string) $this->facebookAccessToken);

			$this->CI->session->set_userdata('facebook_hash', $userData);
			// $this->setUserInSession($aUser);
			
		}
		
		

		public function getLoginUrlFacebook(){
			// se envia sin parÃ¡metros a la URL de redireccionamiento
			// como no tiene los parÃ¡metros los reenvia a la direccion correspondiente;
			//$federacion = $this->CI->getFederacion();
			//print_r('federacion: '.$federacion);
			$preloginurl = base64_encode(site_url().'authentication/facebook_login');
			return $this->facebookRedirectUri.'/'.$preloginurl;
		}

	}
	
