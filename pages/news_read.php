<!-- Light Gallery Plugin Css -->
<link href="/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $post_info['post_title']; ?></h2>
    <p class="text-muted text-uppercase mb-small text-center text-sm">By <?php echo $post_info['firstname'] . " " . $post_info['lastname']; ?> |  <?php echo date_format(date_create($post_info['post_date']), 'd M Y'); ?></p>
    <ul class="tag-cloud list-inline text-center">
        <?php $categories = $site->categoryListPerPost($database, $post_info['id']);?>
        <?php foreach($categories as $cat): ?>
            <li class="list-inline-item"><a href="/news/category/<?php echo $cat['id']; ?>"><i class="fa fa-tags"></i> <?php echo $cat['cat_desc']; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <div id="post-content">
        <?php echo $post_info['post_text']; ?>
        <div id="animated-thumbnails" class="list-unstyled row clearfix">
            <?php if($post_info['post_type'] == 'Media'){ 
                $media_images = $site->mediaImages($database, $post_info['id']);
                foreach($media_images as $mi):
            ?>
                <!-- <img src="/images/posts/media/<?php echo $mi['media_name']; ?>" class="img-fluid" alt=""> -->  
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="box-image">
                        <a href="/images/posts/media/<?php echo $mi['media_name']; ?>" data-sub-html="<?php echo $post_info['post_title']; ?>">
                            <img class="img-fluid thumbnail" src="/images/posts/media/<?php echo $mi['media_name']; ?>">
                        </a>
                    </div>
                </div>
            <?php
                endforeach;
            } ?>
        </div>
    </div>

</div>

<!-- Light Gallery Plugin Js -->
<script src="/plugins/light-gallery/js/lightgallery-all.js"></script>

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