<!--  District Notifications - Users  -->

<?php if(isset($_GET['userDisabled']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The account has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['userReactivated']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The account has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['newUser']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new account has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editUser']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The account has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Employment  -->

<?php if(isset($_GET['jobDisabled']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The job posting has been <b>closed</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['jobReopen']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The job posting has been <b>reopened</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editJob']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The job posting has been <b>modified</b> successfully!
</div>
<?php } ?>
<?php if(isset($_GET['newJob']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new job posting has been <b>opened</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Events  -->

<?php if(isset($_GET['eventDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The event has been <b>cancelled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['newEvent']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    An event has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editEvent']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The event has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Files  -->

<?php if(isset($_GET['formDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A file has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['formReactivated']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A file has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addForm']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new file has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editForm']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The file has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->
<?php require 'error_notification.php'; ?>

<!-- Set alert session to unalerted -->
<?php $_SESSION['alert'] = 'unalerted'; ?>