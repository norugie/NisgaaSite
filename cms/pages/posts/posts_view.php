<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4 style="margin:0px;"><?php echo $post_info['post_title']; ?></h4>
            <small><?php echo $post_info['firstname'] . " " . $post_info['lastname']; ?> | <?php echo date_format(date_create($post_info['post_date']), 'd M Y - l'); ?> </small>       
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block; margin-top: 5px;" onclick="window.location.href='post.php?tab=post&page=posts'"><i class="material-icons">list</i><span>LIST</span></button>
                <?php if($_SESSION['type'] != 3){ ?>
                    <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2 || $_SESSION['school'] == $post_info['post_school']){ ?>
                        <button type="button" class="btn bg-green waves-effect" style="display: inline-block; margin-top: 5px; margin-left: 5px;" onclick="window.location.href='post.php?tab=post&page=posts&posts_option=modify&modify=details&post_id=<?php echo $post_info['id']; ?>'"><i class="material-icons">mode_edit</i></button>
                        <button type="button" class="btn bg-red waves-effect" style="display: inline-block; margin-top: 5px; margin-left: 5px;" data-type="delete-post-integrate" data-id="<?php echo $post_info['id']; ?>" data-name="<?php echo $post_info['post_id']; ?>" data-event="<?php echo $event_indicator; ?>" onclick="alertDesign(this);"><i class="material-icons">delete</i></button>
                    <?php } ?>
                <?php } ?>
            </center>
        </div>
    </div>
</div>
<div class="body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $post_info['post_text']; ?>
        </div>
    </div>

    <?php if($post_info['post_type'] == 'Media'){ ?>

        <!-- Light Gallery Plugin Css -->
        <link href="../plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">            
                <div id="animated-thumbnails" class="list-unstyled row clearfix">
                
                <?php
                    // Images upload path
                    $imageurlbase;
                
                    if($post_info['post_school'] == '3') {$imageurlbase = "https://ness.nisgaa.bc.ca/";}
                    else if($post_info['post_school'] == '4') {$imageurlbase = "https://aames.nisgaa.bc.ca/";}
                    else if($post_info['post_school'] == '5') {$imageurlbase = "https://ges.nisgaa.bc.ca/";}
                    else if($post_info['post_school'] == '6') {$imageurlbase = "https://nbes.nisgaa.bc.ca/";}
                    else {$imageurlbase = "https://www.nisgaa.bc.ca/";}
                
                    $media_images = $post->postImagesIntegrated($database, $post_info['id']);
                    foreach($media_images as $mi):
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="<?php echo $imageurlbase."/images/posts/media/".$mi['media_name']; ?>" data-sub-html="<?php echo $post_info['post_title']; ?>">
                            <center>
                                <img class="img-responsive thumbnail" src="<?php echo $imageurlbase."/images/posts/media/".$mi['media_name']; ?>" style="height: 155px!important; object-fit: cover!important;">
                            </center>
                        </a>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Light Gallery Plugin Js -->
        <script src="../plugins/light-gallery/js/lightgallery-all.js"></script>

        <script>
            (function () {
                'use strict';
                $( document ).ready( function() {
                    $( '#animated-thumbnails' ).lightGallery({
                        thumbnail: true,
                        mode: 'lg-fade',
                        autoplay: false,
                        autoplayControls: false,
                        fullScreen: false,
                        actualSize: false,
                        share: false,
                        selector: 'a'
                    });
                });
            })();
        </script>
    <?php } ?>
</div>