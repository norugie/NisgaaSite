<!-- Edit Link Modal -->
<div class="modal fade" id="edit-link-file-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Link (Link Type: File)</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form class="edit_form_validate_file" action="../functions/post.php?post=true&editLink=true" method="POST" enctype="multipart/form-data">
                            <input type="text" id="edit_link_id_file" name="edit_link_id" hidden>
                            <input type="text" id="edit_link_id_name_file" name="edit_link_id_name" hidden>
                            <input type="text" id="edit_link_id_file_file" name="edit_link_id_file" hidden>
                            <input type="text" id="edit_link_id_type_file" name="edit_link_id_type" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_title_file">Link Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_link_title_file" name="edit_link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_desc_file">Link Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="edit_link_desc_file" name="edit_link_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_tag_file">Link Tag *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="edit_link_tag" id="edit_link_tag_file" title="Select link tag" required>
                                            <option value="Quick Links">Quick Links</option>
                                            <!-- <option value="News Files">News Files</option> -->
                                            <?php if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){ ?>
                                            <option value="General Resources">District Resources</option>
                                            <option value="Learning Resources">Learning Resources</option>
                                            <option value="Parent Resources">Parent Resources</option>
                                            <option value="Flipping Book">Flipping Book</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_content_file">Link Content *</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 50 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="edit_link_content_file" name="edit_link_content">
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

<!-- Edit Link Modal -->
<div class="modal fade" id="edit-link-link-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit Link (Link Type: Link)</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <form class="edit_form_validate_link" action="../functions/post.php?post=true&editLink=true" method="POST">
                            <input type="text" id="edit_link_id_link" name="edit_link_id" hidden>
                            <input type="text" id="edit_link_id_name_link" name="edit_link_id_name" hidden>
                            <input type="text" id="edit_link_id_type_link" name="edit_link_id_type" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_title_link">Link Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_link_title_link" name="edit_link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_desc_link">Link Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="edit_link_desc_link" name="edit_link_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_tag_link">Link Tag *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="edit_link_tag" id="edit_link_tag_link" title="Select link tag" required>
                                            <option value="Quick Links">Quick Links</option>
                                            <!-- <option value="News Files">News Files</option> -->
                                            <?php if($_SESSION['school'] != 3 && $_SESSION['school'] != 4 && $_SESSION['school'] != 5 && $_SESSION['school'] != 6){ ?>
                                            <option value="General Resources">District Resources</option>
                                            <option value="Learning Resources">Learning Resources</option>
                                            <option value="Parent Resources">Parent Resources</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_content_link">Link Content *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_link_content_link" name="edit_link_content" required>
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