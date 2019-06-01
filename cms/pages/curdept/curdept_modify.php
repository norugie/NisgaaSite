<?php $page_info = $interaction->pageInformation($database, $_GET['page'], $_GET['subtab'], $_GET['id']); ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>MODIFY PAGE INFORMATION</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='interaction.php?tab=web&subtab=<?php echo $_GET['subtab']; ?>&page=<?php echo $_GET['page']; ?>'">PAGE VIEW</button>
                        </center>
                    </div>
                </div>     
            </div>
            <div class="body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <form class="edit_form_validate" action="../functions/interaction.php?interaction=true&page=<?php echo $_GET['page']; ?>&subtab=<?php echo $_GET['subtab']; ?>&editPageInformation=true" method="POST">
                        <input type="text" id="edit_curdept_id" name="curdept_id" value="<?php echo $page_info['id']; ?>" hidden>
                            <input type="text" id="edit_curdept_name" name="curdept_name" value="<?php echo $_GET['page']; ?>" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="curdept_desc">Page Content *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="tinymce_editor" id="curdept_desc" name="curdept_desc">
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
        </div>
    </div>
</div>
<!-- TinyMCE -->
<script src="../plugins/tinymce/tinymce.min.js"></script>
<script src="../js/editors.js"></script>