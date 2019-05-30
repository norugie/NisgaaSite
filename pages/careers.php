<?php 
    $jobs = $joblist; 
?>

<div class="col-md-9">
    <!-- ON SITE OPENED JOBS INTRO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Employment Opportunities</h2>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <p class="lead">View and apply to School District 92's (Nisga'a) job postings in <a href="http://www.makeafuture.ca/nisgaa" target="_new">teaching</a>, <a href="http://www.makeafuture.ca/nisgaa" target="_new">support roles</a>, <a href="http://www.makeafuture.ca/nisgaa" target="_new">management</a>, and <a href="http://www.makeafuture.ca/nisgaa" target="_new">administration</a> on <a href="http://www.makeafuture.ca/nisgaa" target="_new">Make a Future</a>. Please create an account with Make A Future to apply online to job postings, and to subscribe to email job alerts. Please note that applications may also be submitted in the method specified in job postings. </p>
                        <p class="lead">If you have any questions, please feel free to <a href="index.php?page=contact_us">contact us</a>.</p>
                    </div>
                    <div class="col-md-3">
                        <center>
                            <div class="image"><a href="http://www.makeafuture.ca/nisgaa" target="_new"><img src="images/site/maf-logo.png" alt="Make A Future Logo" class="img-fluid"></a></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ON SITE OPENED JOBS CONTENT -->
    <section>
        <div id="customer-orders">
            <div class="box">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>JOB ID</th>
                                <th>TITLE</th>
                                <th>SCHOOL</th>
                                <!-- <th>CLOSING DATE</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($jobs as $job): ?>
                                <tr>
                                    <td><?php echo preg_replace('/[a-zA-Z]/', '', $job['job_id']); ?></td>
                                    <td><a href="jobs/<?php echo $job['file']; ?>" target="_blank"><?php echo $job['title']; ?></a></td>
                                    <td><?php echo $job['school_name']; ?></td>
                                    <!-- <td><?php echo date_format(date_create($job['close_date']), 'd M Y'); ?></td> -->
                                    <!-- <td><a href="jobs/<?php echo $job['file']; ?>" class="btn btn-template-main btn-sm" download>View Posting</a></td> -->
                                    <td><a href="/careers/read/<?php echo preg_replace('/[a-zA-Z]/', '', $job['job_id']); ?>" class="btn btn-template-main btn-sm">View Posting</a></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- ON SITE CLOSED JOBS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h3>Archived Career Opportunities</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead">The following job postings have been closed before their listed closing date:</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <?php $cjobs = $site->cjobList($database); ?>
                    <?php foreach($cjobs as $cjob): ?>
                        <li class="lead mb-0"><a href="jobs/<?php echo $cjob['file']; ?>" <?php if(pathinfo($cjob['file'], PATHINFO_EXTENSION) == 'pdf'){?>target="_blank"<?php } else { ?> download <?php } ?>><?php echo $cjob['title']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</div>