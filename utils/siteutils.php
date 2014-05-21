<?php
define('BCOOKIE' , 'ucookie');
define('SERVER' , 'qa.hopin.co.in');
define('ENCRYPTION_KEY' , '$@!@!123%');
require_once('conf/fb.conf');
require_once('utils/sendmail.php');
Class SiteUtils{


	public static function parseRequest(){
		$url = $_SERVER['REQUEST_URI'];
		$parts = explode('/', $url);
		$request_params = array();
		if(empty($parts[1])){
			$request_params['type'] = 'home';
			return $request_params;
		}
		unset($parts[0]); // not needed
		$request_params['type'] = $parts[1];
		  $method = $_SERVER['REQUEST_METHOD'];

                switch ($method) {
                        case 'GET':
                         case 'HEAD':
                                 $arguments = $_GET;
                                break;
                         case 'POST':
                                $arguments = SiteUtils::getPostArguments();
                                 break;
                         case 'PUT':
                         case 'DELETE':
                                parse_str(file_get_contents('php://input'), $arguments);
		}
		//$request_params['input'] = $this->parseInput($parts[1]);
		/*
		foreach($parts as $p){
		   $args = explode('&' , $p);
		   foreach($args as $arg){
		   $subargs = explode('=' , $arg);
		   if(!isset($subargs[1]))
			$args[1]= '';
		   $request_params[$subargs[0]] = $subargs[1];	
		  }
		}*/
		$request_params = $arguments;
		$request_params['type'] = $parts[1];
		return $request_params;

	}
	public static function getPostArguments()
        {
                $request_type =  $_SERVER['CONTENT_TYPE'];

                if(preg_match('/json/', $request_type) != 0)
                {
                        $req = file_get_contents('php://input');
                        error_log($req);
                        return get_object_vars(json_decode($req));
                }
                else
                        return $_POST;
        }

	public static function formatAPIOutput($input){
		//Assuming the API output is always of same form , the results are in JSON 

		$input = json_decode($input,true);
		if(isset($input['body']))
			return  $input['body'];
		
		else 	
			return array();
	}

	public static function isLoggedIn(){
		global $request_params;
		$request_params['login_type'] = $_COOKIE['network'];
		$request_params['login_id'] = $_COOKIE['networkID'];
		if(isset($_COOKIE['network']))
			return true;
		else	
			return false;
	}

	 private static function _generateBcookie($bcookie_secret) {
	       $browser_ip = $_SERVER['REMOTE_ADDR'];
   	       $bcookie_data = $browser_ip."-".microtime();
               $bcookie = md5($bcookie_secret."-".$bcookie_data);
               return $bcookie;
       }

	public static function extractInputData($name, $value="") {
	     $value = array_key_exists($name, $_REQUEST)?rawurldecode($_REQUEST[$name]):$value;
    	     return $value;
  	}

	public static function _extractOrSetBcookie() {
	      global $GLOBALS;
	      $bcookie_secret = "h0p1nc00k1e";
    	      $bcookie = isset($_COOKIE[BCOOKIE])?$_COOKIE[BCOOKIE]:"";
    	      if ($bcookie == "") {
     		 $bcookie = SiteUtils::_generateBcookie($bcookie_secret);
       		 setcookie(BCOOKIE, $bcookie, mktime(0, 0, 0, 1, 1, 2018), '/', $global_data['COOKIE_DOMAIN']);
    	      }
   	     $GLOBALS[BCOOKIE] = $bcookie;
       }

	public static function _extractPlatform(){
	      global $GLOBALS;
	      $GLOBALS['site'] = SiteUtils::extractInputData('site' , 0);
	      if($GLOBALS['site'] == 1)
		$GLOBALS['platform'] = 'site';
	      else
		$GLOBALS['platform'] = 'app';
	}

	public static function buildGlobaldata(){
		SiteUtils::_extractOrSetBcookie();
		SiteUtils::_extractPlatform();
	}

	private static function encrypt_decrypt($action, $string) {
	    	$output = false;
	
	    	$encrypt_method = "AES-256-CBC";
	    	$secret_key = 'This is my secret key';
	    	$secret_iv = 'This is my secret iv';
	
	    	// hash
	    	$key = hash('sha256', $secret_key);
	
	    	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    	$iv = substr(hash('sha256', $secret_iv), 0, 16);
	
	    	if( $action == 'encrypt' ) {
	    	    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	    	    $output = base64_encode($output);
	    	}
	    	else if( $action == 'decrypt' ){
	    	    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    	}
	
	    	return $output;
	}

	public static function encrypt($pure_string){
    		 return SiteUtils::encrypt_decrypt('encrypt' , $pure_string);
	}

	public static function decrypt($encrypted_string){
    		 return SiteUtils::encrypt_decrypt('decrypt' , $encrypted_string);
	}

	public static function sendConfirmation($id, $email){
		$token = SiteUtils::encrypt($id);
		$email_url = SERVER . '/verifyemail/email=' . $email .  '&token=' .$token;
		$data['email'] = $email;
		$data['name'] = 'Dear user';
		$data['link'] = $email_url;
		Mailer::sendConfirmationMail($data);
	}

	public static function sendEmail($id,$subject , $message , $profile){
		$data['email'] = $id;
                $data['subject'] = $subject;
                $data['message'] = $message;
		$data['profile'] = $profile;
                Mailer::sendContactMail($data);

	}
}



