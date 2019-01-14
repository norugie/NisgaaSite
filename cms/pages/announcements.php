<?php 

    $announcements = $post->announcementList($database);

 ?>

<?php require '../components/modals/new_announcement.php'; ?>
<?php require '../components/modals/edit_announcement.php'; ?>
<?php require '../components/modals/view_announcement.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <?php if(isset($_GET['id'])){ echo "CATEGORY: " . $cat_name; } ?>
                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-announcement-modal" style="float: right; margin-top: -5px;">ADD NEW ANNOUNCEMENT POST</button>
                <br>
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
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Media Title</th>
                                <th>Author</th>
                                <th>School</th>
                                <th>Published Date</th>
                                <th>Expiry Date</th>
                                <th>Modify</th>
                                <th>Delete</th>
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
                                    <td><center><button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#edit-announcement-modal" data-values="<?php echo htmlspecialchars(json_encode($a)); ?>" onclick="editAnnouncement(this);" <?php if($a['status'] == 'Inactive') echo "disabled"; ?>>MODIFY</button></center></td> 
                                    <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-announcement" data-id="<?php echo $a['id']; ?>" data-name="<?php echo $a['post_id']; ?>" onclick="alertDesign(this);">DELETE</button></center></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Date Format -->
<script>

    function formatDate(date) {
    var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return day + ' ' + monthNames[monthIndex] + ' ' + year;
    }

</script>