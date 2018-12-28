<?php 

    $links = $post->linkList($database);

 ?>

<?php require '../components/modals/new_link.php'; ?>
<?php require '../components/modals/edit_link.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <?php if($_SESSION['type'] == 1){ ?>
                <div class="header">
                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-link-modal" style="float: right; margin-top: -5px;">ADD NEW LINK</button>
                    <br>
                </div>
            <?php } ?>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Link Title</th>
                                <th>Link Type</th>
                                <th>Link Tag</th>
                                <th>Link Description</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Link Title</th>
                                <th>Link Type</th>
                                <th>Link Tag</th>
                                <th>Link Description</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($links as $link): ?>
                                <tr>
                                    <td><a href="<?php if($link['link_type'] == 'File'){ echo "../"; } echo $link['link_content']; ?>" <?php if($link['link_type'] == 'Link'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $link['link_name']; ?></a></td>
                                    <td><?php echo $link['link_type']; ?></td>
                                    <td><?php echo $link['link_tag']; ?></td>
                                    <td><?php echo $link['link_desc']; ?></td>
                                    <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-link-modal" data-values="<?php echo htmlspecialchars(json_encode($link)); ?>" onclick="editUser(this);" <?php if($link['status'] == 'Inactive') echo "disabled"; ?>>MODIFY</button></center></td> 
                                    <?php if($link['status'] == 'Active'){ ?>
                                        <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-link" data-id="<?php echo $link['id']; ?>" data-name="<?php echo $link['link_id']; ?>" onclick="alertDesign(this);">DELETE</button></center></td>
                                    <?php } else { ?>
                                        <td><center><button type="button" class="btn bg-cyan waves-effect" data-type="reopen-link" data-id="<?php echo $link['id']; ?>" data-name="<?php echo $link['link_id']; ?>" onclick="alertDesign(this);">REACTIVATE</button></center></td>
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
