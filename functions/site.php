<?php

    Class Site {

        public function blogList($database, $school){
			$array = array();

			$sql = "SELECT posts.*,
                           users.firstname,
						   users.lastname
					FROM posts
					LEFT JOIN users
                    ON (users.id = posts.post_author)
                    LEFT JOIN schools
                    ON (schools.id = posts.post_school)
                    WHERE posts.post_school = '$school'
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

    }

    require 'site_options.php';
?>