<div class="header">
    <?php if(isset($_GET['id'])){ echo "CATEGORY: " . $cat_name; } ?>
    <button type="button" class="btn bg-blue waves-effect" style="float: right; margin-top: -5px;" onclick="window.location.href='post.php?tab=post&page=blog&blog_option=create'">ADD NEW POST</button>
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
                                        <li><a href="post.php?tab=post&page=blog&blog_option=view&post_id=<?php echo $p['id']; ?>">View Post</a></li>
                                        
                                        <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2 || $_SESSION['school'] == $p['post_school']){ ?>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="post.php?tab=post&page=blog&blog_option=modify&modify=details&post_id=<?php echo $p['id']; ?>">Edit Post Details</a></li>
                                        <?php if($cats[0][0] != 'Event' || $cats[0][0] != 'Announcement'){ ?>
                                        <li><a href="post.php?tab=post&page=blog&blog_option=modify&modify=categories&post_id=<?php echo $p['id']; ?>">Edit Post Categories</a></li>
                                        <?php } ?>
                                        
                                        <li role="separator" class="divider"></li>
                                        <?php if($cats[0][0] != 'Event'){ ?>
                                        <li><a href="#" data-type="delete-post" data-id="<?php echo $p['id']; ?>" data-name="<?php echo $p['post_id']; ?>" data-event="0" onclick="alertDesign(this);">Delete Post</a></li>
                                        <?php } else { ?>
                                        <li><a href="#" data-type="delete-post" data-id="<?php echo $p['id']; ?>" data-name="<?php echo $p['post_id']; ?>" data-event="1" onclick="alertDesign(this);">Delete Post</a></li>
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