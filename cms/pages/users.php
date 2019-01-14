<?php 

    $users = $district->userList($database);
    $usernames = $district->usernameList($database);

 ?>

<?php require '../components/modals/new_user.php'; ?>
<?php require '../components/modals/edit_user.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <?php if($_SESSION['type'] == 1){ ?>
                <div class="header">
                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-user-modal" style="float: right; margin-top: -5px;">ADD NEW USER</button>
                    <br>
                </div>
            <?php } ?>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Site Role</th>
                                <th>School</th>
                                <th>Username</th>
                                <th>Email</th>
                                <?php if($_SESSION['type'] == 1){ ?><th>Modify</th><?php } ?>
                                <?php if($_SESSION['type'] != 4){ ?><th>Delete<?php if($_SESSION['type'] == 1) echo '/Reactivate'; ?></th><?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Site Role</th>
                                <th>School</th>
                                <th>Username</th>
                                <th>Email</th>
                                <?php if($_SESSION['type'] == 1){ ?><th>Modify</th><?php } ?>
                                <?php if($_SESSION['type'] != 4){ ?><th>Delete<?php if($_SESSION['type'] == 1) echo '/Reactivate'; ?></th><?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($users as $solo): ?>
                                <?php if($_SESSION['type'] == 1){ ?>
                                    <tr>
                                        <td><?php echo $solo['firstname'] . " " . $solo['lastname']; ?></td>
                                        <td><?php echo $solo['role_desc']; ?></td>
                                        <td><?php echo $solo['school_abbv']; ?></td>
                                        <td><?php echo $solo['username']; ?></td>
                                        <td><?php echo $solo['email']; ?></td>
                                        <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-user-modal" 
                                        data-values='{
                                                "id":           <?php echo json_encode($solo['id']); ?>,
                                                "username":     <?php echo json_encode($solo['username']); ?>,
                                                "firstname":    <?php echo json_encode($solo['firstname']); ?>,
                                                "lastname":     <?php echo json_encode($solo['lastname']); ?>,
                                                "user_type":    <?php echo json_encode($solo['user_type']); ?>,
                                                "school":       <?php echo json_encode($solo['school']); ?>
                                            }' 
                                        onclick="editUser(this);" <?php if($solo['status'] == 'Inactive') echo "disabled"; ?>>MODIFY</button></center></td>
                                        <?php if($solo['status'] == 'Active'){ ?>
                                            <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-user" data-id="<?php echo $solo['id']; ?>" data-name="<?php echo $solo['username']; ?>" onclick="alertDesign(this);">DELETE</button></center></td>
                                        <?php } else { ?>
                                            <td><center><button type="button" class="btn bg-cyan waves-effect" data-type="reactivate-user" data-id="<?php echo $solo['id']; ?>" data-name="<?php echo $solo['username']; ?>" onclick="alertDesign(this);">REACTIVATE</button></center></td>
                                        <?php } ?>                                       
                                    </tr>
                                <?php } else { ?>
                                    <?php if($solo['status'] !== 'Inactive'){ ?>
                                        <tr>
                                            <td><?php echo $solo['firstname'] . " " . $solo['lastname']; ?></td>
                                            <td><?php echo $solo['role_desc']; ?></td>
                                            <td><?php echo $solo['school_abbv']; ?></td>
                                            <td><?php echo $solo['username']; ?></td>
                                            <td><?php echo $solo['email']; ?></td>
                                            <?php if($solo['user_type'] != 1){ ?>
                                                <?php if($_SESSION['type'] != 4){ ?><td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-user" data-id="<?php echo $solo['id']; ?>" data-name="<?php echo $solo['username']; ?>" onclick="alertDesign(this);">DELETE</button></center></td><?php } ?>
                                            <?php } else { ?>
                                                <?php if($_SESSION['type'] != 4){ ?><td><center><button type="button" class="btn bg-red waves-effect" disabled>DELETE</button></center></td><?php } ?>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
