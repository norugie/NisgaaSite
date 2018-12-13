<?php 

    $categories = $post->categoryList($database);

 ?>

<?php // require '../components/modals/new_user.php'; ?>
<?php // require '../components/modals/edit_user.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <?php if($_SESSION['type'] == 1){ ?>
                <div class="header">
                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-category-modal" style="float: right; margin-top: -5px;">ADD NEW USER</button>
                    <br>
                </div>
            <?php } ?>
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
                                    <td><?php echo count($post->postsPerCategoryList($database, $cat['id'])); ?></td>
                                    <td><center><button type="button" class="btn bg-cyan waves-effect">VIEW LIST</button></center></td>
                                    <?php if($_SESSION['type'] == 1){ ?>
                                    <td><center><button type="button" class="btn bg-red waves-effect">DELETE</button></center></td>
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
