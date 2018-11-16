<?php if(isset($_GET['error'])){ ?>
<div class="alert bg-red alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Something went wrong while processing your request. Please try again. If problems persist, contact your administrator.
</div>
<?php } ?>

<?php if(isset($_GET['restricted'])){ ?>
<div class="alert bg-red alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    You are restricted from accessing that web page.
</div>
<?php } ?>

<?php if(isset($_GET['invalid'])){ ?>
<div class="alert bg-red alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Your username and/or password are invalid. Please try again.
</div>
<?php } ?>