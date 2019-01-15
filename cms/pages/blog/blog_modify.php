<div class="header">
    MODIFY POST
    <button type="button" class="btn bg-blue waves-effect" style="float: right; margin-top: -5px;" onclick="window.location.href='post.php?tab=post&page=blog'">BLOG LIST</button>
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <?php if($_GEt['modify'] == 'details'){ ?>
                <!-- Modify details here -->

                <form class="edit_form_validate" action="../functions/post.php?post=true&editPost=true" method="POST">
                    <input type="text" id="edit_post_id" name="edit_post_id" value="<?php echo $post_info['id']; ?>" hidden>
                    <input type="text" id="edit_post_id_name" name="edit_post_id_name" value="<?php echo $post_info['post_id']; ?>" hidden>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="edit_post_title">Post Title *</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="edit_post_title" name="edit_post_title" value="<?php echo $post_info['post_title']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="edit_post_content" style="margin-bottom:10px;">Post Content *</label><br>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea id="edit_post_content" class="tinymce_editor" name="edit_post_content">
                                        <?php echo $post_info['post_text']; ?>
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

            <?php } else { ?>
                <!-- Modify categories here -->
                
            <?php } ?>
        </div>
    </div>
    <!-- #END# Inline Layout -->
</div>
