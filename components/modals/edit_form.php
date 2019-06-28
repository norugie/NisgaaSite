<!-- Edit Form Modal -->
<div class="modal fade" id="edit-form-file-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit File (File Type: File)</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form class="edit_form_validate_file" action="../functions/district.php?district=true&editForm=true" method="POST" enctype="multipart/form-data">
                            <input type="text" id="edit_form_id_file" name="edit_link_id" hidden>
                            <input type="text" id="edit_form_id_name_file" name="edit_link_id_name" hidden>
                            <input type="text" id="edit_form_id_file_file" name="edit_link_id_file" hidden>
                            <input type="text" id="edit_form_id_type_file" name="edit_link_id_type" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_form_title_file">File Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_form_title_file" name="edit_link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_form_desc_file">File Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="edit_form_desc_file" name="edit_link_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_form_content_file">File Content *</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 50 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="edit_form_content_file" name="edit_link_content">
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

<!-- Edit Form Modal -->
<div class="modal fade" id="edit-form-link-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit File (File Type: Link)</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <form class="edit_form_validate_link" action="../functions/district.php?district=true&editForm=true" method="POST">
                            <input type="text" id="edit_form_id_link" name="edit_link_id" hidden>
                            <input type="text" id="edit_form_id_name_link" name="edit_link_id_name" hidden>
                            <input type="text" id="edit_form_id_type_link" name="edit_link_id_type" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_form_title_link">File Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_form_title_link" name="edit_link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_form_desc_link">File Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="edit_form_desc_link" name="edit_link_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_form_content_link">Form Content *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_form_content_link" name="edit_link_content" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="float: right; margin-right: 12px;">
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