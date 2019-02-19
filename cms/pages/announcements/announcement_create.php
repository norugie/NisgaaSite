<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>NEW ANNOUNCEMENT POST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=announcements'"><i class="material-icons">list</i><span>LIST</span></button>
            </center>
        </div>
    </div> 
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <form class="new_form_validate" action="../functions/post.php?post=true&addAnnouncement=true" method="POST">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="announcement_title">Announcement Title *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="announcement_title" name="announcement_title" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="announcement_date">Announcement Date Expiry *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" id="announcement_date" name="announcement_date" min="<?php echo date('Y-m-d');?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="announcement_desc">Announcement Description *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea class="tinymce_editor" id="announcement_desc" name="announcement_desc">

                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="float: right;">
                        <button type="submit" class="btn bg-blue-grey btn-block btn-lg waves-effect">SAVE</button>  
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- #END# Inline Layout -->
</div>