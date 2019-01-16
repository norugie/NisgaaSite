<?php 

    $announcements = $post->announcementList($database);

    if(isset($_GET['a_id'])){

        $a_id = $_GET['a_id'];
        $a_info = $post->announcementInformation($database, $a_id);
       
    }

 ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
                
            <?php

                if(!isset($_GET['announcement_option']) || empty($_GET['announcement_option'])){
                    require 'announcements/announcement_list.php';
                } else {
                    if($_GET['announcement_option'] == 'create'){
                        require 'announcements/announcement_create.php';
                    } else if($_GET['announcement_option'] == 'modify'){
                        require 'announcements/announcement_modify.php';
                    } else if($_GET['announcement_option'] == 'view'){
                        require 'announcements/announcement_view.php';
                    } else {
                        require 'announcement/announcement_list.php';
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