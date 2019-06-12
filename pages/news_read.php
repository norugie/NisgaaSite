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
    </div>
</div>