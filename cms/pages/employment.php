<?php 

    $jobs = $district->jobList($database);

 ?>
<?php require '../components/modals/new_job.php'; ?>
<?php require '../components/modals/edit_job.php'; ?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 1){ ?>
                <div class="header">
                    <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-job-modal" style="float: right; margin-top: -5px;">ADD A JOB POSTING</button>
                    <br>
                </div>
            <?php } ?>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Job ID</th>
                                <th>Title</th>
                                <th>School</th>
                                <th>Open Date</th>
                                <th>Close Date</th>
                                <th>Status</th>
                                <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 1){ ?><th>Modify</th><?php } ?>
                                <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 1){ ?><th>Delete/Reopen</th><?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Job ID</th>
                                <th>Title</th>
                                <th>School</th>
                                <th>Open Date</th>
                                <th>Close Date</th>
                                <th>Status</th>
                                <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 1){ ?><th>Modify</th><?php } ?>
                                <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 1){ ?><th>Delete/Reopen</th><?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($jobs as $job): ?>
                                <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 1){ ?>
                                    <tr>
                                        <td><?php echo preg_replace('/[a-zA-Z]/', '', $job['job_id']); ?></td>
                                        <td><a href="../jobs/<?php echo $job['file']; ?>" download><?php echo $job['title']; ?></a></td>
                                        <td><?php echo $job['school_name']; ?></td>
                                        <td><?php echo date_format(date_create($job['open_date']), 'd M Y - l'); ?></td>
                                        <td><?php echo date_format(date_create($job['close_date']), 'd M Y - l'); ?></td>
                                        <td><?php echo $job['status']; ?></td>
                                        <td>
                                            <center>
                                                <!-- <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-job-modal" data-values="<?php echo htmlspecialchars(json_encode($job)); ?>" onclick="editJob(this);" <?php if($job['status'] == 'Closed') echo "disabled"; ?>>MODIFY</button> -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php if($job['status'] == 'Closed') echo "disabled"; ?>>
                                                        MODIFY <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#edit-job-modal" data-values="<?php echo htmlspecialchars(json_encode($job)); ?>" onclick="editJob(this);">Edit Job Details</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#edit-job-dates-modal" onclick="editJobDates(<?php echo htmlspecialchars(json_encode($job['id'])); ?>,<?php echo htmlspecialchars(json_encode($job['job_id'])); ?>, 1);">Edit Job Posting Dates</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#edit-job-file-modal" onclick="editJobFile(<?php echo htmlspecialchars(json_encode($job['id'])); ?>,<?php echo htmlspecialchars(json_encode($job['job_id'])); ?>);">Edit Job File</a></li>
                                                    </ul>
                                                </div>
                                            </center>
                                        </td>
                                        <?php if($job['status'] == 'Open'){ ?>
                                            <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-job" data-id="<?php echo $job['id']; ?>" data-name="<?php echo $job['job_id']; ?>" onclick="alertDesign(this);">DELETE</button></center></td>
                                        <?php } else { ?>
                                            <td><center><button type="button" class="btn bg-cyan waves-effect" data-type="reopen-job" data-id="<?php echo $job['id']; ?>" data-name="<?php echo $job['job_id']; ?>" onclick="alertDesign(this);">REOPEN</button></center></td>
                                        <?php } ?>                                       
                                    </tr>
                                <?php } else { ?>
                                    <?php if($job['status'] !== 'Closed'){ ?>
                                        <tr>
                                            <td><?php echo preg_replace('/[a-zA-Z]/', '', $job['job_id']); ?></td>
                                            <td><?php echo $job['title']; ?></td>
                                            <td><?php echo $job['school_name']; ?></td>
                                            <td><?php echo date_format(date_create($job['open_date']), 'd M Y - l'); ?></td>
                                            <td><?php echo date_format(date_create($job['close_date']), 'd M Y - l'); ?></td>
                                            <td><?php echo $job['status']; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validateEvent(event) {
        var regex = new RegExp("^[0-9-!@#$%*?]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }       
</script>