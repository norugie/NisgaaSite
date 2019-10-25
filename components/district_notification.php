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

<?php if(isset($_GET['jobDisable']) && $_SESSION['alert'] == 'alerted'){?>
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

<!--  District Notifications - Packages  -->

<?php if(isset($_GET['packageDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A Board Meeting Package has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['packageReactivated']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A Board Meeting Package has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addPackage']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new Board Meeting Package has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPackage']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The Board Meeting Package has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Minutes  -->

<?php if(isset($_GET['minutesDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A Board Meeting Minutes has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['minutesReactivated']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A Board Meeting Minutes has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addMinutes']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new Board Meeting Minutes has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editMinutes']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The Board Meeting Minutes has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Directives  -->

<?php if(isset($_GET['directiveDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A process/directive has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['directiveReactivated']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A process/directive has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addDirective']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new process/directive has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editDirective']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The process/directive has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Policy  -->

<?php if(isset($_GET['policyDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A policy has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['policyReactivated']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A policy has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addPolicy']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new policy has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPolicy']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The policy has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  District Notifications - Plan  -->

<?php if(isset($_GET['planDisabled']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A strategic plan has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['planReactivated']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A strategic plan has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addPlan']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new strategic plan has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPlan']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The strategic plan has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->
<?php require 'error_notification.php'; ?>

<!-- Set alert session to unalerted -->
<?php $_SESSION['alert'] = 'unalerted'; ?>