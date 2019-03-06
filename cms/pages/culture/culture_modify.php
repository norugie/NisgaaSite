<?php $page_info = $interaction->pageInformationCultureCorner($database); ?>
<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>MODIFY NISGA'A CULTURE CORNER</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='interaction.php?tab=web&page=<?php echo $_GET['page']; ?>'">PAGE VIEW</button>
            </center>
        </div>
    </div>     
</div>
<div class="body">
    <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <form class="edit_form_validate" action="../functions/interaction.php?interaction=true&page=<?php echo $_GET['page']; ?>&editCulture=true" method="POST">
            <input type="text" id="edit_culture_id" name="culture_id" value="<?php echo $page_info['id']; ?>" hidden>
                <input type="text" id="edit_culture_name" name="culture_name" value="<?php echo $_GET['page']; ?>" hidden>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="culture_desc">Page Content *</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea class="tinymce_editor" id="culture_desc" name="culture_desc">
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