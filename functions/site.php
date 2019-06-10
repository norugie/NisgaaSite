<?php

    Class Site {

		/*********************************************************************************************/
		/***************************  Site Functionalities -- General  *******************************/
		/*********************************************************************************************/
		
        public function siteInformation($database, $school){

			$array;

			$sql = "SELECT * FROM schools WHERE id = '$school'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
                    $array = mysqli_fetch_assoc($query);
            }
            
			return $array;            
        }

        public function linkList($database, $tag, $school){
			$array = array();
			$sql;
            $sqlquery =  "SELECT links.link_name,
							links.link_desc,
                            links.link_type,
                            links.link_content,
                            links.link_thumbnail
                    FROM links
                    LEFT JOIN schools
                    ON (links.school = schools.id)
                    WHERE links.link_tag = '$tag'
                    AND links.school = '$school'
					AND links.status = 'Active'";

			if($tag == 'Board Meeting Packages'){
				$sql = $sqlquery . " ORDER BY links.id DESC";
			} else if($tag == 'District Forms') {
				$sql = $sqlquery . " ORDER BY links.link_name ASC";
			} else if(strpos($tag, 'Finance') !== false){
				$sql = $sqlquery . " ORDER BY links.id DESC";
			} else {
				$sql = $sqlquery;
			}

			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

		public function blogSearchResults($database, $keyword, $school){
			$array = array();

			$sql = "SELECT posts.post_title,
                           posts.post_date,
						   posts.post_id,
						   posts.post_desc,
                           posts.post_thumbnail,
                           users.firstname,
						   users.lastname
					FROM posts
					LEFT JOIN users
                    ON (users.id = posts.post_author)
                    LEFT JOIN schools
                    ON (schools.id = posts.post_school)
                    WHERE posts.post_school = '$school'
                    AND posts.status = 'Active'
					AND (
						posts.post_title LIKE '%$keyword%'
						OR users.firstname LIKE '%$keyword%'
						OR users.lastname LIKE '%$keyword%'
					)
                    ORDER BY posts.id DESC";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
                 //echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
                return ("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

		public function resourcesSearchResults($database, $keyword, $school){
			$array = array();
	
			$sql = "SELECT links.link_name,
							links.link_type,
							links.link_content,
							links.link_thumbnail
					FROM links
					LEFT JOIN schools
					ON (links.school = schools.id)
					WHERE links.school = '$school'
					AND links.status = 'Active'
					AND links.link_name LIKE '%$keyword%'
					AND (
						links.link_tag = 'General Resources'
						OR links.link_tag = 'Teacher Resources'
						OR links.link_tag = 'Learning Resources'
					)";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				 //echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
				return ("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}
			
			return $array;
		}

		public function formsSearchResults($database, $keyword, $school){
			$array = array();
	
			$sql = "SELECT links.link_name,
							links.link_type,
							links.link_content,
							links.link_thumbnail
					FROM links
					LEFT JOIN schools
					ON (links.school = schools.id)
					WHERE links.school = '$school'
					AND links.status = 'Active'
					AND links.link_name LIKE '%$keyword%'
					AND links.link_tag = 'District Forms'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				 //echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
				return ("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
			}
			
			return $array;
		}

		/*********************************************************************************************/
		/***************************  Site Functionalities -- Home  **********************************/
        /*********************************************************************************************/
		
		public function carouselImages($database, $school){
			$array = array();

			$sql =  "SELECT carousel.carousel_name,
							carousel.carousel_desc
					FROM carousel
					LEFT JOIN schools
					ON (schools.id = carousel.school)
					WHERE carousel.school = '$school'
					AND carousel.status = 'Active'
					LIMIT 5";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

        public function blogListIndex($database, $school){
			$array = array();

			$sql = "SELECT posts.post_title,
                           posts.post_date,
						   posts.post_id,
                           posts.post_thumbnail,
                           users.firstname,
						   users.lastname
					FROM posts
					LEFT JOIN users
                    ON (users.id = posts.post_author)
                    LEFT JOIN schools
                    ON (schools.id = posts.post_school)
                    WHERE posts.post_school = '$school'
                    AND posts.status = 'Active'
                    ORDER BY posts.post_date DESC
                    LIMIT 3";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
                 //echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
                return ("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        public function eventList($database, $school){
            
			$array = array();

			$sql = "SELECT events.event_name,
                           posts.post_id, 
						   GROUP_CONCAT(event_days.event_date_day_start),
						   GROUP_CONCAT(event_days.event_date_day_end),
						   GROUP_CONCAT(event_days.event_date_time)
					FROM events
					LEFT JOIN posts
					ON (posts.id = events.post)
					LEFT JOIN schools
					ON (schools.id = events.school)
					LEFT JOIN event_days
					ON (event_days.event = events.id)
					WHERE events.status = 'Active'
                    AND events.school = '$school'
                    GROUP BY event_days.event
                    LIMIT 3";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
				// echo("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }

			return $array;

		}

		public function weeklyWord($database){
            $array;
			$sql = "SELECT dictionary.word,
						   dictionary.word_meaning,
						   dictionary.form	    
					FROM weeklyword
					LEFT JOIN dictionary
					ON (dictionary.id = weeklyword.word_id)
					WHERE weeklyword.status = 'Active'
					LIMIT 1";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				// echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
				return ("Error description: " . mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		/*********************************************************************************************/
		/***************************  Site Functionalities -- District Information  ******************/
		/*********************************************************************************************/
		
		public function contactList($database, $school){
			$array = array();

            $sql =  "SELECT contacts.*
                    FROM contacts
                    LEFT JOIN schools
                    ON (contacts.school = schools.id)
                    WHERE contacts.school = '$school'
					AND contacts.type = 'Contact'
                    AND contacts.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;            
		}

		public function schoolList($database){
            $array = array();

            $sql =  "SELECT * FROM schools WHERE id NOT IN (1, 2, 7, 8, 9, 10)";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;           
		}

		public function departmentList($database){
            $array = array();

            $sql =  "SELECT * FROM schools WHERE id NOT IN (2, 3, 4, 5, 6, 8, 9) ORDER BY id DESC";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;           
		}

		public function aboutList($database, $school){
            $array = array();

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
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
        }

        public function programList($database, $school){
            $array = array();

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
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		public function faqList($database, $school){
            $array = array();

			$sql = "SELECT faqs.faq_question,
						   faqs.faq_answer
					FROM faqs
					LEFT JOIN schools
                    ON (schools.id = faqs.school)
                    WHERE faqs.school = '$school'
                    AND faqs.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

		/*********************************************************************************************/
		/***************************  Site Functionalities -- Departments  ***************************/
		/*********************************************************************************************/
		
		public function departmentInformation($database, $page){
            $array = array();
			$school;
			
			if($page == 'finance'){
				$school = 10;
			} else if($page == 'sdss'){
				$school = 9;
			} else if($page == 'tech'){
				$school = 1;
			} else if($page == 'maintenance'){
				$school = 7;
			} else {
				$school = 8;
			}

			$sql = "SELECT id,
                           web_id, 
						   web_desc
					FROM web_content
					WHERE web_type = 'Page'
					AND school = '$school'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		/*********************************************************************************************/
		/***************************  Site Functionalities -- Curriculum  ****************************/
		/*********************************************************************************************/
		
		public function curriculumInformation($database, $page){
            $array = array();
			$page = strtoupper($page); 

			$sql = "SELECT id,
                           web_id, 
						   web_desc
					FROM web_content
                    WHERE web_type = '$page'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		/*********************************************************************************************/
		/***************************  Site Functionalities -- Miscellaneous  *************************/
		/*********************************************************************************************/
		
		public function cultureInformation($database){
            $array = array();

			$sql = "SELECT id,
                           web_id, 
						   web_desc
					FROM web_content
					WHERE web_type = 'Culture'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		/*********************************************************************************************/
		/***************************  Site Functionalities -- Governance  ****************************/
		/*********************************************************************************************/
		
		public function boeImageInformation($database){
            $array = array();

			$sql = "SELECT web_desc FROM web_content WHERE web_type = 'BOE'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
        }

		public function boeInformation($database){
			
			$array = array();
			$sql = "SELECT * FROM contacts WHERE type = 'BOE' ORDER BY photo_position ASC";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;

		}

		/*********************************************************************************************/
		/***************************  Site Functionalities -- District News  *************************/
        /*********************************************************************************************/
		
		public function blogList($database, $school, $limit, $sheet_index){
			$array = array();

			$sql = "SELECT posts.post_title,
                           posts.post_date,
                           posts.post_desc,
						   posts.id,
                           posts.post_id,
                           posts.post_thumbnail,
                           users.firstname,
						   users.lastname
					FROM posts
					LEFT JOIN users
                    ON (users.id = posts.post_author)
                    LEFT JOIN schools
                    ON (schools.id = posts.post_school)
                    WHERE posts.post_school = '$school'
                    AND posts.status = 'Active'
                    ORDER BY posts.post_date DESC
                    LIMIT $sheet_index, $limit";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        public function blogListCount($database, $school){
			$count;

            $sql = "SELECT COUNT(*) FROM posts WHERE post_school = '$school' AND status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$row = mysqli_fetch_array($query);
                $count = $row[0];
            }
            
			return $count;
		}

		public function postInformation($database, $id){
            $array;
            $post_id = 'PST' . $id;
			$sql = "SELECT posts.*,
						   users.firstname,
						   users.lastname
					FROM posts
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE posts.post_id = '$post_id'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

        public function categoryListPerPost($database, $post_id){
            $array = array();

			$sql = "SELECT categories.cat_id,
                           categories.cat_desc 
                    FROM post_categories
                    LEFT JOIN categories
                    ON (post_categories.cat_id = categories.id)
                    LEFT JOIN posts
                    ON (post_categories.post_id = posts.id)
                    WHERE categories.status = 'Active'
                    AND post_categories.post_id = '$post_id'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;           
        }

		/*********************************************************************************************/
		/***************************  Site Functionalities -- Careers  *******************************/
        /*********************************************************************************************/

        public function jobList($database){
            $array = array();

            $sql =  "SELECT jobs.job_id,
                            jobs.title,
                            jobs.close_date,
                            jobs.file,
                            schools.school_name
                    FROM jobs
                    LEFT JOIN schools
                    ON (jobs.school = schools.id)
                    WHERE jobs.status = 'Open'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;           
		}
		
		public function cjobList($database){
            $array = array();

            $sql =  "SELECT jobs.job_id,
                            jobs.title,
                            jobs.close_date,
                            jobs.file,
                            schools.school_abbv
                    FROM jobs
                    LEFT JOIN schools
                    ON (jobs.school = schools.id)
					WHERE jobs.status = 'Closed'
					ORDER BY jobs.close_date DESC
					LIMIT 15";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;           
		}

		public function jobInformation($database, $id){
            $array;
            $job_id = 'JOB' . $id;
			$sql = "SELECT jobs.*,
						   schools.school_name	    
					FROM jobs 
					LEFT JOIN schools
					ON (schools.id = jobs.school)
					WHERE jobs.job_id = '$job_id'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				// echo "<script>window.open('https://webdev.nisgaa.bc.ca/error', '_parent');</script>";
				return ("Error description: " . mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}




		



















	}

    require 'site_options.php';
?>