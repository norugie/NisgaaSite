<?php 

    $posts;
    $cat_name;

    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
        $posts = $post->postsPerCategoryList($database, $cat_id);
        $cat_name = $posts[0]['cat_desc'];
    } else {
        $posts = $post->postList($database);
    }

    if(isset($_GET['post_id'])){
        if(isset($_GET['event'])){
            $event_indicator = $_GET['event'];
        }

        $post_id = $_GET['post_id'];
        $post_info = $post->postInformation($database, $post_id);
       
    }
 ?>

<script type="text/javascript" src="../plugins/jquery-tokeninput/src/jquery.tokeninput.js"></script>

<link rel="stylesheet" href="../plugins/jquery-tokeninput/styles/token-input.css" type="text/css" />
<link rel="stylesheet" href="../plugins/jquery-tokeninput/styles/token-input-facebook.css" type="text/css" />

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            <?php

                if(!isset($_GET['news_option']) || empty($_GET['news_option'])){
                    require 'news/news_list.php';
                } else {
                    if($_GET['news_option'] == 'create'){
                        require 'news/news_create.php';
                    } else if($_GET['news_option'] == 'modify'){
                        require 'news/news_modify.php';
                    } else if($_GET['news_option'] == 'view'){
                        require 'news/news_view.php';
                    } else {
                        require 'news/news_list.php';
                    }
                }
            ?>

        </div>
    </div>
</div>

<!-- TinyMCE -->
<script src="../plugins/tinymce/tinymce.min.js"></script>
<script src="../js/editors.js"></script>

<!-- Prevent Bootstrap dialog from blocking focusin -->
<script>
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
      e.stopImmediatePropagation();
    }
});
</script>

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