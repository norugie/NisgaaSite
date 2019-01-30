<?php

    if(isset($_GET['interaction'])){

        session_start();
        require 'connect.php';
        require 'log.php';
        $database = new Database();
        $interaction = new Interaction();
        $log = new Log();
        
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

    }

?>