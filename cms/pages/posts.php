<?php 

    $posts;
    $cat_name;

    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
        $posts = $post->postsPerCategoryListIntegrated($database, $cat_id);
        $cat_name = $posts[0]['cat_desc'];
    } else {
        $posts = $post->postsIntegratedList($database);
    }

    if(isset($_GET['post_id'])){
        if(isset($_GET['event'])){
            $event_indicator = $_GET['event'];
        }

        $post_id = $_GET['post_id'];
        $post_info = $post->postInformationIntegrated($database, $post_id);
       
    }
 ?>

<script type="text/javascript" src="../plugins/jquery-tokeninput/src/jquery.tokeninput.js"></script>

<link rel="stylesheet" href="../plugins/jquery-tokeninput/styles/token-input.css" type="text/css" />
<link rel="stylesheet" href="../plugins/jquery-tokeninput/styles/token-input-facebook.css" type="text/css" />

<!-- Dropzone Css -->
<link href="../plugins/dropzone/dropzone.css" rel="stylesheet">

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            <?php

                if(!isset($_GET['posts_option']) || empty($_GET['posts_option'])){
                    require 'posts/posts_list.php';
                } else {
                    if($_GET['posts_option'] == 'create'){
                        require 'posts/posts_create.php';
                    } else if($_GET['posts_option'] == 'modify'){
                        require 'posts/posts_modify.php';
                    } else if($_GET['posts_option'] == 'view'){
                        require 'posts/posts_view.php';
                    } else {
                        require 'posts/posts_list.php';
                    }
                }
            ?>

        </div>
    </div>
</div>

<!-- TinyMCE -->
<script src="../plugins/tinymce/tinymce.min.js"></script>
<!-- Dropzone Plugin Js -->
<script src="../plugins/dropzone/dropzone.js"></script>
<script src="../js/editors.js"></script>

<script>
    (function () {
        'use strict';

        // Configuring Dropzone
        Dropzone.autoDiscover = false;

        $('#dropzone-gallery').dropzone({
            url: '../functions/media.php',
            acceptedFiles: 'image/*',
            maxFileSize: 10, // MB
            addRemoveLinks: true,
            dictFallbackMessage: 'Your browser does not support drag and drop image uploads.',
            dictFileTooBig: 'Image is too big. Max image size: 10 MB.',
            dictInvalidFileType: 'You cannot upload images of this file type.',
            dictRemoveFile: 'Remove image',
            dictRemoveFileConfirmation: null,
            renameFilename: function (file) {
                file = 'MDA-SD92_' + new Date().getTime() + '_' + file;
                var imageName = $('#image_name').val();
                $('#image_name').attr('value', file + ',' + imageName);
                return file;
                console.log(file);
            },
            error: function (file, message, xhr) {
                if (xhr == null) this.removeFile(file);
                alert(message);
            },
            init: function () {
                this.on('removedfile', function (file) {
                    console.log(file);
                    var imageNameList = $('#image_name').val();
                    imageNameList = imageNameList.replace(file.upload.filename + ',', '');
                    $('#image_name').attr('value', imageNameList);

                    // Remove image from server folder
                    $.ajax({
                        url: '../functions/deleteMedia.php',
                        type: 'POST',
                        data: {
                            'filename': file.upload.filename,
                            post_id: '<?php if((isset($_GET["posts_option"]) && $_GET["posts_option"] == "modify") && (isset($post_info["post_type"]) && $post_info["post_type"] == "Media") ? $post_id = $_GET["post_id"] : $post_id = 0); echo $post_id; ?>',
                            school: '<?php if(isset($post_info["post_school"])) echo $post_info["post_school"]; else echo "2"; ?>'
                        }
                    });
                });
                var md = this;
                $.ajax({
                    url: '../functions/media.php',
                    type: 'POST',
                    data: {
                        request: 2, 
                        post_id: '<?php if((isset($_GET["posts_option"]) && $_GET["posts_option"] == "modify") && (isset($post_info["post_type"]) && $post_info["post_type"] == "Media") ? $post_id = $_GET["post_id"] : $post_id = 0); echo $post_id; ?>',
                        school: '<?php if(isset($post_info["post_school"])) echo $post_info["post_school"]; else echo "2"; ?>'
                    },
                    dataType: 'JSON',
                    success: function(response){
                        var imageNameListModify = $('#image_name').val();
                        $.each(response, function(key, value) {
                            var mockFile = { name: value.name, size: value.size, upload: { filename: value.name } };

                            md.emit("addedfile", mockFile);
                            md.emit("thumbnail", mockFile, value.url);
                            md.emit("complete", mockFile);

                            $('#image_name').attr('value', value.name + ',' + imageNameListModify);
                            console.log(mockFile);
                        });
                    }
                });
            }
        });
    })();
</script>

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
