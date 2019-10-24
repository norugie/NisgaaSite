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
                            <button type="button" class="btn bg-green waves-effect" style="display: inline-block;" 
                            onclick="window.location.href='interaction.php?tab=web&subtab=content&page=<?php echo $_GET['page']; ?>&option=modify'"><i class="material-icons">edit</i><span>MODIFY</span></button>
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