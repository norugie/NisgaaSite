<?php 

    $cat_id = $_GET['id'];
    $posts = $post->postsPerCategoryList($database, $cat_id);
    $cat_name = $posts[0]['cat_desc'];
 ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>POSTS & MEDIA: <?php echo $cat_name; ?></h2>
            </div>
            <div class="body">
                <?php foreach($posts as $p): ?>
                    <div class="panel panel-default panel-post">
                        <div class="panel-heading" style="height: 60px;">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <?php echo $p['post_title']; ?>
                                    </h4>
                                    By: <?php echo $p['firstname'] . " " . $p['lastname']; ?> | <?php echo date_format(date_create($p['post_date']), 'd M Y - l'); ?>
                                    <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#new-category-modal" style="float: right; margin-top: -20px;margin-right: 5px;"><i class="material-icons">delete</i></button>
                                    <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#new-category-modal" style="float: right; margin-top: -20px;margin-right: 5px;"><i class="material-icons">create</i></button>
                                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-category-modal" style="float: right; margin-top: -20px; margin-right: 5px;"><i class="material-icons">visibility</i></button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="post">
                                <div class="post-content">
                                    <?php echo $p['post_text']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="content">

                                <?php
                                    $cats = $post->categoriesPerPostList($database, $p['id']);

                                    foreach($cats as $cat):
                                ?>
                                    <span class="label bg-blue-grey" style="font-size: .80em;"><?php echo $cat['cat_desc']; ?></span>
                                    
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
