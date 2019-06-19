<!-- Light Gallery Plugin Css -->
<link href="../plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4 style="margin:0px;"><?php echo $media_info['post_title']; ?></h4>
            <small><?php echo $media_info['firstname'] . " " . $media_info['lastname']; ?> | <?php echo date_format(date_create($media_info['post_date']), 'd M Y - l'); ?> </small>       
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block; margin-top: 5px;" onclick="window.location.href='post.php?tab=post&page=media'"><i class="material-icons">list</i><span>LIST</span></button>
                <?php if($_SESSION['type'] != 3){ ?>
                    <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2 || $_SESSION['school'] == $p['post_school']){ ?>
                        <button type="button" class="btn bg-green waves-effect" style="display: inline-block; margin-top: 5px; margin-left: 5px;" onclick="window.location.href='post.php?tab=post&page=media&media_option=modify&modify=details&media_id=<?php echo $media_info['id']; ?>'"><i class="material-icons">mode_edit</i></button>
                        <button type="button" class="btn bg-red waves-effect" style="display: inline-block; margin-top: 5px; margin-left: 5px;" data-type="delete-media" data-id="<?php echo $media_info['id']; ?>" data-name="<?php echo $media_info['post_id']; ?>" onclick="alertDesign(this);"><i class="material-icons">delete</i></button>
                    <?php } ?>
                <?php } ?>
            </center>
        </div>
    </div>
</div>
<div class="body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $media_info['post_text']; ?>
            
            <?php if($media_info['post_type'] == 'Media'){ ?>
                <div id="animated-thumbnails" class="list-unstyled row clearfix">
            <?php 
                $media_images = $post->mediaImages($database, $media_info['id']);
                foreach($media_images as $mi):
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a href="/images/posts/media/<?php echo $mi['media_name']; ?>" data-sub-html="<?php echo $media_info['post_title']; ?>">
                        <center>
                            <img class="img-responsive thumbnail" src="/images/posts/media/<?php echo $mi['media_name']; ?>" style="height: 155px!important; object-fit: cover!important;">
                        </center>
                    </a>
                </div>
            <?php endforeach; ?>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<!-- Light Gallery Plugin Js -->
<script src="../plugins/light-gallery/js/lightgallery-all.js"></script>

<script>
    $( document ).ready(function() {
        $('#animated-thumbnails').lightGallery({
            thumbnail: true,
            mode: 'lg-fade',
            autoplay: false,
            autoplayControls: false,
            fullScreen: false,
            actualSize: false,
            selector: 'a'
        });
    });
</script>