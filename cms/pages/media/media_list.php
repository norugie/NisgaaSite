<style>
    .dropdown-menu {
        margin-left: -80% !important;
        margin-top: -50px !important;
    }
</style>
<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4><?php if(isset($_GET['id'])){ echo "CATEGORY: " . $cat_name; } else { echo "MEDIA LIST"; } ?></h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <?php if($_SESSION['type'] != 3){ ?>
                    <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=media&media_option=create'"><i class="material-icons">add</i><span>NEW MEDIA</span></button>
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
                    <th>Media Title</th>
                    <th>Author</th>
                    <th>School</th>
                    <th>Published Date</th>
                    <th>Categories</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Media Title</th>
                    <th>Author</th>
                    <th>School</th>
                    <th>Published Date</th>
                    <th>Categories</th>
                    <th>Options</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($media as $m): ?>
                    <tr>
                        <td><?php echo $m['post_title']; ?></td>
                        <td><?php echo $m['firstname'] . " " . $m['lastname']; ?></td>
                        <td><?php echo $m['school_abbv']; ?></td>
                        <td><?php echo date_format(date_create($m['post_date']), 'd M Y - l'); ?></td>
                        <td>
                            <?php

                                $cats = $post->categoriesPerPostList($database, $m['id']);
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
                                        <li><a href="post.php?tab=post&page=media&media_option=view&media_id=<?php echo $m['id']; ?>">View Media Post</a></li>
                                        
                                        <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2 || $_SESSION['school'] == $m['post_school']){ ?>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="post.php?tab=post&page=media&media_option=modify&modify=details&media_id=<?php echo $m['id']; ?>">Edit Media Details</a></li>
                                        <li><a href="post.php?tab=post&page=media&media_option=modify&modify=categories&media_id=<?php echo $m['id']; ?>">Edit Media Categories</a></li>
                                        
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" data-type="delete-media" data-id="<?php echo $m['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $m['post_title']); ?>" onclick="alertDesign(this);">Delete Media Post</a></li>
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