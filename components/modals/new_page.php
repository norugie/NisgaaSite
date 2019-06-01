<!-- New Page File Modal -->
<div class="modal fade" id="new-page-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New <?php if($_GET['page'] == 'sdss') echo "SDSS"; else if($_GET['page'] == 'tech') echo "Tech"; else if($_GET['page'] == 'maintenance') echo "Maintenance"; else echo strtoupper($_GET['page']); ?> File</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="new_form_validate" action="../functions/interaction.php?interaction=true&addPage=true&subtab=<?php echo $_GET['subtab']; ?>&page=<?php echo $_GET['page']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_title">File Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="link_title" name="link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($_GET['page'] == 'finance'){ ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_tag">File Tag *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="link_tag" id="link_tag" title="Select Finance File tag" required>
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
                                    <label for="link_content">File Content *</label>
                                    <div class="form-group">
                                        <div class="form-line" id="input-field">
                                            <input type="file" class="form-control type-file" id="link_content" name="link_content" required>
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