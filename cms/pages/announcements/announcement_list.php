<style>
    .dropdown-menu {
        margin-left: -100% !important;
        margin-top: -35px !important;
    }
</style>
<div class="header">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-xs-sm-center">
            <h4>ANNOUNCEMENT LIST</h4>      
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <center>
                <button type="button" class="btn bg-blue waves-effect" onclick="window.location.href='post.php?tab=post&page=announcements&announcement_option=create'" style="display: inline-block;">ADD NEW ANNOUNCEMENT POST</button>
            </center>
        </div>
    </div> 
</div>
<div class="body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Announcement Title</th>
                    <th>Author</th>
                    <th>School</th>
                    <th>Published Date</th>
                    <th>Expiry Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Media Title</th>
                    <th>Author</th>
                    <th>School</th>
                    <th>Published Date</th>
                    <th>Expiry Date</th>
                    <th>Options</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($announcements as $a): ?>
                    <tr>
                        <td><?php echo $a['a_title']; ?></td>
                        <td><?php echo $a['firstname'] . " " . $a['lastname']; ?></td>
                        <td><?php echo $a['school_abbv']; ?></td>
                        <td><?php echo date_format(date_create($a['a_date']), 'd M Y - l'); ?></td>
                        <td><?php echo date_format(date_create($a['a_date_long']), 'd M Y - l'); ?></td>
                        <td>                            
                            <center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        OPTIONS <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="post.php?tab=post&page=announcements&announcement_option=view&a_id=<?php echo $a['id']; ?>">View Announcement</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="post.php?tab=post&page=announcements&announcement_option=modify&a_id=<?php echo $a['id']; ?>">Edit Announcement Details</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" data-type="delete-announcement" data-id="<?php echo $a['id']; ?>" data-name="<?php echo $a['a_id']; ?>" onclick="alertDesign(this);">Delete Announcement</a></li>
                                    </ul>
                                </div>
                            </center>
                        </td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>