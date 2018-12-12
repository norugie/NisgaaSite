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
                    start: '<?php $date_start_value = new DateTime($start); echo $date_start_value->format('Y-m-d') . 'T' . $data_time[$key]; ?>'
                    <?php if(!empty($data_end[$key])){ ?>, end: '<?php $date_end_value = new DateTime($data_end[$key]); $date_end_value->modify('+1 day'); echo $date_end_value->format('Y-m-d') . 'T' . $data_time[$key];; ?>'<?php } ?> 
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
                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-event-modal" style="float: right;">ADD AN EVENT</button>
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
                                        <?php if($_SESSION['type'] != 3){ ?><th>Modify</th><?php } ?>
                                        <?php if($_SESSION['type'] != 3){ ?><th>Cancel</th><?php } ?>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Event Title</th>
                                        <th>Hosting School</th>
                                        <th>Event Location</th>
                                        <th>Status</th>
                                        <th>Date and Start Time</th>
                                        <?php if($_SESSION['type'] != 3){ ?><th>Modify</th><?php } ?>
                                        <?php if($_SESSION['type'] != 3){ ?><th>Cancel</th><?php } ?>
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
                                                        if($data_end[$key] != '0000-00-00'){ echo ' to ' . date_format(date_create($data_end[$key]), 'd M Y - l'); } 
                                                        echo ' at ' . date_format(date_create($data_time[$key]), 'h:i A') . '<br>';
                                                                          
                                                        endforeach; 
                                                        
                                                    ?>
                                                </td>
                                                <?php if($_SESSION['type'] != 3){ ?>
                                                    <td>
                                                        <center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-event-modal" data-values="<?php echo htmlspecialchars(json_encode($event)); ?>" onclick="editEvent(this);" <?php if($event['status'] != 'Active'){ echo "disabled"; }?>>MODIFY</button></center>
                                                    </td>
                                                        <center><button type="button" class="btn bg-red waves-effect" data-type="delete-event" data-id="<?php echo $event['id']; ?>" data-name="<?php echo $event['event_shortname']; ?>" data-post="<?php echo $event['post']; ?>" onclick="alertDesign(this);" <?php if($event['status'] != 'Active') echo "disabled"; ?>>CANCEL</button></center>
                                                    </td>
                                                <?php } ?>
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
<script src="../plugins/tinymce/tinymce.js"></script>
<script src="../js/editors.js"></script>