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

        if(isset($_GET['addInquiry'])){

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = "No description provided";
            $link_type = "File";
            $link_tag = "Help";
            $link_content;
            $link_thumbnail = "post_thumbnail.jpg";

            if(file_exists($_FILES['link_content']['tmp_name']) || is_uploaded_file($_FILES['link_content']['tmp_name'])){
                if(isset($_FILES['link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }
                    
                    if($file_size > 20971520){ // Limit job file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $interaction->addInquiry($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/interaction.php?tab=web&page=inquiries&error=true");
                    }
                } else {
                    header("location:../cms/interaction.php?tab=web&page=inquiries&error=true");
                }   
                
            }

        }

        if(isset($_GET['editInquiry'])){

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_type = "File";
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = "No description given";
            $link_tag = "Help";
            $link_content;

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_id_file']);

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['edit_link_content']['name'])));
                
                    $extensions = array("doc","docx","pdf");
                    
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 20971520){ // Limit file upload to 20MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .doc, .docx, .pdf.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 20 MB.";
                        }
                        header("location:../cms/interaction.php?tab=web&page=inquiries&error=true");
                    }
                } else {
                    header("location:../cms/interaction.php?tab=web&page=inquiries&error=true");
                }    
                
            }

            $interaction->editInquiry($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag);

        }

        if(isset($_GET['inquiryDisable'])){
            
            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['inquiryName']);

            $interaction->disableInquiry($database, $id, $title);

        }

        if(isset($_GET['editSchoolInfo'])){
            $id = mysqli_real_escape_string($database->con, $_POST['school_id']);
            $school_name_id = mysqli_real_escape_string($database->con, $_POST['school_id_name']);
            $school_name = mysqli_real_escape_string($database->con, $_POST['school_name']);
            $school_addr = mysqli_real_escape_string($database->con, $_POST['school_address']);
            $school_abbv = mysqli_real_escape_string($database->con, $_POST['school_abbv']);
            $school_head = mysqli_real_escape_string($database->con, $_POST['school_head']);
            $school_email = mysqli_real_escape_string($database->con, $_POST['school_email']);
            $school_phone = mysqli_real_escape_string($database->con, $_POST['school_phone']);

            $interaction->editSchool($database, $id, $school_name_id, $school_name, $school_addr, $school_abbv, $school_email, $school_phone, $school_head);
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
        
            $position = mysqli_real_escape_string($database->con, $_POST['contact_position']);
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
                    
                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit user photo upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/contacts/".$file_name);
                        $photo = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
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
                    
                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit user photo upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/contacts/".$file_name);
                        $photo = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&subtab=content&page=contacts&error=true");
                }   
                
            }

            $interaction->editContact($database, $id, $position, $firstname, $lastname, $email, $phone, $photo);
        
        }

        if(isset($_GET['carouselImageDisable'])){
            
            $id = $_GET['id'];

            $interaction->disableCarouselImage($database, $id);

        }

        if(isset($_GET['editCarouselImage'])){
            $id = mysqli_real_escape_string($database->con, $_POST['edit_carousel_image_id']);
            $caption = mysqli_real_escape_string($database->con, $_POST['carousel_caption']);
            $photo;

            if(!file_exists($_FILES['carousel_image']['tmp_name']) || !is_uploaded_file($_FILES['carousel_image']['tmp_name'])){

                $photo = mysqli_real_escape_string($database->con, $_POST['edit_carousel_image_name']);

            } else {

                if(isset($_FILES['carousel_image'])){
                    $imageFolder;
                
                    if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/carousel/";}
                    else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/carousel/";}
                    else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/carousel/";}
                    else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/carousel/";}
                    else {$imageFolder = "../images/carousel/";}

                    $errors = 0;
                    $file_name = $_FILES['carousel_image']['name'];
                    $file_size = $_FILES['carousel_image']['size'];
                    $file_tmp = $_FILES['carousel_image']['tmp_name'];
                    $file_type = $_FILES['carousel_image']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['carousel_image']['name'])));
                    
                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit image upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, $imageFolder.$file_name);
                        $photo = mysqli_real_escape_string($database->con, $file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location: ../cms/interaction.php?tab=web&subtab=content&page=carousel&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&subtab=content&page=carousel&error=true");
                }   
                
            }

            $interaction->editCarouselImage($database, $id, $photo, $caption);
        }

        if(isset($_GET['newCarouselImage'])){
            if(isset($_POST['cropped_image_value_new'])){
                $data = $_POST['cropped_image_value_new'];

                $image_array_1 = explode(";", $data);
                $image_array_2 = explode(",", $image_array_1[1]);
                $data = base64_decode($image_array_2[1]);

                if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/carousel/";}
                else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/carousel/";}
                else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/carousel/";}
                else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/carousel/";}
                else {$imageFolder = "../images/carousel/";}

                $imageName = "CRSL-NEW-" . rand(111111,99999) . '.png';
                $imageLocation = $imageFolder.$imageName;

                file_put_contents($imageLocation, $data);

                $photo = mysqli_real_escape_string($database->con, $imageName);
                $caption = mysqli_real_escape_string($database->con, $_POST['carousel_caption']);
                $interaction->newCarouselImage($database, $photo, $caption);
                
            }
            // $caption = mysqli_real_escape_string($database->con, $_POST['carousel_caption']);

            // if(isset($_FILES['carousel_image'])){
            //     $imageFolder;
                
            //     if($_SESSION['school'] == '3') {$imageFolder = "../../ness/images/carousel/";}
            //     else if($_SESSION['school'] == '4') {$imageFolder = "../../aames/images/carousel/";}
            //     else if($_SESSION['school'] == '5') {$imageFolder = "../../ges/images/carousel/";}
            //     else if($_SESSION['school'] == '6') {$imageFolder = "../../nbes/images/carousel/";}
            //     else {$imageFolder = "../images/carousel/";}

            //     $errors = 0;
            //     $file_name = $_FILES['carousel_image']['name'];
            //     $file_size = $_FILES['carousel_image']['size'];
            //     $file_tmp = $_FILES['carousel_image']['tmp_name'];
            //     $file_type = $_FILES['carousel_image']['type'];
            //     $file_ext = strtolower(end(explode('.', $_FILES['carousel_image']['name'])));
                    
            //     $extensions = array("jpeg","jpg","png");
            
            //     if(in_array($file_ext, $extensions) == false){
            //         $errors = 1;
            //     }

            //     if($file_size > 20971520){ // Limit image upload to 20 MB
            //         $errors = 2;
            //     }
                
            //     if($errors == 0){
            //         move_uploaded_file($file_tmp, $imageFolder.$file_name);
            //         $photo = mysqli_real_escape_string($database->con, $file_name);
            //         $interaction->newCarouselImage($database, $photo, $caption);
            //     } else {
            //         if($error == 1){
            //             $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
            //         } else if($error == 2){
            //             $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
            //         }
            //         header("location: ../cms/interaction.php?tab=web&subtab=content&page=carousel&error=true");
            //     }
            // } else {
            //     header("location: ../cms/interaction.php?tab=web&subtab=content&page=carousel&error=true");
            // }
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

        if(isset($_GET['pageDisable'])){
            $page = $_GET['page'];
            $subtab = $_GET['subtab'];

            $id = $_GET['id'];
            $title = str_replace('%20', ' ', $_GET['pageName']);

            $interaction->disablePageFile($database, $id, $title, $page, $subtab);

        }

        if(isset($_GET['addPage'])){
            $page = $_GET['page'];
            $subtab = $_GET['subtab'];

            $link_name = mysqli_real_escape_string($database->con, $_POST['link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['link_desc']);
            $link_type = "File";
            $link_tag;
            $link_content;
            $link_thumbnail = "post_thumbnail.jpg";

            if($page == 'sdss') $link_tag = 'SDSS';
            else if($page == 'tech') $link_tag = 'Tech';
            else if($page == 'maintenance') $link_tag = 'Maintenance';
            else if($page == 'finance') $link_tag = mysqli_real_escape_string($database->con, $_POST['link_tag']);
            else $link_tag = strtoupper($page);

            if(file_exists($_FILES['link_content']['tmp_name']) || is_uploaded_file($_FILES['link_content']['tmp_name'])){

                if(isset($_FILES['link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['link_content']['name'];
                    $file_size = $_FILES['link_content']['size'];
                    $file_tmp = $_FILES['link_content']['tmp_name'];
                    $file_type = $_FILES['link_content']['type'];
                    
                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $interaction->addPageFile($database, $link_name, $link_desc, $link_content, $link_type, $link_tag, $link_thumbnail, $page, $subtab);
                    } else {
                        if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 50 MB.";
                        }
                        header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
                }

            }

        }

        if(isset($_GET['editPage'])){
            $page = $_GET['page'];
            $subtab = $_GET['subtab'];

            $id = mysqli_real_escape_string($database->con, $_POST['edit_link_id']);
            $link_id = mysqli_real_escape_string($database->con, $_POST['edit_link_id_name']);
            $link_name = mysqli_real_escape_string($database->con, $_POST['edit_link_title']);
            $link_desc = mysqli_real_escape_string($database->con, $_POST['edit_link_desc']);
            $link_tag;
            $link_content;

            if($page == 'sdss') $link_tag = 'SDSS';
            else if($page == 'tech') $link_tag = 'Tech';
            else if($page == 'maintenance') $link_tag = 'Maintenance';
            else if($page == 'finance') $link_tag = mysqli_real_escape_string($database->con, $_POST['edit_link_tag']);
            else $link_tag = strtoupper($page);

            if(!file_exists($_FILES['edit_link_content']['tmp_name']) || !is_uploaded_file($_FILES['edit_link_content']['tmp_name'])){

                $link_content = mysqli_real_escape_string($database->con, $_POST['edit_link_content_name']);
                
                $interaction->editPageFile($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag, $page, $subtab);

            } else {

                if(isset($_FILES['edit_link_content'])){
                    $errors = 0;
                    $file_name = $_FILES['edit_link_content']['name'];
                    $file_size = $_FILES['edit_link_content']['size'];
                    $file_tmp = $_FILES['edit_link_content']['tmp_name'];
                    $file_type = $_FILES['edit_link_content']['type'];
                    
                    if($file_size > 52428800){ // Limit file upload to 50 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../links/".$file_name);
                        $link_content = mysqli_real_escape_string($database->con, $file_name);
                        $interaction->editPageFile($database, $id, $link_id, $link_name, $link_desc, $link_content, $link_tag, $page, $subtab);
                    } else {
                        if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 50 MB.";
                        }
                        header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&subtab=". $subtab ."&page=". $page ."&error=true");
                }   
                
            }

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
                    $new_file_name = "BOEP-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;
                    
                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/contacts/".$new_file_name);
                        $photo = mysqli_real_escape_string($database->con, $new_file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                }   
                
            }

            $interaction->editBOE($database, $id, $position, $firstname, $lastname, $email, $phone, $position_specifics, $writeup, $photo);
        
        }

        if(isset($_GET['editBOEImage'])){
            // Image upload and update
            $id = mysqli_real_escape_string($database->con, $_POST['edit_boe_image_id']);
            $photo;

            if(!file_exists($_FILES['boe_group_image']['tmp_name']) || !is_uploaded_file($_FILES['boe_group_image']['tmp_name'])){

                $photo = mysqli_real_escape_string($database->con, $_POST['edit_boe_image_name']);

            } else {

                if(isset($_FILES['boe_group_image'])){
                    $errors = 0;
                    $file_name = $_FILES['boe_group_image']['name'];
                    $file_size = $_FILES['boe_group_image']['size'];
                    $file_tmp = $_FILES['boe_group_image']['tmp_name'];
                    $file_type = $_FILES['boe_group_image']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['boe_group_image']['name'])));
                    $new_file_name = "BOEG-SD92_".substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10).".".$file_ext;

                    $extensions = array("jpeg","jpg","png");
                
                    if(in_array($file_ext, $extensions) == false){
                        $errors = 1;
                    }

                    if($file_size > 10485760){ // Limit thumbnail upload to 10 MB
                        $errors = 2;
                    }
                    
                    if($errors == 0){
                        move_uploaded_file($file_tmp, "../images/boe/".$new_file_name);
                        $photo = mysqli_real_escape_string($database->con, $new_file_name);
                    } else {
                        if($error == 1){
                            $_SESSION['error_message'] = "You tried uploading a file with an invalid file extension. Please make sure that the file's extension is one of the followings: .jpeg, .jpg, .png.";
                        } else if($error == 2){
                            $_SESSION['error_message'] = "You tried uploading a file that exceeded the file size limit. Please make sure that the file size is less than 10 MB.";
                        }
                        header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                    }
                } else {
                    header("location: ../cms/interaction.php?tab=web&page=boe&error=true");
                }   
                
            }

            $interaction->editBOEImage($database, $id, $photo);

            // Photo position update //

            // Photo position - Chairperson
            $id = mysqli_real_escape_string($database->con, $_POST['edit_boe_position_id_c']);
            $position = mysqli_real_escape_string($database->con, $_POST['boe_position_c']);

            $interaction->editBOEImagePosition($database, $id, $position);

            // Photo position - Vice-Chairperson
            $id = mysqli_real_escape_string($database->con, $_POST['edit_boe_position_id_v']);
            $position = mysqli_real_escape_string($database->con, $_POST['boe_position_v']);

            $interaction->editBOEImagePosition($database, $id, $position);

            // Photo position - Trustees
            for($ctr = 1; $ctr <= 3; $ctr++){
                $id = mysqli_real_escape_string($database->con, $_POST['edit_boe_position_id_t_'.$ctr]);
                $position = mysqli_real_escape_string($database->con, $_POST['boe_position_t_'.$ctr]);

                $interaction->editBOEImagePosition($database, $id, $position);

                if($ctr >= 3){
                    header("location: ../cms/interaction.php?tab=web&page=boe&editBOEImage=true");
                }
            }

        }

    }

?>