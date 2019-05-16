<?php $page_info = $site->curriculumInformation($database, $url[1]); ?>
<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $content_breadcrumb; ?></h2>
    <div id="post-content">
        <?php echo $page_info['web_desc']; ?>
    </div>
</div>