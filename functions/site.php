<?php

    Class Site {

        public function blogList($database, $school){
			$array = array();

			$sql = "SELECT posts.post_title,
                           posts.post_date,
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
                    ORDER BY posts.id DESC";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../site.php?page=index&error=true");
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
                    ORDER BY posts.id DESC
                    LIMIT 3";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
                 //header("location: ../site.php?page=index&error=true");
                return ("Error description: " . mysqli_error($database->con));
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        public function siteInformationSD92($database){

			$array;

			$sql = "SELECT * FROM schools WHERE id = '8'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../site.php?page=index&error=true");
			} else {
                    $array = mysqli_fetch_assoc($query);
            }
            
			return $array;            
        }

        public function categoryList($database){
			$array = array();

			$sql = "SELECT cat_id, cat_desc 
                    FROM categories
                    WHERE status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../site.php?page=index&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        public function announcementList($database, $school){
			$array = array();

            $sql =  "SELECT announcements.a_title
                    FROM announcements
                    LEFT JOIN schools
                    ON (announcements.a_school = schools.id)
                    WHERE announcements.a_school = '$school'
                    AND announcements.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../site.php?page=index&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;            
        }

        public function linkList($database, $tag, $school){
			$array = array();

            $sql =  "SELECT links.link_name,
                            links.link_type,
                            links.link_content,
                            links.link_thumbnail
                    FROM links
                    LEFT JOIN schools
                    ON (links.school = schools.id)
                    WHERE links.link_tag = '$tag'
                    AND links.school = '$school'
                    AND links.status = 'Active'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../site.php?page=index&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

    }

    require 'site_options.php';
?>