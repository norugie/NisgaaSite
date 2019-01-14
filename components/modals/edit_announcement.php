<!-- Edit Announcement Modal -->
<div class="modal fade" id="edit-announcement-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Announcement Post</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form class="edit_form_validate" action="../functions/post.php?post=true&editAnnouncement=true" method="POST">
                            <input type="text" id="edit_announcement_id" name="edit_announcement_id" hidden>
                            <input type="text" id="edit_announcement_name" name="edit_announcement_name" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="edit_announcement_title">Announcement Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_announcement_title" name="edit_announcement_title" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="edit_announcement_date">Announcement Date Expiry *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" id="edit_announcement_date" name="edit_announcement_date" min="<?php echo date('Y-m-d');?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_announcement_desc">Announcement Description *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="edit_announcement_desc" name="edit_announcement_desc"></textarea>
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
        </div>
    </div>
</div>