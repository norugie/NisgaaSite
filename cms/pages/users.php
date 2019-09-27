<?php 

    $users = $district->userList($database);
    $usernames = $district->usernameList($database);

 ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-xs-sm-center">
                            <h4>USER LIST</h4>      
                        </div>
                    </div>
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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Site Role</th>
                                <th>School</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($users as $solo): ?>
                                <tr>
                                    <td><?php echo $uname = $solo['firstname'] . " " . $solo['lastname']; ?></td>
                                    <td><?php echo $solo['role_desc']; ?></td>
                                    <td><?php echo $solo['school_abbv']; ?></td>
                                    <td><?php echo $solo['username']; ?></td>
                                    <td><?php echo $solo['email']; ?></td>                                      
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
