<div class="header">
    MODIFY ANNOUNCEMENT
    <button type="button" class="btn bg-blue waves-effect" style="float: right; margin-top: -5px;" onclick="window.location.href='post.php?tab=post&page=announcements'">ANNOUNCEMENT LIST</button>
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <form class="edit_form_validate" action="../functions/post.php?post=true&editAnnouncement=true" method="POST">
                <input type="text" id="edit_announcement_id" name="edit_announcement_id" value="<?php echo $a_info['id']; ?>" hidden>
                <input type="text" id="edit_announcement_name" name="edit_announcement_name" value="<?php echo $a_info['a_id']; ?>" hidden>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="edit_announcement_title">Announcement Title *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="edit_announcement_title" name="edit_announcement_title" value="<?php echo $a_info['a_title'];?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="edit_announcement_date">Announcement Date Expiry *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" id="edit_announcement_date" name="edit_announcement_date" min="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d', strtotime($a_info['a_date_long'])); ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="edit_announcement_desc">Announcement Description *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea class="tinymce_editor" id="edit_announcement_desc" name="edit_announcement_desc">
                                    <?php echo $a_info['a_text']; ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: right; margin-right: 12px;">
                        <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- #END# Inline Layout -->
</div>