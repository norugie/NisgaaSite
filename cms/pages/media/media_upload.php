<!-- Dropzone Css -->
<link href="../plugins/dropzone/dropzone.css" rel="stylesheet">

<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>NEW MEDIA POST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='post.php?tab=post&page=media'"><i class="material-icons">list</i><span>LIST</span></button>
            </center>
        </div>
    </div> 
</div>
<div class="body">
    <!-- Inline Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="../functions/media.php" id="mediaUpload" name="file" class="dropzone" method="post" enctype="multipart/form-data">
                <div class="dz-message">
                    <div class="drag-icon-cph">
                        <i class="material-icons">touch_app</i>
                    </div>
                    <h3>Drop files here or click to upload.</h3>
                </div>
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
            <form action="../functions/post.php?post=true&addMediaImages=true" method="POST">
                <input type="text" id="image_media_id" name="image_media_id" value="<?php echo $_GET['media_id']; ?>" required hidden>
                <input type="text" id="image_media_name" name="image_media_name" value="" required hidden>
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

<!-- Dropzone Plugin Js -->
<script src="../plugins/dropzone/dropzone.js"></script>

<script>
    $(function () {
        //Dropzone
        Dropzone.options.mediaUpload = {
            paramName: "file",
            acceptedFiles: "image/*",
            maxFileSize: 10, // MB
            addRemoveLinks: true,
            dictDefaultMessage: "Drop files here to upload.", // Default: Drop files here to upload
            dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.", // Default: Your browser does not support drag'n'drop file uploads.
            dictFileTooBig: "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.", // Default: File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.
            dictInvalidFileType: "You can't upload files of this type.", // Default: You can't upload files of this type.
            dictRemoveFile: "Remove file", // Default: Remove file
            dictRemoveFileConfirmation: null, // Default: null
            dictMaxFilesExceeded: "You can not upload any more files.", // Default: You can not upload any more files.
            success: function(file){
                imageName = $("#image_media_name").val();
                $("#image_media_name").attr("value", file.name + "," + imageName);
            },
            error: function(file, message, xhr){
                if (xhr == null) this.removeFile(file);
                alert(message);
            },
            init: function(){
                this.on("removedfile", function(file){ 
                    imageNameList = $("#image_media_name").val();
                    imageNameList = imageNameList.replace(file.name+",", "");
                    $("#image_media_name").attr("value", imageNameList);
                });
            }
        };
    });
</script>