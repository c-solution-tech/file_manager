<?php
	/**
	* Database Connection
	*/
	class SSHConnect {
		private $host;
		private $port;
		private $user;
		private $pass;

		function __construct() {


			$this->host = HOST;
			$this->port = PORT;
			$this->user = $_SESSION['USER'];
			$this->pass = $_SESSION['PASS'];

			var_dump($_SESSION['USER']);
		}

		public function ssh_connect() {
			return @ssh2_connect($this->host, $this->port);
		}

		public function ssh2_auth_password($conn)
		{
			return @ssh2_auth_password($conn, $this->user, $this->pass);
		}
	}