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
</style>

<link href='../plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<script src='../plugins/fullcalendar/lib/moment.min.js'></script>
<script src='../plugins/fullcalendar/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'title',
        center: '',
        right: 'prev,next today'
      },
      defaultDate: new Date(),
      navLinks: false,
      editable: false,
      eventLimit: true,
      events: [
        <?php foreach($events as $event): ?>
            <?php 
                if($event['status'] == 'Active'){
                    $data_start = explode(',', $event['GROUP_CONCAT(event_days.event_date_day_start)']); 
                    $data_time = explode(',', $event['GROUP_CONCAT(event_days.event_date_time)']);
                    $data_end = explode(',', $event['GROUP_CONCAT(event_days.event_date_day_end)']); 
            ?>
                <?php foreach($data_start as $key => $start): ?>
                {
                    title: '<?php echo $event['event_shortname']; ?>',
                    color: '#<?php echo $event['event_color_code']; ?>',
                    start: '<?php $date_start_value = new DateTime($start); echo $date_start_value->format('Y-m-d') . 'T' . $data_time[$key]; ?>',
                    end: '<?php echo $data_end[$key] . 'T' . $data_time[$key];; ?>'
                },
                <?php endforeach; ?>
            <?php } ?>
        <?php endforeach; ?>
      ]
    });

  });

</script>

<?php require '../components/modals/new_event.php'; ?>
<?php require '../components/modals/edit_event.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#event-calendar" data-toggle="tab">
                            <i class="material-icons">event</i> EVENT CALENDAR
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#event-list" data-toggle="tab">
                            <i class="material-icons">view_list</i> EVENT LIST
                        </a>
                    </li>
                    <?php if($_SESSION['type'] != 3){ ?><button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-event-modal" style="float: right;">ADD AN EVENT</button><?php } ?>
                </ul>
                <br>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="event-calendar">
                        <div id='calendar'></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="event-list">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Event Title</th>
                                        <th>Hosting School</th>
                                        <th>Event Location</th>
                                        <th>Status</th>
                                        <th>Date and Start Time</th>
                                        <th>Modify</th>
                                        <th>Cancel</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Event Title</th>
                                        <th>Hosting School</th>
                                        <th>Event Location</th>
                                        <th>Status</th>
                                        <th>Date and Start Time</th>
                                        <th>Modify</th>
                                        <th>Cancel</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($events as $event): ?>
                                            <tr>
                                                <td><?php echo $event['event_name']; ?></td>
                                                <td><?php echo $event['school_abbv']; ?></td>
                                                <td><?php echo $event['event_location']; ?></td>
                                                <td><?php echo $event['status']; ?></td>
                                                <td>
                                                    <?php 
                                                        $data_start = explode(',', $event['GROUP_CONCAT(event_days.event_date_day_start)']); 
                                                        $data_time = explode(',', $event['GROUP_CONCAT(event_days.event_date_time)']);
                                                        $data_end = explode(',', $event['GROUP_CONCAT(event_days.event_date_day_end)']); 
                                                    ?>
                                                    <?php 

                                                        foreach($data_start as $key => $start):
                    
                                                        echo date_format(date_create($start), 'd M Y - l');
                                                        if($data_end[$key] != $start){ echo ' to ' . date_format(date_create($data_end[$key]), 'd M Y - l'); } 
                                                        echo ' at ' . date_format(date_create($data_time[$key]), 'h:i A') . '<br>';
                                                                          
                                                        endforeach; 
                                                        
                                                    ?>
                                                </td>
                                                    <td>
                                                        <center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-event-modal" data-values="<?php echo htmlspecialchars(json_encode($event)); ?>" onclick="editEvent(this);" <?php if($event['status'] == 'Cancelled'){ echo "disabled"; }?> <?php if($_SESSION['type'] == 4 && $event['school'] != $_SESSION['school']){ echo "disabled"; }?>>MODIFY</button></center>
                                                    </td>
                                                    <td>
                                                        <center><button type="button" class="btn bg-red waves-effect" data-type="delete-event" data-id="<?php echo $event['id']; ?>" data-name="<?php echo $event['event_shortname']; ?>" data-post="<?php echo $event['post']; ?>" onclick="alertDesign(this);" <?php if($event['status'] != 'Active') echo "disabled"; ?> <?php if($_SESSION['type'] == 4 && $event['school'] != $_SESSION['school']){ echo "disabled"; }?>>CANCEL</button></center>
                                                    </td>
                                            </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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