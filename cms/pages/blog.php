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
 ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-post-modal" style="float: right; margin-top: -5px;">ADD NEW POST</button>
                <br>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Post Title</th>
                                <th>Author</th>
                                <th>School</th>
                                <th>Published Date</th>
                                <th>Categories</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Post Title</th>
                                <th>Author</th>
                                <th>School</th>
                                <th>Published Date</th>
                                <th>Categories</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($posts as $p): ?>
                                <tr>
                                    <td><?php echo $p['post_title']; ?></td>
                                    <td><?php echo $p['firstname'] . " " . $p['lastname']; ?></td>
                                    <td><?php echo $p['school_abbv']; ?></td>
                                    <td><?php echo date_format(date_create($p['post_date']), 'd M Y - l'); ?></td>
                                    <td>
                                        <?php

                                            $cats = $post->categoriesPerPostList($database, $p['id']);
                                            foreach($cats as $cat):
                                                echo $cat['cat_desc'] . "<br>";
                                            endforeach;
                                        ?>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    OPTIONS <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" data-toggle="modal" data-target="#view-post-modal" data-values="<?php echo htmlspecialchars(json_encode($p)); ?>" onclick="viewPost(this);">View Post</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#edit-post-modal" data-values="<?php echo htmlspecialchars(json_encode($p)); ?>" onclick="editPost(this);">Edit Post Details</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#edit-post-cats-modal" onclick="editJobDates(<?php echo htmlspecialchars(json_encode($p['id'])); ?>,<?php echo htmlspecialchars(json_encode($p['post_id'])); ?>, 1);">Edit Post Categories</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="#" data-type="delete-post" data-id="<?php echo $p['id']; ?>" data-name="<?php echo $p['post_id']; ?>" onclick="alertDesign(this);">Delete Post</a></li>
                                                </ul>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

