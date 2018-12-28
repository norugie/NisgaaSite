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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td>                                   
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
