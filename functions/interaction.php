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
				$info = "Modified the page information for About page";
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

		public function disableContact($database, $id, $contact_role){
			$sql = "UPDATE contacts SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
			} else {
				global $log;
				$info = "Disabled contact entry for " . $contact_role;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&contactDisabled=true");

			}
		}

		public function reactivateContact($database, $id, $contact_role){
			$sql = "UPDATE contacts SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
			} else {
				global $log;
				$info = "Reactivated contact entry for " . $contact_role;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&contactReactivated=true");

			}
		}

		public function addContact($database, $position, $firstname, $lastname, $email, $phone, $photo){
			$school;

			if($_SESSION['type'] == 4){
				$school = $_SESSION['school'];
			} else {
				$school = 2;
			}

			$sql = "INSERT INTO contacts
					VALUES(null, '$firstname', '$lastname', '$position', null, 'Contact', '$phone', '$email', null, '$school', '$photo', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
			} else {
			global $log;
			$info = "Added new contact: " . $firstname . " " . $lastname;
			$log->logInput($database, $info);

			header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&newContact=true");

			}
		}

		public function editContact($database, $id, $position, $firstname, $lastname, $email, $phone, $photo){
			$sql = "UPDATE contacts SET 
						   firstname = '$firstname',
						   lastname = '$lastname',
						   email = '$email',
						   phone = '$phone',
						   photo = '$photo',
						   position = '$position'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
			} else {
				global $log;
				$info = "Modified information for " . $firstname . " " . $lastname;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&editContactInformation=true");

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

		public function disablePageFile($database, $id, $title, $page, $subtab){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
			} else {
				global $log;
				$info = "Disabled" . $page . " file: " . $title;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&disabledFinance=true");
			}
		}

		public function addFinance($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail, $page, $subtab){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
			} else {
				global $log;
				$info = "Created a new finance file: " . $link_name;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&addFinance=true");
			}			
		}

		public function editFinance($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag, $page, $subtab){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
			} else {
				global $log;
				$info = "Modified finance file: " . $link_name;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&editFinance=true");
			}
		}

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- BOE  ****************************/
		/*********************************************************************************************/
		
		public function editBOE($database, $id, $position, $firstname, $lastname, $email, $phone, $position_specifics, $writeup, $photo){
			$sql = "UPDATE contacts SET 
						   firstname = '$firstname',
						   lastname = '$lastname',
						   email = '$email',
						   phone = '$phone',
						   position_specifics = '$position_specifics',
						   contact_desc = '$writeup',
						   photo = '$photo'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&&page=boe&error=true");
			} else {
				global $log;
				$info = "Modified BOE information for " . $firstname . " " . $lastname;
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&page=boe&editBOEInformation=true");

			}
		}

		/*********************************************************************************************/
		/***************************  Interaction Functionalities -- Culture Corner  *****************/
        /*********************************************************************************************/

		public function editCultureCorner($database, $id, $culture_name, $culture_desc){

			$sql = "UPDATE web_content SET 
						   web_desc = '$culture_desc'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
			    header("location: ../cms/interaction.php?tab=web&page=culture&error=true");
			} else {
				global $log;
				$info = "Modified page information for: Culture Corner";
				$log->logInput($database, $info);

				header("location: ../cms/interaction.php?tab=web&page=culture&editCultureCorner=true");

			}			
		}

    }

    require 'interaction_options.php';

?>