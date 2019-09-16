<?php

    session_start();

    require 'security_cookies.php';

    require 'connect.php';

    $database = new Database();
    $site = new Site();
    
    if(isset($_GET['apply']) && isset($_GET['id']) && !empty($_GET['id'])){

        // Job Information
        $job = $_GET['job'];
        $jobid = $_GET['id'];
        $job_id = $_GET['jobid'];

        // Applicant Information
        $firstname = mysqli_real_escape_string($database->con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($database->con, $_POST['lastname']);
        $address = mysqli_real_escape_string($database->con, $_POST['address']);
        $city = mysqli_real_escape_string($database->con, $_POST['city']);
        $province = mysqli_real_escape_string($database->con, $_POST['province']);
        $country = mysqli_real_escape_string($database->con, $_POST['country']);
        $postal = mysqli_real_escape_string($database->con, $_POST['postal']);
        $email = mysqli_real_escape_string($database->con, $_POST['email']);
        $phone = mysqli_real_escape_string($database->con, $_POST['phone']);
        $degree = mysqli_real_escape_string($database->con, $_POST['degree']);
        $title;
        if($degree == 'No' || mysqli_real_escape_string($database->con, $_POST['title']) == ''){
            $title = 'No degree title provided';
        } else {
            $title = mysqli_real_escape_string($database->con, $_POST['title']);
        }
        $filename;

        if(isset($_FILES['resume'])){
            $errors = 0;
            $file_name = $_FILES['resume']['name'];
            $file_size = $_FILES['resume']['size'];
            $file_tmp = $_FILES['resume']['tmp_name'];
            $file_type = $_FILES['resume']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['resume']['name'])));
            
            if($file_size > 2097152){
                $errors = 1;
            }
            
            if($errors == 0){
                move_uploaded_file($file_tmp, "../jobs/resumes/".$file_name);
                $filename = $file_name;
            } else {
                header("location: ../error");
            }
        }

        // Add application information to database
        $fullname = $firstname . " " . $lastname;
        $fulladdress = $address . ', ' . $city . ', ' . $province . ', ' . $country . ', ' . $postal;
        $appinforesult;
        if(isset($firstname) && !empty($firstname) && isset($lastname) && !empty($lastname) && isset($email) && !empty($email)){
            $appinforesult = $site->addResume($database, $fullname, $fulladdress, $email, $phone, $degree, $title, $filename, $job_id);
        } else {
            header("location: ../error");
        }
        
        if(isset($appinforesult) &&!empty($appinforesult) && $appinforesult == 1){
            $path = "../jobs/resumes/";
            $file = $path.$filename;
        
            // Mail Information
            $mailto   = 'hr@nisgaa.bc.ca'; // Change to the HR email once ready
            $mailfrom = 'sd92@nisgaa.bc.ca';
            $mailname = 'SDO';
            $subject  = 'Application for JOB ID: ' . $jobid;
    
            $message  = '<b>Applicant Name: </b>' . $firstname . ' ' . $lastname . '<br>
                        <b>Email: </b>' . $email . '<br>
                        <b>Phone: </b>' . $phone . '<br>
                        <b>Address: </b>' . $address . ', ' . $city . ', ' . $province . ', ' . $country . ', ' . $postal . '<br>
                        <b>Applying For: </b>' . $job . '<br>
                        <b>Degree: </b>' . $degree . '<br>
                        <b>Degree Title: </b>' . $title;
    
            // Get file
            $content = file_get_contents($file);
            $content = chunk_split(base64_encode($content));
            $uid = md5(uniqid(time()));
            $name = basename($file);
            
            // Header
            $header = "From: ".$mailname." <".$mailfrom.">\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
            
            // Message & attachment
            $nmessage = "--".$uid."\r\n";
            $nmessage .= "Content-type:text/html; charset=UTF-8\r\n";
            $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $nmessage .= $message."\r\n\r\n";
            $nmessage .= "--".$uid."\r\n";
            $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
            $nmessage .= "Content-Transfer-Encoding: base64\r\n";
            $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
            $nmessage .= $content."\r\n\r\n";
            $nmessage .= "--".$uid."--";
            
            if (mail($mailto, $subject, $nmessage, $header)) {
                header("location: ../careers/read/" . $jobid);
            } else {
                header("location: ../error");
            }
        } else {
            header("location: ../error");
        }

    }

?>