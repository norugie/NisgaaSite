<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4 style="margin:0px;"><?php echo $a_info['a_title']; ?></h4>
            <small><?php echo $a_info['firstname'] . " " . $a_info['lastname']; ?> | <?php echo date_format(date_create($a_info['a_date']), 'd M Y - l'); ?> </small>       
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" style="display: inline-block; margin-top: 5px;" onclick="window.location.href='post.php?tab=post&page=announcements'"><i class="material-icons">list</i></button>
                <button type="button" class="btn bg-green waves-effect" style="display: inline-block; margin-top: 5px; margin-left: 5px;" onclick="window.location.href='post.php?tab=post&page=announcements&announcement_option=modify&a_id=<?php echo $a_info['id']; ?>'"><i class="material-icons">mode_edit</i></button>
                <button type="button" class="btn bg-red waves-effect" style="display: inline-block; margin-top: 5px; margin-left: 5px;" data-type="delete-announcement" data-id="<?php echo $a_info['id']; ?>" data-name="<?php echo $a_info['a_id']; ?>" onclick="alertDesign(this);"><i class="material-icons">delete</i></button>
            </center>
        </div>
    </div>
</div>
<div class="body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $a_info['a_text']; ?>
        </div>
    </div>
</div>