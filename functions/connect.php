<?php

	class Database {
		public $con;
		public function __construct(){
			$this->con = mysqli_connect("localhost", "root", "34dattaD!", "nisgaa_db");
			if (!$this->con) {
				echo "Error in Connecting: " . mysqli_connect_error();
			}
		}
	}
	
?>
