<?php

    if(isset($_GET['interaction'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $interaction = new Interaction();
        $log = new Log();
        
        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- Web Content  ********************/
        /*********************************************************************************************/

        if(isset($_GET['editAboutProgram'])){
            $id = mysqli_real_escape_string($database->con, $_POST['about_programs_id']);
            $web_id = mysqli_real_escape_string($database->con, $_POST['about_programs_name']);
            $web_desc = mysqli_real_escape_string($database->con, $_POST['edit_field_name']);

            $interaction->editAboutProgram($database, $id, $web_id, $web_desc);
        }

        if(isset($_GET['newInquiry'])){
            $faq_question = mysqli_real_escape_string($database->con, $_POST['faq_question']);
            $faq_answer = mysqli_real_escape_string($database->con, $_POST['faq_answer']);
        
            $interaction->addInquiry($database, $faq_question, $faq_answer);
        }

        if(isset($_GET['editInquiry'])){
            $id = mysqli_real_escape_string($database->con, $_POST['faq_id']);
            $faq_id = mysqli_real_escape_string($database->con, $_POST['faq_name']);
            $faq_question = mysqli_real_escape_string($database->con, $_POST['faq_question']);
            $faq_answer = mysqli_real_escape_string($database->con, $_POST['faq_answer']);
        
            $interaction->editInquiry($database, $id, $faq_id, $faq_question, $faq_answer);
        }

        if(isset($_GET['inquiryDisable'])){
            $id = $_GET['id'];
            $faq_id = $_GET['faq_id'];

            $interaction->disableInquiry($database, $id, $faq_id);
        }

        if(isset($_GET['editSchoolInfo'])){
            $id = mysqli_real_escape_string($database->con, $_POST['school_id']);
            $school_name_id = mysqli_real_escape_string($database->con, $_POST['school_id_name']);
            $school_name = mysqli_real_escape_string($database->con, $_POST['school_name']);
            $school_addr = mysqli_real_escape_string($database->con, $_POST['school_address']) . ", " . mysqli_real_escape_string($database->con, $_POST['school_city']) . ", British Columbia, Canada";
            $school_abbv = mysqli_real_escape_string($database->con, $_POST['school_abbv']);
            $school_email = mysqli_real_escape_string($database->con, $_POST['school_email']);
            $school_phone = mysqli_real_escape_string($database->con, $_POST['school_phone']);

            $interaction->editSchool($database, $id, $school_name_id, $school_name, $school_addr, $school_abbv, $school_email, $school_phone);
        }

    }

?>