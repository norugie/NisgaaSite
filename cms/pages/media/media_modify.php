<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>MODIFY MEDIA POST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=media'">MEDIA LIST</button>
            </center>
        </div>
    </div> 
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <?php if($_GET['modify'] == 'details'){ ?>
                <!-- Media details here -->
                <form class="edit_form_validate" action="../functions/post.php?post=true&editMedia=true" method="POST">
                    <input type="text" id="edit_media_post_id" name="edit_media_post_id" value="<?php echo $media_info['id']; ?>" hidden>
                    <input type="text" id="edit_media_post_id_name" name="edit_media_post_id_name" value="<?php echo $media_info['post_id']; ?>" hidden>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="edit_media_post_title">Media Post Title *</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="edit_media_post_title" name="edit_media_post_title" value="<?php echo $media_info['post_title']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="edit_media_post_content" style="margin-bottom:10px;">Media Post Description *</label><br>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="2" class="form-control no-resize" id="edit_media_post_content" name="edit_media_post_content" required><?php echo $media_info['post_text']; ?></textarea>
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

            <?php } else { ?>
                <!-- Media categories here -->
            <?php } ?>
        </div>
    </div>
    <!-- #END# Inline Layout -->
</div>