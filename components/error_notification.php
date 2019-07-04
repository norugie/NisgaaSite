<?php if(isset($_GET['error']) && $_SESSION['error_message'] != 'none'){ echo $error->errorMessage($_SESSION['error_message']); } ?>

<?php if(isset($_GET['restricted'])){ 
    header("location: /restricted");
} ?>

<?php if(isset($_GET['invalid'])){ ?>
<div class="alert bg-red alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your username and/or password are invalid. Please try again.
</div>
<?php } ?>

<?php if(isset($_GET['inactive'])){ ?>
<div class="alert bg-red alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your account has been disabled. Please contact your administrator.
</div>
<?php } ?>