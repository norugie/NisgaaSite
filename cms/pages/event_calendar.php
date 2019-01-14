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
                    end: '<?php $date_end_value = new DateTime($data_end[$key]); echo $date_end_value->format('Y-m-d') . 'T' . $data_time[$key];; ?>'
                },
                <?php endforeach; ?>
            <?php } ?>
        <?php endforeach; ?>
      ]
    });

  });

</script>

<div id='calendar'></div>