<?php 

    $forms = $interaction->formList($database);
    print_r($forms);
 ?>

<?php require '../components/modals/new_form.php'; ?>
<?php require '../components/modals/edit_form.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>FORM LIST</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <?php if($_SESSION['type'] != 3){ ?>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-form-modal" style="display: inline-block;"><i class="material-icons">add</i><span>NEW FORM</span></button>
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
                                <th>Form Title</th>
                                <th>Form Description</th>
                                <?php if($_SESSION['type'] != 3){ ?>
                                <th>Modify</th>
                                <th>Delete</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Form Title</th>
                                <th>Form Description</th>
                                <?php if($_SESSION['type'] != 3){ ?>
                                <th>Modify</th>
                                <th>Delete</th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($forms as $form): ?>
                                <tr>
                                    <td><a href="<?php echo "../links/" . $form['link_content']; ?>" download><?php echo $form['link_name']; ?></a></td>
                                    <td><?php echo $form['link_desc']; ?></td>
                                    <?php if($_SESSION['type'] != 3){ ?>
                                        <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-form-modal" 
                                        data-values='{
                                            "id":           <?php echo json_encode($form['id']); ?>,
                                            "link_id":      <?php echo json_encode($form['link_id']); ?>,
                                            "link_name":    <?php echo json_encode(str_replace("'", "&apos;", $form['link_name'])); ?>,
                                            "link_desc":    <?php echo json_encode(str_replace("'", "&apos;", $form['link_desc'])); ?>,
                                            "link_content": <?php echo json_encode($form['link_content']); ?>
                                        }' 
                                        onclick="editForm(this);" <?php if($form['status'] == 'Inactive') echo "disabled"; ?>><i class="material-icons">mode_edit</i><span>MODIFY</span></button></center></td> 
                                        <?php if($form['status'] == 'Active'){ ?>
                                            <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-link" data-id="<?php echo $form['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $form['link_name']); ?>" onclick="alertDesign(this);"><i class="material-icons">clear</i><span>DELETE</span></button></center></td>
                                        <?php } else { ?>
                                            <td><center><button type="button" class="btn bg-cyan waves-effect" data-type="reopen-link" data-id="<?php echo $form['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $form['link_name']); ?>" onclick="alertDesign(this);"><i class="material-icons">check</i><span>REACTIVATE</span></button></center></td>
                                        <?php } ?>
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
