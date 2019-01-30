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

        public function editAboutProgram($database, $id, $web_id, $web_desc){
			$sql = "UPDATE web_content SET 
						   web_desc = '$web_desc'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=content&page=about&error=true");
			} else {
				global $log;
				$info = "Modified the page information for web content ID: " . $web_id;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=about&editPageInfo=true");

			}
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
		
		public function addInquiry($database, $faq_question, $faq_answer){
			$faq_id = 'FAQ' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "INSERT INTO faqs
					VALUES (null, '$faq_id', '$faq_question', '$faq_answer', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				header("location: ../cms/interaction.php?tab=web&subtab=content&page=inquiries&error=true");
				// echo("Error description: " . mysqli_error($database->con));
			} else {

				global $log;
				$info = "Added a new inquiry information: " . $faq_id;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=inquiries&newInquiry=true");
			}

		}

		public function editInquiry($database, $id, $faq_id, $faq_question, $faq_answer){

			$sql = "UPDATE faqs SET 
						   faq_question = '$faq_question',
						   faq_answer = '$faq_answer'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=content&page=inquiries&error=true");
			} else {
				global $log;
				$info = "Modified inquiry information: " . $faq_id;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=inquiries&editInquiry=true");

			}			
		}

		public function disableInquiry($database, $id, $faq_id){

			$sql = "UPDATE faqs SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=content&page=inquiries&error=true");
			} else {
				global $log;
				$info = "Disabled inquiry information: " . $faq_id;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=inquiries&inquiryDisabled=true");

			}			
		}

    }

    require 'interaction_options.php';

?>