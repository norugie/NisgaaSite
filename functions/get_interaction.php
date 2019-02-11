<?php

    Class Interaction {

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- Web Content  ********************/
        /*********************************************************************************************/

        public function aboutList($database){
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
                    AND web_content.web_type = 'About'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				header("location: ../cms/interaction.php?tab=web&subtab=content&page=about&error=true");
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
				header("location: ../cms/interaction.php?tab=web&subtab=content&page=about&error=true");
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
        }

        public function faqList($database){
            $array = array();
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "SELECT faqs.id,
                           faqs.faq_id, 
						   faqs.faq_question,
						   faqs.faq_answer
					FROM faqs
					LEFT JOIN schools
                    ON (schools.id = faqs.school)
                    WHERE faqs.school = '$school'
                    AND faqs.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				header("location: ../cms/interaction.php?tab=web&subtab=content&page=inquiries&error=true");
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
				header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
			} else {
				$array = mysqli_fetch_assoc($query);
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
				if($page == 'sdo'){
					$school = 2;
				} else if($page == 'sss'){
					$school = 9;
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
				header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
				//echo("Error description: " . mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
        }

		public function pageInformationModify($database, $page, $subtab, $id){
            $array = array();

			$sql = "SELECT id,
                           web_id, 
						   web_desc
					FROM web_content
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
				//echo("Error description: " . mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

    }

?>