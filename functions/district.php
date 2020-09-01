<?php

    Class District {

		/*********************************************************************************************/
		/*************************  District Functionalities -- Employment  **************************/
		/*********************************************************************************************/

		public function disableJob($database, $id, $title){

			$sql = "UPDATE jobs SET 
						   status = 'Closed',
						   close_date = CURRENT_DATE()
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Closed the job posting for job ID:  " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&jobDisable=true");
			}	
	
		}

		public function reopenJob($database, $id, $title, $jobopen, $jobclose, $identifier){	

			$sql = "UPDATE jobs SET
						   open_date = '$jobopen',
						   close_date = '$jobclose', 
					status = 'Open'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info;
				if($identifier == 0){
					$info = "Reopened the job posting for job ID: " . $title;
					$log->logInput($database, $info);
	
					header("location:../cms/district.php?tab=sd&page=employment&jobReopen=true");
				} else {
					$info = "Modified the job posting for job ID: " . $title;
					$log->logInput($database, $info);

					header("location:../cms/district.php?tab=sd&page=employment&editJob=true");
				}
				
			}	
	
		}

		public function editJobFile($database, $id, $title, $file_name){	

			$sql = "UPDATE jobs SET
						   file = '$file_name'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Modified the job posting for job ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&editJob=true");
				
			}	
	
		}

		public function addJob($database, $id, $title, $jobdesc, $jobtype, $school, $jobopen, $jobclose, $file_name){
			
			$user = $_SESSION['id'];
			$sql = "INSERT INTO jobs
					VALUES (null, '$id', '$school', '$title', '$jobdesc', '$user', '$jobopen', '$jobclose', '$jobtype', '$file_name', 'Open')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Opened a job posting for job ID: " . $id;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&newJob=true");
			}

		}

		public function editJob($database, $id, $title, $jobtitle, $jobdesc, $jobtype, $school){

			$sql = "UPDATE jobs SET
						   job_id = '$title',
						   title = '$jobtitle',
						   job_desc = '$jobdesc',
						   job_type = '$jobtype',
						   school = '$school'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=employment&error=true");
			} else {
				global $log;
				$info = "Modified the job posting for job ID: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=employment&editJob=true");
				
			}				
		}

        /*********************************************************************************************/
		/***************************  District Functionalities -- Forms  *****************************/
        /*********************************************************************************************/

		public function disableForm($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Disabled file: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&formDisabled=true");
			}
		}

		public function reactivateForm($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Reactivated file: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&formReactivated=true");
			}
		}

		public function addForm($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Created a new district file: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&addForm=true");
			}			
		}

		public function editForm($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=files&error=true");
			} else {
				global $log;
				$info = "Modified form: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=files&editForm=true");
			}
		}

        /*********************************************************************************************/
		/***************************  District Functionalities -- Packages  **************************/
        /*********************************************************************************************/

		public function disablePackage($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Disabled Board Meeting Package: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&packageDisabled=true");
			}
		}

		public function reactivatePackage($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Reactivated Board Meeting Package: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&packageReactivated=true");
			}
		}

		public function addPackage($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Created a new Board Meeting Package: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&addPackage=true");
			}			
		}

		public function editPackage($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=packages&error=true");
			} else {
				global $log;
				$info = "Modified Board Meeting Package: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=packages&editPackage=true");
			}
		}

		/*********************************************************************************************/
		/***************************  District Functionalities -- Minutes  ***************************/
        /*********************************************************************************************/

		public function disableMinutes($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=minutes&error=true");
			} else {
				global $log;
				$info = "Disabled Board Meeting Minutes: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=minutes&minutesDisabled=true");
			}
		}

		public function reactivateMinutes($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=minutes&error=true");
			} else {
				global $log;
				$info = "Reactivated Board Meeting Minutes: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=minutes&minutesReactivated=true");
			}
		}

		public function addMinutes($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=minutes&error=true");
			} else {
				global $log;
				$info = "Created a new Board Meeting Minutes: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=minutes&addMinutes=true");
			}			
		}

		public function editMinutes($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=minutes&error=true");
			} else {
				global $log;
				$info = "Modified Board Meeting Minutes: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=minutes&editMinutes=true");
			}
		}

		/*********************************************************************************************/
		/***************************  District Functionalities -- Directives  ************************/
        /*********************************************************************************************/

		public function disableDirective($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=directives&error=true");
			} else {
				global $log;
				$info = "Disabled a process/directive: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=directives&directiveDisabled=true");
			}
		}

		public function reactivateDirective($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=directives&error=true");
			} else {
				global $log;
				$info = "Reactivated a process/directive: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=directives&directiveReactivated=true");
			}
		}

		public function addDirective($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=directives&error=true");
			} else {
				global $log;
				$info = "Created a new process/directive: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=directives&addDirective=true");
			}			
		}

		public function editDirective($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=directives&error=true");
			} else {
				global $log;
				$info = "Modified a process/directive: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=directives&editDirective=true");
			}
		}

		/*********************************************************************************************/
		/***************************  District Functionalities -- Policy  ****************************/
        /*********************************************************************************************/

		public function disablePolicy($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=policy&error=true");
			} else {
				global $log;
				$info = "Disabled a policy: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=policy&policyDisabled=true");
			}
		}

		public function reactivatePolicy($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=policy&error=true");
			} else {
				global $log;
				$info = "Reactivated a policy: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=policy&policyReactivated=true");
			}
		}

		public function addPolicy($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=policy&error=true");
			} else {
				global $log;
				$info = "Created a new policy: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=policy&addPolicy=true");
			}			
		}

		public function editPolicy($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=policy&error=true");
			} else {
				global $log;
				$info = "Modified a policy: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=policy&editPolicy=true");
			}
		}

		/*********************************************************************************************/
		/***************************  District Functionalities -- Plan  ******************************/
        /*********************************************************************************************/

		public function disablePlan($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Inactive'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=plans&error=true");
			} else {
				global $log;
				$info = "Disabled a plan: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=plans&planDisabled=true");
			}
		}

		public function reactivatePlan($database, $id, $title){
			$sql = "UPDATE links SET 
						   status = 'Active'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=plans&error=true");
			} else {
				global $log;
				$info = "Reactivated a plan: " . $title;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=plans&planReactivated=true");
			}
		}

		public function addPlan($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail){
			$link_id = 'LNK' . rand(1111111,9999999);
			$user = $_SESSION['id'];
			$school = 2;

			$sql = "INSERT INTO links
					VALUES (null, '$link_id', '$link_name', '$link_type', '$link_tag', '$link_desc', '$link_content', '$link_thumbnail', '$user', '$school', 'Active')";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=plans&error=true");
			} else {
				global $log;
				$info = "Created a new plan: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=plans&addPlan=true");
			}			
		}

		public function editPlan($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag){
			$sql = "UPDATE links SET 
						   link_name = '$link_name',
						   link_desc = '$link_desc',
						   link_tag  = '$link_tag',
						   link_content = '$link_content'
					WHERE id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/district.php?tab=sd&page=plans&error=true");
			} else {
				global $log;
				$info = "Modified a plan: " . $link_name;
				$log->logInput($database, $info);

				header("location:../cms/district.php?tab=sd&page=plans&editPlan=true");
			}
		}

    }

    require 'district_options.php';

?>