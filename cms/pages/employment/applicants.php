<?php 

    if(!isset($_GET['jobid']) || empty($_GET['jobid'])){
        $jobid = 0;
    } else {
        $jobid = $_GET['jobid'];
    }

    $apps = $district->appList($database, $jobid);

 ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>APPLICANT LIST</h4>      
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <center>
                            <button type="button" class="btn bg-blue waves-effect" style="display: inline-block;" onclick="window.location.href='district.php?tab=sd&page=employment'"><i class="material-icons">list</i><span>JOB LIST</span></button>
                        </center>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Degree</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Applying For</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Degree</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Applying For</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($apps as $app): ?>
                                <tr>
                                    <td><a href="../jobs/resumes/<?php echo $app['resume']; ?>" target="_blank"><?php echo $app['app_name']; ?></a></td>
                                    <td><?php echo $app['app_add']; ?></td>
                                    <td><?php if($app['degree'] == 'Yes'){ echo $app['degree_title']; } else { echo "No degree"; } ?></td>
                                    <td><?php echo $app['email']; ?></td>
                                    <td><?php echo $app['phone']; ?></td>
                                    <td><a href="../jobs/<?php echo $app['file']; ?>" target="_blank"><?php echo $app['title']; ?></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
