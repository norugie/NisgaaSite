<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4 style="margin:0px;"><?php echo $media_info['post_title']; ?></h4>
            <small><?php echo $media_info['firstname'] . " " . $media_info['lastname']; ?> | <?php echo date_format(date_create($media_info['post_date']), 'd M Y - l'); ?> </small>       
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block; margin-top: 4px;" onclick="window.location.href='post.php?tab=post&page=media'"><i class="material-icons">list</i></button>
                <button type="button" class="btn bg-green waves-effect" style="display: inline-block; margin-top: 4px; margin-left: 5px;" onclick="window.location.href='post.php?tab=post&page=media&media_option=modify&modify=details&media_id=<?php echo $m['id']; ?>'"><i class="material-icons">mode_edit</i></button>
                <button type="button" class="btn bg-red waves-effect" style="display: inline-block; margin-top: 4px; margin-left: 5px;" data-type="delete-media" data-id="<?php echo $media_info['id']; ?>" data-name="<?php echo $media_info['post_id']; ?>" onclick="alertDesign(this);"><i class="material-icons">delete</i></button>
            </center>
        </div>
    </div>
</div>
<div class="body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $media_info['post_text']; ?>
        </div>
    </div>
</div>