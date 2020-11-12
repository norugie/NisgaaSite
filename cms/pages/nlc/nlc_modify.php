<?php $page_info = $interaction->aboutList($database); ?>
<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>MODIFY ABOUT SECTION</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='interaction.php?tab=web&subtab=content&page=<?php echo $_GET['page']; ?>'">PAGE VIEW</button>
            </center>
        </div>
    </div>     
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <form class="edit_form_validate" action="../functions/interaction.php?interaction=true&page=<?php echo $_GET['page']; ?>&editAboutProgram=true" method="POST">
                <input type="text" id="edit_about_programs_id" name="about_programs_id" value="<?php echo $page_info['id']; ?>" hidden>
                <input type="text" id="edit_about_programs_name" name="about_programs_name" value="<?php echo $page_info['web_id']; ?>" hidden>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="edit_field_name">Page Content *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea class="tinymce_editor" id="edit_field_name" name="edit_field_name">
                                    <?php echo $page_info['web_desc']; ?>
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

<!-- TinyMCE -->
<script src="../plugins/tinymce/tinymce.min.js"></script>
<script src="../js/editors.js"></script>