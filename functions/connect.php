<?php

	class Database {
		public $con;
		public function __construct(){
			require_once('db_params.php'); // Change the variables in db_params.php in accordance to your site database configuration
			$this->con = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['name']);
			if (!$this->con) {
				echo "Error in Connecting: " . mysqli_connect_error();
			}
		}
	}
	
?>
