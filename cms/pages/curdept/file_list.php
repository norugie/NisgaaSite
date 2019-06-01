<?php 

    $links = $interaction->pageFileList($database, $_GET['page'], $_GET['subtab']);
    $page_get = 'page';
 ?>

<?php require '../components/modals/new_'.$page_get.'.php'; ?>
<?php require '../components/modals/edit_'.$page_get.'.php'; ?>


<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4><?php echo strtoupper($_GET['page']); ?> FILE LIST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <?php if($_SESSION['type'] != 3){ ?>
                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-<?php echo $page_get; ?>-modal" style="display: inline-block;"><i class="material-icons">add</i><span>NEW FILE</span></button>
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
                        <td><?php
                            if($link['link_tag'] == 'Finance Budget') echo "Budget";
                            else if($link['link_tag'] == 'Finance Audit') echo "Audited Financial Statement";
                            else if($link['link_tag'] == 'Finance SFI') echo "Statement of Financial Information";
                            else if($link['link_tag'] == 'Finance ECR') echo "Executive Compensation Report";
                            else echo $link['link_tag'];
                        ?></td>
                        <?php if($_SESSION['type'] != 3){ ?>
                            <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-<?php echo $page_get; ?>-file-modal" 
                            data-values='{
                                "id":           <?php echo json_encode($link['id']); ?>,
                                "link_id":      <?php echo json_encode($link['link_id']); ?>,
                                "link_name":    <?php echo json_encode(str_replace("'", "&apos;", $link['link_name'])); ?>,
                                "link_desc":    <?php echo json_encode(str_replace("'", "&apos;", $link['link_desc'])); ?>,
                                "link_tag":     <?php echo json_encode($link['link_tag']); ?>,
                                "link_content": <?php echo json_encode($link['link_content']); ?>
                            }' 
                            onclick="<?php if($page_get == 'finance') echo 'editFinance(this);'; else echo 'editPageFile(this);'; ?>"><i class="material-icons">mode_edit</i><span>MODIFY</span></button></center></td> 
                            <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-page" data-id="<?php echo $link['id']; ?>" data-name="<?php echo str_replace(' ', '%20', $link['link_name']); ?>" data-subtab="<?php echo $_GET['subtab']; ?>" data-page="<?php echo $_GET['page']; ?>"  onclick="alertDesign(this);"><i class="material-icons">clear</i><span>DELETE</span></button></center></td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
