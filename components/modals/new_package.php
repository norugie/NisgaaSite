<!-- New Package Modal -->
<div class="modal fade" id="new-package-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New Package</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="new_form_validate" action="../functions/district.php?district=true&addPackage=true" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_title">Package Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="link_title" name="link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_desc">Package Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="link_desc" name="link_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_type">Package Type *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="link_type" id="link_type" onchange="inputType(this);" title="Select form type" required>
                                            <option value="Link">Link</option>
                                            <option value="File">File</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_content">Package Content *</label>
                                    <p class="font-12"><i><b>Note:</b> If form is a file, the max file size you can upload is 20 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line" id="input-field">
                                            <!-- Insert input onchange here -->
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

<script>

function inputType(e){
    var selectedType = $(e).children("option:selected").val();

    if(selectedType === 'File'){
        $("#input-field").append('<input type="file" class="form-control type-file" id="link_content" name="link_content" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/pdf" required>');
        $(".type-link").remove();
        console.log(selectedType);
    } else {
        $("#input-field").append('<input type="text" class="form-control type-link" id="link_content" name="link_content" required>');
        $(".type-file").remove();
        console.log(selectedType);
    }
}

</script>