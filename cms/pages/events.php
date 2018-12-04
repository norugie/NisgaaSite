<?php 

    $events = $district->eventList($database);

 ?>

<link href='../plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<script src='../plugins/fullcalendar/lib/moment.min.js'></script>
<script src='../plugins/fullcalendar/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: '',
        right: 'title'
      },
      defaultDate: new Date(),
      navLinks: false,
      editable: false,
      eventLimit: true,
      events: [
        <?php foreach($events as $event): ?>
            {
                title: '<?php echo $event['event_shortname']; ?>',
                color: '#<?php echo $event['event_color_code']; ?>',
                start: '<?php echo $event['event_date_day_start'] . "T" . $event['event_date_time']; ?>'
                <?php if(!empty($event['event_date_day_end'])){ ?>,end: '<?php echo $event['event_date_day_end'] . "T" . $event['event_date_time']; ?>' <?php }?>
            },
        <?php endforeach; ?>
      ]
    });

  });

</script>

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
                                        <th>School</th>
                                        <th>Status</th>
                                        <?php if($_SESSION['type'] !== 3){ ?><th>Modify</th><?php } ?>
                                        <?php if($_SESSION['type'] !== 3){ ?><th>Delete/Reopen</th><?php } ?>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Event Title</th>
                                        <th>School</th>
                                        <th>Status</th>
                                        <?php if($_SESSION['type'] !== 3){ ?><th>Modify</th><?php } ?>
                                        <?php if($_SESSION['type'] !== 3){ ?><th>Delete/Reopen</th><?php } ?>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($events as $event): ?>
                                        <?php if($_SESSION['type'] !== 3){ ?>
                                            <tr>
                                                <td><?php echo $event['event_name']; ?></td>
                                                <td><?php echo $event['school_name']; ?></td>
                                                <td><?php echo $event['status']; ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php } ?>
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
