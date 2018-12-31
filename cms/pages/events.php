<?php 

    $events = $district->eventList($database);
    
 ?>

<style>
    .wizard .steps .current a {
        background-color: #607D8B!important;
    }

    .wizard > .content {
        border: 0!important;
        min-height: 450px!important;
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
                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-event-modal" style="float: right; margin-top: -5px;">ADD AN EVENT</button>
                <button type="button" class="btn bg-blue-grey waves-effect change-button" style="float: right; margin-top: -5px; margin-right: 10px;"><a href="../functions/district.php?district=true&changeEventView=true" style="color:#fff;">CHANGE VIEW (<?php if($_SESSION['event_view'] == 'LIST'){ echo "CALENDAR"; } else { echo "LIST"; }?>)</a></button>
                <br>
            </div>
            <div class="body">
                <?php
                
                    if($_SESSION['event_view'] == 'CALENDAR'){
                        require 'event_calendar.php';
                    } else {
                        require 'event_list.php';
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