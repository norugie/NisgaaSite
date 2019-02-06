<?php $page_info = $site->departmentInformation($database, $_GET['content']); ?>
<div id="blog-post" class="col-md-9">
    <h2 class="text-center"><?php echo $content_breadcrumb; ?></h2>
    <div id="post-content">
        <?php echo $page_info['web_desc']; ?>
    </div>
</div>