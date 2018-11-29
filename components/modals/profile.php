<!-- Profile Modal -->
<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel"><?php echo $user['firstname'] . " " . $user['lastname']; ?>'s Profile</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>
                            <img src="../images/profile/<?php echo $user['display_picture']; ?>" width="120" height="120" alt="User">   
                        </td>
                        <td valign="bottom">
                            <p class="font-20" style="margin-left: 15px; margin-bottom: 3px;"><b><?php echo $user['firstname'] . " " . $user['lastname']; ?></b> (<?php echo $user['username']; ?>)</p>
                            <p class="font-15" style="margin-left: 15px; margin-bottom: 0px;"><?php echo $user['role_desc']; ?></p>
                        </td>
                    </tr>
                </table>
                
                <!-- Tabs -->
                <ul class="nav nav-tabs tab-col-blue-grey" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#profile_with_icon_title" data-toggle="tab">
                            <i class="material-icons">face</i> EDIT PROFILE
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#settings_with_icon_title" data-toggle="tab">
                            <i class="material-icons">settings</i> ACCOUNT SETTINGS
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="profile_with_icon_title">
                        <!-- Horizontal Layout -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <div class="body">
                                        <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p>
                                        <form class="form-horizontal" action="../functions/user.php?userOpt=true&editProfile=true" method="POST">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="first_name">First Name *</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="first_name" name="firstname" class="form-control" value="<?php echo $user['firstname']; ?>" placeholder="Enter your first name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="last_name">Last Name *</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="last_name" name="lastname" class="form-control" value="<?php echo $user['lastname']; ?>" placeholder="Enter your last name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row clearfix demo-button-sizes" style="float: right; margin-right: 12px;">
                                                <div>
                                                    <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE CHANGES</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Horizontal Layout -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs tab-col-blue-grey" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile_picture" data-toggle="tab">
                                    CHANGE PROFILE PICTURE
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#change_password" data-toggle="tab">
                                    CHANGE PASSWORD
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile_picture">
                                <form action="../functions/user.php?userOpt=true&editPicture=true" method="POST" enctype="multipart/form-data">
                                    Select image to upload:
                                    <input type="file" name="image" id="imageToUpload" accept="image/*" style="width: 300px;" required>
                                    <input type="submit" class="btn bg-blue-grey btn-lg" value="UPLOAD IMAGE" name="submit" style="float: right; margin-top: -37px;">
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="change_password">
                                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p>
                                <form class="form-horizontal" action="../functions/user.php?userOpt=true&editPassword=true" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label for="old_password">Old Password *</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Enter your old password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label for="new_password">New Password *</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="new_password" name="new_password" class="form-control"  placeholder="Enter your new password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label for="r_password">Confirm Password *</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" id="r_password" name="r_password" class="form-control" placeholder="Confirm your new password" onkeyup="checkPassword();" required>
                                                </div>
                                                <span id="text_validation"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row clearfix demo-button-sizes" style="float: right; margin-right: 12px;">
                                        <div>
                                            <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect" style="color:#fff;">SAVE CHANGES</button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkPassword(){
        var password = document.getElementById('new_password').value;
        var repeat_password = document.getElementById('r_password').value;
        var password_validation = document.getElementById('text_validation');
        var color = "";
        var message = "";

        if(password != repeat_password){
            message = "Passwords do not match";
            color = "#ff6666";
			password_validation.innerHTML = message;
			password_validation.style.color = color;
        } else {
            message = "";
            password_validation.innerHTML = message;
        }
    }
</script>