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

<?php if(isset($_GET['contactDisabled']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A contact entry has been <b>disabled</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['contactReactivated']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A contact entry has been <b>reactivated</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['newContact']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A contact entry has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editContactInformation']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A contact entry has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['carouselImageDisable']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    An image has been <b>removed</b> from the home carousel image list successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editCarouselImage']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    An image has been <b>modified</b> from the home carousel image list successfully!
</div>
<?php } ?>

<?php if(isset($_GET['newCarouselImage']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    An image has been <b>added</b> to the home carousel image list successfully!
</div>
<?php } ?>

<!--  Interaction Notifications - Page Information  -->

<?php if(isset($_GET['editPageInformation']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The page information has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['addPageFile']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A new page file has been <b>created</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editPageFile']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A page file has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['disabledPageFile']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    A page file has been <b>disabled</b> successfully!
</div>
<?php } ?>

<!--  Interaction Notifications - BOE Information  -->

<?php if(isset($_GET['editBOEInformation']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The information for a Board Member has been <b>modified</b> successfully!
</div>
<?php } ?>

<?php if(isset($_GET['editBOEImage']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The group photo for the Board of Education has been replaced.
</div>
<?php } ?>

<!--  Interaction Notifications - Culture Corner  -->

<?php if(isset($_GET['editCultureCorner']) && $_SESSION['alert'] == 'alerted'){?>
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    The page information has been <b>modified</b> successfully!
</div>
<?php } ?>

<!--  Errors  -->

<?php require 'error_notification.php'; ?>

<!-- Set alert session to unalerted -->
<?php $_SESSION['alert'] = 'unalerted'; ?>