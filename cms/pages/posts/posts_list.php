<style>
    .dropdown-menu {
        margin-left: -80% !important;
        margin-top: -50px !important;
    }
</style>
<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4><?php if(isset($_GET['id'])){ echo "CATEGORY: " . $cat_name; } else { if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6 && $_SESSION['type'] != 5 ? $text = "DISTRICT" : $text = "SCHOOL"); echo $text . " POSTS LIST"; } ?></h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <?php if($_SESSION['type'] != 3){ ?>
                    <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=posts&posts_option=create'"><i class="material-icons">add</i><span>NEW POST</span></button>
                <?php } ?>
            </center>
        </div>
    </div>
</div>
<div class="body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Post Type</th>
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
                    <th>Post Type</th>
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
                        <td><?php if($p['post_type'] == 'Post' ? $type = "News Post" : $type = $p['post_type'] . " Post"); echo $type; ?></td>
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
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_horiz</i>
                                        <span>OPTIONS</span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="post.php?tab=post&page=posts&posts_option=view&post_id=<?php echo $p['id']; ?>&event=<?php if($cats[0][0] != 'Event'){ echo "0"; } else { echo "1"; } ?>">View Post</a></li>
                                        <?php if($_SESSION['type'] != 3){ ?>
                                            <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2 || $_SESSION['school'] == $p['post_school']){ ?>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="post.php?tab=post&page=posts&posts_option=modify&modify=details&post_id=<?php echo $p['id']; ?>">Edit Post Details</a></li>                                            
                                                <div class="dropdown-divider"></div>
                                                <?php if($cats[0][0] != 'Event'){ ?>
                                                    <li><a href="#" data-type="delete-post-integrate" data-id="<?php echo $p['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $p['post_title']); ?>" data-event="0" onclick="alertDesign(this);">Delete Post</a></li>
                                                <?php } else { ?>
                                                    <li><a href="#" data-type="delete-post-integrate" data-id="<?php echo $p['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $p['post_title']); ?>" data-event="1" onclick="alertDesign(this);">Delete Post</a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
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