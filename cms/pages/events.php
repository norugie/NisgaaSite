<?php 

    $events = $district->eventList($database);
    
 ?>

<style>
    .wizard .steps .current a {
        background-color: #607D8B!important;
    }

    .wizard > .content {
        border: 0!important;
        min-height: 500px!important;
    }

    .change-button a:hover {
        text-decoration: none;
    }
</style>

<?php require '../components/modals/new_event.php'; ?>
<?php require '../components/modals/edit_event.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>EVENT LIST</h4>      
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <center>
                            <?php if($_SESSION['type'] != 3){ ?>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-event-modal" style="display: inline-block;"><i class="material-icons">add</i><span>NEW EVENT</span></button>
                            <?php } ?>
                            <a href="../functions/district.php?district=true&changeEventView=true" style="color:#fff;"><button type="button" class="btn bg-blue-grey waves-effect change-button" style="margin-right: 10px;"><i class="material-icons"><?php if($_SESSION['event_view'] == 'LIST'){ echo "event"; } else { echo "list"; }?></i><span><?php if($_SESSION['event_view'] == 'LIST'){ echo "CALENDAR"; } else { echo "LIST"; }?></span></button></a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <?php
                
                    if($_SESSION['event_view'] == 'CALENDAR'){
                        require 'events/event_calendar.php';
                    } else {
                        require 'events/event_list.php';
                    }

                ?>
            </div>
        </div>
    </div>
</div>

<!-- JQuery Steps Plugin Js -->
<script src="../plugins/jquery-steps/jquery.steps.js"></script>
<script src="../js/form-wizard.js"></script>

<!-- TinyMCE -->
<script src="../plugins/tinymce/tinymce.min.js"></script>
<script src="../js/editors.js"></script>

<!-- Shortname Regex -->
<script>

    function validateEvent(event) {
        var regex = new RegExp("^[a-zA-Z \b]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }  

</script>