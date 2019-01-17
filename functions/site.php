<?php

    Class Site {

        public function blogList($database, $school){
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

    }

    require 'site_options.php';
?>