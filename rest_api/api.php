<?php 
	session_start();
	class Api extends Rest {
		
		public function __construct() {
			parent::__construct();
		}

		public function generateToken() {
			$user = $this->validateParameter('user', $this->param['user'], STRING);
			$pass = $this->validateParameter('pass', $this->param['pass'], STRING);
			try {
				//initial connection
				$conn = @ssh2_connect(HOST, PORT);

				if (!$conn) {
			    	$this->returnResponse(INVALID_HOST, "The host is not exist!.");
			    }
			    //auth_password
			    if(!@ssh2_auth_password($conn, $user, $pass)) {
			    	$this->returnResponse(INVALID_USER, "Username or Password incorrect!.");
			    }

				$_SESSION['USER'] = $user;
				$_SESSION['PASS'] = $pass; 

				$paylod = [
					'iat' => time(),
					'iss' => 'c-solution-tech.com',
					'exp' => time() + (60*60*60), //60mn
					'user' => $user
				];

				$token = JWT::encode($paylod, SECRETE_KEY);
				
				$data = ['token' => $token];
				$this->returnResponse(SUCCESS_RESPONSE, $data);
			} catch (Exception $e) {
				$this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
			}
		}

		public function mkdir() {
			$name = $this->validateParameter('dirname', $this->param['dirname'], STRING);

			try {
				if(mkdir("ssh2.sftp://{$sftp}/home/{$payload->user}/". $name)){
					$this->returnResponse(SUCCESS_RESPONSE, "ok");
				}
			} catch (Exception $e) {
				$this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
			}
		}

	}
	
 ?>