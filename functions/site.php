<?php

    Class Site {

        public function blogList($database, $school, $limit, $sheet_index){
			$array = array();

			$sql = "SELECT posts.post_title,
                           posts.post_date,
                           posts.post_desc,
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
                    ORDER BY posts.id DESC
                    LIMIT $sheet_index, $limit";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../?page=index&error=true");
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
			    header("location: ../?page=index&error=true");
			} else {
				$row = mysqli_fetch_array($query);
                $count = $row[0];
            }
            
			return $count;
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
                 //header("location: ../?page=index&error=true");
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
				header("location: ../?page=index&error=true");
				// echo("Error description: " . mysqli_error($database->con));
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
			    header("location: ../?page=index&error=true");
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
			    header("location: ../?page=index&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
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
			    header("location: ../?page=index&error=true");
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
			    header("location: ../?page=index&error=true");
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
			    header("location: ../?page=index&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;
        }

        public function jobList($database){
            $array = array();

            $sql =  "SELECT jobs.job_id,
                            jobs.title,
                            jobs.close_date,
                            jobs.file,
                            schools.school_abbv
                    FROM jobs
                    LEFT JOIN schools
                    ON (jobs.school = schools.id)
                    WHERE jobs.status = 'Open'";
			$query = mysqli_query($database->con, $sql);
			if (!$query) {
			    header("location: ../?page=index&error=true");
			} else {
				while($row = mysqli_fetch_array($query)){
					$array[] = $row;
				}
            }
            
			return $array;           
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
			    header("location: ../?page=index&error=true");
			} else {
				$array = mysqli_fetch_assoc($query);
            }
            
			return $array;
		}

    }

    require 'site_options.php';
?>