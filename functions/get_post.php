<?php

	require 'get_error_log.php';
	$error =  new ErrorLog();

    Class Post {

		public function schoolList($database){
			
			$array = array();
			$sql = "SELECT * FROM schools";
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

		/*********************************************************************************************/
		/***************************  Posts Functionalities -- Posts Integrated  *********************/
		/*********************************************************************************************/
		
		public function postsIntegratedList($database){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.post_title,
						   posts.post_date,
						   posts.post_school,
						   posts.id,
						   posts.post_id,
						   posts.post_type,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM posts
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school) 
					WHERE posts.status = 'Active'";

			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND posts.post_school = '$school' ORDER BY posts.post_date DESC";
			} else if($_SESSION['type'] == 5){
				$sql = $sqlquery . " AND posts.post_gcc = 'Yes' OR posts.post_ss = 'Yes' ORDER BY posts.post_date DESC";
			} else {
				$sql = $sqlquery . " AND posts.post_school = '2' ORDER BY posts.post_date DESC";
			}
			/*  END Content Filter  */

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

		public function postInformationIntegrated($database, $id){
			$array;
			$sql = "SELECT posts.*,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM posts
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE posts.id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				global $error;
				echo $error->errorMessage(mysqli_error($database->con));
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		public function postsPerCategoryListIntegrated($database, $category){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.post_title,
						   posts.post_date,
						   posts.post_school,
						   posts.id,
						   posts.post_id,
						   posts.post_type,
						   categories.cat_desc,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM post_categories 
					LEFT JOIN posts
					ON (posts.id = post_categories.post_id)
					LEFT JOIN categories
					ON (categories.id = post_categories.cat_id)
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE post_categories.cat_id = '$category'
					AND posts.post_type = 'Post'
					AND posts.status = 'Active'";

			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND posts.post_school = '$school' ORDER BY posts.post_date DESC";
			} else {
				$sql = $sqlquery . " ORDER BY posts.post_date DESC";
			}
			/*  END Content Filter  */

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

		public function postImagesIntegrated($database, $id){
            $array;
			$sql = "SELECT * FROM media WHERE post_id = '$id' ORDER BY id DESC";
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
		
		/*********************************************************************************************/
		/***************************  District Functionalities -- Events  ****************************/
		/*********************************************************************************************/

        public function eventList($database){
            
			$array = array();
			$sql;
			$sqlquery = "SELECT events.*, 
						   users.firstname, 
						   users.lastname, 
						   schools.school_abbv, 
						   schools.school_name,
						   GROUP_CONCAT(event_days.event_date_day_start),
						   GROUP_CONCAT(event_days.event_date_day_end),
						   GROUP_CONCAT(event_days.event_date_time)
					FROM events
					LEFT JOIN users
					ON (users.id = events.user)
					LEFT JOIN schools
					ON (schools.id = events.school)
					LEFT JOIN event_days
					ON (event_days.event = events.id)
					WHERE events.status != 'Done'";
			
			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND events.school = '$school' GROUP BY event_days.event";
			} else {
				$sql = $sqlquery . " GROUP BY event_days.event";
			}
			/*  END Content Filter  */

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

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Links  ********************************/
        /*********************************************************************************************/
		
		public function linkList($database){

			$array = array();
			$sql;
			$sqlquery = "SELECT links.*,
						   schools.school_abbv 
					FROM links
					LEFT JOIN schools
					ON (schools.id = links.school)
					WHERE links.link_tag != 'District Forms'
					AND links.link_tag != 'Board Meeting Packages'
					AND links.link_tag != 'Help'
					AND links.link_tag NOT LIKE '%Finance%'
					AND links.link_tag NOT LIKE '%PolicyP%'
					AND links.link_tag NOT LIKE '%PolicyAP%'";
			
			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND links.school = '$school'";
			} else {
				$sql = $sqlquery;
			}
			/*  END Content Filter  */

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

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Categories  ***************************/
        /*********************************************************************************************/

		public function categoryList($database){
			
			$array = array();
			$sql = "SELECT * FROM categories
					WHERE status = 'Active'";
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

		public function categoryListNoEventNoAnnouncement($database){
			
			$array = array();
			$sql = "SELECT * FROM categories
					WHERE status = 'Active'
					AND id != '1'
					AND id != '2'";
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

		public function postsPerCategoryCount($database, $category){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.id,
						   categories.cat_desc
					FROM post_categories 
					LEFT JOIN posts
					ON (posts.id = post_categories.post_id)
					LEFT JOIN categories
					ON (categories.id = post_categories.cat_id)
					LEFT JOIN schools
					ON (posts.post_school = schools.id)
					WHERE post_categories.cat_id = '$category'
					AND posts.status = 'Active'";
			
			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND posts.post_school = '$school'";
			} else {
				$sql = $sqlquery;
			}
			/*  END Content Filter  */

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

		public function categoriesPerPostList($database, $post){
			$array = array();
			$sql = "SELECT categories.cat_desc,
						   categories.id
					FROM categories 
					LEFT JOIN post_categories
					ON (categories.id = post_categories.cat_id)
					WHERE post_categories.post_id = '$post'
					AND categories.status = 'Active'";
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