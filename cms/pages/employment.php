<?php 

    $jobs = $district->jobList($database);

 ?>

<?php require '../components/modals/new_job.php'; ?>
<?php require '../components/modals/edit_job.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>JOB LIST</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php if($_SESSION['type'] == 3 || $_SESSION['type'] == 1){ ?>
                            <center>
                                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-job-modal" style="display: inline-block;">ADD A JOB POSTING</button>
                            </center>
                        <?php } ?>
                    </div>
                </div>
            </div>
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
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php if($job['status'] == 'Closed') echo "disabled"; ?>>
                                                        MODIFY <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" data-toggle="modal" data-target="#edit-job-modal" data-values='{
                                                            "id":       <?php echo json_encode($job['id']); ?>,
                                                            "job_id":   <?php echo json_encode($job['job_id']); ?>,
                                                            "title":    <?php echo json_encode(str_replace("'", "&apos;", $job['title'])); ?>,
                                                            "school":   <?php echo json_encode($job['school']); ?>,
                                                            "job_type": <?php echo json_encode($job['job_type']); ?>,
                                                            "job_desc": <?php echo json_encode(str_replace("'", "&apos;", $job['job_desc'])); ?>
                                                        }' 
                                                        onclick="editJob(this);">Edit Job Details</a></li>
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
                                            <td><a href="../jobs/<?php echo $job['file']; ?>" download><?php echo $job['title']; ?></a></td>
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
