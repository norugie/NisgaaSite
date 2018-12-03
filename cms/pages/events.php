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
      navLinks: true,
      editable: false,
      eventLimit: true,
      events: [
        {
          title: 'All Day Event',
          start: '2018-12-03'
        },
        {
          title: 'All Day Event',
          start: '2018-12-03'
        },
        {
          title: 'All Day Event',
          start: '2018-12-03'
        },
        {
          title: 'All Day Event',
          start: '2018-12-03'
        },
        {
          title: 'All Day Event',
          start: '2018-12-03'
        },
        {
          title: 'Long Event',
          start: '2018-12-03',
          end: '2018-12-05'
        },
        {
          title: 'Lunch',
          start: '2018-12-12T12:00:00'
        },
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
