
<!-- Post Notifications - Blog -->

<?php if(isset($_GET['postDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A post has been <b>archived</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPost']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A post has been <b>edited</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addPost']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A post has been <b>created</b> successfully!
</div>
<?php } ?>

<!-- Post Notifications - Categories -->

<?php if(isset($_GET['newCategory']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A category has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['categoryDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A category has been <b>disabled</b> successfully!
</div>
<?php } ?>

<!-- Post Notification - Media -->

<?php if(isset($_GET['editMedia']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A media post has been <b>edited</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['mediaDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A media post has been <b>archived</b> successfully!
</div>
<?php } ?>


<!--  Errors  -->

<?php require 'error_notification.php'; ?>

<!-- Set alert session to unalerted -->
<?php $_SESSION['alert'] = 'unalerted'; ?>