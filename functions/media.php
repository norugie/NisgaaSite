<?php

if(isset($_FILES['file']) && !empty($_FILES['file'])){
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];    
    move_uploaded_file($file_tmp, "../images/posts/media/".$file_name);
}
    
?>