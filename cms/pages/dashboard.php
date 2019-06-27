<!-- Disrict Quick Info -->
<div class="row">
    <div class="col-md-4 col-xs-12 col-sm-12">
        <div class="info-box-3 bg-blue-grey hover-zoom-effect">
            <a href="district.php?tab=sd&page=users">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">
                    <div class="text">ACTIVE USERS</div>
                    <div class="number"><?php echo count($dashboard->userCount($database)); ?></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4 col-xs-12 col-sm-12">
        <div class="info-box-3 bg-blue-grey hover-zoom-effect">
            <a href="district.php?tab=sd&page=employment"">
                <div class="icon">
                    <i class="material-icons">work</i>
                </div>
                <div class="content">
                    <div class="text">OPEN JOBS</div>
                    <div class="number"><?php echo count($dashboard->jobCount($database)); ?></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4 col-xs-12 col-sm-12">
        <div class="info-box-3 bg-blue-grey hover-zoom-effect">
            <a href="district.php?tab=sd&page=events">
                <div class="icon">
                    <i class="material-icons">event</i>
                </div>
                <div class="content">
                    <div class="text">UPCOMING EVENTS</div>
                    <div class="number"><?php echo count($dashboard->eventCount($database)); ?></div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- District Posts Quick Info -->
<div class="row">
    <div class="col-md-6 col-xs-12 col-sm-12">
        <div class="info-box-3 bg-blue-grey hover-zoom-effect">
            <a href="post.php?tab=post&page=blog">
                <div class="icon">
                    <i class="material-icons">mode_comment</i>
                </div>
                <div class="content">
                    <div class="text">NEWS POSTS</div>
                    <div class="number"><?php echo count($dashboard->blogCount($database)); ?></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 col-sm-12">
        <div class="info-box-3 bg-blue-grey hover-zoom-effect">
            <a href="post.php?tab=post&page=media">
                <div class="icon">
                    <i class="material-icons">photo_library</i>
                </div>
                <div class="content">
                    <div class="text">MEDIA POSTS</div>
                    <div class="number"><?php echo count($dashboard->mediaCount($database)); ?></div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php

    $logs = $dashboard->logList($database);

?>

<!-- Logs -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-xs-sm-center">
                        <h4>LOGS</h4>
                        <p class="text-small"><i>Note: The log table below shows the log entries from the past 30 days only</i></p>     
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Log ID</th>
                                <?php if($_SESSION['type'] == 1){ ?><th>School</th><?php } ?>
                                <th>User</th>
                                <th>Activity</th>
                                <th>Date and Time</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Log ID</th>
                                <?php if($_SESSION['type'] == 1){ ?><th>School</th><?php } ?>
                                <th>User</th>
                                <th>Activity</th>
                                <th>Date and Time</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($logs as $log): ?>
                                <tr>
                                    <td><?php echo $log['log_id']; ?></td>
                                    <?php if($_SESSION['type'] == 1){ ?><td><?php echo $log['school_abbv']; ?></td><?php } ?>
                                    <td><?php echo $log['firstname'] . " " . $log['lastname']; ?></td>
                                    <td><?php echo $log['log_desc']; ?></td>
                                    <td><?php echo date_format(date_create($log['date']), 'd M Y - l h:i A'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>