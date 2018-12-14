<!-- Post Notifications - Categories -->

<?php if(isset($_GET['newCategory']) && $_SESSION['alert'] == 'alerted'){ ?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A category has been <b>created</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->

<?php require 'error_notification.php'; ?>

<!-- Set alert session to unalerted -->
<?php $_SESSION['alert'] = 'unalerted'; ?>