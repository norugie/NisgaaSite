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
                        <td><center><button type="button" class="btn bg-green waves-effect" <?php if($a['status'] == 'Inactive') echo "disabled"; ?>>MODIFY</button></center></td> 
                        <td><center><button type="button" class="btn bg-red waves-effect" data-type="delete-announcement" data-id="<?php echo $a['id']; ?>" data-name="<?php echo $a['a_id']; ?>" onclick="alertDesign(this);">DELETE</button></center></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>