<?php 

    $links = $interaction->financeList($database, $_GET['page'], $_GET['subtab']);

 ?>

<?php require '../components/modals/new_finance.php'; ?>
<?php require '../components/modals/edit_finance.php'; ?>

<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>FINANCE FILE LIST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <?php if($_SESSION['type'] != 3){ ?>
                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-finance-modal" style="display: inline-block;"><i class="material-icons">add</i><span>NEW FILE</span></button>
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
                    <th>File Title</th>
                    <th>File Description</th>
                    <th>File Tag</th>
                    <?php if($_SESSION['type'] != 3){ ?>
                    <th>Modify</th>
                    <th>Delete</th>
                    <?php } ?>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>File Title</th>
                    <th>File Description</th>
                    <th>File Tag</th>
                    <?php if($_SESSION['type'] != 3){ ?>
                    <th>Modify</th>
                    <th>Delete</th>
                    <?php } ?>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($links as $link): ?>
                    <tr>
                        <td><a href="<?php echo "../links/" . $link['link_content']; ?>" target="_blank"><?php echo $link['link_name']; ?></a></td>
                        <td><?php echo $link['link_desc']; ?></td>
                        <td><?php
                            if($link['link_tag'] == 'Finance Budget') echo "Budget";
                            else if($link['link_tag'] == 'Finance Audit') echo "Audited Financial Statement";
                            else if($link['link_tag'] == 'Finance Audit') echo "Statement of Financial Information";
                            else echo "Executive Compensation Report";
                        ?></td>
                        <?php if($_SESSION['type'] != 3){ ?>
                            <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-finance-file-modal" 
                            data-values='{
                                "id":           <?php echo json_encode($link['id']); ?>,
                                "link_id":      <?php echo json_encode($link['link_id']); ?>,
                                "link_name":    <?php echo json_encode(str_replace("'", "&apos;", $link['link_name'])); ?>,
                                "link_desc":    <?php echo json_encode(str_replace("'", "&apos;", $link['link_desc'])); ?>,
                                "link_tag":     <?php echo json_encode($link['link_tag']); ?>,
                                "link_content": <?php echo json_encode($link['link_content']); ?>
                            }' 
                            onclick="editFinance(this);" <?php if($link['status'] == 'Inactive') echo "disabled"; ?>><i class="material-icons">mode_edit</i><span>MODIFY</span></button></center></td> 
                            <?php if($link['status'] == 'Active'){ ?>
                                <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-finance" data-id="<?php echo $link['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $link['link_name']); ?>" onclick="alertDesign(this);"><i class="material-icons">clear</i><span>DELETE</span></button></center></td>
                            <?php } else { ?>
                                <td><center><button type="button" class="btn bg-cyan waves-effect" data-type="reopen-finance" data-id="<?php echo $link['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $link['link_name']); ?>" onclick="alertDesign(this);"><i class="material-icons">check</i><span>REACTIVATE</span></button></center></td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
