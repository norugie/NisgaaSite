<!-- New Policy Modal -->
<div class="modal fade" id="new-policy-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New Policy</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="new_form_validate" action="../functions/district.php?district=true&addPolicy=true" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_title">Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="link_title" name="link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_desc">Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="link_desc" name="link_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_tag">Policy Tag *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="link_tag" id="link_tag" title="Select policy tag" required>
                                            <option value="PolicyAP 200">Administrative Procedure: Personnel</option>
                                            <option value="PolicyAP 300">Administrative Procedure: Students</option>
                                            <option value="PolicyAP 400">Administrative Procedure: Operations, Facilities</option>
                                            <option value="PolicyAP 500">Administrative Procedure: Finance</option>
                                            <option value="PolicyP BL">Policy: By Laws</option>
                                            <option value="PolicyP 100">Policy: Governance</option>
                                            <option value="PolicyP 300">Policy: Students</option>
                                            <option value="PolicyP 400">Policy: Operations, Facilities</option>
                                            <option value="PolicyP 500">Policy: Finance</option>
                                            <option value="PolicyP 600">Policy: Legislation, School Act, Ministerial Orders, Ministry Directives</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_content">Content *</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 20 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line" id="input-field">
                                            <input type="file" class="form-control type-file" id="link_content" name="link_content" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf" required>
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