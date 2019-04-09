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
            <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
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
            <form action="">
                <input type="text">
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
        Dropzone.options.frmFileUpload = {
            paramName: "file",
            maxFilesize: 2
        };
    });
</script>