<?php

    Class Post {

		public function schoolList($database){
			
			$array = array();
			$sql = "SELECT * FROM schools";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
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
				$sql = $sqlquery . " AND posts.post_school = '$school' ORDER BY posts.post_date DESC";
			} else {
				$sql = $sqlquery . " ORDER BY posts.post_date DESC";
			}
			/*  END Content Filter  */

			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=blog&error=true");
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
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
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
					AND posts.status = 'Active'
					ORDER BY posts.post_date DESC";

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
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=blog&error=true");
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
					AND links.link_tag NOT LIKE '%Finance%'";
			
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
				$_SESSION['error_message'] = mysqli_error($database->con);
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
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
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
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
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
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=blog&error=true");
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
				$_SESSION['error_message'] = mysqli_error($database->con);
				header("location:../cms/post.php?tab=post&page=categories&error=true");
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
					AND posts.status = 'Active'
					ORDER BY posts.post_date DESC";

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
				$_SESSION['error_message'] = mysqli_error($database->con);
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
					AND posts.status = 'Active'
					ORDER BY posts.post_date DESC";
			
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
				$_SESSION['error_message'] = mysqli_error($database->con);
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
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

		public function mediaImages($database, $id){
            $array;
			$sql = "SELECT * FROM media WHERE post_id = '$id'";
			$query = mysqli_query($database->con, $sql);
			if(!$query){
				$_SESSION['error_message'] = mysqli_error($database->con);
			    header("location:../cms/post.php?tab=post&page=media&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
			return $array; 
		}

    }


?>