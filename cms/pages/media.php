<?php 

    $media;
    $cat_name;

    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
        $media = $post->mediaPerCategoryList($database, $cat_id);
        $cat_name = $media[0]['cat_desc'];
    } else {
        $media = $post->mediaList($database);
    }

    if(isset($_GET['media_id'])){

        $media_id = $_GET['media_id'];
        $media_info = $post->mediaInformation($database, $media_id);
       
    }
 ?>

<script type="text/javascript" src="../plugins/jquery-tokeninput/src/jquery.tokeninput.js"></script>

<link rel="stylesheet" href="../plugins/jquery-tokeninput/styles/token-input.css" type="text/css" />
<link rel="stylesheet" href="../plugins/jquery-tokeninput/styles/token-input-facebook.css" type="text/css" />

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            <?php

                if(!isset($_GET['media_option']) || empty($_GET['media_option'])){
                    require 'media/media_list.php';
                } else {
                    if($_GET['media_option'] == 'create'){
                        require 'media/media_create.php';
                    } else if($_GET['media_option'] == 'modify'){
                        require 'media/media_modify.php';
                    } else if($_GET['media_option'] == 'view'){
                        require 'media/media_view.php';
                    } else {
                        require 'media/media_list.php';
                    }
                }
            ?>

        </div>
    </div>
</div>

<!-- Date Format -->
<script>

    function formatDate(date) {
    var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return day + ' ' + monthNames[monthIndex] + ' ' + year;
    }

</script>