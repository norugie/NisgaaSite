<?php $jobs = $site->jobList($database); ?>

<div class="col-md-9">
    <!-- ON SITE OPENED JOBS INTRO CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>CURRENT ON-SITE JOB POSTINGS</h2>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ullamcorper erat ac nisi placerat, ac vehicula dolor pretium. In dignissim quam ut tortor finibus vestibulum. Cras ut mi odio. Nam sollicitudin, metus ut euismod pulvinar, lorem orci tempus ex, ac lacinia dolor sapien vitae ex.</p>
            </div>
        </div>
    </section>

    <!-- ON SITE OPENED JOBS CONTENT -->
    <section>
        <div id="customer-orders">
            <p class="lead">If you have any questions, please feel free to <a href="index.php?page=contact_us">contact us</a>.</p>
            <div class="box">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>JOB ID</th>
                                <th>TITLE</th>
                                <th>SCHOOL</th>
                                <th>CLOSING DATE</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($jobs as $job): ?>
                                <tr>
                                    <td><?php echo preg_replace('/[a-zA-Z]/', '', $job['job_id']); ?></td>
                                    <td><a href="jobs/<?php echo $job['file']; ?>" download><?php echo $job['title']; ?></a></td>
                                    <td><?php echo $job['school_abbv']; ?></td>
                                    <td><?php echo date_format(date_create($job['close_date']), 'd M Y'); ?></td>
                                    <td><a href="#" class="btn btn-template-outlined btn-sm">View</a>&nbsp;<a href="#" class="btn btn-template-main btn-sm">Apply Now!</a></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- EXTERNAL OPENED JOBS CONTENT -->
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>EXTERNAL JOB POSTINGS</h2>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <p class="lead">View and apply to School District 92's (Nisga'a) <b>external</b> job postings in <a href="http://www.makeafuture.ca/nisgaa" target="_new">teaching</a>, <a href="http://www.makeafuture.ca/nisgaa" target="_new">support roles</a>, <a href="http://www.makeafuture.ca/nisgaa" target="_new">management</a>, and <a href="http://www.makeafuture.ca/nisgaa" target="_new">administration</a> on Make A Future. Please create an account with Make A Future to apply online to job postings, and to subscribe to email job alerts. Please note that applications may also be submitted in the method specified in job postings. </p>
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
    <br><br>
</div>