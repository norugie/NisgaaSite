<!--  Interaction Notifications - Web Content  -->

<?php if(isset($_GET['editPageInfo']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A page information has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['newInquiry']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new inquiry information has been <b>added</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editInquiry']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    An inquiry information has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['inquiryDisabled']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    An inquiry information has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editSchool']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The school information has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPageInformation']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The page information has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->

<?php require 'error_notification.php'; ?>

<!-- Set alert session to unalerted -->
<?php $_SESSION['alert'] = 'unalerted'; ?>