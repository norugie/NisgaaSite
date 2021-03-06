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
                                if($data_end[$key] != $start){ echo ' to ' . date_format(date_create($data_end[$key]), 'd M Y - l'); } 
                                echo ' at ' . date_format(date_create($data_time[$key]), 'h:i A') . '<br>';
                                                    
                                endforeach; 
                                
                            ?>
                        </td>
                        <?php if($_SESSION['type'] != 3){ ?>
                            <td>
                                <center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-event-modal" 
                                data-values='{
                                    "id":               <?php echo json_encode($event['id']); ?>,
                                    "event_id":         <?php echo json_encode($event['event_id']); ?>,
                                    "event_name":       <?php echo json_encode(str_replace("'", "&apos;", $event['event_name'])); ?>,
                                    "event_shortname":  <?php echo json_encode($event['event_shortname']); ?>,
                                    "event_location":   <?php echo json_encode(str_replace("'", "&apos;", $event['event_location'])); ?>,
                                    "event_desc":       <?php echo json_encode(str_replace("'", "&apos;",$event['event_desc'])); ?>
                                }'
                                onclick="editEvent(this);" <?php if($event['status'] == 'Cancelled'){ echo "disabled"; }?> <?php if($_SESSION['type'] == 4 && $event['school'] != $_SESSION['school']){ echo "disabled"; }?>><i class="material-icons">mode_edit</i><span>MODIFY</span></button></center>
                            </td>
                            <td>
                                <center><button type="button" class="btn bg-red waves-effect" data-type="delete-event" data-id="<?php echo $event['id']; ?>" data-name="<?php echo $event['event_shortname']; ?>" data-post="<?php echo $event['post']; ?>" onclick="alertDesign(this);" <?php if($event['status'] != 'Active') echo "disabled"; ?> <?php if($_SESSION['type'] == 4 && $event['school'] != $_SESSION['school']){ echo "disabled"; }?>><i class="material-icons">clear</i><span>CANCEL</span></button></center>
                            </td>
                        <?php } ?>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>