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
                            <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-category-modal" style="display: inline-block;"><i class="material-icons">add</i><span>NEW CATEGORY</span></button>
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
                                    <td><?php echo $countPosts = count($post->postsPerCategoryCount($database, $cat['id'])); ?></td>
                                    <td>
                                        <center>
                                            <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=posts&id=<?php echo $cat['id']; ?>'" <?php if(count($post->postsPerCategoryListIntegrated($database, $cat['id'])) == 0) echo "disabled"; ?>><i class="material-icons">list</i><span>POST LIST</span></button>
                                        </center>
                                    </td>
                                    <?php if($_SESSION['type'] == 1){ ?>
                                    <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-cat" data-id="<?php echo $cat['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $cat['cat_desc']); ?>" onclick="alertDesign(this);" <?php if( $cat['id'] == 1 || $cat['id'] == 2){ echo "disabled"; } ?>><i class="material-icons">clear</i><span>DELETE</span></button></center></td>
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
