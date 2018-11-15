<?php $users = $district->userList($database); ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-user-modal" style="float: right; margin-top: -5px;">ADD NEW USER</button>
                <br>
            </div>
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Site Role</th>
                                <th>School</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($users as $solo): ?>
                            <tr>
                                <td><?php echo $solo['firstname'] . " " . $solo['lastname']; ?></td>
                                <td><?php echo $solo['role_desc']; ?></td>
                                <td><?php echo $solo['school_abbv']; ?></td>
                                <td><?php echo $solo['username']; ?></td>
                                <td><?php echo $solo['email']; ?></td>
                                <td><center><button type="button" class="btn bg-green waves-effect">MODIFY</button></center></td>
                                <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-user" data-id="<?php echo $solo['id']; ?>" onclick="alertDesign(this);">DELETE</button></center></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>