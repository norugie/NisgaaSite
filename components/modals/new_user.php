<!-- Add User Modal -->
<div class="modal fade" id="new-user-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New User</h4>
            </div>
            <div class="modal-body">
            <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form class="new_user_validate" action="../functions/district.php?district=true&addUser=true" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="firstname">First Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="lastname">Last Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="username">Username *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="password">Password *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="email_add">Email Address *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="email_add" name="email" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="role">Role *</label>
                                            <select class="form-control show-tick" name="role" id="role" title="-- SELECT ROLE FOR THE USER --">
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?php echo $role['id']; ?>"><?php echo $role['role_desc']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="school">School *</label>
                                            <select class="form-control show-tick" name="school" id="school" title="-- SELECT SCHOOL FOR THE USER --">
                                                <?php foreach ($schools as $school): ?>
                                                    <option value="<?php echo $school['id']; ?>"><?php echo $school['school_abbv']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                                        <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Inline Layout -->
            </div>
        </div>
    </div>
</div>

<script>
    var usernames = '<?php echo json_encode($usernames); ?>';

    $(document).ready(function(){
        $.validator.addMethod('alreadyExists', function(value, element) {
            return usernames.indexOf(value) == -1;
        }, "Username already exists");
    });

</script>