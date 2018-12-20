<?php 

    $media;
    $cat_name;

    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
        $media = $post->mediaPerCategoryList($database, $cat_id);
        $cat_name = $media[0]['cat_desc'];
    } else {
        $media = $post->mediaList($database);
    }
 ?>

<?php require '../components/modals/new_media.php'; ?>
<?php require '../components/modals/edit_media.php'; ?>
<?php require '../components/modals/view_media.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <?php if(isset($_GET['id'])){ echo "CATEGORY: " . $cat_name; } ?>
                <button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#new-media-modal" style="float: right; margin-top: -5px;">ADD NEW MEDIA POST</button>
                <br>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Media Title</th>
                                <th>Author</th>
                                <th>School</th>
                                <th>Published Date</th>
                                <th>Categories</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Media Title</th>
                                <th>Author</th>
                                <th>School</th>
                                <th>Published Date</th>
                                <th>Categories</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($media as $m): ?>
                                <tr>
                                    <td><?php echo $m['post_title']; ?></td>
                                    <td><?php echo $m['firstname'] . " " . $m['lastname']; ?></td>
                                    <td><?php echo $m['school_abbv']; ?></td>
                                    <td><?php echo date_format(date_create($m['post_date']), 'd M Y - l'); ?></td>
                                    <td>
                                        <?php

                                            $cats = $post->categoriesPerPostList($database, $m['id']);
                                            foreach($cats as $cat):
                                                echo $cat['cat_desc'] . "<br>";
                                            endforeach;
                                        ?>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    OPTIONS <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" data-toggle="modal" data-target="#view-media-modal" data-values="<?php echo htmlspecialchars(json_encode($m)); ?>" onclick="viewMediaPost(this);">View Media Post</a></li>
                                                    
                                                    <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2 || $_SESSION['school'] == $m['post_school']){ ?>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#edit-media-modal" data-values="<?php echo htmlspecialchars(json_encode($m)); ?>" onclick="editMedia(this);">Edit Media Post Details</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#edit-media-cats-modal" onclick="editMediaCats(<?php echo htmlspecialchars(json_encode($m['id'])); ?>,<?php echo htmlspecialchars(json_encode($m['post_id'])); ?>, 1);">Edit Media Post Categories</a></li>
                                                    <?php } ?>
                                                    
                                                    <?php if($_SESSION['type'] == 1){ ?>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="#" data-type="delete-media" data-id="<?php echo $m['id']; ?>" data-name="<?php echo $m['post_id']; ?>" onclick="alertDesign(this);">Delete Media Post</a></li>
                                                    <?php } ?>
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