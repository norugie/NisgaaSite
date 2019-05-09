<?php

    Class Post {

		public function schoolList($database){
			
			$array = array();
			$sql = "SELECT * FROM schools";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/?error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Blog Posts  ***************************/
        /*********************************************************************************************/

		public function postList($database){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.post_title,
						   posts.post_date,
						   posts.post_school,
						   posts.id,
						   posts.post_id,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM posts
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE posts.post_type = 'Post' 
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
			if (!$query) {
				//header("location:../cms/post.php?tab=post&page=blog&error=true");
				echo("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;			
		}

		public function postInformation($database, $id){
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
					WHERE posts.post_type = 'Post' 
					AND posts.id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		public function postsPerCategoryList($database, $category){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.post_title,
						   posts.post_date,
						   posts.post_school,
						   posts.id,
						   posts.post_id,
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
				$sql = $sqlquery . " AND posts.post_school = '$school'";
			} else {
				$sql = $sqlquery;
			}
			/*  END Content Filter  */

			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        /*********************************************************************************************/
		/***********************  Posts Functionalities -- Announcements Posts ***********************/
        /*********************************************************************************************/

		public function announcementList($database){
			$array = array();
			$sql;
			$sqlquery = "SELECT announcements.*,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM announcements
					LEFT JOIN users
					ON (users.id = announcements.a_author)
					LEFT JOIN schools
					ON (schools.id = announcements.a_school)
					WHERE announcements.status = 'Active'";

			/*  Content Filter  */
			if($_SESSION['type'] != 1){
				$school;
				if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){
					$school = 2;
				} else {
					$school = $_SESSION['school'];
				}
				$sql = $sqlquery . " AND announcements.a_school = '$school'";
			} else {
				$sql = $sqlquery;
			}
			/*  END Content Filter  */

			$query = mysqli_query($database->con, $sql);
			if (!$query) {
				header("location:../cms/post.php?tab=post&page=announcements&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;			
		}

		public function announcementInformation($database, $id){
			$array;
			$sql = "SELECT announcements.*,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM announcements
					LEFT JOIN users
					ON (users.id = announcements.a_author)
					LEFT JOIN schools
					ON (schools.id = announcements.a_school)
					WHERE announcements.id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				$array = mysqli_fetch_assoc($query);
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
					WHERE links.link_tag != 'District Forms'";
			
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
			if (!$query) {
				// echo("Error description: " . mysqli_error($database->con));
				header("location: ../cms/post.php?tab=post&page=links&error=true");
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
			if (!$query) {
			    header("location: ../cms/post.php?tab=post&page=categories&error=true");
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
					AND id != '1'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../cms/post.php?tab=post&page=categories&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
			
		}

		public function postsAndMediaPerCategoryCount($database, $category){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.*,
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
			if (!$query) {
				//header("location:../cms/post.php?tab=post&page=blog&error=true");
				echo("Error description: " . mysqli_error($database->con));
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
			if (!$query) {
				header("location:../cms/post.php?tab=post&page=categories&error=true");
				//echo("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        /*********************************************************************************************/
		/***************************  Posts Functionalities -- Media Posts ***************************/
		/*********************************************************************************************/

		public function mediaPerCategoryList($database, $category){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.post_title,
						   posts.post_date,
						   posts.post_school,
						   posts.id,
						   posts.post_id,
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
					AND posts.post_type = 'Media'
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
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
		}

		public function mediaList($database){
			$array = array();
			$sql;
			$sqlquery = "SELECT posts.post_title,
						   posts.post_date,
						   posts.post_school,
						   posts.id,
						   posts.post_id,
						   users.firstname,
						   users.lastname,
						   schools.school_abbv
					FROM posts
					LEFT JOIN users
					ON (users.id = posts.post_author)
					LEFT JOIN schools
					ON (schools.id = posts.post_school)
					WHERE posts.post_type = 'Media' 
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
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;			
		}

		public function mediaInformation($database, $id){
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
					WHERE posts.post_type = 'Media' 
					AND posts.id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

    }


?>