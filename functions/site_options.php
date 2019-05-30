<?php

    session_start();

    $currentCookieParams = session_get_cookie_params();  
    $sidvalue = session_id();  
    setcookie(  
        'PHPSESSID',    //name  
        $sidvalue,  //value  
        0,  //expires at end of session  
        $currentCookieParams['path'],   //path  
        $currentCookieParams['domain'], //domain  
        true,   //secure
        true  
    );

    require 'connect.php';

    $database = new Database();
    $site = new Site();
    
    if(isset($_GET['apply'])){
        
        // Job Information
        $job = $_GET['job'];
        $jobid = $_GET['id'];

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

        // Mail Information
        $mailto   = 'rbarrameda@nisgaa.bc.ca'; // Change to the HR email once ready
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

        if(isset($_FILES['resume'])){
            $errors = 0;
            $file_name = $_FILES['resume']['name'];
            $file_size = $_FILES['resume']['size'];
            $file_tmp = $_FILES['resume']['tmp_name'];
            $file_type = $_FILES['resume']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['resume']['name'])));
            
            if($file_size > 20971520){
                $errors = 1;
            }
            
            if($errors == 0){
                move_uploaded_file($file_tmp, "../jobs/resumes/".$file_name);
                $filename = $file_name;
            } else {
                header("location: ../error");
            }
        }

        $path = "../jobs/resumes/";
        $file = $path.$filename;
    
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
    }

?>