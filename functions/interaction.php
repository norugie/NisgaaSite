<?php

    Class Interaction {

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- Web Content  ********************/
        /*********************************************************************************************/

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

		public function editSchool($database, $id, $school_name_id, $school_name, $school_addr, $school_abbv, $school_email, $school_phone) {
			$sql = "UPDATE schools SET 
						   school_abbv = '$school_abbv',
						   school_name = '$school_name',
						   school_addr = '$school_addr',
						   school_email = '$school_email',
						   school_phone = '$school_phone'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
			} else {
				global $log;
				$info = "Modified the schoold information for: " . $school_name_id;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&editSchool=true");

			}			
		}

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- Page Information  ***************/
        /*********************************************************************************************/

		public function editPageInformation($database, $id, $curdept_name, $curdept_desc, $page, $subtab){

			$sql = "UPDATE web_content SET 
						   web_desc = '$curdept_desc'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
			} else {
				global $log;
				$info = "Modified page information for: " . $page;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&editPageInformation=true");

			}			
		}
    }

    require 'interaction_options.php';

?>