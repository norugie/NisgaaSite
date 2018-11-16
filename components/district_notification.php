<?php if(isset($_GET['disabled'])){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The account has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['reactivated'])){ ?>
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

<?php require 'error_notification.php'; ?>