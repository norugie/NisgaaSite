<!-- New Link Modal -->
<div class="modal fade" id="new-link-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #607D8B; color: #fff; margin: 0; padding: 15px;">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="largeModalLabel">New Link</h4>
            </div>
            <div class="modal-body">
                <p class="font-12"><i><b>Note:</b> Fields marked with an asterisk are required</i></p><br>
                <!-- Inline Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="new_form_validate" action="../functions/post.php?post=true&addLink=true" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_title">Link Title *</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="link_title" name="link_title" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_desc">Link Description</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" id="link_desc" name="link_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="link_thumbnail">Link Thumbnail</label>
                                    <p class="font-12"><i><b>Note:</b> The max file size you can upload is 10 MB</i></p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="link_thumbnail" id="link_thumbnail" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="link_type">Link Type *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="link_type" id="link_type" onchange="inputType(this);" title="Select link type" required>
                                            <option value="Link">Link</option>
                                            <option value="File">File</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="link_tag">Link Tag *</label>
                                    <div class="form-group">
                                        <select class="form-control show-tick" name="link_tag" id="link_tag" title="Select link tag" required>
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
                                    <label for="link_content">Link Content *</label>
                                    <p class="font-12"><i><b>Note:</b> If link is a file, the max file size you can upload is 50 MB</i></p>
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
        $("#input-field").append('<input type="file" class="form-control type-file" id="link_content" name="link_content" required>');
        $(".type-link").remove();
        console.log(selectedType);
    } else {
        $("#input-field").append('<input type="text" class="form-control type-link" id="link_content" name="link_content" required>');
        $(".type-file").remove();
        console.log(selectedType);
    }
}

</script>