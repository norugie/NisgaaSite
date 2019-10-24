<!-- Edit Finance Modal -->
<div class="modal fade" id="edit-page-file-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">Edit <?php if($_GET['page'] == 'sdss') echo "SDSS"; else if($_GET['page'] == 'tech') echo "Tech"; else if($_GET['page'] == 'maintenance') echo "Maintenance"; else if($_GET['page'] == 'finance') echo "Finance"; else echo strtoupper($_GET['page']); ?> File</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form class="edit_form_validate_file" action="../functions/interaction.php?interaction=true&editPage=true&subtab=<?php echo $_GET['subtab']?>&page=<?php echo $_GET['page']; ?>" method="POST" enctype="multipart/form-data">
                            <input type="text" id="edit_page_id_file" name="edit_link_id" hidden>
                            <input type="text" id="edit_page_id_name_file" name="edit_link_id_name" hidden>
                            <input type="text" id="edit_page_content_name_file" name="edit_link_content_name" hidden>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_page_title_file">File Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="edit_page_title_file" name="edit_link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($_GET['page'] == 'finance'){ ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_link_tag">File Tag *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="edit_link_tag" id="edit_page_tag_file" title="Select Finance File tag" required>
                                            <option value="Finance Budget">Budget</option>
                                            <option value="Finance Audit">Audited Financial Statement</option>
                                            <option value="Finance SFI">Statement of Financial Information</option>
                                            <option value="Finance ECR">Executive Compensation Report</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="edit_page_content_file">File Content</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 50 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="edit_page_content_file" name="edit_link_content">
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