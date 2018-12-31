<!-- Add User Modal -->
<div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit User Account</h4>
            </div>
            <div class="modal-body">
            <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <div>
                                <form action="../functions/district.php?district=true&editUser=true" method="POST">
                                    <input type="text" id="edit-id" name="id" hidden>
                                    <input type="text" id="edit-username-hidden" name="username-hidden" hidden>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit-firstname">First Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="edit-firstname" class="form-control" name="firstname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="edit-lastname">Last Name *</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="edit-lastname" class="form-control" name="lastname" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit-role">Role * </label>
                                            <select class="form-control show-tick" name="role" id="edit-role">
                                                <option selected hidden disabled>-- SELECT ROLE FOR THE USER --</option>
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?php echo $role['id']; ?>"><?php echo $role['role_desc']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="edit-school">School *</label>
                                            <select class="form-control show-tick" name="school" id="edit-school">
                                                <option selected hidden disabled>-- SELECT SCHOOL FOR THE USER --</option>
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
