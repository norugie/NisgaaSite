<?php 
    
    $categories = $post->categoryList($database);

 ?>

<?php  require '../components/modals/new_category.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>CATEGORY LIST</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-category-modal" style="display: inline-block;">ADD NEW CATEGORY</button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Posts and Media Number</th>
                                <th>View List</th>
                                <?php if($_SESSION['type'] == 1){ ?>
                                <th>Delete</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Posts and Media Number</th>
                                <th>View List</th>
                                <?php if($_SESSION['type'] == 1){ ?>
                                <th>Delete</th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($categories as $cat): ?>
                                <tr>
                                    <td><?php echo $cat['cat_desc']; ?></td>
                                    <td><?php echo $cat['status']; ?></td>
                                    <td><?php echo $countPosts = count($post->postsAndMediaPerCategoryCount($database, $cat['id'])); ?></td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php if($countPosts == 0){ echo "disabled"; } ?>>
                                                    VIEW LIST <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <?php if(count($post->postsPerCategoryList($database, $cat['id'])) > 0){ ?>
                                                    <li><a href="post.php?tab=post&page=blog&id=<?php echo $cat['id']; ?>">View List (Posts)</a></li>
                                                    <?php } ?>
                                                    <?php if(count($post->mediaPerCategoryList($database, $cat['id'])) > 0){ ?>
                                                    <li><a href="post.php?tab=post&page=media&id=<?php echo $cat['id']; ?>">View List (Media)</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </center>
                                    </td>
                                    <?php if($_SESSION['type'] == 1){ ?>
                                    <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-cat" data-id="<?php echo $cat['id']; ?>" data-name="<?php echo $cat['cat_id']; ?>" onclick="alertDesign(this);" <?php if( $cat['id'] == 1 || $cat['id'] == 2){ echo "disabled"; } ?>>DELETE</button></center></td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
