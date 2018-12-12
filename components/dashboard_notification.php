<!-- Dashboard - Your Account -->

<?php if(isset($_GET['editProfile'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your account information has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPassword'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your account password has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editDisplayPicture'])){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your new account display picture has been <b>uploaded</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->

<?php require 'error_notification.php'; ?>