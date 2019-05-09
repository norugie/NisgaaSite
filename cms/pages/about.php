<?php 
    $about = $interaction->aboutList($database); 
    $programs = $interaction->programList($database);
?>

<?php require '../components/modals/edit_about_programs.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>ABOUT US</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <?php if($_SESSION['type'] != 3){ ?>
                                <button type="button" class="btn bg-green waves-effect" style="display: inline-block;" data-toggle="modal" data-target="#edit-about-programs-modal" 
                                    data-values='{
                                        "id":           <?php echo json_encode($about['id']); ?>,
                                        "web_id":       <?php echo json_encode($about['web_id']); ?>,
                                        "web_desc":     <?php echo json_encode(str_replace("'", "&apos;", $about['web_desc'])); ?>
                                    }' 
                                    onclick="editAboutPrograms(this);"><i class="material-icons">mode_edit</i><span>MODIFY</span></button>
                            <?php } ?>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php echo $about['web_desc']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>PROGRAMS</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                        <?php if($_SESSION['type'] != 3){ ?>
                            <button type="button" class="btn bg-green waves-effect" style="display: inline-block;" data-toggle="modal" data-target="#edit-about-programs-modal" 
                                    data-values='{
                                        "id":           <?php echo json_encode($programs['id']); ?>,
                                        "web_id":       <?php echo json_encode($programs['web_id']); ?>,
                                        "web_desc":     <?php echo json_encode(str_replace("'", "&apos;", $programs['web_desc'])); ?>
                                    }' 
                                    onclick="editAboutPrograms(this);"><i class="material-icons">mode_edit</i><span>MODIFY</span></button>
                        <?php } ?>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php echo $programs['web_desc']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
