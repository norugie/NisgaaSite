<?php

	require 'get_error_log.php';
	$error =  new ErrorLog();

    Class Interaction {

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- Web Content  ********************/
        /*********************************************************************************************/

        public function aboutList($database){
            $array = array();
			$school;
			$type;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
				$type = "About";
			} else if($_GET['page'] == 'gcc'){
				$school = 2;
				$type = "GCC";
			} else if($_GET['page'] == 'ss'){
				$school = 2;
				$type = "SS";
			} else if($_SESSION['type'] == 6 || $_GET['page'] == 'nlc'){
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){ 
					$school = 2;
				} else {$school = $_SESSION['school'];}
				$type = "NLC";
			} else {
				$school = 2;
				$type = "About";
			}

			$sql = "SELECT web_content.id,
                           web_content.web_id, 
						   web_content.web_desc
					FROM web_content
					LEFT JOIN schools
                    ON (schools.id = web_content.school)
                    WHERE web_content.school = '$school'
                    AND web_content.web_type = '$type'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
        }

        public function programList($database){
            $array = array();
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "SELECT web_content.id,
                           web_content.web_id, 
						   web_content.web_desc
					FROM web_content
					LEFT JOIN schools
                    ON (schools.id = web_content.school)
                    WHERE web_content.school = '$school'
                    AND web_content.web_type = 'Programs'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
        }

        public function faqList($database){

			$array = array();
			$sql = "SELECT links.*,
						   schools.school_abbv 
					FROM links
					LEFT JOIN schools
					ON (schools.id = links.school)
					WHERE links.link_tag = 'Help'
					AND links.status = 'Active'";

			$query = mysqli_query($database->con, $sql);
			if(!$query){
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

        public function schoolInfo($database){
            $array = array();
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 8;
			}

			$sql = "SELECT * FROM schools WHERE id = '$school'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		public function schoolInfoPerSchool($database, $school){
            $array = array();

			$sql = "SELECT * FROM schools WHERE id = '$school'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}
		
		public function contactList($database){
            $array = array();
			$sql;
			$sqlquery = "SELECT contacts.id,
						   contacts.firstname,
						   contacts.lastname,
						   contacts.position,
						   contacts.phone,
						   contacts.email,
						   contacts.photo,
						   contacts.status,
						   schools.school_abbv
					FROM contacts
					LEFT JOIN schools
                    ON (schools.id = contacts.school)
                    WHERE contacts.type = 'Contact'";

			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND contacts.school = '$school'";
			} else {
				$sql = $sqlquery;
			}
			/*  END Content Filter  */

			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        public function carouselList($database){
            $array = array();
			$sql;
			$sqlquery = "SELECT carousel.id,
                           carousel.carousel_name,
						   carousel.carousel_desc
					FROM carousel
					LEFT JOIN schools
                    ON (schools.id = carousel.school)
                    WHERE carousel.status = 'Active'";
					
			/*  Content Filter  */
			$school;
			if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
				$school = 2;
			} else {
				$school = $_SESSION['school'];
			}
			$sql = $sqlquery . " AND carousel.school = '$school' ORDER BY carousel.id LIMIT 15";
			/*  END Content Filter  */

			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- Page Information  ***************/
        /*********************************************************************************************/

		public function pageInformation($database, $page, $subtab){
            $array = array();
			$type;
			$school;

			if($subtab == 'curriculum'){
				$school = 2;
				$type = strtoupper($page);
			} else {
				$type = 'Page';
				if($page == 'finance'){
					$school = 10;
				} else if($page == 'ssd'){
					$school = 11;
				} else if($page == 'tech'){
					$school = 1;
				} else if($page == 'maintenance'){
					$school = 7;
				} else {
					$school = 8;
				}
			}

			$sql = "SELECT web_content.id,
                           web_content.web_id, 
						   web_content.web_desc
					FROM web_content
					LEFT JOIN schools
                    ON (schools.id = web_content.school)
					WHERE web_content.web_type = '$type'
					AND web_content.school = '$school'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
        }

		public function pageFileList($database, $page, $subtab){

			$array = array();
			$sql = "SELECT links.*,
						   schools.school_abbv 
					FROM links
					LEFT JOIN schools
					ON (schools.id = links.school)
					WHERE links.link_tag LIKE '%$page%'
					AND links.status = 'Active'
					ORDER BY links.id DESC";

			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- BOE  ****************************/
        /*********************************************************************************************/

        public function chairInformation($database){
            $array = array();

			$sql = "SELECT * FROM contacts WHERE type = 'BOE' AND position = 'Board Chairperson'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

        public function vchairInformation($database){
            $array = array();

			$sql = "SELECT * FROM contacts WHERE type = 'BOE' AND position = 'Board Vice-Chairperson'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}
		
		public function trusteeInformation($database){
			
			$array = array();
			$sql = "SELECT * FROM contacts WHERE type = 'BOE' AND position = 'Board Trustee'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;

		}

		public function boeImage($database){
			
			$array = array();
			$sql = "SELECT * FROM web_content WHERE web_type = 'BOE'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;

		}

		/*********************************************************************************************/
		/***************************  Interaction Functionalities -- Policy **************************/
        /*********************************************************************************************/
		
		public function policyList($database){

			$array = array();
			$sql = "SELECT links.*,
						   schools.school_abbv 
					FROM links
					LEFT JOIN schools
					ON (schools.id = links.school)
					WHERE links.link_tag LIKE '%PolicyAP%'";

			$query = mysqli_query($database->con, $sql);
			if(!$query){
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
        }

    }

?>