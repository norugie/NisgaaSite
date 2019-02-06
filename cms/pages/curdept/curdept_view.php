<?php $page_info = $interaction->pageInformation($database, $_GET['page'], $_GET['subtab']); ?>
<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>PAGE INFORMATION</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-green waves-effect" style="display: inline-block;" 
                onclick="window.location.href='interaction.php?tab=web&subtab=<?php echo $_GET['subtab']; ?>&page=<?php echo $_GET['page']; ?>&option=modify&id=<?php echo $page_info['id']; ?>'"><i class="material-icons">edit</i><span>MODIFY</span></button>
            </center>
        </div>
    </div>
</div>
<div class="body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo $page_info['web_desc']; ?>
        </div>
    </div>
</div>