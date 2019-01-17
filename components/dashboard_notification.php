<!-- Dashboard - Your Account -->

<?php if(isset($_GET['editProfile']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your account information has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPassword']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your account password has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editDisplayPicture']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your new account display picture has been <b>uploaded</b> successfully!
</div>
<?php } ?>

<!-- Dashboard -->

<?php if(isset($_GET['logDeleted']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Logs has been <b>cleared</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->

<?php require 'error_notification.php'; ?>

<!-- Set alert session to unalerted -->
<?php $_SESSION['alert'] = 'unalerted'; ?>