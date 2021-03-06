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
                    <div class="col-md-12">
                        <p class="lead">View and apply to School District 92's (Nisga'a) job postings in teaching, support roles, management, and administration. You can apply by clicking on the <b>APPLY FOR THIS JOB</b> button when viewing a job posting or send us your application at <a href="mailto:hr@nisgaa.bc.ca">hr@nisgaa.bc.ca</a>.</p>
                        <p class="lead">If you have any questions, please feel free to <a href="/contacts">contact us</a>.</p>
                    </div>
                    <!-- <div class="col-md-3">
                        <center>
                            <div class="image" style="margin-bottom: 25px!important;"><a href="http://www.makeafuture.ca/nisgaa" target="_new"><img src="/images/site/maf-logo.png" alt="Make A Future Logo" class="img-fluid"></a></div>
                        </center>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- ON SITE OPENED JOBS CONTENT -->
    <section>
        <div id="customer-orders">
            <div class="box mt-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>JOB ID</th>
                                <th>TITLE</th>
                                <th>SCHOOL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($jobs as $job): ?>
                                <tr>
                                    <td><?php echo preg_replace('/[a-zA-Z]/', '', $job['job_id']); ?></td>
                                    <td><a href="/jobs/<?php echo $job['file']; ?>" target="_blank"><?php echo $job['title']; ?></a></td>
                                    <td><?php echo $job['school_name']; ?></td>
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
                        <p class="lead">The following job postings have been closed:</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <?php $cjobs = $site->cjobList($database); ?>
                    <?php foreach($cjobs as $cjob): ?>
                        <li class="lead mb-0"><a href="/jobs/<?php echo $cjob['file']; ?>" target="_blank"><?php echo $cjob['title']; ?> - Closed on <?php echo date_format(date_create($cjob['close_date']), 'd M Y'); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</div>