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

        if(isset($_GET['contactDisable'])){
            
            $id = $_GET['id'];
            $contact_role = str_replace('%20', ' ', $_GET['contactRole']);

            $interaction->disableContact($database, $id, $contact_role);

        }

        if(isset($_GET['contactReactivate'])){
            
            $id = $_GET['id'];
            $contact_role = str_replace('%20', ' ', $_GET['contactRole']);

            $interaction->reactivateContact($database, $id, $contact_role);

        }

        if(isset($_GET['addContact'])){
        
            $position = mysqli_real_escape_string($database->con, $_POST['contact_name']);
            $firstname = mysqli_real_escape_string($database->con, $_POST['contact_firstname']);
            $lastname = mysqli_real_escape_string($database->con, $_POST['contact_lastname']);
            $email = mysqli_real_escape_string($database->con, $_POST['contact_email']);
            $phone = mysqli_real_escape_string($database->con, $_POST['contact_phone']);
            $photo; 

            if(!file_exists($_FILES['contact_photo']['tmp_name']) || !is_uploaded_file($_FILES['contact_photo']['tmp_name'])){

                $photo = "user.png";

            } else {

                if(isset($_FILES['contact_photo'])){
                    $errors = 0;
                    $file_name = $_FILES['contact_photo']['name'];
                    $file_size = $_FILES['contact_photo']['size'];
                    $file_tmp = $_FILES['contact_photo']['tmp_name'];
                    $file_type = $_FILES['contact_photo']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['contact_photo']['name'])));
                    
                    if($file_size > 2097152){
                        $errors = 1;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/contacts/".$file_name);
                        $photo = $file_name;
                    } else {
                        header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                }   
                
            }

            $interaction->addContact($database, $position, $firstname, $lastname, $email, $phone, $photo);
        
        }

        if(isset($_GET['editContact'])){
            $id = mysqli_real_escape_string($database->con, $_POST['contact_id']);
            $position = mysqli_real_escape_string($database->con, $_POST['contact_position']);
            $firstname = mysqli_real_escape_string($database->con, $_POST['contact_firstname']);
            $lastname = mysqli_real_escape_string($database->con, $_POST['contact_lastname']);
            $email = mysqli_real_escape_string($database->con, $_POST['contact_email']);
            $phone = mysqli_real_escape_string($database->con, $_POST['contact_phone']);
            $photo; 

            if(!file_exists($_FILES['contact_photo']['tmp_name']) || !is_uploaded_file($_FILES['contact_photo']['tmp_name'])){

                $photo = mysqli_real_escape_string($database->con, $_POST['contact_previous_photo']);

            } else {

                if(isset($_FILES['contact_photo'])){
                    $errors = 0;
                    $file_name = $_FILES['contact_photo']['name'];
                    $file_size = $_FILES['contact_photo']['size'];
                    $file_tmp = $_FILES['contact_photo']['tmp_name'];
                    $file_type = $_FILES['contact_photo']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['contact_photo']['name'])));
                    
                    if($file_size > 2097152){
                        $errors = 1;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/contacts/".$file_name);
                        $photo = $file_name;
                    } else {
                        header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
                }   
                
            }

            $interaction->editContact($database, $id, $position, $firstname, $lastname, $email, $phone, $photo);
        
        }

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- Page Information  ***************/
        /*********************************************************************************************/

        if(isset($_GET['editPageInformation'])){
            $page = $_GET['page'];
            $subtab = $_GET['subtab'];

            $id = mysqli_real_escape_string($database->con, $_POST['curdept_id']);
            $curdept_name = mysqli_real_escape_string($database->con, $_POST['curdept_name']);
            $curdept_desc = mysqli_real_escape_string($database->con, $_POST['curdept_desc']);

            $interaction->editPageInformation($database, $id, $curdept_name, $curdept_desc, $page, $subtab);
        }

        /*********************************************************************************************/
		/***************************  Interaction Functionalities -- BOE *****************************/
        /*********************************************************************************************/

        if(isset($_GET['editBOE'])){
            $id = mysqli_real_escape_string($database->con, $_POST['boe_id']);
            $position = mysqli_real_escape_string($database->con, $_POST['boe_name']);
            $firstname = mysqli_real_escape_string($database->con, $_POST['boe_firstname']);
            $lastname = mysqli_real_escape_string($database->con, $_POST['boe_lastname']);
            $email = mysqli_real_escape_string($database->con, $_POST['boe_email']);
            $phone = mysqli_real_escape_string($database->con, $_POST['boe_phone']);
            $position_specifics = mysqli_real_escape_string($database->con, $_POST['boe_trustee_for']);
            $photo; 
            $writeup;

            if(isset($_POST['boe_writeup']) && !empty($_POST['boe_writeup'])){
                $writeup = mysqli_real_escape_string($database->con, $_POST['boe_writeup']);
            } else {
                $writeup = "No description given for this trustee.";
            }

            if(!file_exists($_FILES['boe_photo']['tmp_name']) || !is_uploaded_file($_FILES['boe_photo']['tmp_name'])){

                $photo = mysqli_real_escape_string($database->con, $_POST['boe_previous_photo']);

            } else {

                if(isset($_FILES['boe_photo'])){
                    $errors = 0;
                    $file_name = $_FILES['boe_photo']['name'];
                    $file_size = $_FILES['boe_photo']['size'];
                    $file_tmp = $_FILES['boe_photo']['tmp_name'];
                    $file_type = $_FILES['boe_photo']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['boe_photo']['name'])));
                    
                    if($file_size > 2097152){
                        $errors = 1;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/contacts/".$file_name);
                        $photo = $file_name;
                    } else {
                        header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                }   
                
            }

            $interaction->editBOE($database, $id, $position, $firstname, $lastname, $email, $phone, $position_specifics, $writeup, $photo);
        
        }

    }

?>