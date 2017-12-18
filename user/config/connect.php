<?php
	class connectDB{
		public $conn;
		public function connect(){
			$this->conn = new mysqli('localhost','root','','vue_coffee');
			return $this->conn;
		}
		public function __construct(){
			$this->connect();
		}
	}
?>