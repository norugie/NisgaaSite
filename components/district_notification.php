<!--  District Notifications - Users  -->

<?php if(isset($_GET['userDisabled'])){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The account has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['userReactivated'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The account has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['newUser'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new account has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editUser'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The account has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Employment  -->

<?php if(isset($_GET['jobDisabled'])){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The job posting has been <b>closed</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['jobReopen'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The job posting has been <b>reopened</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editJob'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The job posting has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->

<?php require 'error_notification.php'; ?>